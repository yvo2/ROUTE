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

    public function getByRoute($route) {
      $query = "SELECT bewertung, email FROM $this->tableName LEFT JOIN user ON user.id = $this->tableName.userId WHERE $this->tableName.route = ?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('s', $route);
      if (!$statement->execute()) {
          throw new Exception($statement->error);
      }
      $result = $statement->get_result();
      return $result;
    }
}
