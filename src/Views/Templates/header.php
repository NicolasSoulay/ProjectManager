<body>
    <header class='bg-secondary'>
        <nav class='navbar navbar-expand-lg text-center'>
            <div class='col d-flex'>
                <a id='logo-link' class='ms-3 navbar-brand text-light' href='http://127.0.0.1/ProjectManager/'>
                    <img id='logo-img' alt='logo' />
                    <h1 class='h5'>Project Manager</h1>
                </a>
            </div>
            <?php if (!(isset($nav_off) && $nav_off)) : ?>
                <ul class='col navbar-nav justify-content-center'>
                    <li class='nav-item'><a class='nav-link text-light' href=''>lien 1</a></li>
                    <li class='nav-item'><a class='nav-link text-light' href=''>lien 2</a></li>
                    <li class='nav-item'><a class='nav-link text-light' href=''>lien 3</a></li>
                </ul>
                <ul class='col navbar-nav justify-content-end'>
                    <li class='nav-item'><a class='nav-link text-light' href='?controller=UserController&method=userAccount'>Votre compte</a></li>
                    <li class='nav-item'><a class='me-3 nav-link text-light' href='?controller=UserController&method=disconnect'>Déconnexion</a></li>
                </ul>
            <?php endif ?>
        </nav>
    </header>
    <main class=''>
        <?php
        if (isset($message)) {
            echo "<div class='d-flex justify-content-center'><p class='h5 my-5 text-danger'>" . $message . "</p></div>";
        }
        ?>
