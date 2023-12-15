## Simple To-Do List CRUD App

A simple CRUD (Create, Read, Update, Delete) To-Do List application using PHP, MySQL, Bootstrap, and jQuery.

### Features

- Add a new task with a description.
- View a list of tasks with their descriptions.
- Edit existing tasks.
- Delete tasks.

### Prerequisites

1. PHP server
2. MySQL database
3. Web browser

### Getting Started

1. Clone the repository to your local machine.

bash
git clone https://github.com/ferdiansyahP/simple_TodoList.git

2. Import the `todolist.sql` file into your MySQL database.

3. Update the `proses/config.php` file with your database connection details.

$conn = mysqli_connect("your-host", "your-username", "your-password", "your-database");

4. Run the application by accessing `index.php` through your web browser.

### Usage

1. **Add a New Task:**

   - Fill in the "Task" and "Description" fields in the form.
   - Click the "Add Task" button to add the task.

2. **View Tasks:**

   - View the list of tasks in the table.
   - Each task displays its ID, task name, description, and action buttons (Edit, Delete).

3. **Edit a Task:**

   - Click the "Edit" button next to the task you want to edit.
   - Modify the task details in the form.
   - Click the "Edit Task" button to save the changes.

4. **Delete a Task:**
   - Click the "Delete" button next to the task you want to delete.
   - Confirm the deletion.

### Additional Notes

- The application uses Bootstrap for styling and jQuery for some dynamic behavior.
- The CRUD operations are handled through PHP scripts.
- Glassmorphism design is applied for a modern look.

### Contributing

Feel free to contribute to this project by creating issues or pull requests.
