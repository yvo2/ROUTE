<?php
require_once '../repository/UserRepository.php';

class UserController {

    public function index() {
      $userRepository = new UserRepository();
      $view = new View('user_index');
      $view->title = 'Benutzer';
      $view->heading = 'Benutzer';
      $view->users = $userRepository->readAll();
      $view->display();
    }

    public function register() {
      $view = new View('user_register');
      $view->title = "Register";
      $view->valid = true;
      $view->email = '';
      $view->emailValidationMessage = '';
      $view->passwordValidationMessage = '';

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        @$email = $_POST["rt-email"];
        @$password = $_POST["rt-password"];

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $view->emailValidationMessage = "Bitte eine valide Email-Addresse eingeben.";
          $view->valid = false;
        }

        if (strlen($password) < 8) {
          $view->passwordValidationMessage = "Bitte Passwort eingeben, welches mindestens 8 Zeichen lang ist.";
          $view->valid = false;
        }

        $view->email = $email;
      }
      $view->display();
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
