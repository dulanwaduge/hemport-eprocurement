<body>
    <!-- breadcrumb Start-->
    <div class="page-notification">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'#']); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'shop']); ?>">shop</a></li>
                            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'product', 'action'=>'view', $productid]); ?>">Product Details</a></li>
                            <li class="breadcrumb-item"><a href="#">Confirmation</a></li>
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
        <!--product details-->
        <div class="col">
            <div class="small-tittle mb-20">
                <h2 style="margin-left:45px;text-align:center">Please confirm the order details</h2>
            </div>

            <div class="mb-40" style="display: flex; flex-wrap: nowrap; margin-right: -0.75rem; margin-left: -0.75rem; flex-direction: row;align-items: center; ">
                <!--product thumbnail-->
                <div style="height:130px; width:130px;margin-right:10px">
                    <?php
                    if($product['image']!= null){
                        echo $this->Html->image($product['image'],['style'=>'height:130px; width:130px']);
                    }else{
                        echo $this->Html->image('no-image-icon.png',['style'=>'height:130px; width:130px']);
                    }
                    ?>
                </div>
                <!--product thumbnail end-->

                <!--product details-->
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <h3>Product Name</h3>
                            <p><?= $product->name ?></p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <h3>Price per item</h3>
                            <p>$<?= $product->price ?></p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <h3>Quantity</h3>
                            <?= $this->Form->create() ?>
                                <?php
                                echo $this->Form->control('amount', ['label'=>false, "onchange" => "calctotal(this.value)", "default" => $amount, "class" => "form-control valid", "placeholder" => "Enter the amount", "style" => "height:40px; margin-bottom:6px; font-size:16px"]);
                                ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <h3>Total Price</h3>
                            <p id = "totalprice">$<?= $product->price * $amount ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5 gray-bg" style="margin-left:10px">

                    <div class="form-group"  style="text-align:center">
                        <br/>
                    <h1>Buyer Details</h1>
                        <br/>
                        <?php if(isset($buyer) && $buyer->fname != null)
                            {
                                ?>
                                <h3>Shipping Address</h3>
                                <?php echo $buyer->address; ?>
                                <hr class="sidebar-divider my-0">
                                <br><br>

                                <h3>Recipient Name</h3>
                                <?php echo ($buyer->lname) .($buyer->fname);?>
                                <hr class="sidebar-divider my-0">
                                <br><br>

                                <h3>Email Address</h3>
                                <?php echo $buyer->email; ?>
                                <hr class="sidebar-divider my-0">
                                <br><br>

                                <h3>State</h3>
                                <?php echo $buyer->state; ?>
                                <hr class="sidebar-divider my-0">
                                <br><br>

                                <h3>Postcode</h3>
                                <?php echo $buyer->postcode; ?>
                                <hr class="sidebar-divider my-0">
                                <br><br>

                                <h3>Phone Number</h3>
                                <?php echo $buyer->phone; ?>
                                <hr class="sidebar-divider my-0">
                                <br>

                                <div class="submit-info">
                                    <a href="<?=
                                    $this->Url->build(['controller' => 'stripes', 'action'=>'stripe', ($product->price)*$amount, $product->id, $product->seller_id, $amount, $buyer->address,($buyer->lname) .($buyer->fname),$buyer->email,$buyer->phone ]); ?>" value="Go to Payment"  class="btn" style="box-shadow: none">Purchase Now With<?= $this->Html->image('Stripe-wordmark-white(small).png',['style'=>'height:40px']) ?></a>
                                </div>
                                <br/>
                                <?php
                            }
                            else{
                                ?>

                        <fieldset>
                        <?php

                            echo $this->Form->control('address', array('label'=>false, "class" => "form-control valid", "placeholder" => "Enter the shipping address", "style" => "height:40px; margin-bottom:6px; font-size:16px"));

                            echo $this->Form->select('state',
                                array(array('ACT'=>'ACT','NSW'=>'NSW','NT'=>'NT','Qld'=>'QLD','SA'=>'SA','Vic'=>'VIC','Tas'=>'TAS','WA'=>'WA')), ["style" => "height:40px; margin-bottom:6px; font-size:16px"]);
                            ?>
                            <br/><br/>
                            <?php

                            echo $this->Form->control('postcode', array('label'=>false, "class" => "form-control valid", "placeholder" => "Enter the postcode", "style" => "height:40px; margin-bottom:6px; font-size:16px"));

                            echo $this->Form->control('name', array('label'=>false, "class" => "form-control valid", "placeholder" => "Enter the recipient name", "style" => "height:40px;margin-bottom:6px; font-size:16px"));

                            echo $this->Form->control('email', array('label'=>false, "class" => "form-control valid", "placeholder" => "Enter the email address", "style" => "height:40px; margin-bottom:6px; font-size:16px"));

                            echo $this->Form->control('phone', array('label'=>false, "class" => "form-control valid", "placeholder" => "Enter the phone number", "style" => "height:40px; margin-bottom:6px; font-size:16px"));

                            ?>

                        </fieldset>
                        <?= $this->Form->button(__('Proceed'), array('name' => 'proceedbtn', 'label'=>false, "class" => "submit-btn2", "type" => "submit"))?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>

                        </div>
                        <?php  }  ?>

                </div>
                <!--product details end-->

            </div>
            <hr class="sidebar-divider my-0">
        <div>

    </div>
    <!--  Details End -->
    <script>
        function calctotal(newamount){
            const price = <?=  $product->price; ?>;
            this.document.getElementById("totalprice").innerHTML = "$" + (newamount * price).toString();
        }
    </script>
</body>


