<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRMINT | CRM TOOL</title>
	<!-- Bootstrap Styles-->
    <link href="<?= base_url() ?>assets/blue/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="<?= base_url() ?>assets/blue/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="<?= base_url() ?>assets/blue/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <!-- TABLE STYLES-->
   <link href="<?= base_url() ?>assets/blue/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">

    <?php $this->load->view('template/nav-top'); ?>

    <?php if(isset($user) && !empty($user) ) $this->load->view('template/nav-side'); ?>
    
    <div id="page-wrapper" <?php if(!isset($user) || empty($user) ): ?> class="login-view" <?php endif; ?>>