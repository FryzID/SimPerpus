<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RakSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */




$this->title = 'Rak';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rak-index">
    <div class="card card-outline card-primary">
        <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Rak', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                        <!-- /.card-tools -->
        </div>

            <div class="card-body" style="display: block;">
                <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            'nama_rak',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
            </div>
    </div>

</div>
