<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        :root {
            --background-light: #f9f9f9;
            --text-light: #333;
            --background-dark: #121212;
            --text-dark: #f9f9f9;
            --button-color: #007bff;
            --button-hover-color: #0056b3;
        }

        body.light {
            background-color: var(--background-light);
            color: var(--text-light);
        }

        body.dark {
            background-color: var(--background-dark);
            color: var(--text-dark);
        }

        .theme-toggle {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 5px;
            border-radius: 5px;
        }

        .logo {
            text-align: center;
            padding: 20px 0;
        }

        .welcome {
            text-align: center;
            margin: 20px 0;
        }

        .welcome h1 {
            font-size: 2.5rem;
            margin: 0;
        }

        .login-button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: var(--button-color);
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-button:hover {
            background-color: var(--button-hover-color);
        }

        .app-info {
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
            font-size: 1rem;
            line-height: 1.6;
        }

        .app-info svg {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
            fill: currentColor;
        }
    </style>
</head>
<body class="light">
    <!-- Theme Toggle Button -->
    <button class="theme-toggle" onclick="toggleTheme()">Toggle Theme</button>

    <!-- Logo Section -->
    <div class="logo">
        <img src="path/to/your/logo.png" alt="App Logo" style="max-width: 150px;">
    </div>

    <!-- Welcome Section -->
    <div class="welcome">
        <h1>Welcome to Our App</h1>
    </div>

    <!-- Login Button -->
    <a href="#" class="login-button">Login</a>

    <!-- App Information Section -->
    <div class="app-info">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm1 15h-2v-2h2Zm0-4h-2V7h2Z" />
        </svg>
        <p>Track your time, manage your projects, and improve productivity with our easy-to-use tools. Accessible via both desktop and web.</p>
    </div>

    <script>
        function toggleTheme() {
            const body = document.body;
            body.classList.toggle('dark');
            body.classList.toggle('light');
        }
    </script>
</body>
</html>
