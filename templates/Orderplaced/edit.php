<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Orderplaced $orderplaced
 * @var string[]|\Cake\Collection\CollectionInterface $buyer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orderplaced->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orderplaced->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Orderplaced'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orderplaced form content">
            <?= $this->Form->create($orderplaced) ?>
            <fieldset>
                <legend><?= __('Edit Orderplaced') ?></legend>
                <?php
                    echo $this->Form->control('price');
                    echo $this->Form->control('buyer_id', ['options' => $buyer]);
                    echo $this->Form->control('seller_id');
                    echo $this->Form->control('product_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
