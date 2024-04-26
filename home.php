<!DOCTYPE html>
<html>
<head>
  <title>Todo App</title>
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/script.js"></script>
</head>
<body>
  <div class="container">
    <h1>Todo List</h1>
    <ul id="todo-list">
      <!-- Tasks will be loaded dynamically here -->
    </ul>
    <h2>Add a Task</h2>
    <form id="add-task-form">
      <input type="text" id="task" name="task" required>
      <input type="submit" value="Add Task">
    </form>
  </div>
</body>
</html>
