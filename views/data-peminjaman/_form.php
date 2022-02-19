<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataPeminjaman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-peminjaman-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_rak')->textInput() ?>

    <?= $form->field($model, 'id_buku')->textInput() ?>

    <?= $form->field($model, 'id_peminjaman')->textInput() ?>

    <?= $form->field($model, 'tanggal_peminjaman')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
