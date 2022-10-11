<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Seller $seller
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Seller'), ['action' => 'edit', $seller->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Seller'), ['action' => 'delete', $seller->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seller->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Seller'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Seller'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="seller view content">
            <h3><?= h($seller->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($seller->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('BusinessName') ?></th>
                    <td><?= h($seller->BusinessName) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $seller->has('user') ? $this->Html->link($seller->user->id, ['controller' => 'Users', 'action' => 'view', $seller->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Emailaddress') ?></th>
                    <td><?= h($seller->emailaddress) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($seller->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= $this->Number->format($seller->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('BSB') ?></th>
                    <td><?= $this->Number->format($seller->BSB) ?></td>
                </tr>
                <tr>
                    <th><?= __('AccountNo') ?></th>
                    <td><?= $this->Number->format($seller->AccountNo) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Product') ?></h4>
                <?php if (!empty($seller->product)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Availability') ?></th>
                            <th><?= __('Taxnum') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Seller Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($seller->product as $product) : ?>
                        <tr>
                            <td><?= h($product->id) ?></td>
                            <td><?= h($product->name) ?></td>
                            <td><?= h($product->availability) ?></td>
                            <td><?= h($product->taxnum) ?></td>
                            <td><?= h($product->price) ?></td>
                            <td><?= h($product->description) ?></td>
                            <td><?= h($product->amount) ?></td>
                            <td><?= h($product->modified) ?></td>
                            <td><?= h($product->seller_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Product', 'action' => 'view', $product->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Product', 'action' => 'edit', $product->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Product', 'action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
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
