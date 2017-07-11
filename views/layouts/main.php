<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

//use lavrentiev\widgets\toastr\Notification;
//
//print_r(Notification);
//die;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php Yii::$app->getHomeUrl(); ?>/favicon.ico" type="image/x-icon">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode(Yii::$app->name . ($this->title ? ' - ' . $this->title : '')) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <div id="loading-indicator">
            <img id="loading-image" src="<?php echo Yii::$app->request->baseUrl; ?>/images/ajaxloader.gif" alt="Loading..."/>
        </div>
        <?php
        $type = Yii::$app->session->getFlash('type');
        $title = Yii::$app->session->getFlash('title');
        $message = Yii::$app->session->getFlash('message');

        if (!empty($type) && !empty($message)) {
//            Notification::widget([
//                'type' => $type,
//                'title' => $title,
//                'message' => $message,
//                'options' => [
//                    "closeButton" => false,
//                    "debug" => false,
//                    "newestOnTop" => true,
//                    "progressBar" => true,
//                    "positionClass" => "toast-top-right",
//                    "preventDuplicates" => false,
//                    "onclick" => null,
//                    "showDuration" => "100",
//                    "hideDuration" => "3000",
//                    "timeOut" => "3000",
//                    "extendedTimeOut" => "1000",
//                    "showEasing" => "swing",
//                    "hideEasing" => "linear",
//                    "showMethod" => "fadeIn",
//                    "hideMethod" => "fadeOut"
//                ]
//            ]);
        }
        ?>
        <?php $this->beginBody() ?>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="<?= Url::to('golf-club') ?>" class="logo">
                        <span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/logo.png" alt="" height="50"></span>
                        <i><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/logo_sm.png" alt="" height="50"></i>
                    </a>
                </div>
                <!--  LOGO END  -->
                <nav class="navbar-custom">

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light text-dark">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        <li>
                            <h4 class="page-title text-dark"><?= $this->title; ?></h4>
                        </li>
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">                    
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">                            
                            <li><?= Html::a('<i class="fi-disc"></i><span> Activity </span>', ['/playeractivity']) ?></li>

                            <?php if (Yii::$app->user->identity->user_roleID == 1) { ?>
                                <li><?= Html::a('<i class="fi-ribbon"></i><span> Golf Clubs </span>', ['/golf-club']) ?></li>                                
                            <?php } ?>

                            <?php if (in_array(Yii::$app->user->identity->user_roleID, [1, 3])) { ?>
                                <li><?= Html::a('<i class="fi-head"></i><span> Golfers </span>', ['/golfer']) ?></li>
                                <li><?= Html::a('<i class="fi-book"></i><span> Cards </span>', 'javascript:void(0);') ?></li>                                
                            <?php } ?>

                            <?php if (Yii::$app->user->identity->user_roleID == 1) { ?>
                                <li><?= Html::a('<i class="fi-server"></i><span> Readers </span>', 'javascript:void(0);') ?></li>
                            <?php } ?>

                            <li><?= Html::a('<i class="fi-cog"></i><span> My Profile </span>', 'javascript:void(0);') ?></li>
                            <li>
                                <a href="javascript: void(0);"><i class="fi-help"></i><span> Info & Support </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="faq.php">FAQ</a></li>
                                    <li><a href="support.php">Support</a></li>
                                    <li><a href="terms.php">Terms & Conditions</a></li>
                                    <li><a href="privacy.php">Privacy Policy</a></li>
                                </ul>
                            </li>
                            <li><?= Html::a('<i class="fi-power"></i><span> Logout </span>', ['site/logout'], ['data' => ['method' => 'post']]) ?></li>
                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->


            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>                
            </div>
        </div>

        <footer class="footer text-right">
            2017 &copy; The Golfer Card. - www.onegolfnetwork.com            
        </footer>

        <?php $this->endBody() ?>
    </body>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy']
            });

            table.buttons().container()
                    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });

    </script>
</html>
<?php $this->endPage() ?>
