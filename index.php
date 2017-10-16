<?php
session_start();

// Site information
$title = 'RoundTripper';
$page = 'Home';

// User inputs
@$homebase = $_POST["rt-homebase"];
@$via = $_POST["rt-via"];

 ?>
 <!DOCTYPE HTML>
 <html>
  <?php
    require 'components/head.php'
  ?>
  <body>
    <?php
      require 'components/search.php';
     ?>
     <?php
      require 'components/results.php';
      ?>
  </body>
 </html>
