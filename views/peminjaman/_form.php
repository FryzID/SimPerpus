<?php

use app\models\Buku;
use app\models\Rak;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\arrayHelper;
use app\models\User;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\Url;
use wbraganca\dynamicform\DynamicFormWidget;


/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peminjaman-form">


    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']);
    $Buku = ArrayHelper::map(Buku::find()->all(), 'id', 'judul');
    ?>

    <?php
    // echo
    // $form->field($model, 'id_buku')->widget(
    //     Select2::classname(),
    //     [
    //         'data' => $Buku,
    //         'options' => ['placeholder' => Yii::t('app', 'Select Buku',)],
    //         'pluginOptions' => [
    //             'allowClear' => true,
    //             'multiple' => true
    //         ],
    //     ]
    // );
    ?>

    <?= $form->field($model, 'id_admin')->dropDownList(
        arrayHelper::map(User::find()->all(), 'id', 'username'),
        ['prompt' => 'Pilih User']
    ) ?>

        Select Buku
    <?php
    echo Select2::widget([
        'model' => $model,
        'name' => 'id_buku',
        'attribute' => 'id_buku',
        'data' => $Buku,
        'options' => [
            'placeholder' => 'Select Buku',
            'multiple' => true
        ],
    ]);
    ?>



   


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>