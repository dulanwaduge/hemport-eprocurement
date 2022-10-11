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

<!-- breadcrumb Start-->
<!--  <div class="page-notification">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?/*= $this->Url->build(['controller' => 'home', 'action'=>'index']); */?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?/*= $this->Url->build(['controller' => 'home', 'action'=>'findprofessionals']); */?>">Find Professionals</a></li>
                            <li class="breadcrumb-item"><a href="#">View Profile</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>-->
<!-- breadcrumb End-->


<?php echo $this->Flash->render(); ?>






<!-- profile-->
<div class="container" style="margin-top:10rem">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5">
    <?php
                            if($builder['avatar']!= null){?>
                            <div class="profile-img" style="width: 100%; height: 300px; background-size: cover; background-position: center; border-radius: 30px;background-image: url('<?php echo $this->Url->image($builder['avatar']);?>')"></div>

                            <?php
                            }else{?>
                                <div class="profile-img" style="width: 100%; height: 300px; background-size: cover; background-position: center; border-radius: 30px;background-image: url('<?php echo $this->Url->image('tb-avatar-none.jpg') ?>')"></div>
                                <?php
                            }
                            ?>

                        </div>
                        <div>
<!--profile image end-->

<!-- profile detail-->

    <div class="col-md-12">
        <h2 class="text-primary"><?= h($builder->name)?>, <?= h($builder->location) ?></h2>
        <p><?= h($builder->description) ?></p>
    </div>
                        </div>
                        
                        </div>
                        <div class="row background-primary " style="border-radius: 20px; margin-top:3rem; margin-left: .5rem; margin-right: .5rem; padding: 2rem;">
                            <div class="col-12">
                            <h3 class="text-white">About our business</h3>
                            <p class="text-white"><?= h($builder->description) ?></p>
                        </div>
                        </div></div>
    <!-- job end-->
    



                        </div>
                        

                        <!-- builder contact info-->
    


<div class="row" style="margin-top:4rem">
<h1 class="col-12 text-align-center text-secondary" style="width: 100%;text-align:center">Product Showcase</h1>
    <?php
                        $count=0;
                        foreach ($projects as $p):
                            ?>
               
<?php
                            if($p['image_1']!= null){
                                ?>
<div class="row " style="width: 100%; align-items:center;">
            <div class="showcase col-5"  style="background-color: #eee; background-image:url('<?php echo $this->Url->image($p['image_1']);?>'); width: 100%; height: 300px;"></div>
            
            <div class="col-7 showcase-text">
            <h3 class="text-secondary" ><?php echo $p['country']?> <span> <?php echo $p['year']?></span></h3> 
            <h4><?php echo $p['description']?></h4> 
                                <div class="showcase-addtional-images row py-4"> 
                                <?php if($p['image_2']!= null){ ?>
                                        <div class="additional-image" style="background-color: #eee; border-radius: 20px;background-image:url('<?php echo $this->Url->image($p['image_2']);?>'); width: 25%; height: 150px; background-position:center center; background-size:cover;background-repeat:no-repeat;"></div>
                                    <?php }?>
                                    <?php if($p['image_3']!= null){ ?>
                                        <div class="additional-image" style="background-color: #eee; border-radius: 20px;background-image:url('<?php echo $this->Url->image($p['image_3']);?>'); width: 25%; height: 150px; background-position:center center; background-size:cover;background-repeat:no-repeat;"></div>
                                    <?php }?>
                                    <?php if($p['image_4']!= null){ ?>
                                        <div class="additional-image" style="background-color: #eee; border-radius: 20px;background-image:url('<?php echo $this->Url->image($p['image_4']);?>'); width: 25%; height: 150px; background-position:center center; background-size:cover;background-repeat:no-repeat;"></div>
                                    <?php }?>
                                </div>
        </div>              
</div>
<?php
                                $count++;
                            }
                           
                            ?>


<?php endforeach; ?>

</div></div>











<!-- nav-->
<div class="row" style="justify-content:center">
<div class="col-md-8" style="padding-right: 55px; padding-bottom: 100px">
    <div class="row px-xl-0">
        <div class="col">
        


                <!--About Us ends-->

                <!--Projects-->

                    <div class="col-md-12">
 
 <h1 style="margin: 4rem; text-align: center" class="text-secondary" >Contact Us</h1>


<table cellpadding="10" cellspacing="0" style="border:1px solid #dee2e6; width:100%">
 <tr style="border-bottom:2px solid #39697B0A">
     <td style="width:9px"><span class="contact-info__icon"><i class="ti-tablet"></i></span></td>
     <td>
         <p style="font-size: 15px"><?= h($builder->phone) ?></p>
     </td>
 </tr>

 <tr style="border-bottom:2px solid #39697B0A">
     <td><span class="contact-info__icon"><i class="ti-home"></i></span></td>
     <td>
         <p style="font-size: 15px"><?= h($builder->address) ?></p>
     </td>
 </tr>

 <tr style="border-bottom:1px solid #dee2e6">
     <td><span class="contact-info__icon"><i class="ti-email"></i></span></td>
     <td>
         <p style="font-size: 15px"><?= h($builder->email) ?></p>
     </td>

 </tr>
</table>

 <p style="font-size: 20px">Email:</p>

<?= $this->Form->create() ?>
<fieldset>
 <?php
             echo $this->Form->control('name', array('label'=>false, "class" => "form-control valid", "placeholder" => "Enter your name", "style" => "height:40px; width:100%; margin-bottom:6px; font-size:16px"));
             echo $this->Form->control('email', array('label'=>false, "class" => "form-control valid", "placeholder" => "Enter your email address", "style" => "height:40px; width:100%; margin-bottom:6px; font-size:16px"));
             echo $this->Form->textarea('message', array('label'=>false, "class" => "form-control valid", "id" => "message", "placeholder" => "Enter your message", "style" => "width:100%; margin-bottom:6px; font-size:16px"));
             //echo "<br>";
             ?>
</fieldset>
<br>
<?= $this->Form->button(__('Submit'), array('label'=>'Send Message', "class" => "submit-btn2", "type" => "submit", "confirm"=>"An email will be sent to the professional."))?>

<?= $this->Form->end() ?>


                         </div>
    </div>

              
                <!--Projects ends-->
            </div>
        </div>
    </div>
                                    </div>
    
    <!-- email end-->

