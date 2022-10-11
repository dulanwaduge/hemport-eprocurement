<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hemport</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="../img/hemporticon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <?= $this->Html->css('fontawesome-all.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('loginstyle.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('owl.carousel.min.css') ?>
    <?= $this->Html->css('slicknav.css') ?>
    <?= $this->Html->css('flaticon.css') ?>
    <?= $this->Html->css('progressbar_barfiller.css') ?>
    <?= $this->Html->css('gijgo.css') ?>
    <?= $this->Html->css('animate.min.css') ?>
    <?= $this->Html->css('animated-headline.css') ?>
    <?= $this->Html->css('magnific-popup.css') ?>
    <?= $this->Html->css('fontawesome-all.min.css') ?>
    <?= $this->Html->css('themify-icons.css') ?>
    <?= $this->Html->css('slick.css') ?>
    <?= $this->Html->css('nice-select.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('elegant-icons.css') ?>
    <?= $this->Html->css('magnific-popup.cs') ?>
    <?= $this->Html->css('nice-select.css') ?>
    <?= $this->Html->css('slicknav.min.css') ?>
    <?= $this->Html->css('new-styles.css') ?>



</head>

<body>
    <!-- partial:index.partial.html -->
    <!-- <div class="btn ">

    </div> -->
    <div class="login" style="display: flex">
        <div class="col-12 col-md-7 login-left background-secondary">

        <div class="users form">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create() ?>
 <a class="form-logo" href="<?= $this->Url->build(['controller' => 'home', 'action'=>'index']); ?>"><img
                            src="../img/logo/logo.png" alt="" style="color: green"></i></a>
                <fieldset>
                    <?= $this->Form->control('username', ['label'=> false, 'required' => true,"placeholder"=>"  Enter Username"]) ?>
                    <br>
                    <?= $this->Form->control('password', ['label'=> false, 'required' => true,"placeholder"=>"  Enter Password"]) ?>
                </fieldset>

                <br>

                <p><?= $this->Html->link("Create new account", ['action' => 'register']) ?></p>

                <p><?= $this->Html->link("Forgot your password? Reset", ['action' => 'forgotpassword']) ?></p>

                <br>

                <?= $this->Form->button(__('Login')); ?>
                <?= $this->Form->button(__('Back'),array("label" => "Back","class"=>"back-btn", "type" => "button", "onClick" => "history.go(-1)"))?>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <div class="col-12 col-md-5 login-right">

        </div>
    </div>





    </div>
    <!-- partial -->

</body>
