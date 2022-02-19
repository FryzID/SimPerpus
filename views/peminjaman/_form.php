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
    $Rak = ArrayHelper::map(Rak::find()->all(),'id','nama_rak'); 
    ?>
<!-- 
    <?= 
        $form->field($model, 'id_rak')->widget(Select2::classname(),
        [
            'data' => $Rak,
            'options'=>['placeholder'=>Yii::t('app','Select Rak')],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]);
    ?> -->


<?= $form->field($model, 'id_admin')->dropDownList(
            arrayHelper::map(User::find()->all(),'id','username'),
            ['prompt'=>'Pilih User']
        ) ?>


        <!-- DynamicForm -->
        <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Data Peminjaman</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsDataPeminjaman[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'id_rak',
                    'id_buku',
                ],
            ]); ?>
 
            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsDataPeminjaman as $i => $modelsDataPeminjaman): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Data Peminjaman</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelsDataPeminjaman->isNewRecord) {
                                echo Html::activeHiddenInput($modelsDataPeminjaman, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= 
                                $form->field($modelsDataPeminjaman, "[{$i}]id_rak")->widget(Select2::classname(),
                                [
                                    'data' => $Rak,
                                    'options'=>['placeholder'=>Yii::t('app','Select Rak')],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                                ]);
                                 ?>
                            </div>
                            <div class="col-sm-6">
                                <?=
                                    $form->field($modelsDataPeminjaman, "[{$i}]id_buku")->widget(DepDrop::classname(), [
                                        'type'=>DepDrop::TYPE_SELECT2,
                                        'options'=>['id'=>'data-peminjaman-id_buku'],
                                        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                                        'pluginOptions'=>[
                                            'depends'=>['data-peminjaman-id_rak'],
                                            'url'=>Url::toRoute(['site/buku']),
                                            'placeholder'=>Yii::t('app','Select buku'),
                                        ]
                                    ]);
                                    var_dump($modelsDataPeminjaman, "[{$i}]id_buku");die;
                                ?>
                            </div>
                        </div><!-- .row --><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    


    <!-- <?=
        $form->field($model, 'id_buku')->widget(DepDrop::classname(), [
            'type'=>DepDrop::TYPE_SELECT2,
            'options'=>['id'=>'peminjaman-id_buku'],
            'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
            'pluginOptions'=>[
                'depends'=>['peminjaman-id_rak'],
                'url'=>Url::toRoute(['site/buku']),
                'placeholder'=>Yii::t('app','Select buku'),
            ]
        ]);
        // var_dump($model, 'id_buku');die;
    ?> -->

    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
