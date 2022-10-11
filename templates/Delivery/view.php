<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Delivery $delivery
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Delivery'), ['action' => 'edit', $delivery->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Delivery'), ['action' => 'delete', $delivery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $delivery->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Delivery'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Delivery'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="delivery view content">
            <h3><?= h($delivery->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Shiptype') ?></th>
                    <td><?= h($delivery->shiptype) ?></td>
                </tr>
                <tr>
                    <th><?= __('Orderplaced') ?></th>
                    <td><?= $delivery->has('orderplaced') ? $this->Html->link($delivery->orderplaced->id, ['controller' => 'Orderplaced', 'action' => 'view', $delivery->orderplaced->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($delivery->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('NumberofItem') ?></th>
                    <td><?= $this->Number->format($delivery->NumberofItem) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tracknumber') ?></th>
                    <td><?= $this->Number->format($delivery->tracknumber) ?></td>
                </tr>
                <tr>
                    <th><?= __('Startdate') ?></th>
                    <td><?= h($delivery->startdate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enddate') ?></th>
                    <td><?= h($delivery->enddate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($delivery->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
