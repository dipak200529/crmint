<?php $this->load->view('template/header'); ?>

<div class="header"> 
    <h1 class="page-header">
        Add Activity <small>This is for adding new activities</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url() ?>">Home</a></li>
        <li><a href="<?= site_url() ?>/activity/list">Activities</a></li>
        <li class="active">Add New</li>
    </ol>         
</div>

<div id="page-inner"> 
				 
				
    <div class="row">
     
        <div class="col-md-12">
            <?php if(isset($error_msg) && !empty($error_msg)): ?>
                <div class="alert alert-danger"><?= $error_msg ?></div>
            <?php endif ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Activity Details Form
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <form method="post" action="<?= site_url() ?>/activity/add" role="form">

                                <?php if($user['type'] == "Admin"): ?>
                                <div class="form-group">
                                    <label>Created For</label>
                                    <select name="fk_user_id" class="form-control">
                                        <option value="0">--SELECT--</option>
                                        <?php foreach($users as $u): ?>
                                            <option value="<?= $u['user_id'] ?>" <?php if($user['user_id'] == $u['user_id']) echo 'selected="selected"' ?>><?= $u['username'] . ' - ' . $u['name']  ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if(form_error('fk_user_id')) : ?>
                                        <?= form_error('fk_user_id') ?></p>
                                    <?php endif ?>
                                </div>
                                <?php endif ?>

                                <div class="form-group">
                                    <label>Customer</label>
                                    <select name="fk_cust_id" class="form-control">
                                        <option value="0">--SELECT--</option>
                                        <?php foreach($customers as $c): ?>
                                            <option value="<?= $c['cust_id'] ?>" <?php if($c['cust_id'] == set_value('fk_cust_id')) echo 'selected="selected"' ?>><?= $c['name']  ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if(form_error('fk_cust_id')) : ?>
                                        <?= form_error('fk_cust_id') ?></p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label>Activity Type</label>
                                    <select name="activity_type" class="form-control">
                                        <option value="0">--SELECT--</option>
                                        <option value="call" <?php if(set_value('activity_type') == 'call') echo 'selected="selected"' ?>>Call</option>
                                        <option value="email" <?php if(set_value('activity_type') == 'email') echo 'selected="selected"' ?>>Email</option>
                                        <option value="visit" <?php if(set_value('activity_type') == 'visit') echo 'selected="selected"' ?>>Visit</option>
                                    </select>
                                    <?php if(form_error('activity_type')) : ?>
                                        <?= form_error('activity_type') ?></p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control"><?php echo set_value('description'); ?></textarea>
                                    <?php if(form_error('description')) : ?>
                                        <?= form_error('description') ?>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Submit" class="btn btn-primary pull-right">
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>


        </div>

    </div>



</div>

<?php $this->load->view('template/footer'); ?>