<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Farmer[]|\Cake\Collection\CollectionInterface $farmer
 */
?>
<div class="farmer index content">
    <?= $this->Html->link(__('New Farmer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Farmer') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($farmer as $farmer): ?>
                <tr>
                    <td><?= $this->Number->format($farmer->id) ?></td>
                    <td><?= h($farmer->name) ?></td>
                    <td><?= h($farmer->address) ?></td>
                    <td><?= $this->Number->format($farmer->phone) ?></td>
                    <td><?= h($farmer->modified) ?></td>
                    <td><?= $farmer->has('user') ? $this->Html->link($farmer->user->id, ['controller' => 'Users', 'action' => 'view', $farmer->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $farmer->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $farmer->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $farmer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $farmer->id)]) ?>
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
