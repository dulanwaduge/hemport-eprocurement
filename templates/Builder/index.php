<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Builder[]|\Cake\Collection\CollectionInterface $builder
 */
?>
<div class="builder index content">
    <?= $this->Html->link(__('New Builder'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Builder') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('postcode') ?></th>
                    <th><?= $this->Paginator->sort('avater') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($builder as $builder): ?>
                <tr>
                    <td><?= $this->Number->format($builder->id) ?></td>
                    <td><?= h($builder->name) ?></td>
                    <td><?= $this->Number->format($builder->phone) ?></td>
                    <td><?= h($builder->email) ?></td>
                    <td><?= h($builder->address) ?></td>
                    <td><?= $builder->has('user') ? $this->Html->link($builder->user->id, ['controller' => 'Users', 'action' => 'view', $builder->user->id]) : '' ?></td>
                    <td><?= h($builder->description) ?></td>
                    <td><?= h($builder->city) ?></td>
                    <td><?= h($builder->state) ?></td>
                    <td><?= $this->Number->format($builder->postcode) ?></td>
                    <td><?= h($builder->avater) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $builder->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $builder->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $builder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $builder->id)]) ?>
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
