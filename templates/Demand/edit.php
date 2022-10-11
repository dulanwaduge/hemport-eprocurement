<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Demand $demand
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

    <title>Edit Item</title>
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
                            <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'seller', 'action'=>'edit']); ?>">
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
                    <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>

                </div>

                <!-- Content Row -->
                <div class="column-responsive column-80">
                    <div class="seller form content">
                        <?= $this->Form->create($demand,['type'=>'file']) ?>
                        <fieldset>
                            <?php
                            echo $this->Form->control('demand',['label'=>'Demand(*)']);
                            echo $this->Form->control('amount',['label'=>'Demand Quantity(*)']);
                            echo '<div class="row" style="margin-left:0.8px">';
                            echo 'Demand Description(*)';
                            echo $this->Form->textarea('description', ['style'=>'margin-left:15px; margin-bottom:6px; width:194px']);
                            echo '</div>';
                            echo $this->Form->control('image_file',['type'=>'file','label'=>'Image Upload']);
                            echo $this->Form->control('business_name',['label'=>'Business Name(*)']);
                            echo $this->Form->control('business_num',['type' => 'phone','label'=>'Business Contact Number(*)','pattern'=>'([0-9])+','maxlength'=>'10', 'minlength'=>'10','title'=>'Phone number can only use numbers and be a maximum of 11 characters long']);
                            echo $this->Form->control('business_email',['type' => 'email','label'=>'Business Email(*)']);
                            echo $this->Form->control('business_address',['label'=>'Business Address(*)']);
                            echo $this->Form->control('city',['label'=>'City(*)']);
                            echo 'State*';
                            echo $this->Form->select('state',['ACT'=>'ACT','NSW'=>'NSW','NT'=>'NT','Qld'=>'QLD','SA'=>'SA','Vic'=>'VIC','Tas'=>'TAS','WA'=>'WA'], ['style'=>'margin-left:140px;margin-bottom: 5px;']);
                            echo $this->Form->control('postcode',['label'=>'Postcode(*)','pattern'=>'([0-9])+','maxlength'=>'4', 'minlength'=>'4','title'=>'Postcode can only use numbers and be a maximum of 4 characters long']);
                            echo $this->Form->control('ABN',['label'=>'ABN(*)','pattern'=>'([0-9])+','maxlength'=>'11', 'minlength'=>'11','title'=>'ABN can only use numbers and be a maximum of 11 characters long']);

                            ?>
                        </fieldset>

                        <?= $this->Form->button(__('Submit'),['style'=>'margin-left:-2px']) ?>
                        <button class="back-btn " ><a  href="<?= $this->Url->build(['controller' => 'Demand', 'action'=>'index']); ?>" style="color: white;">Back </a>    </button>
                        <?= $this->Form->end() ?>
                    </div>
                </div>

                <?php echo $this->Flash->render() ?>


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
                    <div class="modal-body" style="margin-left: 25px;">Select "Delete" below if you are ready to end your current session. <p style='font-size:14px'>*Your account cannot be recovered after deletion, any subsequent listings will be deleted too.</p></div>
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
