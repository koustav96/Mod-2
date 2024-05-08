<?php

require_once(__DIR__ . "/Queries.php");
// Check if form is submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['task'])) {
  // Get the id and edited task from the POST request.
  $taskId = $_POST['id'];
  $editedTask = $_POST['task'];
  // Get the object of Queries class.
  $dbQueries = new Queries();
  $dbQueries->editTask($taskId, $editedTask);
}
