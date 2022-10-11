<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manufacture $manufacture
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Manufacture'), ['action' => 'edit', $manufacture->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Manufacture'), ['action' => 'delete', $manufacture->id], ['confirm' => __('Are you sure you want to delete # {0}?', $manufacture->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Manufactures'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Manufacture'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="manufactures view content">
            <h3><?= h($manufacture->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($manufacture->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($manufacture->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $manufacture->has('user') ? $this->Html->link($manufacture->user->id, ['controller' => 'Users', 'action' => 'view', $manufacture->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Emailaddress') ?></th>
                    <td><?= h($manufacture->emailaddress) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($manufacture->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= $this->Number->format($manufacture->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($manufacture->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
