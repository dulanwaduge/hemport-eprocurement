<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Builder $builder
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Builder'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="builder form content">
            <?= $this->Form->create($builder) ?>
            <fieldset>
                <legend><?= __('Add Builder') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('email');
                    echo $this->Form->control('address');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('city');
                    echo "State";
                    echo "<br>";
                    echo $this->Form->select('state',['ACT'=>'ACT','NSW'=>'NSW','NT'=>'NT','Qld'=>'Qld','SA'=>'SA','Vic'=>'Vic','Tas'=>'Tas','WA'=>'WA']);
                    echo $this->Form->control('postcode');
                    echo $this->Form->control('avater');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
