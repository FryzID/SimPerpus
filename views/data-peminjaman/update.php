<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataPeminjaman */

$this->title = 'Update Data Peminjaman: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-peminjaman-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
