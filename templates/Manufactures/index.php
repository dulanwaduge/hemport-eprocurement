<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manufacture[]|\Cake\Collection\CollectionInterface $manufactures
 */
?>
<div class="manufactures index content">
    <?= $this->Html->link(__('New Manufacture'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Manufactures') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('emailaddress') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($manufactures as $manufacture): ?>
                <tr>
                    <td><?= $this->Number->format($manufacture->id) ?></td>
                    <td><?= h($manufacture->name) ?></td>
                    <td><?= h($manufacture->address) ?></td>
                    <td><?= $this->Number->format($manufacture->phone) ?></td>
                    <td><?= $manufacture->has('user') ? $this->Html->link($manufacture->user->id, ['controller' => 'Users', 'action' => 'view', $manufacture->user->id]) : '' ?></td>
                    <td><?= h($manufacture->emailaddress) ?></td>
                    <td><?= h($manufacture->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $manufacture->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $manufacture->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $manufacture->id], ['confirm' => __('Are you sure you want to delete # {0}?', $manufacture->id)]) ?>
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
