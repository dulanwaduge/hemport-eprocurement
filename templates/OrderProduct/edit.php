<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderProduct $orderProduct
 * @var string[]|\Cake\Collection\CollectionInterface $product
 * @var string[]|\Cake\Collection\CollectionInterface $orderplaced
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orderProduct->product_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orderProduct->product_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Order Product'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orderProduct form content">
            <?= $this->Form->create($orderProduct) ?>
            <fieldset>
                <legend><?= __('Edit Order Product') ?></legend>
                <?php
                    echo $this->Form->control('product_amount');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>

    <?php echo $this->Flash->render() ?>

</div>
