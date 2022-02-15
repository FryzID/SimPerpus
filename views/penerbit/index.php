<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenerbitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penerbit';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penerbit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Penerbit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kode_penerbit',
            'nama_penerbit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
