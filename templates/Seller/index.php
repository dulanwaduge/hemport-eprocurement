<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Seller[]|\Cake\Collection\CollectionInterface $seller
 */
?>
<div class="seller index content">
    <?= $this->Html->link(__('New Seller'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Seller') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('BusinessName') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('users_id') ?></th>
                    <th><?= $this->Paginator->sort('emailaddress') ?></th>
                    <th><?= $this->Paginator->sort('BSB') ?></th>
                    <th><?= $this->Paginator->sort('AccountNo') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($seller as $seller): ?>
                <tr>
                    <td><?= $this->Number->format($seller->id) ?></td>
                    <td><?= h($seller->address) ?></td>
                    <td><?= h($seller->BusinessName) ?></td>
                    <td><?= $this->Number->format($seller->phone) ?></td>
                    <td><?= $seller->has('user') ? $this->Html->link($seller->user->id, ['controller' => 'Users', 'action' => 'view', $seller->user->id]) : '' ?></td>
                    <td><?= h($seller->emailaddress) ?></td>
                    <td><?= h($seller->BSB) ?></td>
                    <td><?= h($seller->AccountNo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $seller->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $seller->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $seller->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seller->id)]) ?>
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
