<?php $this->load->view('template/header'); ?>



<div class="header"> 
    <h1 class="page-header">
        Customers <small>This is a list of your customers</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url() ?>">Home</a></li>
        <li class="active">Customers</li>
    </ol>         
</div>

<div id="page-inner"> 
				 
				
    <div class="row">
     
        <div class="col-md-12">

            <!-- Advanced Tables -->
            <div class="panel panel-default">

                <div class="panel-heading">
                        Customers
                        <a rel="button" href="<?= site_url() ?>/customer/add/" class="btn btn-sm btn-info pull-right" style="margin-top: -5px;">Add New</a>
                </div>
                <div class="panel-body">

                    <?php if(isset($customers) && is_array($customers) && count($customers) > 0) :?>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="advanced_data_tables">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Last Activity</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($customers as $customer): ?>
                                    <tr>
                                        <td><?= $customer['cust_id'] ?></td>
                                        <td><?= $customer['name'] ?></td>
                                        <td><?= $customer['email'] ?></td>
                                        <td><?= $customer['phone'] ?></td>
                                        <td><?= $customer['address'] ?></td>
                                        <td><?= $customer['status'] ?></td>
                                        <td><a href="<?= site_url() ?>/user/profile/<?= $customer['createdby'] ?>"><?= $customer['created_by_username'] ?><a/></td>
                                        <td><?= (empty($customer['modifiedon']))?$customer['createdon']:$customer['modifiedon'] ?></td>
                                        <td><a rel="button" class="btn btn-sm btn-primary" href="<?= site_url() ?>/activity/customer/<?= $customer['cust_id'] ?>">Activities<a/></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <?php else: ?>

                        <div class="alert alert-warning">No Customers Found.</div>

                    <?php endif ?>
                </div>

            </div>    
        </div>

    </div>



</div>


<?php $this->load->view('template/footer'); ?>