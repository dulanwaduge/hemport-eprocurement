<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manufacture $manufacture
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $manufacture->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $manufacture->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Manufactures'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="manufactures form content">
            <?= $this->Form->create($manufacture) ?>
            <fieldset>
                <legend><?= __('Edit Manufacture') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('address');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('emailaddress');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>

    <?php echo $this->Flash->render() ?>

</div>
