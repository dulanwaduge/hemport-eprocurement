<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Seller $seller
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Seller'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="seller form content">
            <?= $this->Form->create($seller) ?>
            <fieldset>
                <legend><?= __('Add Seller') ?></legend>
                <?php
                    echo $this->Form->control('address');
                    echo $this->Form->control('BusinessName');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('users_id', ['options' => $users]);
                    echo $this->Form->control('emailaddress');
                    echo $this->Form->control('BSB');
                    echo $this->Form->control('AccountNo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
