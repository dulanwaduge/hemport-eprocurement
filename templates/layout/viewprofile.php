<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit" />
    <title>View Profile</title>
    <?= $this->Html->css('viewprofilecss.css') ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<!--header-->
<div class="header">
    <div class="main">
        <div class="logo">
            <a href="<?=$this->Url->build(['controller' => 'home', 'action'=>'index']); ?>"> <?= $this->Html->image('logo.png'); ?></a>
        </div>
        <?=
        $this->element('nav');
        ?>
    </div>
</div>

<?= $this->fetch('content') ?>
</body>
</html>
