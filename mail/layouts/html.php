<?php

use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<!doctype html>
<html>
    <head>       

        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
        <title>Welcome to The Golfer Card</title>
        <?php $this->head() ?>
        <style>
            body {
                padding: 2%;
                background-color: #f3f3f3;
            }
            p {
                font-family: Verdana, Geneva, sans-serif;
                font-size: 12px;
                color: #333333;
            }
            h1 {
                font-family: Georgia, serif;
                font-size: 16px;
                color: #d62027;
            }
            h2 {
                font-family: Georgia, serif;
                font-size: 16px;
                color: #000000;
            }
            h3 {
                font-family: Georgia, serif;
                font-size: 14px;
                color: #d62027;
            }
            a {
                font-family: Verdana, Geneva, sans-serif;
                font-weight: 400;
                font-size: 12px;
                color: #d62027;
                text-decoration: none;
            }
            .header {
                padding:20px;
                background-color: #d62027;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }
            .logo {
                height: 40px;
            }
            .content-container {
                background-color: #ffffff;
                padding: 20px;
            }
            .footer {
                background-color: #333333;
                padding: 20px;
            }
            .footer-content {
                font-family: Verdana, Geneva, sans-serif;
                font-size: 10px;
                color: #ffffff;
                text-align: center;
            }
            .bottom {
                font-family: Verdana, Geneva, sans-serif;
                font-size: 10px;
                color: #333333;
                text-align: center;
                padding-top: 20px;
            }
            a.bottom-link {
                color: #333333;
            }

        </style>
    </head>

    <body>
        <div class="header">
            <a href="http://www.thegolfercard.co.uk">
                <img src="http://www.thegolfercard.co.uk/wp-content/uploads/2017/03/The-Golfer-card-white.png" class="logo">
            </a>
        </div>
        <div class="content-container">
            <?php $this->beginBody() ?>
            <?= $content ?>
            <?php $this->endBody() ?>
        </div>
        <div class="footer">
            <div class="footer-content">
                Here is some legal stuff that we will no doubt need to write in at the bottom of the email.<br/><br/>You can <a href="#">click here</a> to find out more.
            </div>
        </div>
        <div class="bottom">
            <a href="" class="bottom-link">Link One</a> | <a href="" class="bottom-link">Link Two</a> | <a href="" class="bottom-link">Link Two</a>
        </div>
    </body>
</html>
<?php $this->endPage() ?>
