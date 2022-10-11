<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Delivery $delivery
 * @var string[]|\Cake\Collection\CollectionInterface $orderplaced
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $delivery->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $delivery->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Delivery'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="delivery form content">
            <?= $this->Form->create($delivery) ?>
            <fieldset>
                <legend><?= __('Edit Delivery') ?></legend>
                <?php
                    echo $this->Form->control('NumberofItem');
                    echo $this->Form->control('shiptype');
                    echo $this->Form->control('startdate');
                    echo $this->Form->control('enddate');
                    echo $this->Form->control('tracknumber');
                    echo $this->Form->control('order_id', ['options' => $orderplaced]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>

    <?php echo $this->Flash->render() ?>

</div>
