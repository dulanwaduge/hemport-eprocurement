<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Delivery[]|\Cake\Collection\CollectionInterface $delivery
 */
?>
<div class="delivery index content">
    <?= $this->Html->link(__('New Delivery'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Delivery') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('NumberofItem') ?></th>
                    <th><?= $this->Paginator->sort('shiptype') ?></th>
                    <th><?= $this->Paginator->sort('startdate') ?></th>
                    <th><?= $this->Paginator->sort('enddate') ?></th>
                    <th><?= $this->Paginator->sort('tracknumber') ?></th>
                    <th><?= $this->Paginator->sort('order_id') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($delivery as $delivery): ?>
                <tr>
                    <td><?= $this->Number->format($delivery->id) ?></td>
                    <td><?= $this->Number->format($delivery->NumberofItem) ?></td>
                    <td><?= h($delivery->shiptype) ?></td>
                    <td><?= h($delivery->startdate) ?></td>
                    <td><?= h($delivery->enddate) ?></td>
                    <td><?= $this->Number->format($delivery->tracknumber) ?></td>
                    <td><?= $delivery->has('orderplaced') ? $this->Html->link($delivery->orderplaced->id, ['controller' => 'Orderplaced', 'action' => 'view', $delivery->orderplaced->id]) : '' ?></td>
                    <td><?= h($delivery->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $delivery->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $delivery->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $delivery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $delivery->id)]) ?>
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
