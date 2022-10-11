<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Orderplaced[]|\Cake\Collection\CollectionInterface $orderplaced
 *  * @var \App\Model\Entity\Seller $seller
 *  * @var \App\Model\Entity\Product $product
 */

$counter = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Orders</title>
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
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $this->Url->build(['controller' => 'home', 'action'=>'index']); ?>">
            <img>
            <?= $this->Html->image('hemporticonwhite.ico'); ?>
            <div class="sidebar-brand-text mx-3">Hemport </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">



        <!-- Heading -->


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link " href="<?= $this->Url->build(['controller' => 'buyer', 'action'=>'edit']); ?>" >
                <span>User Profile</span>
            </a>

        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <span>Orders</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Orders Utilities</h6>
                    <a class="collapse-item" href="<?= $this->Url->build(['controller' => 'orderplaced', 'action'=>'#']); ?>">Order History</a>
                </div>
            </div>
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
                    <?php if (isset($type) && $type == 'Buyer') {?>
                        <a class="collapse-item" href="<?= $this->Url->build(['controller' => 'demand', 'action'=>'add']); ?>">New Demand</a>
                    <?php }?>
                </div>
            </div>
        </li>




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

                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'buyer', 'action'=>'edit']); ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'users', 'action'=>'logout']); ?>" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href= "<?= $this->Url->build(['controller' => 'users', 'action'=>'deleteseller']); ?>" data-toggle="modal" data-target="#deleteModal">
                                <i class="fas fa-ban fa-sm fa-fw mr-2 text-gray-400"></i>
                                Delete Account
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
                    <h1 class="h3 mb-0 text-gray-800">Order History</h1>

                </div>

                <!-- Content Row -->
                <div class="column-responsive column-80">
                    <div class="orderplaced index content">
                        <div class="table-responsive">
                            <table border="3" cellspacing="0" cellpadding="3">
                                <tbody>
                                <tr style="font-size:4">
                                    <th><?= $this->Paginator->sort('item', 'Item No') ?></th>
                                    <th><?= $this->Paginator->sort('order_id', 'Order No') ?></th>
                                    <th><?= $this->Paginator->sort('created', 'Created') ?></th>
                                    <th><?= $this->Paginator->sort('price', 'Price') ?></th>
                                    <th><?= $this->Paginator->sort('sname', 'Seller Name') ?></th>
                                    <th><?= $this->Paginator->sort('', 'Product Page') ?></th>
                                </tr>


                                <?php
                                foreach ($orderplaced as $orderplaced): ?>
                                    <tr>
                                        <td><?= $counter+= 1; $this->Number->format($counter) ?></td>
                                        <td>$<?= $this->Number->format(h($orderplaced->id)) ?></td>
                                        <td><?= h($orderplaced->created) ?></td>
                                        <td>$<?= $this->Number->format($orderplaced->price) ?></td>
                                        <td><?= h($orderplaced->sname) ?></td>
                                        <td><a href="<?= $this->Url->build(['controller' => 'product', 'action'=>'view', $orderplaced->product_id]); ?>">Click here to go to Product Page</a></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('first')) ?>
                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <p>&nbsp;&nbsp;</p>
                                <?= $this->Paginator->numbers() ?>
                                <p>&nbsp;&nbsp;</p>
                                <?= $this->Paginator->next(__('next') . ' >') ?>
                                <?= $this->Paginator->last(__('last') . ' >>') ?>
                            </ul>
                            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} order(s) out of {{count}} total')) ?></p>
                        </div>
                    </div>
                </div>

                <?php echo $this->Flash->render(); ?>

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
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="margin-left: 155px;">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body" style="margin-left: 25px;">Select "Delete" below if you are ready to end your current session. <p style='font-size:14px'>*Your account cannot be recovered after deletion.</p></div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" style="align:left"type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="<?= $this->Url->build(['controller' => 'users', 'action'=>'deleteseller']); ?>">Delete</a>
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


