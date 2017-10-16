<?php
if (isset($title) && isset($page)) {
  $title = $title . ' - ' . $page;
} else {
  $title = 'ROUTE';
}

?>
<head>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
  <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
  <link href="style/style.css" rel="stylesheet">
  <link href="style/dist/bootstrap.min.css" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

</head>
