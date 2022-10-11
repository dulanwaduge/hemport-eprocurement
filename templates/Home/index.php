<!--? Hero Area Start-->

<div class="container container-xlarge hero">
    <div class="popular-product pt-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 hero-left">
                    <div class="single-product mb-50">
                        <h1 class="text-secondary">About Us</h1>
                        <p class="text-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
                            varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor
                            interdum nulla, ut commodo diam libero vitae erat.</p>
                        <a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'sustainability']); ?>"
                            class="button background-secondary">Discover</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 ">
                    <div class="single-product mb-50 hero-right">
                        <div class="location-img">
                            <?php echo $this->Html->image($admin2->updateimage); ?>
                        </div>
                        <div class="location-details">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Locations End -->

</div>

</section>




<section class="professionals container section-padding20">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                <h2 class="text-tertiary">Discover Professionals</h2>
            </div>
        </div>
    </div>
    <div class="row home-projects wow fadeInUp">
        <?php foreach ($builder as $key => $builder):
            ?>

        <div class="col-md-3">
            <div class=" home-projects-item">
                <?php

    if ($builder['avatar']) {?>
                <div class="project-image"
                    style="background:url('<?php echo $this->Url->image($builder['avatar']);?>');"></div>
                <?php }else {?>

                <div class="project-image"
                    style="background:url('<?php echo $this->Url->image('tb-avatar-none.jpg');?>');">
                </div>
                <?php } ?>
                <div class="project-item-content background-tertiary">
                    <h3 class="text-white"><?php echo($builder['name']); ?></h3>
                    <p class="text-white"><?php echo($builder['email']); ?></p>
                    <a class="viewmore background-tertiary"
                        href="<?= $this->Url->build(['controller' => 'builder', 'action'=>'view']); ?>/<?=$builder->id?>">view
                        more</a>
                </div>
            </div>
        </div>

        <?php endforeach; ?>
    </div>

    <div class="row justify-content-center wow fadeInUp" style="margin: 5rem 0" data-wow-delay="1s">
        <div class="room-btn">
            <a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'findprofessionals']); ?>"
                class="button background-tertiary" >Browse More</a>
        </div>
    </div>

</section>





<section class="professionals container section-padding20">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class=" mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                <h2 class="text-secondary">Discover Projects</h2>
            </div>
        </div>
    </div>
    <div class="row home-projects wow fadeInUp">
        <?php foreach ($projects as $key => $projects):
            ?>

        <div class="col-md-3">
            <div class=" home-projects-item">
                <?php

    if ($projects->image1) {?>
                <div class="project-image"
                    style="background:url('<?php echo $this->Url->image($projects['image1']);?>');"></div>
                <?php }else {?>
                <div class="project-image"
                    style="background:url('<?php echo $this->Url->image('tb-avatar-none.jpg');?>');">
                </div>
                <?php } ?>
                <div class="project-item-content background-secondary">
                    <h3 class="text-white"><?php echo($projects['business_name']); ?></h3>
                    <p class="text-white"><?php echo($projects['description']); ?></p>
                    <a class="viewmore background-secondary"
                        href="<?= $this->Url->build(['controller' => 'home', 'action'=>'discoverprojectdetail']); ?>/<?php echo $projects["id"]; ?>">View
                        Profile</a>
                </div>
            </div>
        </div>

        <?php endforeach; ?>
    </div>

    <div class="row justify-content-center wow fadeInUp" style="margin: 5rem 0" data-wow-delay="1s">
        <div class="room-btn">
            <a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'discoverproject']); ?>"
                class="button background-secondary" >Browse More</a>
        </div>
    </div>


</section>




<!--? New Arrival End -->
<!--? collection -->
<section class="collection section-bg2 section-padding30 section-over1 ml-15 mr-15"
    data-background="../img/section_bg03.png" style="margin-bottom: 100px; width: 100%">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9">
                <div class="single-question text-center">
                    <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">what we set out for</h2>
                    <a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'sustainability']); ?>"
                        class="btn class"="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">About Us</a>
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
