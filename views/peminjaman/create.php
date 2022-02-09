<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */

$this->title = 'Create Peminjaman';
$this->params['breadcrumbs'][] = ['label' => 'Peminjaman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-create">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    
        <div class="card-body" style="display: block;">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
        </div>
    </div>
</div>
