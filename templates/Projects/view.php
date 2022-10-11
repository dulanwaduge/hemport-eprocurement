<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="projects view content">
            <h3><?= h($project->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($project->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image 1') ?></th>
                    <td><?= h($project->image_1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image 2') ?></th>
                    <td><?= h($project->image_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image 3') ?></th>
                    <td><?= h($project->image_3) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image 4') ?></th>
                    <td><?= h($project->image_4) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cname') ?></th>
                    <td><?= h($project->cname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Year') ?></th>
                    <td><?= h($project->year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($project->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($project->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($project->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
