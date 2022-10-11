<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductCategory $productCategory
 * @var \Cake\Collection\CollectionInterface|string[] $product
 * @var \Cake\Collection\CollectionInterface|string[] $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Product Category'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productCategory form content">
            <?= $this->Form->create($productCategory) ?>
            <fieldset>
                <legend><?= __('Add Product Category') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
