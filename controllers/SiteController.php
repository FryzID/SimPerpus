<?php

namespace app\controllers;

use app\models\Buku;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Peminjaman;
use app\models\Rak;
use yii\helpers\Json;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\Url;
use kartik\mpdf\Pdf;
use PHPExcel;
use PHPExcel_IOFactory;
use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


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
        $Buku = new Buku();
        $Peminjaman = new Peminjaman();
        $Rak = new Rak();
        $RakDataProvider = $Rak->search(Yii::$app->request->queryParams);
        $BukuDataProvider = $Buku->search(Yii::$app->request->queryParams);
        $PeminjamanDataProvider = $Peminjaman->search(Yii::$app->request->queryParams);

        $objReader = \PHPExcel_IOFactory::createReader('Excel2007');

        //set Template

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");


        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');

        // Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Simple');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="01simple.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    public function actionExport()
    {



        \moonland\phpexcel\Excel::widget([
            'isMultipleSheet' => true,
            'fileName' => "sadcadwq",
            'savePath' => './',
            'asAttachment' => false,
            "models" => [
                "Projects" => Buku::find()->all(),
                "Attempts" => Peminjaman::find()->all(),
                "Users" => Rak::find()->all()
            ],

        ]);
    }
}
