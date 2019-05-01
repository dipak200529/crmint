<?php $this->load->view('template/header'); ?>


<div class="header"> 
    <h1 class="page-header">
        FAQ <small>Manual of your app</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url() ?>">Home</a></li>
        <li class="active">FAQ</li>
    </ol>         
</div>

<div id="page-inner"> 
				 
				
    <div class="row">
     
        <div class="col-md-12">

            <!-- Advanced Tables -->
            <div class="panel panel-default">

                <div class="panel-heading">
                        Frequently Asked Questions 
						<a rel="button" href="<?= site_url() ?>/faq/add/" class="btn btn-sm btn-info pull-right" style="margin-top: -5px;">Add New</a>
                </div>
                <div class="panel-body">

                    <?php if(isset($faq) && is_array($faq) && count($faq) > 0) :?>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="advanced_data_tables">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ques</th>
									<th></th>
                                    <th>Created By</th>
                                    <th>Created On</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($faq as $faq): ?>
                                    <tr>
                                        <td><?= $faq['faq_id'] ?></td>
                                        <td><?= $faq['ques'] ?></td>
										<td><button class="btn btn-sm btn-info" data-desc="<?= $faq['ans'] ?>" onclick="viewModal(this);">Answer</button></td>
                                        <td><a href="<?= site_url() ?>/user/profile/<?= $faq['createdby'] ?>"><?= $faq['createdby'] ?><a/></td>
                                        <td><?= $faq['createdon']?></td>                                        
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <?php else: ?>

                        <div class="alert alert-warning">No FAQ Found.</div>

                    <?php endif ?>
                </div>

            </div>    
        </div>

    </div>



</div>


<div class="modal fade" id="faq_desc_modal" tabindex="-1" role="dialog" aria-labelledby="faq_desc_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="faq_desc_modalLabel">Description</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<?php $this->load->view('template/footer'); ?>