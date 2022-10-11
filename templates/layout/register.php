<!DOCTYPE html>
<html>
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
<?= $this->Html->css('bootstrap.min.css') ?>
<?= $this->Html->css('register.css') ?>
<?= $this->Html->css('style.css') ?>
<?= $this->Html->css('new-styles.css') ?>
<?= $this->Html->css('loginstyle.css') ?>

</head>
<body>

</div>
<div class="error row"  align="center" style="color: red;font-size: 30px;  left: 50%;">
    <?= $this->Flash->render() ?>
</div>
<?= $this->fetch('content') ?>
</body>
</html>
