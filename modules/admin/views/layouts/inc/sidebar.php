<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="<?= \yii\helpers\Url::to(['/admin']) ?>"><i class="fa fa-bar-chart"></i> <span>Shop Statistics</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-shopping-cart"></i> <span>Orders</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['order/index']) ?>">Orders list</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['order/create']) ?>">Create orders</a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#"><i class="fa  fa-file-image-o"></i> <span>Products</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['product/index']) ?>">Products list</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['product/create']) ?>">Create products</a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#"><i class="fa fa-cubes"></i> <span>Categories</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['category/index']) ?>">Categories list</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['category/create']) ?>">Create categories</a></li>
                </ul>
            </li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>