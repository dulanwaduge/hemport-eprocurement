<!-- breadcrumb Start-->
<?php //$searchCount = 0; ?>
<!--<div class="page-notification">

        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="<?/*= $this->Url->build(['controller' => 'home', 'action'=>'index']); */?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?/*= $this->Url->build(['controller' => 'home', 'action'=>'discoverproject']); */?>">Discover Project</a></li>
                    </ol>
                </nav>
            </div>
        </div>

</div>-->
<!-- breadcrumb End-->


<div class="project-details">
    <div class="users index content project-detail row">
        <div class="col-12 col-md-6 ">
            <?php
            if($demand['image1']!= null){
                echo $this->Html->image($demand['image1'],['style'=>' width: 100%; border-radius: 20px;']);
            }else{
                echo $this->Html->image('tb-avatar-none.jpg',['style'=>'width: 100%; border-radius: 20px;']);
            }
            ?>
        </div>
        <div class="content col-12 col-md-6 ">
        <div class="project-details-items">
            <h3 class="text-align-center text-primary"><?= $demand->demand ?></h3>
            <h4 class="text-align-center  text-primary"><?= $demand->business_name ?>, <?= $demand->address ?><?= $demand->city ?></h4>
            <p class="text-align-center text-primary"> Created on <?= $demand->date ?></p>
            <div class="d-flex space-between"><p class="text-primary"><strong>Demand ID:</strong> <?= $demand->id ?></p> <p class="text-primary"><strong>Amount:</strong> <?= $demand->amount ?> Units</div>
            <p class="text-primary"><strong>Description: </strong></p><p><?= $demand->description ?></p>
            <a class="button background-secondary demand-button" href="<?= $this->Url->build(['controller' => 'home', 'action'=>'quotation']); ?>/<?php echo $demand["id"]; ?>">Provide Quotation</a>
        </div>
        </div>
    </div>

</div>


</div>
<section class="banner">
    <div class="project-contact container">
        <h2 class="text-align-center text-secondary">Contact Us</h2>
        <h4 class="text-align-center text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in.</h4>
        <a class="button background-secondary demand-button" href="">Enquire Online</a>
    </div>
</section>
