<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="script.js" defer></script>
    <style>
        header {
            background-color: #007bff;
            /* Blue background */
            color: white;
            /* Text color for contrast */
            padding: 1%;
            /* Add padding around the text */
        }

        header h1 {
            margin-left: 15%;
            margin-top: 0;
            margin-right: 0;
            margin-bottom: 0;
            /* Remove default margin */
        }

        .tasks {
            position: absolute;
            left: 30%;
            margin: 3%;
        }

        .addButton {
            position: absolute;
            right: 30%;
            margin: 2%;
        }

        .addButton button {
            padding: 4% 8%;
            font-size: 1.2em;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 999px;
            box-sizing: border-box;
            opacity: 1;
            outline: 0 solid transparent;
            font-family: Inter, Helvetica, "Apple Color Emoji", "Segoe UI Emoji", NotoColorEmoji, "Noto Color Emoji", "Segoe UI Symbol", "Android Emoji", EmojiSymbols, -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", sans-serif;
            box-shadow: #007bff 0 10px 20px -10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: fit-content;
            word-break: break-word;
            border: 0;

        }

        .addButton button:hover {
            background-color: #0056b3;
        }


        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        nav {
            position: absolute;
            /* Position the nav relative to the page */
            top: 3%;
            /* Adjust vertical position */
            right: 15%;
            /* Align to the right with padding */
        }

        nav a {
            text-decoration: none;
            /* Remove underline from the link */
            color: white;
            /* Link color */
            font-size: 1.2em;
            /* Adjust font size */
            font-weight: bold;
        }

        nav a:hover {
            color: #0056b3;
            /* Darker color on hover */
        }
    </style>

</head>

<body>
    <header>
        <h1>Task Manager</h1>
    </header>
    <nav>
        <a href="logout.php">Logout</a>
    </nav>
    <main>
        <div class="addButton">
            <button onclick="window.location.href = 'addTaskForm.php'">Add Tasks</button>
        </div>
        <div class="tasks">
            <?php include 'getTasks.php'; ?>
        </div>
    </main>
</body>

</html>