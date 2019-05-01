<?php $this->load->view('template/header'); ?>



<div class="header"> 
    <h1 class="page-header">
        Activities <small>This is a list of your Activities</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url() ?>">Home</a></li>
        <li class="active">Activities</li>
    </ol>         
</div>

<div id="page-inner"> 
				 
				
    <div class="row">
     
        <div class="col-md-12">

            <!-- Advanced Tables -->
            <div class="panel panel-default">

                <div class="panel-heading">
                        Activities
                        <a rel="button" href="<?= site_url() ?>/activity/add/" class="btn btn-sm btn-info pull-right" style="margin-top: -5px;">Add New</a>
                </div>
                <div class="panel-body">

                    <?php if(isset($activities) && is_array($activities) && count($activities) > 0) :?>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="advanced_data_tables">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>User</th>
                                    <th>Type</th>
                                    <th>Created By</th>
                                    <th>Last Activity</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($activities as $activity): ?>
                                    <tr>
                                        <td><?= $activity['activity_id'] ?></td>
                                        <td><a href="<?= site_url() ?>/customer/view/<?= $activity['fk_cust_id'] ?>"><?= $activity['cust_name'] ?></a></td>
                                        <td><a href="<?= site_url() ?>/user/profile/<?= $activity['fk_user_id'] ?>"><?= $activity['username'] ?></a></td>
                                        <td><?= ucfirst($activity['activity_type']) ?></td>
                                        <td><a href="<?= site_url() ?>/user/profile/<?= $activity['createdby'] ?>"><?= $activity['created_by_username'] ?><a/></td>
                                        <td><?= (empty($activity['modifiedon']))?$activity['createdon']:$activity['modifiedon'] ?></td>
                                        <td><button class="btn btn-sm btn-info" data-desc="<?= $activity['description'] ?>" onclick="viewModal(this);">Description</button></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <?php else: ?>

                        <div class="alert alert-warning">No Activities Found.</div>

                    <?php endif ?>
                </div>

            </div>    
        </div>

    </div>



</div>


<div class="modal fade" id="activity_desc_modal" tabindex="-1" role="dialog" aria-labelledby="activity_desc_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="activity_desc_modalLabel">Description</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('template/footer'); ?>