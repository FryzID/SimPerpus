<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rak */

$this->title = 'Create Rak';
$this->params['breadcrumbs'][] = ['label' => 'Rak', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rak-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
