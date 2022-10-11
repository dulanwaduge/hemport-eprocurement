<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('logout'), ['action' => 'logout'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('username');
                    echo $this->Form->control('password',['style'=>'margin-left:6px']);
                    echo $this->Form->select('type',['Buyer'=>'Buyer','Seller'=>'Seller']);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), array("class" => "submit-btn2", "type" => "submit")) ?>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
