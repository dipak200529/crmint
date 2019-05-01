<?php $this->load->view('template/header'); ?>

<div class="header"> 
    <h1 class="page-header">
        User Profile <small>This is a user profile</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url() ?>">Home</a></li>
        <li class="active">Profile</li>
    </ol>         
</div>

<div id="page-inner"> 
				 
				
    <div class="row">
     
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Information</div>        
                                   
                    <div class="panel-body"> 
                        <p><strong>Username : <?= $user_profile['username'] ?></strong> </p>
                        <p><strong>Name : <?= $user_profile['name'] ?></strong> </p>
                        <p><strong>Email : <?= $user_profile['email'] ?></strong> </p>
                        <p><strong>Phone : <?= $user_profile['phone'] ?></strong> </p>
                        <p><strong>Type : <?= $user_profile['type'] ?></strong> </p>
                    </div>
                </div>
            </div>						
        </div>

    </div>



</div>

<?php $this->load->view('template/footer'); ?>