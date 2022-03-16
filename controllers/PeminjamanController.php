<?php

namespace app\controllers;

use app\models\DataPeminjaman;
use app\models\Peminjaman;
use app\models\PeminjamanSearch;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Style_Border;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * PeminjamanController implements the CRUD actions for Peminjaman model.
 */
class PeminjamanController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Peminjaman models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PeminjamanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Peminjaman model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Peminjaman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Peminjaman();
        $modelsDataPeminjaman = [new DataPeminjaman];
        // 'modelsDataPeminjaman' => (empty($modelsDataPeminjaman)) ? [new DataPeminjaman] : $modelsDataPeminjaman;

        

        if ($this->request->isPost) {
            if ($model->load($this->request->post())){
                $model->tanggal_peminjaman = date("Y/m/d");

                if ($model->id_buku)
                {
                    $model->id_buku = implode(",", $model->id_buku);
                }
                
                $model->save();
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelsDataPeminjaman' => (empty($modelsDataPeminjaman)) ? [new DataPeminjaman] : $modelsDataPeminjaman
        ]);
    }

    /**
     * Updates an existing Peminjaman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Peminjaman model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Peminjaman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Peminjaman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Peminjaman::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExport()
    {
        $objPHPExcel = new PHPExcel();

        $PeminjamanSearch = new PeminjamanSearch();
        $activeSheetPeminjaman = $objPHPExcel->createSheet(0)->setTitle('Peminjaman');

        $activeSheetPeminjaman->getPageSetup()->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE)
        ->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_FOLIO);

        // //Get values and format
        $start = $_GET['start'];
        // var_dump($start);die;
        $end = $_GET['end'];

        // $peminjamans = Peminjaman::find()
        // // ->where(['tanggal_peminjaman', "date>=$start", "date<=$end"])
        // // ->from('Peminjaman.tanggal_peminjaman')
        // // ->createCommand('SELECT * FROM ')
        // ->Where(['between', 'tanggal_peminjaman', $start, $end])       
        // // ->orWhere([]) 
        // // ->andWhere(['tanggal_peminjaman'=>$start, $end])
        // ->all();

        // $peminjamans = Peminjaman::find()->Where(['between', 'tanggal_peminjaman', $start, $end])->all();

        if (!empty($start)) {
            $peminjamans = Peminjaman::find()->Where(['between', 'tanggal_peminjaman', $start, $end])->all();
        } else {
            $peminjamans = Peminjaman::find()->all();
        }
        // var_dump($Peminjaman);die;
        // $PeminjamanDataProvider = $tanggal->search(Yii::$app->request->queryParams);
        
        // if ($start = NULL)
        // {
            
        // }

        //Data
        $baseRow = 3;

        $activeSheetPeminjaman ->setCellValue('A1', 'DATA PEMINJAMAN')
        ->setCellValue('A2', 'No')
        ->setCellValue('B2', 'ID')
        ->setCellValue('C2', 'ID Buku')
        ->setCellValue('D2', 'ID Admin')
        ->setCellValue('E2', 'Tanggal Peminjaman');


        foreach($peminjamans as $peminjaman){
            $activeSheetPeminjaman->setCellValue('A'.$baseRow, $baseRow-2)
            ->setCellValue('B'.$baseRow, $peminjaman->id)
            ->setCellValue('C'.$baseRow, $peminjaman->id_buku)
            ->setCellValue('D'.$baseRow, $peminjaman->id_admin)
            ->setCellValue('E'.$baseRow, $peminjaman->tanggal_peminjaman);       
            $baseRow++;
        }
        
        // var_dump($tanggal);die;

        //Merging
        $activeSheetPeminjaman->mergeCells('A1:E1');

        //Aligning
        $activeSheetPeminjaman->getStyle('A1')->getAlignment()->setHorizontal('center');

        //Stylig
        $activeSheetPeminjaman->getStyle('A1')->applyFromArray(
            array(
                'font'=>array(
                    'bold'=>true
                ),
                'borders'=>array(
                    'allborders' => array(
                        'style'=> PHPExcel_Style_Border::BORDER_THIN
                        )
                )
            )
        );

        $activeSheetPeminjaman->getStyle('A2:E2')->applyFromArray(
            array(
                'font'=>array(
                    'bold'=>true
                ),
                'borders'=>array(
                    'allborders' => array(
                        'style'=> PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            )
        );


        //Data Border
        $activeSheetPeminjaman->getStyle('A3:E'.($baseRow-1))->applyFromArray(
            array(
                'borders'=>array(
                    'outline' => array(
                        'style'=> PHPExcel_Style_Border::BORDER_THIN
                    ),
                    'vertical'=>array(
                        'style' =>PHPExcel_Style_Border::BORDER_THIN
                    )
                )                
            )
        );
         // Redirect output to a client’s web browser (Excel2007)
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment;filename="_export.xlsx"');
         header('Cache-Control: max-age=0');
         // If you're serving to IE 9, then the following may be needed
         header('Cache-Control: max-age=1');
 
         // If you're serving to IE over SSL, then the following may be needed
         header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
         header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
         header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
         header('Pragma: public'); // HTTP/1.0
 
         $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
         $objWriter->save('php://output');
         exit;

    }

}
