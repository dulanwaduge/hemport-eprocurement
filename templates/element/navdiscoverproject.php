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

<header>
    <!-- Header Start -->
    <div class="header-area ">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper d-flex align-items-center justify-content-between">
                    <div class="header-left d-flex align-items-center">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'#']); ?>"><?= $this->Html->image('logo/logo.png') ?></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'index']); ?>">Home</a></li>

                                    <li><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'sustainability']); ?>" >Sustainability</a></li>
                                    <li><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'findprofessionals']); ?>">Find Professionals</a></li>
                                    <li><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'discoverproject']); ?>" style="color: #509F94">Discover Project</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-right1 d-flex align-items-center">
                        <!-- Social -->

                        <!-- Search Box -->
                        <div class="search d-none d-md-block">
                            <ul class="d-flex align-items-center">

                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">

                                            <?php $uid = $this->request->getSession()->read('Auth.id');
                                            //debug($uid);
                                            ?>
                                            <?php if(isset($uid)){
                                                if(isset($welcomeMsg)){
                                                    ?>
                                                    <li><p style="font-family: Poppins, sans-serif;"><?= $welcomeMsg ?></p></li>
                                                <?php
                                                }


                                            }
                                            ?>
                                            <li><a href="<?= $this->Url->build(['controller' => 'users', 'action'=>'login']); ?>"><i class="fas fa-user"></i></a>
                                                <ul class="submenu" style="left:-200%">
                                            <?php if(isset($uid)){
                                                    $type = $this->request->getSession()->read('Auth.type');
                                                     if($type=='Seller'){ ?>
                                                        <li><a href="<?= $this->Url->build(['controller' => 'Seller', 'action' => 'edit']) ?>">Dashboard</a></li>
                                                        <li><a href= <?= $this->Url->build(['controller' => 'users','action'=>'logout']); ?> >Logout</a></li>
                                                        <?php
                                                        }
                                                     else if($type=='Buyer'){ ?>
                                                        <li><a href="<?= $this->Url->build(['controller' => 'Buyer', 'action' => 'edit']) ?>">Dashboard</a></li>
                                                        <li><a href= <?= $this->Url->build(['controller' => 'users','action'=>'logout']); ?> >Logout</a></li>

                                                        <?php
                                                        }
                                                     else if($type== 'Builder')  { ?>
                                                        <li><a href="<?= $this->Url->build(['controller' => 'Builder', 'action' => 'edit']) ?>">Dashboard</a></li>
                                                        <li><a href= <?= $this->Url->build(['controller' => 'users','action'=>'logout']); ?> >Logout</a></li>
                                                     <?php
                                                        }
                                                     else if($type== 'Admin'){ ?>
                                                        <li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'index']) ?>">Dashboard</a></li>
                                                        <li><a href= <?= $this->Url->build(['controller' => 'users','action'=>'logout']); ?> >Logout</a></li>
                                                    <?php
                                                     }
                                                }

                                                else{ ?>

                                                    <li><a href= <?= $this->Url->build(['controller' => 'users', 'action'=>'login']); ?> >Login</a></li>
                                                    <li><a href= <?= $this->Url->build(['controller' => 'users', 'action'=>'register']); ?> >Register</a></li>
                                                    <?php
                                                }
                                                ?>


                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <style>
                        .login-box {
                            position: absolute;
                            top: -38px;
                            right: -10px;
                        }

                        .login-box .user-icon {
                            font-size: 30px;
                            color: #333!important
                        }

                        .login-box:hover a {
                            color: #333!important
                        }
                    </style>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none">
                            <div class="login-box" style="position: absolute; top: -30px; right: 10px;">
                                <a class="user-icon" style="color: #333; font-size: 30px"  ?>
                                    <i class="fas fa-user"></i></a>
                                    <ul class="submenu" style="left:-200%">
                                        <?php if(isset($uid)){
                                            $type = $this->request->getSession()->read('Auth.type');
                                        if($type=='Seller'){ ?>
                                            <li><a href="<?= $this->Url->build(['controller' => 'Seller', 'action' => 'edit']) ?>">Dashboard</a></li>
                                                                <li><a href= <?= $this->Url->build(['controller' => 'users','action'=>'logout']); ?> >Logout</a></li>
                                                                <?php
                                                                }
                                                            else if($type=='Buyer'){ ?>
                                                                <li><a href="<?= $this->Url->build(['controller' => 'Buyer', 'action' => 'edit']) ?>">Dashboard</a></li>
                                                                <li><a href= <?= $this->Url->build(['controller' => 'users','action'=>'logout']); ?> >Logout</a></li>

                                                                <?php
                                                                }
                                                            else if($type== 'Builder')  { ?>
                                                                <li><a href="<?= $this->Url->build(['controller' => 'Builder', 'action' => 'edit']) ?>">Dashboard</a></li>
                                                                <li><a href= <?= $this->Url->build(['controller' => 'users','action'=>'logout']); ?> >Logout</a></li>
                                                            <?php
                                                                }
                                                            else if($type== 'Admin'){ ?>
                                                                <li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'index']) ?>">Dashboard</a></li>
                                                                <li><a href= <?= $this->Url->build(['controller' => 'users','action'=>'logout']); ?> >Logout</a></li>
                                                            <?php
                                                            }
                                                        }

                                                        else{ ?>

                                                            <li><a href= <?= $this->Url->build(['controller' => 'users', 'action'=>'login']); ?> >Login</a></li>
                                                            <li><a href= <?= $this->Url->build(['controller' => 'users', 'action'=>'register']); ?> >Register</a></li>
                                                            <?php
                                                        }
                                                    ?>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<!-- header end -->
