<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderProduct[]|\Cake\Collection\CollectionInterface $orderProduct
 */
?>
<div class="orderProduct index content">
    <?= $this->Html->link(__('New Order Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Order Product') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('order_id') ?></th>
                    <th><?= $this->Paginator->sort('product_amount') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderProduct as $orderProduct): ?>
                <tr>
                    <td><?= $orderProduct->has('product') ? $this->Html->link($orderProduct->product->name, ['controller' => 'Product', 'action' => 'view', $orderProduct->product->id]) : '' ?></td>
                    <td><?= $orderProduct->has('orderplaced') ? $this->Html->link($orderProduct->orderplaced->id, ['controller' => 'Orderplaced', 'action' => 'view', $orderProduct->orderplaced->id]) : '' ?></td>
                    <td><?= $this->Number->format($orderProduct->product_amount) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $orderProduct->product_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderProduct->product_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderProduct->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderProduct->product_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
