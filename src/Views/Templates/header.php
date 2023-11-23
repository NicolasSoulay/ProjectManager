<body>
    <header>
        <ul>
            <li><a href=''>li1</a></li>
            <li><a href=''>li2</a></li>
            <li><a href=''>li3</a></li>
            <li><a href=''>li4</a></li>
        </ul>
    </header>
    <main>
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>
