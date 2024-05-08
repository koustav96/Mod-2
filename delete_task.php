<?php

require_once(__DIR__ . "/Queries.php");
// Check if form is submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
  // Get the id from the POST request.
  $id = $_POST['id'];
  // Get the object of Queries class.
  $dbQueries = new Queries();
  $dbQueries->deleteTask($id);
}
