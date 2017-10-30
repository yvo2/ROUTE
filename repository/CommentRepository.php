<?php
require_once '../lib/Repository.php';
/**
 * Das CommentRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class CommentRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'comment';
    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $route String describing the route
     * @param $bewertung
     * @param $userId User that wrote the comment
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($route, $bewertung, $userId) {
        $query = "INSERT INTO $this->tableName (route, bewertung, userId) VALUES (?, ?, ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sss', $route, $bewertung, $userId);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        return $statement->insert_id;
    }

    public function getAll() {
      $query = "SELECT * FROM $this->tableName GROUP BY $this->tableName.route";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      if (!$statement->execute()) {
          throw new Exception($statement->error);
      }
      $result = $statement->get_result();
      if (!$result) {
          throw new Exception($statement->error);
      }
      // Datensätze aus dem Resultat holen und in das Array $rows speichern
      $rows = array();
      while ($row = $result->fetch_object()) {
          $rows[] = $row;
      }
      return $rows;
    }

    public function getByRoute($route) {
      $query = "SELECT bewertung, $this->tableName.id, email FROM $this->tableName LEFT JOIN user ON user.id = $this->tableName.userId WHERE $this->tableName.route = ?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('s', $route);
      if (!$statement->execute()) {
          throw new Exception($statement->error);
      }
      $result = $statement->get_result();
      return $result;
    }

    public function update($id, $comment) {
      $query = "UPDATE $this->tableName SET bewertung = ? WHERE id = ?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('ss', $comment, $id);
      if (!$statement->execute()) {
          throw new Exception($statement->error);
      }
      return true;
    }

    public function delete($id) {
      $query = "DELETE FROM $this->tableName WHERE id = ?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('s', $id);
      if (!$statement->execute()) {
          throw new Exception($statement->error);
      }
      return true;
    }
}
