<main>
    <!-- breadcrumb Start-->
    <!--<div class="page-notification">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?/*= $this->Url->build(['controller' => 'home', 'action'=>'index']); */?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>-->
    <!-- listing Area Start -->
    <div class="category-area">
        <div class="container">
            <br>
            <?= $this->Form->create(null,['type'=>'get']) ?>
            <?= $this->Form->control('key', [
                'label'=>false,
                'value'=>$this->request->GetQuery('key'),
                'style'=>'float:left; margin-left:0.5%; color:slategray; width:91%;',
                'placeholder'=>'Search by product name'])
            ?>
            <?= $this->Form->submit(__('🔎︎'), array(
                'style'=>'margin-bottom:40px'
            )) ?>
            <?= $this->Form->end() ?>
            <hr class="sidebar-divider my-0">
            <div class="row">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-50">
                        <h2>shop with us</h2>
                        <p>Browse from <?php

                            echo strval($number = $pn->count());

                            ?>
                             latest items</p>
                    </div>
                </div>
            </div>
            <div class="row">

                <!--?  Right content -->
                <div class="col-xl-12 col-lg-12 col-md-12 ">
                    <!--? New Arrival Start -->
                    <div class="new-arrival new-arrival2">
                        <div class="row">
                             <?php foreach ($product as $p): ?>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                <div class="single-new-arrival mb-50 text-center">
                                    <div class="popular-img">
                                        <?php
                                        if($p['image']!= null){
                                            echo $this->Html->image($p['image'],['style'=>'height:300px']);
                                        }else{
                                            echo $this->Html->image('blank.jpg',['style'=>'height:300px']);
                                        }
                                         ?>
                                        <!--<img src="../img/gallery/arrival2.png" alt="">-->
                                        <!-- <div class="favorit-items"> -->
                                        <!-- <span class="flaticon-heart"></span> -->
                                        <!-- <img src="../img/gallery/favorit-card.png" alt="">
                                    </div> -->
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="<?= $this->Url->build(['controller' => 'product', 'action'=>'view']); ?>/<?php echo $p["id"]; ?>"><?php echo $p["name"]; ?></a></h3>
                                        <span>$ <?php echo $p["price"]; ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                    <!--? New Arrival End -->
                </div>

            </div>
        </div>
    </div>
    <!-- listing-area Area End -->
    <!--? Services Area Start -->
<!--    <div class="categories-area section-padding40 gray-bg">-->
<!--        <div class="container-fluid">-->
<!--            <div class="row">-->
<!--                <div class="col-lg-3 col-md-6 col-sm-6">-->
<!--                    <div class="single-cat mb-50">-->
<!--                        <div class="cat-icon">-->
<!--                            <img src="../img/icon/services1.svg" alt="">-->
<!--                        </div>-->
<!--                        <div class="cat-cap">-->
<!--                            <h5>Fast & Free Delivery</h5>-->
<!--                            <p>Free delivery on all orders</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-3 col-md-6 col-sm-6">-->
<!--                    <div class="single-cat mb-50">-->
<!--                        <div class="cat-icon">-->
<!--                            <img src="../img/icon/services2.svg" alt="">-->
<!--                        </div>-->
<!--                        <div class="cat-cap">-->
<!--                            <h5>Fast & Free Delivery</h5>-->
<!--                            <p>Free delivery on all orders</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-3 col-md-6 col-sm-6">-->
<!--                    <div class="single-cat mb-30">-->
<!--                        <div class="cat-icon">-->
<!--                            <img src="../img/icon/services3.svg" alt="">-->
<!--                        </div>-->
<!--                        <div class="cat-cap">-->
<!--                            <h5>Fast & Free Delivery</h5>-->
<!--                            <p>Free delivery on all orders</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-3 col-md-6 col-sm-6">-->
<!--                    <div class="single-cat">-->
<!--                        <div class="cat-icon">-->
<!--                            <img src="../img/icon/services4.svg" alt="">-->
<!--                        </div>-->
<!--                        <div class="cat-cap">-->
<!--                            <h5>Fast & Free Delivery</h5>-->
<!--                            <p>Free delivery on all orders</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!--? Services Area End -->
</main>
