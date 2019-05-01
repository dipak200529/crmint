<?php $this->load->view('template/header'); ?>

<div class="header"> 
    <h1 class="page-header">
        Add User <small>This is for adding new users</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url() ?>">Home</a></li>
        <li><a href="<?= site_url() ?>/user/list">Users</a></li>
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
                    Users Details Form
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <?php echo validation_errors(); ?>
                            <form method="post" action="<?= site_url() ?>/user/add" role="form">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="" value="<?php echo set_value('name'); ?>">
                                    <?php if(form_error('name')) : ?>
                                        <?= form_error('name') ?>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="" value="<?php echo set_value('username'); ?>">
                                    <?php if(form_error('username')) : ?>
                                        <?= form_error('username') ?>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="" value="">
                                    <?php if(form_error('password')) : ?>
                                        <?= form_error('password') ?>
                                    <?php endif ?>
                                </div>
                                
                                <div class="form-group">
                                    <label>Repeat Password</label>
                                    <input type="password" name="repeat_password" class="form-control" placeholder="" value="">
                                    <?php if(form_error('repeat_password')) : ?>
                                        <?= form_error('repeat_password') ?>
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
                                    <label>Type</label>
                                    <select name="type" class="form-control">
                                        <option value="0">--SELECT--</option>
                                        <option value="Admin" <?php if(set_value('type') == 'Admin') echo 'selected="selected"' ?>>Admin</option>
                                        <option value="User"> <?php if(set_value('type') == 'User') echo 'selected="selected"' ?>User</option>
                                    </select>
                                    <?php if(form_error('type')) : ?>
                                        <?= form_error('type') ?></p>
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