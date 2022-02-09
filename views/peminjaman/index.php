<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeminjamanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peminjaman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-index">
    <div class="card card-outline card-primary">
        <div class="card-header">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Create Peminjaman', ['create'], ['class' => 'btn btn-success']) ?>
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
                'id_buku',
                'id_admin',
                'tanggal_peminjaman',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        </div>
    </div>

</div>