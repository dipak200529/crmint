<?php $this->load->view('template/header'); ?>

<div class="header"> 
    <h1 class="page-header">
        Add Customer <small>This is for adding new customers</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url() ?>">Home</a></li>
        <li><a href="<?= site_url() ?>/customer/list">Customers</a></li>
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
                    Customer Details Form
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <form method="post" action="<?= site_url() ?>/customer/add" role="form">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="E.g. Mamata Modi" value="<?php echo set_value('name'); ?>">
                                    <?php if(form_error('name')) : ?>
                                        <?= form_error('name') ?>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="abc@example.com" value="<?php echo set_value('email'); ?>">
                                    <?php if(form_error('email')) : ?>
                                        <?= form_error('email') ?>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="9999999999" max-length="10" min-lenght="10" value="<?php echo set_value('phone'); ?>">
                                    <?php if(form_error('phone')) : ?>
                                        <?= form_error('phone') ?>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control" placeholder="1, A. J. C. Bose Road, Kolkata - 700001"><?php echo set_value('address'); ?></textarea>
                                    <?php if(form_error('address')) : ?>
                                        <?= form_error('address') ?>
                                    <?php endif ?>
                                </div>

                                <?php if($user['type'] == "Admin"): ?>

                                <div class="form-group">
                                    <label>Created By</label>
                                    <select name="lead_user" class="form-control">
                                        <option value="0">--SELECT--</option>
                                        <?php foreach($users as $u): ?>
                                            <option value="<?= $u['user_id'] ?>" <?php if($user['user_id'] == $u['user_id']) echo 'selected="selected"' ?>><?= $u['username'] . ' - ' . $u['name']  ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if(form_error('lead_user')) : ?>
                                        <?= form_error('lead_user') ?></p>
                                    <?php endif ?>
                                </div>

                                <?php endif; ?>

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