<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <style>
        header {
            background-color: #007bff;
            color: white;
            padding: 1%;
        }

        header h1 {
            margin-left: 15%;
            margin-top: 0;
            margin-right: 0;
            margin-bottom: 0;
        }

        main {
            position: absolute;
            left: 30%;
            margin: 3%;
            font-size: 1.1em;
            /* Increase font size for main section */
        }

        main h2 {
            font-size: 2em;
            /* Larger font size for the section title */
        }

        main label {
            font-size: 1.2em;
            /* Larger font size for labels */
        }

        .addButton {
            position: absolute;
            right: 30%;
            margin: 2%;
        }

        form button {
            padding: 3% 6%;
            font-size: 1.2em;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 15%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #0056b3;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        nav {
            position: absolute;
            top: 3%;
            right: 15%;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-size: 1.2em;
            font-weight: bold;
        }

        nav a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <header>
        <h1>Task Manager</h1>
    </header>
    <nav>
        <a href="#logout">Logout</a>
    </nav>
    <main>
        <h2>Add a Task</h2>
        <form id="addTaskForm" action="addTask.php" method="POST">
            <label for="title">Title: </label>
            <input type="text" id="title" name="title" required>
            <br><br>
            <label for="description">Description: </label>
            <input type="textarea" id="description" name="description">
            <br><br>
            <label for="priority">Priority: </label>
            <select id="priority" name="priority" required>
                <option value="high">High</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
            </select>
            <br><br>
            <button type="submit">Add</button>
        </form>
    </main>
</body>

</html>