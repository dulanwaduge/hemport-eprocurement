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
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $this->Url->build(['controller' => 'home', 'action'=>'index']); ?>">
            <?= $this->Html->image('Hemporticonwhite.ico'); ?>
            <div class="sidebar-brand-text mx-3">Hemport </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->

        <!--        <li class="nav-item active">-->
        <!--            <a class="nav-link" href="$this->Url->build(['controller' => 'dashboard', 'action'=>'index']);">-->
        <!--                <i class="fas fa-fw fa-tachometer-alt"></i>-->
        <!--                <span>Dashboard</span></a>-->
        <!--        </li>-->
        <!---->
        <!-- Divider -->
        <!--        <hr class="sidebar-divider">-->

        <!-- Heading -->


        <!-- Nav Item - Pages Collapse Menu -->

        <li class="nav-item">
            <a class="nav-link " href="<?= $this->Url->build(['controller' => 'users', 'action'=>'index']); ?>" >
                <span>Manage Users</span>
            </a>

        </li>

        <!-- Nav Item - View orders made by buyers -->
        <li class="nav-item">
            <a class="nav-link " href="<?= $this->Url->build(['controller' => 'product', 'action'=>'index2']); ?>" >
                <span>Manage Proudcts</span>
            </a>

        </li>

        <!-- Nav Item - View orders made by buyers -->
        <li class="nav-item">
            <a class="nav-link " href="<?= $this->Url->build(['controller' => 'projects', 'action'=>'index2']); ?>" >
                <span>Manage Project</span>
            </a>

        </li>

        <!-- Nav Item - View orders made by buyers -->
        <li class="nav-item">
            <a class="nav-link " href="<?= $this->Url->build(['controller' => 'orderplaced', 'action'=>'index3']); ?>" >
                <span>Manage Orders</span>
            </a>

        </li>

        <hr class="sidebar-divider d-none d-md-block">


        <li class="nav-item">
            <a class="nav-link " href="<?= $this->Url->build(['controller' => 'orderplaced', 'action'=>'#']); ?>" >
                <span>Change content</span>
            </a>

        </li>


        <!-- Nav Item - Pages Collapse Menu -->
        <!--        <li class="nav-item">-->
        <!--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"-->
        <!--               aria-expanded="true" aria-controls="collapsePages">-->
        <!---->
        <!--                <span>Manage Delivery</span>-->
        <!--            </a>-->
        <!---->
        <!--        </li>-->

        <!-- Nav Item - Charts -->

        <!-- Divider -->





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
                    <h1 class="h3 mb-0 text-gray-800">Users</h1>

                </div>

                <!-- Content Row -->
                <div class="row">
                    <div class="column-responsive column-80">
                        <div class="users view content">
                            <table border="3" cellspacing="0" cellpadding="3">
                                <tr>
                                    <th><?= __('ID') ?></th>
                                    <td><?= h($userview->id) ?></td>
                                </tr>


                                <tr>
                                    <th><?= __('Type') ?></th>
                                    <td><?= h($userview->type) ?></td>
                                </tr>

                                <tr>
                                    <th><?= __('Username') ?></th>
                                    <td><?= h($userview->username) ?></td>
                                </tr>
                                <?php  if(($userview->type)=='Seller'){
                                    if(@($seller->BusinessName) == null){  ?>
                                        <tr>
                                            <th><?= __('Business Name') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>

                                        <?php
                                        }
                                    else{
                                        ?>

                                        <tr>
                                        <th><?= __('Business Name') ?></th>
                                        <td><?= h($seller->BusinessName) ?></td>
                                    </tr>


                                    <?php
                                    }
                                    ?>
                                    <?php
                                }  else if($userview->type== 'Builder'){
                                    if(@($builder->name == null)) { ?>

                                        <tr>
                                            <th><?= __('Name') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>
                                        <?php
                                        }
                                        else{
                                            ?>
                                            <tr>
                                                <th><?= __('Name') ?></th>
                                                <td><?= h($builder->name) ?></td>
                                            </tr>
                                <?php
                                        }

                                }else if($userview->type== 'Buyer'){
                                    if(@($buyer->fname) == null){ ?>

                                        <tr>
                                            <th><?= __('First Name') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>

                                    <?php
                                    }
                                    else{
                                        ?>

                                        <tr>
                                            <th><?= __('First Name') ?></th>
                                            <td><?= h($buyer->fname) ?></td>
                                        </tr>
                                        <?php
                                    }

                                }
                                ?>

                                <?php  if(($userview->type)=='Seller'){
                                    if(@($seller->address) == null){  ?>
                                        <tr>
                                            <th><?= __('Address') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>

                                        <?php
                                    }
                                    else{
                                        ?>

                                        <tr>
                                            <th><?= __('Address') ?></th>
                                            <td><?= h($seller->address) ?></td>
                                        </tr>


                                        <?php
                                    }
                                    ?>
                                    <?php
                                }else if($userview->type== 'Buyer'){
                                    if(@($buyer->fname) == null){ ?>

                                        <tr>
                                            <th><?= __('Last Name') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>

                                        <?php
                                    }
                                    else{
                                        ?>

                                        <tr>
                                            <th><?= __('Last Name') ?></th>
                                            <td><?= h($buyer->lname) ?></td>
                                        </tr>
                                        <?php
                                    }

                                }
                                ?>


                                <?php  if(($userview->type)=='Seller'){
                                    if(@($seller->emailaddress) == null){  ?>
                                        <tr>
                                            <th><?= __('E-mail') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>

                                        <?php
                                    }
                                    else{
                                        ?>

                                        <tr>
                                            <th><?= __('E-mail') ?></th>
                                            <td><?= h($seller->emailaddress) ?></td>
                                        </tr>


                                        <?php
                                    }
                                    ?>
                                    <?php
                                }  else if($userview->type== 'Builder'){
                                    if(@($builder->phone == null)) { ?>

                                        <tr>
                                            <th><?= __('Phone') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <tr>
                                            <th><?= __('Phone') ?></th>
                                            <td><?= h($builder->phone) ?></td>
                                        </tr>
                                        <?php
                                    }

                                }else if($userview->type== 'Buyer'){
                                    if(@($buyer->address) == null){ ?>

                                        <tr>
                                            <th><?= __('Address') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>

                                        <?php
                                    }
                                    else{
                                        ?>

                                        <tr>
                                            <th><?= __('Address') ?></th>
                                            <td><?= h($buyer->address) ?></td>
                                        </tr>
                                        <?php
                                    }

                                }
                                ?>


                                <?php  if(($userview->type)=='Seller'){
                                    if(@($seller->phone) == null){  ?>
                                        <tr>
                                            <th><?= __('Phone') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>

                                        <?php
                                    }
                                    else{
                                        ?>

                                        <tr>
                                            <th><?= __('Phone') ?></th>
                                            <td><?= h($seller->phone) ?></td>
                                        </tr>


                                        <?php
                                    }
                                    ?>
                                    <?php
                                }  else if($userview->type== 'Builder'){
                                    if(@($builder->email == null)) { ?>

                                        <tr>
                                            <th><?= __('E-mail') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <tr>
                                            <th><?= __('E-mail') ?></th>
                                            <td><?= h($builder->email) ?></td>
                                        </tr>
                                        <?php
                                    }

                                }else if($userview->type== 'Buyer'){
                                    if(@($buyer->email) == null){ ?>

                                        <tr>
                                            <th><?= __('E-mail') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>

                                        <?php
                                    }
                                    else{
                                        ?>

                                        <tr>
                                            <th><?= __('E-mail') ?></th>
                                            <td><?= h($buyer->email) ?></td>
                                        </tr>
                                        <?php
                                    }

                                }
                                ?>


                                <?php  if(($userview->type)=='Seller'){
                                    if(@($seller->bsb) == null){  ?>
                                        <tr>
                                            <th><?= __('BSB') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>

                                        <?php
                                    }
                                    else{
                                        ?>

                                        <tr>
                                            <th><?= __('BSB') ?></th>
                                            <td><?= h($seller->bsb) ?></td>
                                        </tr>


                                        <?php
                                    }
                                    ?>
                                    <?php
                                }  else if($userview->type== 'Builder'){
                                    if(@($builder->address == null)) { ?>

                                        <tr>
                                            <th><?= __('Address') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <tr>
                                            <th><?= __('Address') ?></th>
                                            <td><?= h($builder->address) ?></td>
                                        </tr>
                                        <?php
                                    }

                                }else if($userview->type== 'Buyer'){
                                    if(@($buyer->phone) == null){ ?>

                                        <tr>
                                            <th><?= __('Phone') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>

                                        <?php
                                    }
                                    else{
                                        ?>

                                        <tr>
                                            <th><?= __('Phone') ?></th>
                                            <td><?= h($buyer->phone) ?></td>
                                        </tr>
                                        <?php
                                    }

                                }
                                ?>


                                <?php  if(($userview->type)=='Seller'){
                                    if(@($seller->accountno) == null){  ?>
                                        <tr>
                                            <th><?= __('Account Number') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>

                                        <?php
                                    }
                                    else{
                                        ?>

                                        <tr>
                                            <th><?= __('Account Number') ?></th>
                                            <td><?= h($seller->accountno) ?></td>
                                        </tr>


                                        <?php
                                    }
                                    ?>
                                    <?php
                                }  else if($userview->type== 'Builder'){
                                    if(@($builder->description == null)) {?>

                                        <tr>
                                            <th><?= __('Description') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>

                                        <?php
                                        }
                                        else{ ?>

                                            <tr>
                                                <th><?= __('Description') ?></th>
                                                <td><?= h($builder->description) ?></td>
                                            </tr>

                                            <?php
                                        }
                                    if(@($builder->city == null)) {?>

                                        <tr>
                                            <th><?= __('City') ?></th>
                                            <td>This User has not fill this part. </td>
                                        </tr>

                                        <?php
                                        }
                                    else{ ?>

                                        <tr>
                                            <th><?= __('City') ?></th>
                                            <td><?= h($builder->city) ?></td>
                                        </tr>

                                        <?php
                                    }
                                if(@($builder->state == null)) {?>
                                    <tr>
                                        <th><?= __('State') ?></th>
                                        <td>This User has not fill this part. </td>
                                    </tr>
                                    <?php
                                }
                                else{ ?>

                                    <tr>
                                        <th><?= __('State') ?></th>
                                        <td><?= h($builder->state) ?></td>
                                    </tr>

                                    <?php
                                }
                                if(@($builder->postcode == null)) {?>
                                    <tr>
                                        <th><?= __('Postcode') ?></th>
                                        <td>This User has not fill this part. </td>
                                    </tr>


                                    <?php
                                }
                                else{ ?>

                                    <tr>
                                        <th><?= __('Postcode') ?></th>
                                        <td><?= h($builder->postcode) ?></td>
                                    </tr>

                                    <?php
                                }
                                }else if($userview->type== 'Buyer'){?>


                                    <?php
                                }
                                ?>
                                <tr>
                                    <th><?= __('Createtime') ?></th>
                                    <td><?= h($userview->createtime) ?></td>
                                </tr>

                                <tr>
                                    <th><?= __('Modifiedate') ?></th>
                                    <td><?= h($userview->modifiedate) ?></td>
                                </tr>

                            </table>



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
