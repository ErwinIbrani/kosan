<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kosan */

$this->title = 'Create Kosan';
$this->params['breadcrumbs'][] = ['label' => 'Kosans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kosan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
