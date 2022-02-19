<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataPeminjaman */

$this->title = 'Create Data Peminjaman';
$this->params['breadcrumbs'][] = ['label' => 'Data Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-peminjaman-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
