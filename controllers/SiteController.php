<?php

namespace app\controllers;

use app\models\Buku;
use app\models\BukuSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Peminjaman;
use app\models\PeminjamanSearch;
use app\models\PenerbitSearch;
use app\models\Rak;
use app\models\RakSearch;
use yii\helpers\Json;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\Url;
use kartik\mpdf\Pdf;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Style;
use PHPExcel_Style_Border;
use PHPExcel_Worksheet;
use PHPExcel_Worksheet_Drawing;
use PHPExcel_Worksheet_MemoryDrawing;
use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use yii\data\ActiveDataProvider;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'main-login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    // public function actionDepdrop()
    // {
    //     $model = new \app\models\Buku();
    //     if ($model->load(Yii::$app->request->post())) {
    //         $model->peminjaman_created_date = date('Y-m-d h:m:s');
    //         $model->save();
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     } else {
    //         return $this->render('depdrop', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    // public function actionBuku() {
    //     $out = [];

    //     if (isset($_POST['depdrop_parents'])) {
    //         $parents = $_POST['depdrop_parents'];
    //             if ($parents != null){
    //                 $cat_id = $parents[0];
    //                 $out = \app\models\Buku::find()
    //                        ->where(['id_rak'=>$cat_id])
    //                        ->select(['id','judul AS name'])->asArray()->all();
    //                        echo Json::encode(['output'=>$out, 'selected'=>'']);
    //                        return;
    //             }
    //     }
    // }

    public function actionExportexcel()
    {
        // var_dump('aaa');die;
        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();
        $BukuSearch = new BukuSearch();
        $PeminjamanSearch = new PeminjamanSearch();
        $RakSearch = new RakSearch();
        $PenerbitSearch = new PenerbitSearch();
        $RakDataProvider = $RakSearch->search(Yii::$app->request->queryParams);
        $PenerbitDataProvider = $PenerbitSearch->search(Yii::$app->request->queryParams);
        $BukuDataProvider = $BukuSearch->search(Yii::$app->request->queryParams);
        $PeminjamanDataProvider = $PeminjamanSearch->search(Yii::$app->request->queryParams);

        // $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
        
        // //set Template
        // $template1 = Yii::getAlias('@app/views/buku');
        // $objPHPExcel = $objReader->load($template1);
        // $objPHPExcel->getActiveSheet()->setTitle('Buku ');
        
        
        // Set document properties
        // $objPHPExcel->createSheet(0);
        $activeSheetBuku = $objPHPExcel->createSheet(0)->setTitle('Buku');
        
       
        $activeSheetBuku->getPageSetup()->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE)
        ->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_FOLIO);

        //Data
        $baseRow = 3;

        $activeSheetBuku->setCellValue('A1', 'DATA BUKU')
        ->setCellValue('A2', 'No')
        ->setCellValue('B2', 'ID')
        ->setCellValue('C2', 'Judul')
        ->setCellValue('D2', 'Gambar_Buku')
        ->setCellValue('E2', 'Pengarang')
        ->setCellValue('F2', 'ID_Penerbit')
        ->setCellValue('G2', 'Tahun_Terbit')
        ->setCellValue('H2', 'ID_Rak');

        foreach($BukuDataProvider->getModels() as $Buku){
            $activeSheetBuku->setCellValue('A'.$baseRow, $baseRow-3)
            ->setCellValue('B'.$baseRow, $Buku->id)
            ->setCellValue('C'.$baseRow, $Buku->judul)
            ->setCellValue('D'.$baseRow, $Buku->gambar_buku)
            ->setCellValue('E'.$baseRow, $Buku->pengarang)
            ->setCellValue('F'.$baseRow, $Buku->id_penerbit)
            ->setCellValue('G'.$baseRow, $Buku->tahun_terbit)
            ->setCellValue('H'.$baseRow, $Buku->id_rak);
            $baseRow++;
        }

        //Merging
        $activeSheetBuku->mergeCells('A1:H1');

        //Aligning
        $activeSheetBuku->getStyle('A1')->getAlignment()->setHorizontal('center');

        //Stylig
        $activeSheetBuku->getStyle('A1')->applyFromArray(
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

        $activeSheetBuku->getStyle('A2:H2')->applyFromArray(
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
        $activeSheetBuku->getStyle('A3:H'.($baseRow-1))->applyFromArray(
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

//////////////////////////NEW  SHEET/////////////////////////////////////
// $objPHPExcel->createSheet(1);
$activeSheetRak = $objPHPExcel->createSheet(1)->setTitle('Rak');

        $activeSheetRak->getPageSetup()->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE)
        ->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_FOLIO);

        //Data
        $baseRow = 3;

        $activeSheetRak ->setCellValue('A1', 'DATA RAK')
        ->setCellValue('A2', 'No')
        ->setCellValue('B2', 'ID')
        ->setCellValue('C2', 'Nama_Rak');

        foreach($RakDataProvider->getModels() as $Rak){
            $activeSheetRak->setCellValue('A'.$baseRow, $baseRow-3)
            ->setCellValue('B'.$baseRow, $Rak->id)
            ->setCellValue('C'.$baseRow, $Rak->nama_rak);
            $baseRow++;
        }

        //Merging
        $activeSheetRak->mergeCells('A1:C1');

        //Aligning
        $activeSheetRak->getStyle('A1')->getAlignment()->setHorizontal('center');

        //Stylig
        $activeSheetRak->getStyle('A1')->applyFromArray(
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

        $activeSheetRak->getStyle('A2:C2')->applyFromArray(
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
        $activeSheetRak->getStyle('A3:C'.($baseRow-1))->applyFromArray(
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




/////////////////////NEW SHEET///////////////////////////////
        $activeSheetPeminjaman = $objPHPExcel->createSheet(2)->setTitle('Peminjaman');

        $activeSheetPeminjaman->getPageSetup()->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE)
        ->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_FOLIO);


        $autoFilter = $activeSheetPeminjaman->getAutoFilter();
        $columnFilter = $autoFilter->getColumn('E');    
        $columnFilter->setFilterType(
            \PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column::AUTOFILTER_FILTERTYPE_DYNAMICFILTER
        );
        $columnFilter->createRule()
    ->setRule(
        \PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column\Rule::AUTOFILTER_COLUMN_RULE_EQUAL,
        '',
        \PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column\Rule::AUTOFILTER_RULETYPE_DYNAMIC_YEARTODATE
    )
    ->setRuleType(
        \PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column\Rule::AUTOFILTER_RULETYPE_DYNAMICFILTER
    );

        //Data
        $baseRow = 3;

        $activeSheetPeminjaman ->setCellValue('A1', 'DATA PEMINJAMAN')
        ->setCellValue('A2', 'No')
        ->setCellValue('B2', 'ID')
        ->setCellValue('C2', 'ID Buku')
        ->setCellValue('D2', 'ID Admin')
        ->setCellValue('E2', 'Tanggal Peminjaman');


        foreach($PeminjamanDataProvider->getModels() as $Peminjaman){
            $activeSheetPeminjaman->setCellValue('A'.$baseRow, $baseRow-3)
            ->setCellValue('B'.$baseRow, $Peminjaman->id)
            ->setCellValue('C'.$baseRow, $Peminjaman->id_buku)
            ->setCellValue('D'.$baseRow, $Peminjaman->id_admin)
            ->setCellValue('E'.$baseRow, $Peminjaman->tanggal_peminjaman);            
            $baseRow++;
        }

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

        ///////////////////NEW SHEET///////////////
        $activeSheetPenerbit = $objPHPExcel->createSheet(3)->setTitle('Penerbit');

        $activeSheetPenerbit->getPageSetup()->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE)
        ->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_FOLIO);

        //Data
        $baseRow = 3;
        $activeSheetPenerbit->setCellValue('A1', 'DATA PENERBIT')
        ->setCellValue('A2', 'No')
        ->setCellValue('B2', 'ID')
        ->setCellValue('C2', 'Kode Penerbit')
        ->setCellValue('D2', 'Nama Penerbit');

        foreach($PenerbitDataProvider->getModels() as $Penerbit){
            $activeSheetPenerbit->setCellValue('A'.$baseRow, $baseRow-3)
            ->setCellValue('B'.$baseRow, $Penerbit->id)
            ->setCellValue('C'.$baseRow, $Penerbit->kode_penerbit)
            ->setCellValue('D'.$baseRow, $Penerbit->nama_penerbit);
            $baseRow++;
        }

        //Merging
        $activeSheetPenerbit->mergeCells('A1:D1');

        //Aligning
        $activeSheetPenerbit->getStyle('A1')->getAlignment()->setHorizontal('center');

        //Stylig
        $activeSheetPenerbit->getStyle('A1')->applyFromArray(
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

        $activeSheetPenerbit->getStyle('A2:D2')->applyFromArray(
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
        $activeSheetPenerbit->getStyle('A3:D'.($baseRow-1))->applyFromArray(
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

    // public function actionExport()
    // {
    //     $exporter = (new Spreadsheet([
    //         'title' => 'Buku',
    //         'dataProvider' => new ActiveDataProvider([
    //             'query' => Buku::find(),
    //         ]),
    //     ]))->render(); // call `render()` to create a single worksheet
        
    //     $exporter->configure([ // update spreadsheet configuration
    //         'title' => 'Rak',
    //         'dataProvider' => new ActiveDataProvider([
    //             'query' => Rak::find(),
    //         ]),
    //     ])->render(); // call `render()` to create a single worksheet
        
    //     $exporter->configure([ // update spreadsheet configuration
    //         'title' => 'Peminjaman',
    //         'dataProvider' => new ActiveDataProvider([
    //             'query' => Peminjaman::find(),
    //         ]),
    //     ])->render(); // call `render()` to create a single worksheet
        
    //     $exporter->send('items.xls');
    // }
}
