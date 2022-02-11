<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\DashboardAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use mdm\admin\components\MenuHelper;

DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<header>
   <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-gray navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

   <?php echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [   //MDMSOFT-MENU
           // MenuHelper::getAssignedMenu(Yii::$app->user->id),
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
               // ['label' => 'Login', 'url' => ['/site/login']]
               ['label' => 'Login', 'url' => ['/user/security/login']]
            ) : (
                '<li>'
               // . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::beginForm(['/user/security/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
        
    ]);
    ?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?= Html::a('<i class="far dashcube nav-icon"></i> <p> SimPerpustakaan </p>', ['site/index'], ['class' => 'brand-link'], ['class' => 'far fa-circle nav-icon']) ?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional)
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->


      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        

        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item menu-open">
                <?= Html::a('<i class="far dashcube nav-icon"></i> <p> Dashboard </p>', ['site/index'], ['class' => 'nav-link active'], ['class' => 'far fa-circle nav-icon']) ?>
              </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Menu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <?= Html::a('<i class="far fa-circle nav-icon"></i> <p> Tambah Rak </p>', ['/rak/index'], ['class' => 'nav-link'], ['class' => 'far fa-circle nav-icon']) ?>
              </li>

              <li class="nav-item">
                <?= Html::a('<i class="far fa-circle nav-icon"></i> <p> Tambah Buku </p>', ['/buku/index'], ['class' => 'nav-link']) ?>
              </li>

              <li class="nav-item">
                 <?= Html::a('<i class="far fa-circle nav-icon"></i> <p> Tambah Peminjaman </p>', ['/peminjaman/index'], ['class' => 'nav-link'], ['class' => 'far fa-circle nav-icon']) ?>
              </li>
            </ul>
          </li>

              <!-- Menu User RBAC -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                User Dan RBAC
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <?= Html::a('<i class="far fa-circle nav-icon"></i> <p> User Menu </p>', ['/user/admin'], ['class' => 'nav-link'], ['class' => 'far fa-circle nav-icon']) ?>
                </li>

                <li class="nav-item">
                  <?= Html::a('<i class="far fa-circle nav-icon"></i> <p> RBAC Menu </p>', ['/admin'], ['class' => 'nav-link'], ['class' => 'far fa-circle nav-icon']) ?>
                </li>
              </ul>
            </li>
          

</header>

<div class="content-wrapper">

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
        </div>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
