

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
                echo $this->Form->control('username', array('label'=>'*Username', "class" => "form-control valid", "placeholder" => "enter your username", "style" => "height:40px"));
                echo "<br>";
                ?>
            </fieldset>
            <br>
            <?= $this->Form->button(__('Submit'), array("class" => "submit-btn2", "type" => "submit", "confirm"=>"Is your email correct?"))?>

            <?= $this->Form->end() ?>

            <br>
            <br>

        </div>
    </div>
</div>
