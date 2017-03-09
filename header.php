<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    
    <title>University School of Milwaukee<?php if (isset($PageTitle)) echo " | " . $PageTitle; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    
    <meta name="description" content="">
    <meta name="keywords" content="">
    
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Serif:400,700|Open+Sans:300,400,600,700,800">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="inc/jquery.mmenu.css" type="text/css">
    <link rel="stylesheet" href="inc/main.css?<?php echo filemtime('inc/main.css'); ?>">
    
    <script type="text/javascript" src="inc/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="inc/jquery.mmenu.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("a[href^='http'], a[href$='.pdf']").not("[href*='" + window.location.host + "']").attr('target','_blank');

        // Mobile menu dropdowns
        $("#my-menu").mmenu({
          "navbar": { "title": '<a href="#my-page">&times</a>' },
          "extensions": [ "pagedim-black" ]
        });
      });
    </script>
  </head>
  <body<?php if (isset($BodyStyle)) echo " class=\"" . $BodyStyle . "\""; ?>>
    <div id="my-page"> <!-- For mobile menu -->
      
      <div class="sticky-spacer"></div>

      <div class="sticky-header">
        <div class="site-width">
          <a href="." class="logo">
            Our Common Bond
            <div>The Campaign for University School of Milwaukee</div>
          </a>
          
          <a href="#my-menu" class="my-menu-toggle"></a>
          <div class="menu"><?php include "menu.php" ?></div>
        </div>
      </div>
      