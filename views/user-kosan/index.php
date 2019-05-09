<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserKosanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Kosans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-kosan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Kosan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'kosan_id',
            'tgl_masuk_kos',
            'tgl_berakhir_kos',
            //'status',
            //'status_bayar',
            //'pemebritahuan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
