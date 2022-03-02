<?php

/* @var $this yii\web\View */

use app\models\Buku;
use app\models\Peminjaman;
use app\models\Penerbit;
use app\models\Rak;
use yii\bootstrap4\Html;

$this->title = 'Perpustakaanku';
?>
<div class="card card-outline card-primary">
    

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Perpustakaanku</h1>
        <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <p>Jumlah Peminjaman</p>
                    <?php 
                    $jumlah_peminjaman = Peminjaman::find()
                    ->indexBy('id')
                    ->count();
                    ?>
                    <h3><?php echo "$jumlah_peminjaman"?></h3>
                </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <!-- <li class="small-box-footer">
                <?= Html::a('<p> More Info </p> <i class="fas fa-arrow-circle-right"> </i>', ['/peminjaman/index'], ['class' => 'small-box-footer']) ?>
            </li> -->
                <!-- <a href="./web/peminjaman/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <p>Jumlah Buku</p>
                    <?php 
                    $jumlah_buku = Buku::find()
                    ->indexBy('id')
                    ->count();
                    ?>
                    <h3><?php echo "$jumlah_buku"?></h3>
                </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
                <!-- <a href="./buku/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <p>Jumlah Rak</p>
                    <?php 
                    $jumlah_rak = Rak::find()
                    ->indexBy('id')
                    ->count();
                    ?>
                    <h3><?php echo "$jumlah_rak"?></h3>
                </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
                <!-- <a href="./rak/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <p>Jumlah Penerbit</p>
                    <?php 
                    $jumlah_penerbit = Penerbit::find()
                    ->indexBy('id')
                    ->count();
                    ?>
                    <h3><?php echo "$jumlah_penerbit"?></h3>
                </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
                <!-- <a href="./buku/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
    </div>
    </div>


    <div class="card-body" style="display: block;">

            <div class="col-lg-12">
                <h2>Export Data Ke Excel</h2>

                <?= Html::a('Export Excel', ['exportexcel'], ['class'=>'btn btn-info']); ?>
            </div>
        </div>

    </div>
</div>
