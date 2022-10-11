<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Buyer[]|\Cake\Collection\CollectionInterface $buyer
 */
?>
<div class="buyer index content">
    <?= $this->Html->link(__('New Buyer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Buyer') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('fname') ?></th>
                    <th><?= $this->Paginator->sort('lname') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('postcode') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('users_id') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buyer as $buyer): ?>
                <tr>
                    <td><?= $this->Number->format($buyer->id) ?></td>
                    <td><?= h($buyer->fname) ?></td>
                    <td><?= h($buyer->lname) ?></td>
                    <td><?= h($buyer->address) ?></td>
                    <td><?= h($buyer->state) ?></td>
                    <td><?= h($buyer->postcode) ?></td>
                    <td><?= $this->Number->format($buyer->phone) ?></td>
                    <td><?= $buyer->has('user') ? $this->Html->link($buyer->user->id, ['controller' => 'Users', 'action' => 'view', $buyer->user->id]) : '' ?></td>
                    <td><?= h($buyer->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $buyer->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $buyer->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $buyer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buyer->id)]) ?>
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
