<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Seller $seller
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>
    <meta name="description" content="">
    <?= $this->Html->meta(array(
        'rel' => 'shortcut icon',
        'type' => "image/x-icon",
        'link' => '/img/hemporticon.ico',
    )); ?>

    <!-- Custom fonts for this template-->
    <?= $this->Html->css('fontawesome-free/css/all.min.css') ?>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <?= $this->Html->css('sb-admin-2.css') ?>


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?=
    $this->element('sidebar');
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome back, <?= $username ?>!</span>
                            <img class="img-profile rounded-circle"
                            <?= $this->Html->image('undraw_profile.svg'); ?>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'users', 'action'=>'logout']); ?>" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Projects</h1>
                </div>

                <!-- search ui start -->
                <?= $this->Form->create(null,['type'=>'get']) ?>
                <?= $this->Form->control('key', [
                    'label'=>false,
                    'value'=>$this->request->GetQuery('key'),
                    'style'=>'float:left; margin-left:0.5%; color:slategray; width:91%;',
                    'placeholder'=>'Search by client name'])
                ?>
                <?= $this->Form->submit(__('🔎︎'), array(
                    'style'=>'margin-bottom:40px'
                )) ?>
                <?= $this->Form->end() ?>
                <hr class="sidebar-divider my-0">
                <br/>
                <!-- search ui end -->

                <!-- Content Row -->
                <div class="product index content">





                        <div class="table-responsive">
                            <table border="3" cellspacing="0" cellpadding="3">
                                <tbody>
                                <tr style="font-size:4">
                                    <th><?= $this->Paginator->sort('ID') ?></th>

                                    <th><?= '[Description]' ?></th>
                                    <th><?= $this->Paginator->sort('Client_Name') ?></th>

                                    <th><?= $this->Paginator->sort('Year') ?></th>

                                    <th><?= $this->Paginator->sort('Business Address') ?></th>
                                    <th><?= $this->Paginator->sort('State') ?></th>
                                    <th><?= $this->Paginator->sort('BuilderID') ?></th>

                                    <th><?= '[Image_1]' ?></th>
                                    <th><?= '[Image_2]' ?></th>
                                    <th><?= '[Image_3]' ?></th>
                                    <th><?= '[Image_4]' ?></th>
                                    <th class="actions"><?= __('[Actions]') ?></th>
                                </tr>


                                <?php
                                foreach ($projects as $projects): ?>
                                    <tr>
                                        <td><?= $this->Number->format($projects->id) ?></td>
                                        <td><?= h($projects->description) ?></td>
                                        <td><?= h($projects->cname) ?></td>
                                        <td><?= h($projects->year) ?></td>
                                        <td><?= h($projects->country) ?></td>
                                        <td><?= h($projects->state) ?></td>
                                        <td><?= $this->Number->format($projects->builder_id) ?></td>
                                        <td><?= $this->Html->image($projects->image_1,['style'=>'height:100px']) ?></td>
                                        <td><?= $this->Html->image($projects->image_2,['style'=>'height:100px']) ?></td>
                                        <td><?= $this->Html->image($projects->image_3,['style'=>'height:100px']) ?></td>
                                        <td><?= $this->Html->image($projects->image_4,['style'=>'height:100px']) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('Edit'), ['action' => 'editasadmin', $projects->id],['class'=>'fas fa-edit']) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projects->id], ['class'=>'fas fa-trash','confirm' => __('Are you sure you want to delete {0} project ?', $projects->cname)]) ?>
                                        </td>
                                    </tr>
                                    <?php  endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('first')) ?>
                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('next') . ' >') ?>
                                <?= $this->Paginator->last(__('last') . ' >>') ?>
                            </ul>
                            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                        </div>
                    </div>

                </div>



                <!-- Content Row -->
                <div class="row">

                    <!-- Content Column -->
                    <div class="col-lg-6 mb-4">



                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->

                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= $this->Url->build(['controller' => 'users', 'action'=>'logout']); ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal-->

        <!-- Bootstrap core JavaScript-->
        <?= $this->Html->script('vendor/jquery/jquery.min.js') ?>
        <?= $this->Html->script('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>
        <?= $this->Html->script('vendor/jquery-easing/jquery.easing.min.js') ?>
        <?= $this->Html->script('sb-admin-2.min.js') ?>


        <?= $this->Html->script('vendor/chart.js/Chart.min.js') ?>
        <?= $this->Html->script('demo/chart-area-demo.js') ?>
        <?= $this->Html->script('demo/chart-pie-demo.js') ?>

</body>

</html>
