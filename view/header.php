<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title><?= $title ?> - ROUTE</title>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

</head>
<body>
    <div class="navbar navbar-dark">
      <div class="container d-flex justify-content-between">
        <a href="/" class="navbar-brand">ROUTE</a>
        <div class="form-inline my-2 my-lg-0">
          <?php if ($user->signedIn) { ?>
          <a href="/User" class="text-white textmargin"><?= "Hallo, " . $user->email . "." ?></a>
          <a href="/User/logout" class="text-white">Abmelden</a>
        <?php } else { ?>
          <a href="/User/register" class="text-white textmargin">Registrieren</a>
          <a href="/User/login" class="text-white">Anmelden</a>
        <?php } ?>
        </div>
      </div>

    </div>

    <div class="album text-muted">
      <div class="container">
