<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hemport</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <?= $this->Html->meta(array(
        'rel' => 'shortcut icon',
        'type' => "image/x-icon",
        'link' => '/img/hemporticon.ico',
    )); ?>

    <!-- CSS here -->
    <?= $this->Html->css('register.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('owl.carousel.min.css') ?>
    <?= $this->Html->css('slicknav.css') ?>
    <?= $this->Html->css('flaticon.css') ?>

    <?= $this->Html->css('style.css') ?>

    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('elegant-icons.css') ?>
    <?= $this->Html->css('magnific-popup.cs') ?>
    <?= $this->Html->css('nice-select.css') ?>
    <?= $this->Html->css('slicknav.min.css') ?>

</head>

<body>
<!-- ? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <?= $this->Html->image('logo/loder.png') ?>
            </div>
        </div>
    </div>
</div>
<!-- Preloader End-->

<?=
$this->element('navdiscoverproject');
?>

<!-- Main Start -->
<main>
    <div class="container">

        <?= $this->fetch('content') ?>

    </div>
</main>
<!-- Main End -->

<?= $this->element('footer'); ?>

<!-- JS here -->
<!-- Jquery, Popper, Bootstrap -->
<?= $this->Html->script('vendor/modernizr-3.5.0.min.js') ?>
<?= $this->Html->script('vendor/jquery-1.12.4.min.js') ?>
<?= $this->Html->script('popper.min.js') ?>
<?= $this->Html->script('bootstrap.min.js') ?>
<!-- Jquery, Popper, Bootstrap -->
<?= $this->Html->script('owl.carousel.min.js') ?>
<?= $this->Html->script('slick.min.js') ?>
<?= $this->Html->script('jquery.slicknav.min.js') ?>
<!-- One Page, Animated-HeadLin, Date Picker -->
<?= $this->Html->script('wow.min.js') ?>
<?= $this->Html->script('animated.headline.js') ?>
<?= $this->Html->script('jquery.magnific-popup.js') ?>
<?= $this->Html->script('gijgo.min.js') ?>
<!-- Nice-select, sticky,Progress -->
<?= $this->Html->script('jquery.nice-select.min.js') ?>
<?= $this->Html->script('jquery.sticky.js') ?>
<?= $this->Html->script('jquery.barfiller.js') ?>
<!-- counter , waypoint,Hover Direction -->
<?= $this->Html->script('jquery.counterup.min.js') ?>
<?= $this->Html->script('waypoints.min.js') ?>
<?= $this->Html->script('jquery.countdown.min.js') ?>
<?= $this->Html->script('hover-direction-snake.min.js') ?>
<!-- contact js -->
<?= $this->Html->script('contact.js') ?>
<?= $this->Html->script('jquery.form.js') ?>
<?= $this->Html->script('jquery.validate.min.js') ?>
<?= $this->Html->script('mail-script.js') ?>
<?= $this->Html->script('jquery.ajaxchimp.min.js') ?>
<!-- Jquery Plugins, main Jquery -->
<?= $this->Html->script('plugins.js') ?>
<?= $this->Html->script('main.js') ?>
<!-- *new* homepage and shop page -->
<?= $this->Html->script('jquery-3.3.1.min.js') ?>
<?= $this->Html->script('jquery.nicescroll.min.js') ?>
<?= $this->Html->script('jquery.magnific-popup.min.js') ?>
<?= $this->Html->script('jquery.slicknav.js') ?>
<?= $this->Html->script('mixitup.min.js') ?>
<?= $this->Html->script('plugins.js') ?>

</body>
</html>
