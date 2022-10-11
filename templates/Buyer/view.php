<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Buyer $buyer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Buyer'), ['action' => 'edit', $buyer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Buyer'), ['action' => 'delete', $buyer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buyer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Buyer'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Buyer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="buyer view content">
            <h3><?= h($buyer->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Fname') ?></th>
                    <td><?= h($buyer->fname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lname') ?></th>
                    <td><?= h($buyer->lname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($buyer->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($buyer->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postcode') ?></th>
                    <td><?= h($buyer->postcode) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $buyer->has('user') ? $this->Html->link($buyer->user->id, ['controller' => 'Users', 'action' => 'view', $buyer->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($buyer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= $this->Number->format($buyer->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($buyer->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Orderplaced') ?></h4>
                <?php if (!empty($buyer->orderplaced)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Datetime') ?></th>
                            <th><?= __('Location') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Buyer Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($buyer->orderplaced as $orderplaced) : ?>
                        <tr>
                            <td><?= h($orderplaced->id) ?></td>
                            <td><?= h($orderplaced->datetime) ?></td>
                            <td><?= h($orderplaced->location) ?></td>
                            <td><?= h($orderplaced->price) ?></td>
                            <td><?= h($orderplaced->modified) ?></td>
                            <td><?= h($orderplaced->buyer_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Orderplaced', 'action' => 'view', $orderplaced->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Orderplaced', 'action' => 'edit', $orderplaced->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orderplaced', 'action' => 'delete', $orderplaced->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderplaced->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
