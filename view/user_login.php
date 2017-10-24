<div class="container">
  <h1 class="jumbotron-heading">EINLOGGEN</h1>
  <p class="lead text-muted">Melde dich an. Noch keinen Account? <a href="/User/register"> Registrieren.</a></p>
  <form method="post" class="rt-register">
    <label class="text-muted" for="rt-email">Email: </label><input value="<?= $email ?>" placeholder="Email-Adresse" class="form-control" id="rt-email" name="rt-email" type="email" onchange="emLength()"><br>
    <div class="rt-validation" id="validation-email2"></div>
    <label class="text-muted" for="rt-password">Passwort: </label><input placeholder="Passwort" class="form-control" id="rt-password" name="rt-password" type="password" onchange="pwLength()"><br>
    <div class="rt-validation"><?= $loginSummary ?></div>
    <input class="rt-btn btn btn-primary" type="submit" value="Los gehts!">
  </form>
</div>
