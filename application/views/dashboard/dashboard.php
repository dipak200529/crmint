<?php $this->load->view('template/header'); ?>


<div class="header"> 
    <h1 class="page-header">
        Dashboard <small>Summary of your App</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url() ?>">Home</a></li>
        <li class="active">Dashboard</li>
    </ol>         
</div>

<div id="page-inner">

<!-- /. ROW  -->

<div class="row">
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center no-boder blue">
            <div class="panel-left pull-left blue">
                <i class="fa fa-eye fa-5x"></i>
                
            </div>
            <div class="panel-right">
                <h3><?php if($stats['customers'] && isset($stats['customers']->c)) echo intval($stats['customers']->c); else echo 0; ?></h3>
               <strong> No. of Customers</strong>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center no-boder blue">
            <div class="panel-left pull-left blue">
                <i class="fa fa fa-comments fa-5x"></i>
               
            </div>
            <div class="panel-right">
             <h3><?php if($stats['activities'] && isset($stats['activities']->c)) echo intval($stats['activities']->c); else echo 0; ?></h3>
               <strong>No. of Activities</strong>

            </div>
        </div>
    </div>

    <?php if($user['type'] == 'Admin'): ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center no-boder blue">
            <div class="panel-left pull-left blue">
                <i class="fa fa-users fa-5x"></i>
                
            </div>
            <div class="panel-right">
            <h3><?php if($stats['users'] && isset($stats['users']->c)) echo intval($stats['users']->c); else echo 0; ?></h3>
             <strong>No. of Users</strong>

            </div>
        </div>
    </div>
    <?php endif ?>
</div>



</div>



<?php $this->load->view('template/footer'); ?>