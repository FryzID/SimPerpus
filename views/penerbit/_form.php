<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Penerbit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penerbit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_penerbit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_penerbit')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
