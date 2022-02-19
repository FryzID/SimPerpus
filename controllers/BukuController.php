<?php

namespace app\controllers;

use app\models\Buku;
use app\models\BukuSearch;
use app\models\Rak;
use Faker\Core\File;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BukuController implements the CRUD actions for Buku model.
 */
class BukuController extends Controller
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
     * Lists all Buku models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BukuSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Buku model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Buku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Buku();

        if ($model->load(Yii::$app->request->post())) {
            

            $imageName = Yii::$app->security->generateRandomString(12);
            $gambar_buku = UploadedFile::getInstance($model, 'gambar_buku');
            if($model->validate()){
                $model->save();
                if (!empty($gambar_buku)) {
                    $gambar_buku->saveAs(Yii::getAlias('@app/web/') . 'uploads/' . $imageName . '.' . $gambar_buku->extension);
                    $model->gambar_buku = $imageName.'.'.$gambar_buku->extension;
                    $model->save();
                    // var_dump($gambar); die;
                }
            }
 
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Buku model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $data = $this->findModel($id);
            unlink(Yii::getAlias('@app/web/') . 'uploads/' . $data->gambar_buku);

            $imageName = Yii::$app->security->generateRandomString(12);
            $gambar_buku = UploadedFile::getInstance($model, 'gambar_buku');
            if($model->validate()){
                $model->save();
                if (!empty($gambar_buku)) {
                    $gambar_buku->saveAs(Yii::getAlias('@app/web/') . 'uploads/' . $imageName . '.' . $gambar_buku->extension);
                    $model->gambar_buku = $imageName.'.'.$gambar_buku->extension;
                    $model->save();
                    // var_dump($gambar); die;
                }
            }
 
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
        return $this->render('update', [
            'model' => $model,
        ]);
        }
    }

    /**
     * Deletes an existing Buku model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $data = $this->findModel($id);
        unlink(Yii::getAlias('@app/web/') . 'uploads/' . $data->gambar_buku);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Buku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Buku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Buku::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /*
	EXPORT WITH MPDF
	*/
    // public function actionExportPdf($id)
    // {
    //     $model = Buku::findOne($id);
    //     $searchModel = new BukuSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    //     $html = $this->renderPartial('data_buku',['dataProvider'=>$dataProvider]);
    //     $mpdf=new \mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0);  
    //     $mpdf->SetDisplayMode('fullpage');
    //     $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
    //     $mpdf->WriteHTML($html);
    //     $mpdf->Output();
    //     exit;
       
    // }
}
