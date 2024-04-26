<?php

require_once(__DIR__ . "/Queries.php");
// Check if form is submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task'])) {
  // Get the task from the POST request.
  $task = $_POST['task'];
  // Get the object of Queries class.
  $dbQueries = new Queries();
  $dbQueries->addTask($task);
}
