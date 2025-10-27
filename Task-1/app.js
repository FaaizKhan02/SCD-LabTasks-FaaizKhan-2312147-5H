document.addEventListener('DOMContentLoaded', function() {
    // DOM Elements
    const taskInput = document.getElementById('taskInput');
    const addTaskBtn = document.getElementById('addTaskBtn');
    const taskList = document.getElementById('taskList');
    const clearAllBtn = document.getElementById('clearAllBtn');
    const alert = document.getElementById('alert');
    
    // Load tasks from local storage on page load
    loadTasks();
    
    // Add task event
    addTaskBtn.addEventListener('click', addTask);
    
    // Add task on Enter key press
    taskInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            addTask();
        }
    });
    
    // Clear all tasks event
    clearAllBtn.addEventListener('click', clearAllTasks);
    
    // Function to add a new task
    function addTask() {
        const taskText = taskInput.value.trim();
        
        if (taskText === '') {
            return;
        }
        
        // Create task object
        const task = {
            id: Date.now(),
            text: taskText
        };
        
        // Add task to UI
        addTaskToUI(task);
        
        // Save to local storage
        saveTaskToLocalStorage(task);
        
        // Show success alert
        showAlert();
        
        // Clear input field
        taskInput.value = '';
        taskInput.focus();
    }
    
    // Function to add task to UI
    function addTaskToUI(task) {
        const li = document.createElement('li');
        li.className = 'task-item';
        li.setAttribute('data-id', task.id);
        
        li.innerHTML = `
            <span class="task-text">${task.text}</span>
            <button class="delete-btn">Delete</button>
        `;
        
        // Add delete event to the button
        li.querySelector('.delete-btn').addEventListener('click', function() {
            deleteTask(task.id, li);
        });
        
        taskList.appendChild(li);
        
        // Update clear all button visibility
        updateClearAllButton();
    }
    
    // Function to delete a task
    function deleteTask(taskId, taskElement) {
        // Remove from UI
        taskElement.remove();
        
        // Remove from local storage
        removeTaskFromLocalStorage(taskId);
        
        // Update clear all button visibility
        updateClearAllButton();
    }
    
    // Function to clear all tasks
    function clearAllTasks() {
        if (taskList.children.length === 0) {
            return;
        }
        
        if (confirm('Are you sure you want to delete all tasks?')) {
            // Clear UI
            taskList.innerHTML = '';
            
            // Clear local storage
            localStorage.removeItem('tasks');
            
            // Update clear all button visibility
            updateClearAllButton();
        }
    }
    
    // Function to save task to local storage
    function saveTaskToLocalStorage(task) {
        let tasks = getTasksFromLocalStorage();
        tasks.push(task);
        localStorage.setItem('tasks', JSON.stringify(tasks));
    }
    
    // Function to get tasks from local storage
    function getTasksFromLocalStorage() {
        let tasks;
        if (localStorage.getItem('tasks') === null) {
            tasks = [];
        } else {
            tasks = JSON.parse(localStorage.getItem('tasks'));
        }
        return tasks;
    }
    
    // Function to load tasks from local storage
    function loadTasks() {
        const tasks = getTasksFromLocalStorage();
        tasks.forEach(task => addTaskToUI(task));
        
        // Update clear all button visibility
        updateClearAllButton();
    }
    
    // Function to remove task from local storage
    function removeTaskFromLocalStorage(taskId) {
        let tasks = getTasksFromLocalStorage();
        tasks = tasks.filter(task => task.id !== taskId);
        localStorage.setItem('tasks', JSON.stringify(tasks));
    }
    
    // Function to show alert
    function showAlert() {
        alert.classList.add('show');
        setTimeout(() => {
            alert.classList.remove('show');
        }, 3000);
    }
    
    // Function to update clear all button visibility
    function updateClearAllButton() {
        if (taskList.children.length === 0) {
            clearAllBtn.style.display = 'none';
            // Show empty state message
            if (!document.querySelector('.empty-state')) {
                const emptyState = document.createElement('div');
                emptyState.className = 'empty-state';
                emptyState.textContent = 'No tasks yet. Add a task to get started!';
                taskList.appendChild(emptyState);
            }
        } else {
            clearAllBtn.style.display = 'inline-block';
            // Remove empty state message if it exists
            const emptyState = document.querySelector('.empty-state');
            if (emptyState) {
                emptyState.remove();
            }
        }
    }
});