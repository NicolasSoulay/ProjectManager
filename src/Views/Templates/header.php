<body>
    <header>
        <nav class='navbar navbar-expand-lg'>
            <div class='container-fluid'>
                <a id='logo-link' class='navbar-brand' href='http://127.0.0.1/ProjectManager/'>
                    <img id='logo-img' alt='logo' />
                    <h1 class='h5'>Project Manager</h1>
                </a>
                <?php if (!(isset($nav_off) && $nav_off)) : ?>
                    <ul class='navbar-nav'>
                        <li class='nav-item'><a class='nav-link' href=''>lien 1</a></li>
                        <li class='nav-item'><a class='nav-link' href=''>lien 2</a></li>
                        <li class='nav-item'><a class='nav-link' href=''>lien 3</a></li>
                    </ul>
                    <ul class='navbar-nav'>
                        <li class='nav-item'><a class='nav-link' href='?controller=UserController&method=disconnect'>Déconnexion</a></li>
                    </ul>
                <?php endif ?>
            </div>
        </nav>
    </header>
    <main>
        <?php
        if (isset($message)) {
            echo "<div class='d-flex justify-content-center'><p class='h5 mb-5 text-danger'>" . $message . "</p></div>";
        }
        ?>
