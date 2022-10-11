<!doctype html>
<html lang="zxx">

    <title>Payment Success!</title>
    <!-- breadcrumb Start-->
    <div class="page-notification">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'#']); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'shop']); ?>">Shop</a></li>
                            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'product', 'action'=>'view',$productid]); ?>">Product details</a></li>
                            <li class="breadcrumb-item"><a href="#">Payment Confirmation</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End-->

<div class="container" style="text-align: center;">

    <h2 style="text-align: center; font-family: Poppins, sans-serif;">Payment Success!</h2><br/>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

                <?= $this->Flash->render() ?>

                <div class="panel-body" >

                    <div></div>
                    <p>Shop for more items: </p>
                    <a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'shop']); ?>" style="color: mediumseagreen"> Click here </a>

                </div>
        </div>
    </div>

    <hr class="sidebar-divider my-0">

    <div class="row" style="text-align: center;">
        <div class="col-md-6 col-md-offset-3">

                <!-- email start-->
                <br>
                <div style="height:20px">

                    <?= $this->Form->create() ?>
                    <fieldset>
                        <?php
                        echo "Email the order details to yourself";
                        echo "<br/><br/>";
                        echo $this->Form->control('email', array('label'=>false, "class" => "form-control valid", "placeholder" => "Enter your email address", "style" => "height:40px; width:380px; margin-bottom:6px; font-size:16px; text-align:center; margin-left: 15%"));
                        //echo "<br>";
                        ?>
                    </fieldset>
                    <br>
                    <?= $this->Form->button(__('Send Email'), array('label'=>'Send Message', "class" => "submit-btn2", "type" => "submit", "confirm"=>"An email will be sent to the email provided."))?>

                    <?= $this->Form->end() ?>

                </div>
                <!-- email end-->

        </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</div>

