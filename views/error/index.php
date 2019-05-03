<?php use yii\helpers\Html; ?>
<div class="login-box">
  <div class="login-logo">
    <b>ERROR</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p><?= nl2br(Html::encode($message)) ?></p>
    <?= Html::a('Kembali', Yii::$app->homeUrl,['class'=>'text-center']) ?><br>
  </div>
</div>
