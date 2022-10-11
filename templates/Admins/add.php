<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Admin $admin
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Admins'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admins form content">
            <?= $this->Form->create($admin,['type' =>"file"]) ?>
            <fieldset>
                <legend><?= __('Add Admin',['type'=>'file']) ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('page');
                    echo $this->Form->control('image_file',['type'=>'file','label'=>'image_file1']);
                    echo $this->Form->control('image_file2',['type'=>'file','label'=>'image_file2']);
                    echo $this->Form->control('text');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
