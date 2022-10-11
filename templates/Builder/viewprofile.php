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

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Builder $builder
 */
?>

<!doctype html>
<html lang="zxx">
<div id="wrapper">
    <!-- breadcrumb Start-->
    <div class="page-notification">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'index']); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'findprofessionals']); ?>">Find Professionals</a></li>
                            <li class="breadcrumb-item"><a href="#">View Profile</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End-->

    <?php echo $this->Flash->render(); ?>

    <br>

    <div class="company">

    <div class="right">
        <div class="company-info">
            <h2 class="company-name">
                <?= h($builder->name) ?>,
            </h2>
            <h2 class="company-location">
                <?= h($builder->city) ?>
            </h2>
            <br>
            <p class="company-description">
                <?= h($builder->description) ?>
            </p>
        </div>
    </div>

    <div class="left">
        <div class="profileimage">
            <?php
            if($builder['avatar']!= null){

                echo $this->Html->image($builder['tb-avatar-none.jpg'],['style'=>'min-width:500px ;max-width:500px ;min-height:500px ;max-height:500px ; border-radius: 50%; display: block; margin-left: 0; margin-right: auto; margin-bottom: 50px']);
            }else{

                echo $this->Html->image('sustainability.png',['style'=>'min-width:550px ;max-width:550px ;min-height:500px ;max-height:500px ; border-radius: 10%; display: block; margin-left: 300px; margin-right: auto; margin-bottom: auto']);
            }
            ?>
        </div>
    </div>

    </div>

    <br>

    <div class="about-info">
        <h2 class="about-title">About our Business</h2><br>
        <p class="about-description"><?= h($builder->about) ?></p>
    </div>


    <?= $this->fetch('content') ?>

</div>

