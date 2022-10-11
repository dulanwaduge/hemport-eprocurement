<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var \Cake\Collection\CollectionInterface|string[] $category
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

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <?= $this->Html->css('fontawesome-free/css/all.min.css') ?>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <?= $this->Html->css('sb-admin-3.css') ?>


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $this->Url->build(['controller' => 'home', 'action'=>'#']); ?>">

            <div class="sidebar-brand-text mx-3">Hemport </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->

        <li class="nav-item active">
            <a class="nav-link" href="<?= $this->Url->build(['controller' => 'dashboard', 'action'=>'index']); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link " href="<?= $this->Url->build(['controller' => 'seller', 'action'=>'edit']); ?>" >
                <span>User Profile</span>
            </a>

        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <span>Items</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Item Utilities</h6>
                    <a class="collapse-item" href="<?= $this->Url->build(['controller' => 'product', 'action'=>'index']); ?>">View Item</a>
                    <a class="collapse-item" href="<?= $this->Url->build(['controller' => 'product', 'action'=>'add']); ?>">List Item</a>
                </div>
            </div>
        </li>


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">

                <span>Manage Delivery</span>
            </a>

        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#demandUtilities"
               aria-expanded="true" aria-controls="demandUtilities">
                <span>Manage Demand</span>
            </a>
            <div id="demandUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Demand Utilities</h6>
                    <a class="collapse-item" href="<?= $this->Url->build(['controller' => 'demand', 'action'=>'index']); ?>">List Demand</a>
                    <?php if ($type) {?>
                        <a class="collapse-item" href="<?= $this->Url->build(['controller' => 'demand', 'action'=>'add']); ?>">New Demand</a>
                    <?php }?>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">





    </ul>
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
                            <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'seller', 'action'=>'edit']); ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
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
                    <h1 class="h3 mb-0 text-gray-800"><?= h($product->name) ?></h1>

                </div>

                <!-- Content Row -->
                <div class="column-responsive column-80">
                    <div class="product view content">

                        <table>
                            <tr>
                                <th><?= __('Name') ?></th>
                                <td><?= h($product->name) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Availability') ?></th>
                                <td><?= h($product->availability) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Description') ?></th>
                                <td><?= h($product->description) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Image') ?></th>
                                <td><?= $this->Html->image($product->image,['style'=>'height:100px']) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Taxnum') ?></th>
                                <td><?= $this->Number->format($product->taxnum) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Price') ?></th>
                                <td><?= $this->Number->format($product->price) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Amount') ?></th>
                                <td><?= $this->Number->format($product->amount) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Modified') ?></th>
                                <td><?= h($product->modified) ?></td>
                            </tr>
                        </table>

                    </div>
                    <div class="side-nav">

                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']) ?>
                    </div>
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



