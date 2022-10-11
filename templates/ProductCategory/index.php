<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductCategory[]|\Cake\Collection\CollectionInterface $productCategory
 */
?>
<div class="productCategory index content">
    <?= $this->Html->link(__('New Product Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Product Category') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productCategory as $productCategory): ?>
                <tr>
                    <td><?= $productCategory->has('product') ? $this->Html->link($productCategory->product->name, ['controller' => 'Product', 'action' => 'view', $productCategory->product->id]) : '' ?></td>
                    <td><?= $productCategory->has('category') ? $this->Html->link($productCategory->category->name, ['controller' => 'Category', 'action' => 'view', $productCategory->category->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $productCategory->product_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productCategory->product_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productCategory->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productCategory->product_id)]) ?>
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
