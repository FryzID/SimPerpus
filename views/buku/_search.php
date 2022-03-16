<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BukuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="buku-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'pengarang') ?>

    <?= $form->field($model, 'id_penerbit') ?>

    <?= $form->field($model, 'tahun_terbit') ?>

    <?= $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'id_rak') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
