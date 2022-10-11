<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Farmer $farmer
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $farmer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $farmer->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Farmer'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="farmer form content">
            <?= $this->Form->create($farmer) ?>
            <fieldset>
                <legend><?= __('Edit Farmer') ?></legend>
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

    <?php echo $this->Flash->render() ?>

</div>
