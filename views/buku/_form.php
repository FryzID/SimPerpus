<?php

use app\models\Penerbit;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\arrayHelper;
use app\models\rak;
use kartik\daterange\DateRangePicker;
use kartik\file\FileInput as FileFileInput;
use kartik\widgets\FileInput;


/* @var $this yii\web\View */
/* @var $model app\models\Buku */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="buku-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class="col-md-3">
        <?= $form->field($model, 'tahun_terbit')->widget(etsoft\widgets\YearSelectbox::classname(), [
        'yearStart' => -50,
        ]); ?>
        </div>

        <div class="col-md-3">
        <?= $form->field($model, 'id_rak')->dropDownList(
            arrayHelper::map(Rak::find()->all(),'id','nama_rak'),
            ['prompt'=>'Select Rak']
        ) ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-5">
        <?= $form->field($model, 'id_penerbit')->dropDownList(
            arrayHelper::map(Penerbit::find()->all(),'id','nama_penerbit'),
            ['prompt'=>'Select Penerbit']
        ) ?>
        </div>

        <div class="col-md-5">
            <?= $form->field($model, 'pengarang')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <div class="col-md-12">
            <?= $form->field($model, 'gambar_buku')->widget(FileFileInput::classname()); ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
