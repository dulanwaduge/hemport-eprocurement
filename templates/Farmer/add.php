<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Farmer $farmer
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Farmer'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="farmer form content">
            <?= $this->Form->create($farmer) ?>
            <fieldset>
                <legend><?= __('Add Farmer') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('address');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
