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
 * @var \App\Model\Entity\Product $product
 */

?>
<main >
    <!-- breadcrumb Start-->
    <div class="page-notification">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'index']); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'shop']); ?>">shop</a></li>
                            <li class="breadcrumb-item"><a href="#">Product Details</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End-->

    <!--?  Details start -->
    <div>
        <?= $this->Flash->render() ?>
        <br>

        <div style="display: flex; flex-wrap: nowrap; margin-right: -0.75rem; margin-left: -0.75rem; flex-direction: row">
            <!--left col: description and images-->
            <div class="col-lg-8" style="margin-right:30px">
                <div class="mb-40" style="display: flex; flex-wrap: nowrap; margin-right: -0.75rem; margin-left: -0.75rem; flex-direction: row;align-items: center; ">

                    <!--product thumbnail-->
                    <div style="height:130px; width:130px">
                        <?php
                        if($product['image']!= null){
                            echo $this->Html->image($product['image'],['style'=>'height:130px; width:130px']);
                        }else{
                            echo $this->Html->image('no-image-icon.png',['style'=>'height:130px; width:130px']);
                        }
                        ?>
                    </div>
                    <!--product thumbnail-->


                    <div style="height:100%;width:100%">
                        <div class="small-tittle mb-20">
                            <h2 style="margin-left:45px">Description</h2>
                        </div>
                        <p style="font-size:17px;margin-left:45px"><?= $product->description ?></p>
                    </div>
                </div>
                <hr class="sidebar-divider my-0">
                <br><br>



                <div class="small-tittle mb-20">
                    <h2 style="text-align:center">Images</h2>
                </div>
                <div class="gallery-img">

                        <div class="col-lg-6">
                            <?php
                            if($product['image']!= null){
                                echo $this->Html->image($product['image'],['style'=>'height:300px']);
                            }else{
                                echo $this->Html->image('no-image-icon.png');
                            }
                            ?>

                            <p style="margin-bottom:10px"><?= $product->image1des ?></p>


                        </div>


                        <div class="col-lg-6">
                            <?php
                            if($product['image']!= null){
                                echo $this->Html->image($product['image_2'],['style'=>'height:300px']);
                            }else{
                                echo $this->Html->image('no-image-icon.png');
                            }

                            ?>
                            <p style="margin-bottom:10px"><?= $product->image2des ?></p>

                        </div>
                        <div class="col-lg-6">
                            <?php
                            if($product['image']!= null){
                                echo $this->Html->image($product['image_3'],['style'=>'height:300px']);
                            }else{
                                echo $this->Html->image('no-image-icon.png');
                            }
                            ?>
                            <p style="margin-bottom:65px"><?= $product->image3des ?></p>

                        </div>
                        <div class="col-lg-6">
                            <?php
                            if($product['image']!= null){
                                echo $this->Html->image($product['image_4'],['style'=>'height:300px']);
                            }else{
                                echo $this->Html->image('no-image-icon.png');
                            }
                            ?>
                            <p style="margin-bottom:65px"><?= $product->image4des ?></p>
                        </div>
                </div>
            </div>
            <!--left col end-->

            <!--right col-->
            <div class="col-lg-4 gray-bg" style="margin-left:30px">

                    <!--product details and purchase-->
                    <div class="small-tittle mb-30">
                        <br/>
                        <h2 style="text-align:center">Product Details</h2>
                    </div>

                    <div>
                        <form class="form-contact contact_form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <h3>Product Name</h3>
                                        <p><?= $product->name ?></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h3>Price</h3>
                                        <p>$<?= $product->price ?></p>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h3>Quantity Left</h3>
                                        <p><?= $product->amount ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h3>Availability</h3>
                                        <p><?= $availability ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h3>Business Name</h3>
                                        <?php foreach ($seller as $s):
                                        if($s['BusinessName']!= null){
                                        ?>
                                        <p><?= $s['BusinessName'] ?></p>
                                        <?php
                                        }
                                        else{
                                            echo '   ';
                                        }
                                        endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <h3>Order Quantity</h3>
                        <div class="submit-info">
                            <?= $this->Form->create() ?>
                            <fieldset>
                                <?php
                                echo $this->Form->control('amount', array('label'=>false, "class" => "form-control valid", "default" => "1", "placeholder" => "Enter the amount you want to purchase", "style" => "height:40px; width:365px; margin-bottom:6px; font-size:16px"));
                                ?>
                            </fieldset>
                            <?= $this->Form->button(__('Order Item'), array('name' => 'orderconfirm', 'label'=>false, "class" => "submit-btn2", "type" => "submit"))?>
                            <?= $this->Form->end() ?>
                        </div>

                    </div>

                    <br>
                    <div>
                        <div class="small-tittle mb-30">
                            <br/>
                            <h2 style="text-align:center">Email the Seller:</h2>
                        </div>

                        <!-- email start-->
                        <div style="height:20px">
                            <?= $this->Form->create() ?>
                            <fieldset>
                                <?php
                                echo $this->Form->control('name', array('label'=>false, "class" => "form-control valid", "placeholder" => "Enter your name", "style" => "height:40px; width:365px; margin-bottom:6px; font-size:16px"));
                                echo $this->Form->control('email', array('label'=>false, "class" => "form-control valid", "placeholder" => "Enter your email address", "style" => "height:40px; width:365px; margin-bottom:6px; font-size:16px"));
                                echo $this->Form->textarea('message', array('label'=>false, "class" => "form-control valid", "id" => "message", "placeholder" => "Enter your message", "style" => "width:365px; margin-bottom:6px; font-size:16px"));
                                //echo "<br>";
                                ?>
                            </fieldset>

                            <?= $this->Form->button(__('Send Message'), array('name' => 'emailbtn', 'label'=>false, "class" => "submit-btn2", "type" => "submit", "confirm"=>"An email will be sent to the seller."))?>
                            <?= $this->Form->end() ?>
                        </div>
                        <!-- email end-->

                    </div>


            </div>
            <!--right col ends-->
        </div>
    </div>
    <!--  Details End -->

<!--                        <form id="contact-form" action="#" method="POST">-->
<!--                            <div class="row">-->
<!--                                <div class="col-lg-12">-->
<!--                                    <div class="form-box user-icon mb-15">-->
<!--                                        <input type="text" name="name" placeholder="Your name">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-lg-12">-->
<!--                                    <div class="form-box email-icon mb-15">-->
<!--                                        <input type="text" name="email" placeholder="Email address">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-lg-12">-->
<!--                                    <div class="form-box message-icon mb-15">-->
<!--                                        <textarea name="message" id="message" placeholder="Comment"></textarea>-->
<!--                                    </div>-->
<!--                                    <div class="submit-info">-->
<!--                                        <button class="submit-btn2" type="submit">Send Message</button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </form>-->
</main>
