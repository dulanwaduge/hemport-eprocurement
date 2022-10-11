<?php if ($type == 'Admin') { ?>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $this->Url->build(['controller' => 'home', 'action'=>'index']); ?>">
            <?= $this->Html->image('logo_white.png'); ?>
<!--            <div class="sidebar-brand-text mx-3"> </div>-->
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link " href="<?= $this->Url->build(['controller' => 'users', 'action'=>'index']); ?>" >
                <span>Manage Users</span>
            </a>
        </li>
        <!-- Nav Item - View orders made by buyers -->
        <li class="nav-item">
            <a class="nav-link " href="<?= $this->Url->build(['controller' => 'projects', 'action'=>'index2']); ?>" >
                <span>Manage Project</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="<?= $this->Url->build(['controller' => 'demand', 'action'=>'index']); ?>" >
                <span>Manage Demand</span>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link " href="<?= $this->Url->build(['controller' => 'quotation', 'action'=>'index']); ?>" >
                <span>Manage Quotation</span>
            </a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link " href="<?= $this->Url->build(['controller' => 'admins', 'action'=>'index']); ?>" >
                <span>Change content</span>
            </a>
        </li>
    </ul>
<?php } else if ($type == 'Seller') { ?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $this->Url->build(['controller' => 'home', 'action'=>'index']); ?>">
        <?= $this->Html->image('hemporticonwhite.ico'); ?>
        <div class="sidebar-brand-text mx-3">Hemport </div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link " href="<?= $this->Url->build(['controller' => 'seller', 'action'=>'edit']); ?>" >
            <span>User Profile</span>
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
                <?php if (isset($type) && $type == 'Buyer') {?>
                    <a class="collapse-item" href="<?= $this->Url->build(['controller' => 'demand', 'action'=>'add']); ?>">New Demand</a>
                <?php }?>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="<?= $this->Url->build(['controller' => 'quotation', 'action'=>'index']); ?>" >
            <span>Manage Quotation</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
</ul>
<?php } else if ($type == 'Buyer') {?>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $this->Url->build(['controller' => 'home', 'action'=>'index']); ?>">
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


        <li class="nav-item">
            <a class="nav-link " href="<?= $this->Url->build(['controller' => 'demand', 'action' => 'pay']); ?>" >
                <span>Subscription</span>
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
                    <?php if (isset($type) && $type == 'Buyer') {?>
                        <a class="collapse-item" href="<?= $this->Url->build(['controller' => 'demand', 'action'=>'add']); ?>">New Demand</a>
                    <?php }?>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="<?= $this->Url->build(['controller' => 'quotation', 'action'=>'index']); ?>" >
                <span>View Quotation</span>
            </a>
        </li>
        <!-- Nav Item - Charts -->
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    </ul>
<?php } ?>
