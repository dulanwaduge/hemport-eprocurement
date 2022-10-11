<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductCategory $productCategory
 * @var string[]|\Cake\Collection\CollectionInterface $product
 * @var string[]|\Cake\Collection\CollectionInterface $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productCategory->product_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productCategory->product_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Product Category'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productCategory form content">
            <?= $this->Form->create($productCategory) ?>
            <fieldset>
                <legend><?= __('Edit Product Category') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>

    <?php echo $this->Flash->render() ?>

</div>
