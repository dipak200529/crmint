<?php $this->load->view('template/header'); ?>

<div class="header"> 
    <h1 class="page-header">
        Add FAQ <small>This is for adding new FAQ</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url() ?>">Home</a></li>
        <li><a href="<?= site_url() ?>/faq/list">FAQ</a></li>
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
                    FAQ Details Form
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <form method="post" action="<?= site_url() ?>/faq/add" role="form">

                                <?php if($user['type'] == "Admin"): ?>
								
								<div class="form-group">
                                    <label>Question</label>
                                    <textarea name="ques" class="form-control"><?php echo set_value('ques'); ?></textarea>
                                    <?php if(form_error('ques')) : ?>
                                        <?= form_error('ques') ?>                                    
                                </div>
                                    <?php endif ?>
                                <div class="form-group">
                                    <label>Answer</label>
                                    <textarea name="ans" class="form-control"><?php echo set_value('ans'); ?></textarea>
                                    <?php if(form_error('ans')) : ?>
                                        <?= form_error('ans') ?>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Submit" class="btn btn-primary pull-right">
                                </div>
								<?php endif ?>
                                
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