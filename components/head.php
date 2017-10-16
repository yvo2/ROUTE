<?php
if (isset($title) && isset($page)) {
  $title = $title . ' - ' . $page;
} else {
  $title = 'RoundTripper';
}

?>
<head>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
</head>
