<div class="container">
  <h1 class="jumbotron-heading">REGISTRIEREN</h1>
  <p class="lead text-muted">Registriere dich und geniesse Vorteile wie die Kommentarfunktion!</p>
  <form method="post" class="rt-register">
    <label class="text-muted" for="rt-email">Email: </label><input value="<?= $email ?>" placeholder="Email-Addresse" class="form-control" id="rt-email" name="rt-email" type="email"><br>
    <div class="rt-validation"><?= $emailValidationMessage ?></div>
    <label class="text-muted" for="rt-password">Passwort: </label><input placeholder="Passwort" class="form-control" id="rt-password" name="rt-password" type="password"><br>
    <div class="rt-validation"><?= $passwordValidationMessage ?></div>
    <input class="rt-btn btn btn-primary"type="submit" value="Los gehts!">
  </form>
</div>
