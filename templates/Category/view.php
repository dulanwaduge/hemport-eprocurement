<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Category'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="category view content">
            <h3><?= h($category->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($category->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $category->has('category') ? $this->Html->link($category->category->name, ['controller' => 'Category', 'action' => 'view', $category->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($category->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Product') ?></h4>
                <?php if (!empty($category->product)) : ?>
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
                            <th><?= __('Image') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->product as $product) : ?>
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
                            <td><?= h($product->image) ?></td>
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
