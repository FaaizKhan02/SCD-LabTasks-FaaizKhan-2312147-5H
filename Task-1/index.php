<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple To-Do List</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <div class="container">
        <h1>My To-Do List</h1>
        
        <div class="input-section">
            <input type="text" id="taskInput" placeholder="Enter a new task...">
            <button id="addTaskBtn">Add Task</button>
        </div>
        
        <div class="tasks-section">
            <ul id="taskList">
                <!-- Tasks will be dynamically added here -->
            </ul>
        </div>
        
        <div class="clear-section">
            <button id="clearAllBtn">Clear All Tasks</button>
        </div>
    </div>
    
    <div class="alert" id="alert">Task added successfully!</div>

    <script src="script.js"></script>
</body>
</html>