<?php
require_once '../lib/Repository.php';
/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class UserRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'user';
    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($email, $password) {
        $password = hash ("sha256" , $password);
        $query = "INSERT INTO $this->tableName (email, password) VALUES (?, ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $email, $password);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        return $statement->insert_id;
    }

    public function existsUser($email, $password) {
      $password = hash ("sha256" , $password);

      $query = "SELECT * FROM $this->tableName WHERE email = ? AND password = ?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('ss', $email, $password);

      if (!$statement->execute()) {
          throw new Exception($statement->error);
      }
      $result = $statement->get_result();
      return $result->num_rows != 0;
    }

    public function existsEmail($email) {
      $query = "SELECT * FROM $this->tableName WHERE email = ?";

      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('s', $email);

      if (!$statement->execute()) {
        throw new Exception($statement->error);
      }
      $result = $statement->get_result();
      return $result->num_rows != 0;
    }

    public function readByCredentials($email, $password) {
      $password = hash ("sha256" , $password);

      $query = "SELECT * FROM $this->tableName WHERE email = ? AND password = ?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('ss', $email, $password);

      if (!$statement->execute()) {
          throw new Exception($statement->error);
      }
      $result = $statement->get_result();
      $row = $result->fetch_object();
      $result->close();
      return $row;
    }
}
