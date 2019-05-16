<?php

use dmstr\widgets\Menu;
use mdm\admin\components\Helper;
use yii\helpers\Html;

?>
<?php 
    if(!Yii::$app->user->isGuest){ ?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <!-- <img src="$directoryAsset /img/user2-160x160.jpg" class="img-circle" alt="User Image"/> -->
                <?= Html::img(Yii::$app->user->identity->linkpreviewavatar, ['class'=>'img-circle']); ?>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->nama_lengkap;?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
     <!--    <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>if  ( Yii :: $app -> user -> can ( 'view_categories' ))
            </div>
        </form>
        -->

<?php $menuItems =  [
        /*user*/
        ['label' => 'Pembayaran Kosan','icon'=>'money', 'url' => ['/dashboard/index/']],
       
        /*admin*/
        ['label' => 'Pembayaran Kosan','icon'=>'money', 'url' =>  ['/dashboard-admin/index']],
        
        /*admin*/
        [
            'label' => 'User Management',
            'icon' => 'users',
            //'url' => 'javascript:void(0)',
            'items' => [
                ['label' => 'List User', 'icon' => 'user', 'url' => ['/user/']],
                ['label' => 'Assignment', 'icon' => 'balance-scale', 'url' => ['/rbac/assignment/']],
                ['label' => 'Role', 'icon' => 'blind', 'url' => ['/rbac/role/']],
                ['label' => 'Permission', 'icon' => 'compass', 'url' => ['/rbac/permission/']],
                ['label' => 'Access', 'icon' => 'retweet', 'url' => ['/rbac/route/']],
            ],
        ],


         /*admin*/
        [
            'label' => 'Kosan Management',
            'icon'  => 'wrench',
            'url'   => ['/kosan/']
        ],
        
        /*admin*/
        [
            'label' => 'Pengaduan',
            'icon'  => 'bell',
            'url'   => ['/pengaduan-admin/']
        ],

       /*user*/
        [
            'label' => 'Pengaduan',
            'icon'  => 'bell',
            'url'   => ['/pengaduan/']
        ],

       /*admin*/
        [
            'label' => 'Status Pemebitahuan',
            'icon'  => 'check',
            'url'   => ['/cron-job/']
        ],

        [
            'label' => 'Berhenti Mengkost',
            'icon'  => 'sign-out',
            'url'   => ['/user-kosan/keluar-kosan', 'data' => [
                        'confirm' => 'Apakah Anda Yakin ?',
                        'method' => 'post',
                    ],]
        ],

       

    ];


$menuItems = Helper::filter($menuItems);

echo Menu::widget([
     'items' => $menuItems,
]);


?>

    </section>
</aside>
<?php } ?>