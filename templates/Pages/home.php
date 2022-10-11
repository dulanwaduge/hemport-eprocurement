
<!--? Hero Area Start-->
<div class="new-arrival">
    <div class="container">
        <!-- Section tittle -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    <h2 style="font-size: 50px">why hemport?<br></h2><br>
                    <p style="font-size: 18px">Looking to build a more sustainable future. Through the buying, selling and spreading awareness of carbon neutral products and services.</p>
                </div>
            </div>
        </div>

        <div class="popular-product pt-50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="single-product mb-50">
                            <div class="location-img">
                                <?php echo $this->Html->image($admin1->updateimage); ?>
                            </div>
                            <div class="location-details">
                                <p><a href="https://www.goodhemp.com/hemp-hub/environmental-benefits-of-hemp-how-good-is-it/" target="_blank" style="text-shadow: black 0px 0px 4px;"><?php echo $admin1-> text ?><br></a></p>
                                <a href="https://www.goodhemp.com/hemp-hub/environmental-benefits-of-hemp-how-good-is-it/ " target="_blank" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="single-product mb-50">
                            <div class="location-img">
                                <?php echo $this->Html->image($admin2->updateimage); ?>
                            </div>
                            <div class="location-details">
                                <p><a href="https://www.webmd.com/diet/hemp-health-benefits-nutrition-uses#1" target="_blank" style="text-shadow: black 0px 0px 4px;"><?php echo $admin2-> text ?></a></p>
                                <a href="https://www.webmd.com/diet/hemp-health-benefits-nutrition-uses#1" target="_blank" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Locations End -->

    </div>
</div>
</section>

<!--? New Arrival Start -->
<div class="new-arrival">
    <div class="container  gray-bg">
        <!-- Section tittle -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    <h2 style="font-size: 50px">popular<br>products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($product as $p): ?>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                    <div class="popular-img">
                        <?php
                        if($p['image']!= null){
                            echo $this->Html->image($p['image'],['style'=>'height:300px']);
                        }else{
                            echo $this->Html->image('blank.jpg',['style'=>'height:300px']);
                        }
                        ?>
                    </div>
                    <div class="popular-caption">
                        <h3><a href="<?= $this->Url->build(['controller' => 'product', 'action'=>'view']); ?>/<?php echo $p["id"]; ?>"><?php echo $p["name"]; ?></a></h3>

                        <span><?php echo '$' . $p["price"]; ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

    </div>

        <!-- Button -->
        <div class="row justify-content-center">
            <div class="room-btn">
                <a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'shop']); ?>" class="border-btn">Browse More</a>
            </div>
        </div>
</div><br><br>

<!--? Professionals Start -->
<div class="new-arrival">
    <div class="container">
        <!-- Section tittle -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    <h2 style="font-size: 50px">hemport<br>professionals</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach ($builder as $key => $builder): ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">

                        <div class="popular-img">
                            <?php
                            if($builder['avatar']!= null){

                                echo $this->Html->image($builder['avatar'],['style'=>'width: 262.5px; height:262.5px']);
                            }else{

                                echo $this->Html->image('tb-avatar-none.jpg',['style'=>'width: 262.5px; height:262.5px']);
                            }
                            ?>
                        </div>

                        <div class="desc">
                            <h2 style="font-family: Poppins">
                                <?= $builder->name ?>
                            </h2>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <p class="date"> <?= $builder->email ?> </p>
                                </div>
                                <div class="reply-btn">
                                    <a href="<?= $this->Url->build(['controller' => 'builder', 'action'=>'view']); ?>/<?=$builder->id?>" class="btn-reply text-uppercase" style="color: mediumseagreen">View Profile</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <?php //$searchCount++; ?>

            <?php endforeach; ?>

    </div>

        <!-- Button -->
        <div class="row justify-content-center">
            <div class="room-btn">
                <a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'findprofessionals']); ?>" class="border-btn">Browse More</a>
            </div>
        </div>
</div>

    </div></div></br>
<!--? New Arrival End -->
<!--? collection -->
<section class="collection section-bg2 section-padding30 section-over1 ml-15 mr-15" data-background="../img/section_bg03.png" style="margin-bottom: 100px; width: 100%">
    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9">
            <div class="single-question text-center">
                <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">what we set out for</h2>
                <a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'sustainability']); ?>" class="btn class"="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">About Us</a>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End collection -->
<!--? Popular Locations Start 01-->

<!-- Popular Locations End -->
<!--? Services Area Start -->
<!--<div class="categories-area section-padding40 gray-bg">-->
<!--    <div class="container-fluid">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-3 col-md-6 col-sm-6">-->
<!--                <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">-->
<!--                    <div class="cat-icon">-->
<!--                        <img src="../img/icon/services1.svg" alt="">-->
<!--                    </div>-->
<!--                    <div class="cat-cap">-->
<!--                        <h5>Fast & Free Delivery</h5>-->
<!--                        <p>Free delivery on all orders</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-3 col-md-6 col-sm-6">-->
<!--                <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">-->
<!--                    <div class="cat-icon">-->
<!--                        <img src="../img/icon/services2.svg" alt="">-->
<!--                    </div>-->
<!--                    <div class="cat-cap">-->
<!--                        <h5>Fast & Free Delivery</h5>-->
<!--                        <p>Free delivery on all orders</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-3 col-md-6 col-sm-6">-->
<!--                <div class="single-cat mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">-->
<!--                    <div class="cat-icon">-->
<!--                        <img src="../img/icon/services3.svg" alt="">-->
<!--                    </div>-->
<!--                    <div class="cat-cap">-->
<!--                        <h5>Fast & Free Delivery</h5>-->
<!--                        <p>Free delivery on all orders</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-3 col-md-6 col-sm-6">-->
<!--                <div class="single-cat wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">-->
<!--                    <div class="cat-icon">-->
<!--                        <img src="../img/icon/services4.svg" alt="">-->
<!--                    </div>-->
<!--                    <div class="cat-cap">-->
<!--                        <h5>Fast & Free Delivery</h5>-->
<!--                        <p>Free delivery on all orders</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--? Services Area End -->

