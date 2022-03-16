<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\bootstrap4\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BukuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index">
    <div class="card card-outline card-primary">
        <div class="card-header">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Buku', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php
            $gridColumns = [
                'id',
                'judul',
                'pengarang',
                'id_penerbit',
                'tahun_terbit',
                'rak.nama_rak',
            ];

            //Render Export Dropdown
            echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns
            ]);
        ?>

    </div>

    
    <?php
    // Modal::begin([
    //     'id' => 'bukuModal',
    // ]);
    //     Pjax::begin(['pjax-modal', 'timeout'=>false,
    //     'enablePushState'=>false,
    //     'enableReplaceState'=>false,
    // ]);

    //     Pjax::end();
    // Modal::end();
    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <div class="card-body" style="display: block;">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'export'=>false,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'judul',
                'pengarang',
                'id_penerbit',
                'tahun_terbit',
                'rak.nama_rak',
                'stock',
                //'id_rak',

                [
                    'attribute' => 'gambar_buku',
                    'format' => 'html',    
                    'value' => function ($data) {
                        return Html::img(Yii::getAlias('@web').'/uploads/'. $data['gambar_buku'],
                            ['width' => '70px']);
                    },
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],

            
        ]); ?>
        </div>
    </div>

</div>
