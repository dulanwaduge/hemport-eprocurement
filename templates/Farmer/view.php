<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Farmer $farmer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Farmer'), ['action' => 'edit', $farmer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Farmer'), ['action' => 'delete', $farmer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $farmer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Farmer'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Farmer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="farmer view content">
            <h3><?= h($farmer->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($farmer->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($farmer->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $farmer->has('user') ? $this->Html->link($farmer->user->id, ['controller' => 'Users', 'action' => 'view', $farmer->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($farmer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= $this->Number->format($farmer->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($farmer->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
