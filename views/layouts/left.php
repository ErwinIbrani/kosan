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
              </span>
            </div>
        </form>
        -->

<?php $menuItems =  [

        ['label' => 'Dashboard','icon'=>'dashboard', 'url' => ['/dashboard/index/']],

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

        [
            'label' => 'Kosan Management',
            'icon' =>'wrench',
            'url' => ['/kosan/']
        ],

        [
            'label' => 'Warehouse Management',
            'icon'=>'braille',
            'url' => ['/warehouse/']
        ],

        [
            'label' => 'Payment Management',
            'icon' => 'credit-card',
            //'url' => 'javascript:void(0)',
            'items' => [
                ['label' => 'Price List', 'icon' => 'search', 'url' => ['/pricelist/']],
                ['label' => 'Status Payment', 'icon' => 'plus', 'url' => ['/statuspayment/']],
            ],
        ],

        [
            'label' => 'Checklist',
            'icon'  => 'check',
            'url'   => ['/checklist/']
        ],

        [
            'label' => 'Nira',
            'icon' => 'bandcamp',
            //'url' => 'javascript:void(0)',
            'items' => [
                ['label' => 'Nira Today < 12', 'icon' => 'search', 'url' => ['/recapitulation/nira-today-minus/']],
                ['label' => 'Nira Today > 12', 'icon' => 'search', 'url' => ['/recapitulation/nira-today-plus/']],
                ['label' => 'Nira One Week', 'icon' => 'search', 'url' => ['/recapitulation/nira-one-week/']],
                ['label' => 'Nira One Month', 'icon' => 'search', 'url' => ['/recapitulation/nira-one-month/']],
            ],
        ],

       [
            'label' => 'Tappers',
            'icon' => 'users',
            //'url' => 'javascript:void(0)',
            'items' => [
                ['label' => 'Purchase Filter', 'icon' => 'search', 'url' => ['/petani/filter-purchase/']],
                ['label' => 'Tapper Today', 'icon' => 'search', 'url' => ['/petani/petani-today/']],
                ['label' => 'Tapper One Week', 'icon' => 'search', 'url' => ['/petani/petani-one-week/']],
                ['label' => 'Tapper One Month', 'icon' => 'search', 'url' => ['/petani/petani-one-month/']],
                ['label' => 'Per Tapper Filter', 'icon' => 'search', 'url' => ['/petani/filter-petani/']]
            ],
        ],


        [
            'label' => 'Collectors',
            'icon' => 'user',
            //'url' => 'javascript:void(0)',
            'items' => [
                ['label' => "List Collector's Payment", 'icon' => 'search', 'url' => ['/collectors-payment/index/']],
            ],
        ],

    
        [
            'label' => 'Production',
            'icon' => 'barcode',
            //'url' => 'javascript:void(0)',
            'items' => [
                ['label' => 'Create Production', 'icon' => 'plus', 'url' => ['/label/create/']],
                ['label' => 'List Production', 'icon' => 'database', 'url' => ['/label/index/']],
                ['label' => 'Production Today < 12', 'icon' => 'search', 'url' => ['/label/production-today-minus/']],
                ['label' => 'Production Today > 12', 'icon' => 'search', 'url' => ['/label/production-today-plus/']],
                ['label' => 'Production One Week', 'icon' => 'search', 'url' => ['/label/production-one-week/']],
                ['label' => 'Production One Month', 'icon' => 'search', 'url' => ['/label/production-one-month/']],
            ],
        ],

        [
            'label' => 'Purchase And ICS',
            'icon' => 'file',
            //'url' => 'javascript:void(0)',
            'items' => [
                ['label' => 'Purchase', 'icon' => 'shopping-cart', 'url' => ['/purchase/']],
                ['label' => 'Purchase One Week', 'icon' => 'shopping-cart', 'url' => ['/purchase/one-week/']],
                ['label' => 'ICS', 'icon' => 'search', 'url' => ['/gardencontrol/']],
            ],
        ],

        [
            'label' => 'Search Production',
            'icon' => 'search',
            //'url' => 'javascript:void(0)',
            'items' => [
                ['label' => 'Search Production', 'icon' => 'search', 'url' => ['/guest/search-production/']],
            ],
        ],

        [
            'label' => 'KPI',
            'icon' => 'star',
            //'url' => 'javascript:void(0)',
            'items' => [
                ['label' => 'List KPI', 'icon' => 'search', 'url' => ['/kpi/rating-result/']],
            ],
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