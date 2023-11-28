<body>
    <header>
        <nav class='navbar navbar-expand-lg'>
            <div class='container-fluid'>
                <a id='logo-link' class='navbar-brand' href='http://127.0.0.1/ProjectManager/'>
                    <img id='logo-img' alt='logo'></img>
                </a>
                <ul class='navbar-nav'>
                    <li class='nav-item'><a class='nav-link' href='?controller=UserController&method=disconnectUser'>Déconnexion</a></li>
                    <li class='nav-item'><a class='nav-link' href=''>li2</a></li>
                    <li class='nav-item'><a class='nav-link' href=''>li3</a></li>
                    <li class='nav-item'><a class='nav-link' href=''>li4</a></li>
                </ul>
                <div>

                </div>
            </div>
        </nav>
    </header>
    <main>
        <?php
        if (isset($message)) {
            echo "<div class='d-flex justify-content-center'><p class='text-danger'>" . $message . "</p></div>";
        }
        ?>
