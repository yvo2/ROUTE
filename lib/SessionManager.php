<?php

require_once '../repository/UserRepository.php';

class SessionManager {

    public signInAsId($id) {
      $_SESSION["userId"] = $id;
    }

    public isSignedIn() {
      return isset($_SESSION["userId"]);
    }

    public getUser() {
      if (!$this->isSignedIn()) {
        return false;
      }

      return $userRepository->readById($_SESSION["userId"]);
    }

}

 ?>
