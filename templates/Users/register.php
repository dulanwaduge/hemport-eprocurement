<!--form-->
<style>
<<<<<<< HEAD
.error-message {
    color: red;
}
=======
    .error-message{
        color: red;
    }

    .form .right h2 {
        margin-top: 80px;
        margin-left: 50px;
        font-size: 45px;
        color: #fff;
        margin-bottom: 70px;
    }
>>>>>>> 1775fa019ab290a51e684405d58277c47397aa84
</style>



<div class="login row register">
    <div class="col-12 col-md-7 login-left background-secondary">

        <div class="users form">
        <a class="form-logo" href="<?= $this->Url->build(['controller' => 'home', 'action'=>'index']); ?>"><img
                            src="../img/logo/logo.png" alt="" style="color: green"></i></a>
            <?= $this->Form->create($user) ?>

            <h2 class="text-white text-center">Create New Account</h2>
            <div class="row">
                <div class="form-item col-6">

                    <?= $this->Form->control('company_name', array("placeholder" => "Company Name"));?>
                </div>
                <div class="form-item col-6">

                    <?= $this->Form->control('ABN', array("placeholder" => "ABN"));?>
                </div>
            </div>
            <div class="row">
                <div class="form-item col-6">

                    <?= $this->Form->control('username', array("placeholder" => "Email"));?>
                </div>
                <div class="form-item col-6">

                    <?= $this->Form->control('phone', array("placeholder" => "Contact Number"));?>
                </div>
            </div>

            <div class="row">
                <div class="form-item col-6">
                    <?= $this->Form->control('password', array("placeholder" => "Password"));?>
                </div>


                <div class="form-item col-6">
                    <label class="text-white">Retype password</label>
                    <?= $this->Form->control('retype_password', array("type"=>"password","label"=>"","placeholder" => "Retype Password"));?>
                </div>
            </div>
            <div class="row">
                <div class="form-item col-12">
                    <p class="text-align-left">Which best describes you?</p>
                    <?=$this->Form->select('type',['Buyer'=>'Buyer','Seller'=>'Seller','Builder'=>'Professional','Admin'=>'Admin']);?>
                </div>
                <div class="form-item col-12">
                    <p class="text-align-left">Which industry do you belong to?</p>
                    <?=$this->Form->select('type',['Agriculture'=>'Agriculture','Communications'=>'Communications','Construction'=>'Construction','Health services'=>'Health services','Transport'=>'Transport','Utilities'=>'Utilities','Other'=>'Other']);?>
                </div>


            <!--select-->
            <!--checkbox-->
            <!--  <div class="checkbox">
                <input type="checkbox" />
                <span>
							By clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy. You may receive e-mail notifications from us and can opt out at any time.
						</span>
            </div>-->
            <!--signup-->
            <div class="col-12">
                <p class="text-center"><?= $this->Html->link("Already have an account? Login Here", ['action' => 'login']) ?></p>
            </div>
            <?= //$this->Form->button(__('Submit'), array("class" => "submit-btn2", "type" => "submit", "confirm"=>"Are you sure you want to create a " . $type . " account?"))
                $this->Form->button(__('Create Account'), array("label" => "Sign Up", "style"=>"  background-color: #fbba37;","type" => "submit", "confirm"=>"Are your details correct? (Buyer Type for Creating Demand, Seller Type for Creating Quotation)"))?>
            <button class="back-btn " ><a  href="<?= $this->Url->build(['controller' => 'home', 'action'=>'index']); ?>" style="color: white;">🡄 Back to home</a>    </button>
    </div>
        </div>
    </div>
    <div class="col-12 col-md-5 login-right">

    <div class="register-side row">
    <!--left-->
    <div class="col-12 register-circ">
        <div class="side background-secondary">
            <h2 class="text-white text-center my-2">Hello!</h2>
            <h3 class="text-white ">We’d love to have you on board! Just a few quick questions and we’re good to go!</h3>
        </div>
    </div>


</div>

    </div>
</div>





</div>




<?= $this->fetch('content') ?>
<?= $this->Form->end() ?>
