<?php $this->load->view('template/header'); ?>



<div class="header"> 
    <h1 class="page-header">
        Users <small>This is a list of your users</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url() ?>">Home</a></li>
        <li class="active">Users</li>
    </ol>         
</div>

<div id="page-inner"> 
				 
				
    <div class="row">
     
        <div class="col-md-12">

            <!-- Advanced Tables -->
            <div class="panel panel-default">

                <div class="panel-heading">
                        Users
                        <a rel="button" href="<?= site_url() ?>/user/add/" class="btn btn-sm btn-info pull-right" style="margin-top: -5px;">Add New</a>
                </div>
                <div class="panel-body">

                    <?php if(isset($users) && is_array($users) && count($users) > 0) :?>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="advanced_data_tables">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Created By</th>
                                    <th>Last Modified</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($users as $user): ?>
                                    <tr>
                                        <td><?= $user['user_id'] ?></td>
                                        <td><?= $user['name'] ?></td>
                                        <td><?= $user['username'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['phone'] ?></td>
                                        <td><?= $user['type'] ?></td>
                                        <td><a href="<?= site_url() ?>/user/profile/<?= $user['createdby'] ?>"><?= $user['created_by_username'] ?><a/></td>
                                        <td><?= (empty($user['modifiedon']))?$user['createdon']:$user['modifiedon'] ?></td>
                                        <td><a rel="button" class="btn btn-sm btn-primary" href="<?= site_url() ?>/activity/user/<?= $user['user_id'] ?>">Activities<a/> <a rel="button" class="btn btn-sm btn-primary" href="<?= site_url() ?>/customer/user/<?= $user['user_id'] ?>">Customers<a/></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <?php else: ?>

                        <div class="alert alert-warning">No Users Found.</div>

                    <?php endif ?>
                </div>

            </div>    
        </div>

    </div>



</div>


<?php $this->load->view('template/footer'); ?>