<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderProduct $orderProduct
 * @var \Cake\Collection\CollectionInterface|string[] $product
 * @var \Cake\Collection\CollectionInterface|string[] $orderplaced
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Order Product'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orderProduct form content">
            <?= $this->Form->create($orderProduct) ?>
            <fieldset>
                <legend><?= __('Add Order Product') ?></legend>
                <?php
                    echo $this->Form->control('product_amount');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
