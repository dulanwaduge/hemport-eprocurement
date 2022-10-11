<!--form-->
<style>
    .error-message{
        color: red;
    }

    .form .right h4 {
        margin-top: 80px;
        margin-left: 240px;
        font-size: 45px;
        color: #fff;
        margin-bottom: 70px;
    }

</style>
<div class="form">
    <div class="main">

        <!--right-->
        <div class="right" >
            <h4>Send Quotation</h4>

            <?= $this->Form->create() ?>
            <div class="flex-box">
                <div class="item">
                    <p>Company Name*</p>
                    <?= $this->Form->control('company_name', array("label"=>"","placeholder" => "company name"));?>
                </div>
                <div class="item">
                    <p>ABN(11 Digit)*</p>
                    <?= $this->Form->control('abn', array("label"=>"","placeholder" => "ABN",'maxlength'=>'11', 'minlength'=>'11',"type"=> "phone"));?>
                </div>
            </div>
            <div class="flex-box">
                <div class="item">
                    <p>E-mail*</p>
                    <?= $this->Form->control('email', array("label"=>"","placeholder" => "email",'type' => 'email'));?>
                </div>
                <div class="item">
                    <p>Contact Number*</p>
                    <?= $this->Form->control('contact_number', array("label"=>"","placeholder" => "Contact Number",'type' => 'phone','pattern'=>'([0-9])+','maxlength'=>'10', 'minlength'=>'10'));?>
                </div>
            </div>
            <div class="flex-box">
                <div class="item" style="width: 75%;">
                    <p>Message*:(include any offers or price here)</p>
                    <?= $this->Form->textarea('description', array("label"=>"","placeholder" => "Demand Description", "style" => "width: 100%"));?>
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;width: 75%">

                <div class="btn">
                    <?= $this->Form->button(__('Back'), array("label" => "Back", "type" => "button", "onClick" => "history.go(-1)"))?>
                </div>
                <div class="btn" >
                    <?= $this->Form->button(__('Submit'), array("label" => "Submit", "type" => "submit", "confirm"=>"Are your details correct?" ))?>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
