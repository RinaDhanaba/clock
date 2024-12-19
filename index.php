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
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis veniam illum, amet dignissimos deserunt aperiam ipsam asperiores vel sed voluptas dolorum facere minima soluta exercitationem quae aut optio, temporibus error.
        A distinctio ea ipsa deserunt aperiam officia similique iste inventore perspiciatis. Adipisci, voluptas nisi. Tempora fugit, cumque ullam impedit ipsum deserunt ipsa natus expedita, optio qui provident, maiores harum dolorem.
        Pariatur id, totam, et, ipsum laboriosam repudiandae ipsa culpa quod mollitia quo iste quisquam architecto quis blanditiis sunt labore? Harum qui illo dolorum recusandae obcaecati, eligendi veniam nam non error.
        Quo a vero minima harum natus deleniti repellat beatae adipisci voluptates quasi blanditiis quas fugit dolorem autem earum unde, culpa iste eum sequi corporis? Reiciendis earum laudantium ex nemo iure?
        Eligendi nemo cum delectus officia vitae fugiat recusandae vel nesciunt optio a maiores numquam incidunt labore, magni earum culpa quasi voluptatum tenetur exercitationem reiciendis iusto aliquam nulla sunt? Facilis, officiis?
        Dicta dolorem incidunt in? Debitis vero aliquam voluptate inventore, dolorum sit! Necessitatibus expedita laborum deleniti dolores voluptatibus ullam tempore veritatis reiciendis est! Voluptates tempore atque molestias magnam, assumenda excepturi. Rerum!
        Blanditiis est dignissimos, amet accusamus asperiores cum beatae nulla! Quaerat quos voluptatum saepe itaque tempore accusantium perspiciatis tempora, nulla earum, vero sit suscipit quas officia dicta est voluptas. Amet, sequi!
        Iusto, dolorum hic excepturi ea adipisci rerum expedita magni velit illum facilis doloremque consequatur fuga quod quisquam alias quas corrupti iste atque? Suscipit exercitationem, repellat quo culpa inventore laudantium voluptas.
        Nam non ut porro illum rerum corrupti accusantium rem sapiente laboriosam impedit quae doloribus similique tenetur delectus veniam, consectetur cumque, id modi animi exercitationem. Consectetur cumque ducimus repellendus quidem impedit!
        Blanditiis, alias, aut quia numquam nulla exercitationem obcaecati omnis, eos voluptas ullam enim nobis beatae ad explicabo hic velit ipsa molestias ducimus perspiciatis. Eligendi id porro quisquam voluptate ducimus impedit!
        Laudantium soluta saepe aspernatur eaque sapiente suscipit, doloremque et porro recusandae est tempora numquam commodi at corporis error molestias odit! Vel facere eum veritatis aliquam reprehenderit eligendi eaque unde laudantium.
        Delectus cupiditate iure est asperiores vel maxime, exercitationem numquam, error aperiam ab consequuntur, explicabo repellat quas! Quasi eos illum accusantium, porro molestias nesciunt non, laborum, voluptatum fugit voluptatem sequi est?
        Incidunt ab esse voluptatibus eius, ex deleniti? Blanditiis neque totam quidem molestiae adipisci delectus doloribus quasi, rerum sapiente exercitationem sit consequuntur commodi? Accusamus rem harum commodi atque. Voluptatibus, porro quae.
        Harum autem placeat quis. Rem, voluptatum repudiandae doloribus corrupti praesentium quaerat aut. Nobis nostrum eligendi officiis culpa minus, atque hic amet nesciunt eveniet facere vel veniam dolorum, cum optio aperiam.
        Alias recusandae error temporibus rerum quam cupiditate nemo dolorem tempora atque, eos culpa! Accusamus culpa eius quae eligendi minus odio facere vel ut quisquam, molestiae nostrum rerum, consequatur itaque numquam!
        Assumenda, repellat qui! Beatae sint quidem ea eos ullam nihil quisquam praesentium. Commodi soluta blanditiis laudantium, similique, voluptatum odio laborum, dolorum nisi esse voluptas accusamus ipsam dolorem consectetur deleniti illo.
        Suscipit quo ut tempore laboriosam ducimus commodi. Nobis at iure sint alias exercitationem harum repellat ipsum minima nemo. Magnam reiciendis maxime eos ea voluptate mollitia odio earum cum doloribus aliquam!
        Sint deserunt eius qui veritatis exercitationem iste rerum molestias, eveniet explicabo tempora quasi molestiae facilis optio aliquid culpa dignissimos voluptatibus sunt nobis in sequi quaerat? Fugit adipisci officiis quam odio?
        Aliquid rem voluptates voluptatem, et quod ad enim animi impedit natus recusandae sapiente excepturi repellat molestiae harum! Explicabo ducimus maiores modi autem, velit ab sint vitae placeat ipsam sequi reprehenderit?
        Perspiciatis non eaque, odit incidunt totam deleniti blanditiis et magni, accusantium quidem, inventore alias corrupti nulla illo maiores nihil ipsum voluptate molestias consequatur quia voluptatem. Assumenda mollitia possimus est ea.</p>
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
