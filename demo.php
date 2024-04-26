<!DOCTYPE html>
<html>
<head>
  <title>Todo App</title>
  <style>
    .task-done {
      text-decoration: line-through;
    }
  </style>
  <link rel="stylesheet" href="styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

  <script>
    // Function to load tasks from the server
    function loadTasks() {
      $('#todo-list').load('load_tasks.php');
    }

    // Load tasks when the page loads
    $(document).ready(function() {
      loadTasks();
    });

    // Handle form submission for adding a task
    $('#add-task-form').submit(function(e) {
      e.preventDefault();
      var task = $('#task').val();
      $.post('add_task.php', {
        task: task
      }, function() {
        loadTasks(); // Reload tasks after adding a task
        $('#task').val(''); // Clear the input field
      });
    });

    // Handle clicking on "Delete" button for a task
    $(document).on('click', '.delete-btn', function() {
      var taskId = $(this).data('id');
      $.post('delete_task.php', {
        id: taskId
      }, function() {
        loadTasks(); // Reload tasks after deleting a task
      });
    });

    // Handle clicking on "Mark Done" button for a task
    $(document).on('click', '.mark-done-btn', function() {
      var taskId = $(this).data('id');
      // Mark task as done by adding a class to apply strike-through effect
      $('#task-' + taskId).toggleClass('task-done');
    });

    // Handle clicking on "Edit" button for a task
    $(document).on('click', '.edit-btn', function() {
      var taskId = $(this).data('id');
      var taskText = $('#task-' + taskId).text();
      // Replace task text with a form input field for editing
      $('#task-' + taskId).html('<input type="text" class="edit-task-input" value="' + taskText + '"> <button class="save-edit-btn" data-id="' + taskId + '">Save</button>');
    });

    // Handle clicking on "Save" button after editing a task
    $(document).on('click', '.save-edit-btn', function() {
      var taskId = $(this).data('id');
      var editedTask = $('.edit-task-input').val();
      $.post('edit_task.php', {
        id: taskId,
        task: editedTask
      }, function() {
        loadTasks(); // Reload tasks after editing a task
      });
    });
  </script>
</body>

</html>