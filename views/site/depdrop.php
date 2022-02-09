<?php

use app\models\Rak;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

?>
<?= 
        $Rak = ArrayHelper::map(Rak::find()->all(),'id','nama_rak'), 
        $form->field($model, 'id_rak')->widget(\kartik\select2\select2::classname(),
        [
            'data' => $Rak,
            'options'=>['placeholder'=>Yii::t('app','Select Company')],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]);
    ?>
    <?=
        $form->field($model, 'id_buku')->widget(\kartik\depdrop\DepDrop::classname(), [
            'type'=>DepDrop::TYPE_SELECT2,
            'options'=>['id'=>'peminjaman-id_buku'],
            'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
            'pluginOptions'=>[
                'depends'=>['peminjaman-id_buku'],
                'url'=>Url::to(['/buku']),
                'placeholder'=>Yii::t('app','Select buku'),
            ]
        ]);
    ?>
?>

