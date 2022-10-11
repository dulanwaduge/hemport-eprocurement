<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderProduct $orderProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Order Product'), ['action' => 'edit', $orderProduct->product_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Order Product'), ['action' => 'delete', $orderProduct->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderProduct->product_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Order Product'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Order Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orderProduct view content">
            <h3><?= h($orderProduct->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $orderProduct->has('product') ? $this->Html->link($orderProduct->product->name, ['controller' => 'Product', 'action' => 'view', $orderProduct->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Orderplaced') ?></th>
                    <td><?= $orderProduct->has('orderplaced') ? $this->Html->link($orderProduct->orderplaced->id, ['controller' => 'Orderplaced', 'action' => 'view', $orderProduct->orderplaced->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Amount') ?></th>
                    <td><?= $this->Number->format($orderProduct->product_amount) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
