<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orders view content">
            <h3><?= h($order->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Order No') ?></th>
                    <td><?= h($order->order_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $order->has('user') ? $this->Html->link($order->user->id, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Pay Status') ?></th>
                    <td><?= h($order->pay_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($order->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= $this->Number->format($order->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Time') ?></th>
                    <td><?= h($order->create_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pay Time') ?></th>
                    <td><?= h($order->pay_time) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
