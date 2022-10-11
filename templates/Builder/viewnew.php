<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Builder $builder
 */
?>

    <!doctype html>
    <html lang="zxx">
<main>

    <!-- breadcrumb Start-->
    <div class="page-notification">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'index']); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'findprofessionals']); ?>">Find Professionals</a></li>
                            <li class="breadcrumb-item"><a href="#">View Profile</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End-->


<?php echo $this->Flash->render(); ?>
