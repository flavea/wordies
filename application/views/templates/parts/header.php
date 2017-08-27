<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $title ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="subject" content="Writing">
    <meta name="url" content="https://wordies.org/">
    <meta name="rating" content="General">
    <meta name="format-detection" content="telephone=no">
    <meta name="author" content="wordies.com">

    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $title ?>" />
    <?php if($explanation) { ?>
    <meta property="og:description" content="<?php echo $explanation ?>" />
    <?php } ?>
    <?php if($image) { ?>
    <meta property="og:image" content="<?php echo $image ?>" />
    <?php } else { ?>
    <meta property="og:image" content="<?=base_url();?>assets/img/logo.png ?>">
    <?php } ?>


    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@wordies">
    <meta name="twitter:creator" content="@wordies">
    <meta name="twitter:title" content="<?php echo $title ?>">
    <?php if($image) { ?>
    <meta name="twitter:image" content="<?php echo $image ?>">
    <?php } else { ?>
    <meta name="twitter:image" content="<?=base_url();?>img/logo.png ?>">
    <?php } ?>


    <?php if($explanation) { ?>
    <meta name="twitter:description" content="<?php echo $explanation; ?>">
    <?php } ?>

    <meta name="theme-color" content="#facac0">

    <script src="<?=base_url();?>assets/js/vendor/jquery.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text|Libre+Baskerville|Source+Sans+Pro" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>
    <script src="<?=base_url();?>assets/js/uikit.min.js"></script>
    <script src="<?=base_url();?>assets/js/uikit-icons.min.js"></script>
    <script src="<?=base_url();?>assets/js/app.js"></script>
    <script src="<?php echo base_url().'assets/js/app/'.$the_view ?>.js"></script>
    <link rel="stylesheet" href="<?=base_url();?>assets/css/uikit.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/app.css" />
    <link rel="icon" href="<?=base_url();?>assets/img/logo.png" sizes="any" type="image/png">
    <!--<meta name="keywords" content="<?php echo $header->keywords;?>">
    <meta name="description" content="<?php echo $header->description;?>">-->

</head>
<body>