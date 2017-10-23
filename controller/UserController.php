<?php
require_once '../repository/UserRepository.php';
require_once '../lib/SessionManager.php';
require_once '../lib/Controller.php';

class UserController extends Controller {

    public function index() {
      $userRepository = new UserRepository();
      $view = new View('user_index');
      $view->title = 'Benutzer';
      $view->heading = 'Benutzer';
      $view->users = $userRepository->readAll();
      $view->user = $this->getUser();
      $view->display();
    }

    public function register() {
      $userRepository = new UserRepository();
      $sessionManager = new SessionManager();
      $view = new View('user_register');
      $view->user = $this->getUser();
      $view->title = "Register";
      $view->valid = true;
      $view->email = '';
      $view->emailValidationMessage = '';
      $view->passwordValidationMessage = '';
      $view->passwordValidationRepeatMessage = '';

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        @$email = $_POST["rt-email"];
        @$password = $_POST["rt-password"];
        @$passwordrepeat = $_POST["rt-password-repeat"];

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $view->emailValidationMessage = "Bitte eine valide Email-Addresse eingeben.";
          $view->valid = false;
        }

        if (strlen($password) < 8) {
          $view->passwordValidationMessage = "Bitte Passwort eingeben, welches mindestens 8 Zeichen lang ist.";
          $view->valid = false;
        }

        if (strlen($passwordrepeat) < 8) {
          $view->passwordValidationRepeatMessage = "Bitte das Passwort wiederholen.";
          $view->valid = false;
        }

        if (!($passwordrepeat == $password)) {
          $view->passwordValidationRepeatMessage = "Bitte das Passwort korrekt wiederholen.";
          $view->valid = false;
        }

        if ($view->valid) {
          try {
            // Create user in database
            $id = $userRepository->create($email, $password);
            $sessionManager->signInAsId($id);
            header("Location: /?registered=true");
            die('<a href="/?registered=true">Weiter.</a>');
          } catch (Exception $e) {
            die('Ein Fehler ist aufgetreten.');
          }
        }

        $view->email = $email;
      }
      $view->display();
    }

    public function login() {
      $view = new View('user_login');
      $view->user = $this->getUser();
      $view->email = '';
      $view->password = '';
      $view->loginSummary = '';

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userRepository = new userRepository();
        $sessionManager = new SessionManager();

        @$email = $_POST["rt-email"];
        @$password = $_POST["rt-password"];

        $view->email = $email;

        if ($userRepository->existsUser($email, $password)) {
          $id = $userRepository->readByCredentials($email, $password)->id;
          $sessionManager->signInAsId($id);
          header("Location: /User?login=true");
          die('<a href="/User?login=true">Weiter.</a>');
        } else {
          $view->loginSummary = 'Benutzername oder Passwort sind falsch.';
        }
      }

      $view->display();
    }

    public function logout() {
      session_destroy();
      header("Location: /");
      die('<a href="/">Weiter.</a>');
    }

    public function create() {
        $view = new View('user_create');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->display();
    }

    public function doCreate() {
        if ($_POST['send']) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userRepository = new UserRepository();
            $userRepository->create($firstName, $lastName, $email, $password);
        }
        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function delete() {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);
        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
