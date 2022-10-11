<!-- breadcrumb Start-->
<?php /*//$searchCount = 0; */?><!--
<div class="page-notification">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="<?/*= $this->Url->build(['controller' => 'home', 'action'=>'index']); */?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?/*= $this->Url->build(['controller' => 'home', 'action'=>'findprofessionals']); */?>">Find Professionals</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>-->
<!-- breadcrumb End-->

<div class="comments-area container">
    <h2 class="text-align-center text-primary margin-y">Find Professionals</h2>
    <div class="users index content">

        <!-- search ui start -->
        <?= $this->Form->create(null,['type'=>'get', 'id'=>'professionals-form']) ?>
        <?= $this->Form->control('key', [
            'label'=>false,
            'value'=>$this->request->GetQuery('key'),
            'placeholder'=>'Search by Name'])
        ?>
        <?= $this->Form->submit(__('🔎︎'), array(
            'style'=>'margin-bottom:40px'
        )) ?>
        <?= $this->Form->end() ?>
        <hr class="sidebar-divider my-0">
        <!-- search ui end -->

        <br><br>
        <h4 class="text-primary"><?php echo $query->count(); ?> professionals found</h4>


            <?php foreach ($builders as $key => $builder): ?>

                <div class="professionals-list row">
                    <div class="single-comment justify-content-between d-flex" style="width: 100%" >
                        <div class="user justify-content-between d-flex" style="flex-grow:1">
                        <div class="img col col-md-4">
                        <?php

                        if($builder['avatar']!= null){

                            // echo $this->Html->image($d['image1'],['style'=>'max-width: 300px;']);
                            ?><div class="project-image" style="background:url('<?php echo $this->Url->image($builder['avatar']);?>'); margin:1rem 0;"></div><?php
                        }else{
                            ?><div class="project-image" style="background:url('<?php echo $this->Url->image('tb-avatar-none.jpg');?>');  margin: 1rem 0"></div> <?php
                            // echo $this->Url->image('tb-avatar-none.jpg',['ext'=>'jpg']);
                        }
                        ?>
                    </div>
                            <!-- <div class="thumb col-4">
                                <?php
                                if($builder['avatar']!= null){

                                    echo $this->Html->image($builder['avatar'],['style'=>'border-radius: 20px; width: 100%']);
                                }else{

                                    echo $this->Html->image('tb-avatar-none.jpg',['style'=>'border-radius: 20px; width: 100%']);
                                }
                                ?>
                            </div> -->
                            <div class="desc col-8">
                            <h3 class="text-primary"><?= $builder->name ?></h3>
                            <h4 class="text-primary"><?= $builder->address ?>, <?= $builder->city ?></h4>
                                <p class="professional-description">

                                    <?= $builder->description ?>
                                </p>
                                <div class="d-flex justify-content-between">
                                    <!-- <div class="d-flex align-items-center">

                                        <p class="date"> <?= $builder->email ?> </p>
                                    </div> -->
                                    <div class="professional-showcase d-flex" >
                                   <!-- <div class="col-md-4">
                                        <?php /*if ($builder['image_1']) {
                                             echo $this->Html->image($builder['image_1'],['style'=>'border-radius: 20px; width: 100%']);
                                        }else {
                                            echo $this->Html->image('tb-avatar-none.jpg',['style'=>'border-radius: 20px; width: 100%']);
                                        }*/?>
                                        </div>
                                        <div class="col-md-4">
                                        <?php /*if ($builder['image_1']) {
                                             echo $this->Html->image($builder['image_1'],['style'=>'border-radius: 20px; width: 100%']);
                                        }else {
                                            echo $this->Html->image('tb-avatar-none.jpg',['style'=>'border-radius: 20px; width: 100%']);
                                        }*/?>
                                        </div>
                                        <div class="col-md-4">
                                        <?php /*if ($builder['image_1']) {
                                             echo $this->Html->image($builder['image_1'],['style'=>'border-radius: 20px; width: 100%']);
                                        }else {
                                            echo $this->Html->image('tb-avatar-none.jpg',['style'=>'border-radius: 20px; width: 100%']);
                                        }*/?>
                                        </div>-->
                                    </div>




                                </div>

                                <div class="button-container d-flex">
                                    <a class="button background-primary text-white" href="<?= $this->Url->build(['controller' => 'builder', 'action'=>'view']); ?>/<?=$builder->id?>" class="btn-reply text-uppercase" style="color: mediumseagreen">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php //$searchCount++; ?>

            <?php endforeach; ?>
        </div>

</div>
