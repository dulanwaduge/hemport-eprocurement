<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Orderplaced $orderplaced
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Orderplaced'), ['action' => 'edit', $orderplaced->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Orderplaced'), ['action' => 'delete', $orderplaced->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderplaced->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Orderplaced'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Orderplaced'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orderplaced view content">
            <h3><?= h($orderplaced->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Buyer') ?></th>
                    <td><?= $orderplaced->has('buyer') ? $this->Html->link($orderplaced->buyer->id, ['controller' => 'Buyer', 'action' => 'view', $orderplaced->buyer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($orderplaced->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($orderplaced->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seller Id') ?></th>
                    <td><?= $this->Number->format($orderplaced->seller_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Id') ?></th>
                    <td><?= $this->Number->format($orderplaced->product_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($orderplaced->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($orderplaced->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
