<!-- breadcrumb Start-->
<?php /*//$searchCount = 0; */?><!--
<div class="page-notification">
    <div class="container">
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
    </div>
</div>-->
<!-- breadcrumb End-->

<div class="comments-area">

    <div class="users index content discover-projects">
    <h2 class="text-align-center text-secondary margin-y">Discover Projects</h2>
        <?php foreach ($demand as $key => $d): ?>

            <div class="comment-list">
                <div class="list-content row">
                    <div class="img col col-md-4">
                        <?php

                        if($d['image1']!= null){

                            // echo $this->Html->image($d['image1'],['style'=>'max-width: 300px;']);
                            ?><div class="project-image" style="background:url('<?php echo $this->Url->image($d['image1'])?>');"></div><?php
                        }else{
                            ?><div class="project-image" style="background:url('<?php echo $this->Url->image('tb-avatar-none.jpg')?>');"></div> <?php
                            // echo $this->Url->image('tb-avatar-none.jpg',['ext'=>'jpg']);
                        }
                        ?>
                    </div>
                    <div class="content col col-md-8">

                        <h4 class="text-secondary"><?= $d->business_name ?></h4>
                        <p><?= $d->business_address ?>, <?= $d->city ?></p>
                        <p><?= $d->description ?></p>
                        <a class="viewmore" href="<?= $this->Url->build(['controller' => 'home', 'action'=>'discoverprojectdetail']); ?>/<?php echo $d["id"]; ?>">view more</a>
                    </div>
                </div>
            </div>

            <?php //$searchCount++; ?>

        <?php endforeach; ?>
    </div>
    <br><br>


    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous'))?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>

</div>

<br>
</div>
