<?php

require_once(__DIR__ . "/Queries.php");
// Get the object of Queries class.
$dbQueries = new Queries();
$tasks = $dbQueries->loadTask();
if ($tasks) {
  // Iterate through the tasks and print each task
  foreach ($tasks as $task) {
      echo "<li id='task-" . $task['id'] . "'>" . $task['task'] . " <button class='delete-btn' data-id='" . $task['id'] . "'>Delete</button> <button class='mark-done-btn' data-id='" . $task['id'] . "'>Mark Done</button> <button class='edit-btn' data-id='" . $task['id'] . "'>Edit</button></li>";
  }
} 
else {
  echo "<li>No tasks found</li>";
}
