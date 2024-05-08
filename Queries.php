<?php

require_once(__DIR__. "/DatabaseConnection.php");

/** 
 * Class to handle database queries.
 */
class Queries {
  /**
   * Database connection object.
   *
   * @var \PDO 
   */
  private $conn;
  /**
   * Constructor to initialize the Db Queries object with a database connection.
   */
  public function __construct() {
    $dbConn = new DatabaseConnection();
    $conn = $dbConn->getConnection();
    $this->conn = $conn;
  }  
    
  /**
   * This function is used to add the task into database.
   *
   * @param  string $task
   *  The task to add in database.
   * 
   * @return void
   */
  public function addTask(string $task) {
    $stmt = $this->conn->prepare("INSERT INTO ToDo (task) VALUES (:task)");
    $stmt->bindParam(':task', $task);
    $stmt->execute();
  }  
  /**
   * This function is used to delete the task into database.
   *
   * @param  int $id
   *  Delete the task of specific id. 
   * 
   * @return void
   */
  public function deleteTask(int $id) {
    $stmt = $this->conn->prepare("DELETE FROM ToDo WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }  
  /**
   * This function is used to edit the task into database.
   *
   * @param  int $id
   *  Edit the task of specific id. 
   * @param  string $task
   *  The edited task to add in database.
   * 
   * @return void
   */
  public function editTask(int $id, string $task) {
    $stmt = $this->conn->prepare("UPDATE ToDo SET task = :task WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':task', $task);
    $stmt->execute();
  }  
  /**
   *  This function is used to load the tasks into database.
   *
   * @return array
   */
  public function loadTask() {
    $stmt = $this->conn->query("SELECT * FROM ToDo");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $tasks[] = $row;
  }
  return $tasks;
  }
}
