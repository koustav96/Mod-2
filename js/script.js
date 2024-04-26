// Function to load tasks from the server.
function loadTasks() {
  $.ajax({
    url: 'load_tasks.php',
    type: 'GET',
    success: function(response) {
      $('#todo-list').html(response);
    }
  });
}

// Load tasks when the page loads.
$(document).ready(function() {
  loadTasks();
});

// Handle form submission for adding a task.
$('#add-task-form').submit(function(e) {
  e.preventDefault();
  var task = $('#task').val();
  $.ajax({
    url: 'add_task.php',
    type: 'POST',
    data: {
      'task': task
    },
    success: function() {
      // Reload tasks after adding a task.
      loadTasks(); 
      // Clear the input field.
      $('#task').val(''); 
    }
  });
});

// Handle clicking on Delete button for a task.
$(document).on('click', '.delete-btn', function() {
  var taskId = $(this).data('id');
  $.ajax({
    url: 'delete_task.php',
    type: 'POST',
    data: {
      'id': taskId
    },
    success: function() {
      // Reload tasks after deleting a task.
      loadTasks(); 
    }
  });
});

// Handle clicking on Mark Done button for a task.
$(document).on('click', '.mark-done-btn', function() {
  var taskId = $(this).data('id');
  $('#task-' + taskId).toggleClass('task-done');
});

// Handle clicking on Edit button for a task.
$(document).on('click', '.edit-btn', function() {
  var taskId = $(this).data('id');
  var taskText = $('#task-' ).text();
  $('#task-' + taskId).html('<input type="text" class="edit-task-input" value="' + taskText + '"> <button class="save-edit-btn" data-id="' + taskId + '">Save</button>');
});

// Handle clicking on Save button after editing a task.
$(document).on('click', '.save-edit-btn', function() {
  var taskId = $(this).data('id');
  var editedTask = $('.edit-task-input').val();
  $.ajax({
    url: 'edit_task.php',
    type: 'POST',
    data: {
      'id': taskId,
      task: editedTask
    },
    success: function() {
      // Reload tasks after editing a task.
      loadTasks(); 
    }
  });
});