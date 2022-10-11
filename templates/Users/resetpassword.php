

<div class="row" style="justify-content: center">
    <div class="column-responsive column-80">

        <div class="users form content">
            <?php echo $this->Flash->render() ?>
            <?= $this->Form->create() ?>
            <fieldset>
                <div class="row">
                    <div class="col-12">
                        <h1 class="contact-title">Reset Password</h1>
                    </div>
                </div>
                <?php
                echo $this->Form->control('password', array('label'=>'*New Password', "class" => "form-control valid", "placeholder" => "password", "style" => "height:40px"));
                echo "<br>";
                echo $this->Form->control('retype_password', array('label'=>'*Confirm Password', "type"=>"password", "class" => "form-control valid", "placeholder" => "retype password", "style" => "height:40px"));
                echo "<br>";
                ?>
            </fieldset>
            <br>
            <?= //$this->Form->button(__('Submit'), array("class" => "submit-btn2", "type" => "submit", "confirm"=>"Are you sure you want to create a " . "$type" . " account?"))
            $this->Form->button(__('Submit'), array("class" => "submit-btn2", "type" => "submit", "confirm"=>"Your password will be changed. Do you want to continue?"))?>

            <?= $this->Form->end() ?>

            <br>
            <br>

        </div>
    </div>
</div>

