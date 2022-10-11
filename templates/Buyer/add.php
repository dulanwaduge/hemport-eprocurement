<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Buyer $buyer
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Buyer'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="buyer form content">
            <?= $this->Form->create($buyer) ?>
            <fieldset>
                <legend><?= __('Add Buyer') ?></legend>
                <?php
                    echo $this->Form->control('fname');
                    echo $this->Form->control('lname');
                    echo $this->Form->control('address');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('users_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
