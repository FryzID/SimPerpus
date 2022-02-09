<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

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
        </div>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <div class="card-body" style="display: block;">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'judul',
                'pengarang',
                'penerbit',
                'tahun_terbit',
                'rak.nama_rak',
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
