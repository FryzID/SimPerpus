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


/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peminjaman-form">
    

    <?php $form = ActiveForm::begin(); 
    $Rak = ArrayHelper::map(Rak::find()->all(),'id','nama_rak'); 
    ?>

    <?= 
        $form->field($model, 'id_rak')->widget(Select2::classname(),
        [
            'data' => $Rak,
            'options'=>['placeholder'=>Yii::t('app','Select Company')],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]);
    ?>
    <?=
        $form->field($model, 'id_buku')->widget(DepDrop::classname(), [
            'type'=>DepDrop::TYPE_SELECT2,
            'options'=>['id'=>'peminjaman-id_buku'],
            'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
            'pluginOptions'=>[
                'depends'=>['peminjaman-id_buku'],
                'url'=>Url::to(['site/buku']),
                'placeholder'=>Yii::t('app','Select buku'),
            ]
        ]);
    ?>

    <?= $form->field($model, 'id_admin')->dropDownList(
            arrayHelper::map(User::find()->all(),'id','username'),
            ['prompt'=>'Pilih User']
        ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
