<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use kartik\grid\GridView;

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

            <!-- <?php
            $gridColumns = [
                'id',
                // 'id_rak',
                // 'rak.nama_rak',
                'id_buku',
                'id_admin',
                'tanggal_peminjaman',
            ];

            //Render Export Dropdown
            echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns
            ]);
            ?> -->


        <form action="<?= \yii\helpers\Url::to(["/peminjaman/export"]) ?>" method="GET">
                 <div class="input-group">
                 <div class="input-group-prepend">
                    <span class="input-group-text">Awal dan Akhir Tanggal</span>
                </div>
                    <td class="pt-0 pl-0">
                        <input type="date" name="start" id="" class="form-control">
                    </td>
                    <td class="pt-0 pl-0">
                        <input type="date" name="end" id="" class="form-control">
                    </td>
                <div class="col">
                    <td class="pt-0 pl-0">
                        <input type="submit" name="btn btn-info" id="" class="form-control" placeholder="Start">
                    </td>
                </div>
                </div>
                </form>

            </div>

             <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
             
        <div class="card-body" style="display: block;">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                // 'id_rak',
                // 'rak.nama_rak',
                'id_buku',
                'id_admin',
                'tanggal_peminjaman',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        </div>
    </div>

</div>
