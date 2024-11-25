<?php
include('backend/session.php');
checkUserLoggedIn();
?>


<!DOCTYPE HTML>
<html>

<head>
    <title>Attend'It</title>
    <meta charset="utf-8">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>

    <!-- Header -->
    <header id="header" class="alt">
        <div class="logo"><a href="index.php">Attend'It <span>by Youssef Aoun</span></a></div>
        <a href="#menu">Menu</a>
    </header><!-- Nav -->
    <nav id="menu">
        <ul class="links">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
            <li>
                <form action="backend/logout.php" method="POST" style="display: inline;">
                    <button type="submit">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>


    <?php
    include('backend/db.php');
    
    // SQL query to fetch image names, titles, and locations from the database
    $sql = "SELECT image, title, location FROM event";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Start the banner section
        echo '<section class="banner full">';

        while ($row = $result->fetch_assoc()) {
            $imagePath = "assets/images/" . $row['image'];
            $title = $row['title'];
            $location = $row['location'];
    
            echo '
            <article>
                <img src="' . $imagePath . '" alt="" width="1440" height="961">
                <div class="inner">
                    <header>
                        <h1>' . $title . '</h1>
                        <h3>' . $location . '</h3>
                    </header>
                </div>
            </article>';
        }

        // Close the banner section
        echo '</section>';
    } else {
        echo "No events found in the database.";
    }

    $conn->close();
    ?>

    <section id="one" class="wrapper style2">
        <div class="inner">
            <div class="grid-style">

                <div>
                    <div class="box">
                        <div class="image fit" width="80">
                            <img src="assets/images/full-logo.png" alt="" width="10" height="10">
                        </div>
                        <div class="content">
                            <header class="align-center">
                                <p>Learn more about Attend'It</p>
                                <h2>What is Attend'It</h2>
                            </header>
                            <p> Attend’It is an event management system that allows users to
                                create events via their mobile phones that allow other users to interact with these
                                events.</p>
                            <footer class="align-center"><a href="aboutus.php" class="button alt">Learn More</a>
                            </footer>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="box">
                        <div class="image fit">
                            <img src="assets/images/ai.jpg" alt="" width="600" height="300">
                        </div>
                        <div class="content">
                            <header class="align-center">
                                <p>The Startup</p>
                                <h2>How was Attend'It built?</h2>
                            </header>
                            <p>
                                Attend'It was an Information System Development project of which
                                it was built by Youssef Aoun & Youssef Hammoud as their graduation project.
                                It started as a mobile application with a dashboard, and later, Youssef Aoun
                                developed the website (this website) to enhance his application, in addition
                                to using PHP instead of JAVA for backend, and it is also a project for
                                the Web Programming Advanced course.
                            </p>
                            <footer class="align-center"><a href="#" class="button alt">Learn More</a>
                            </footer>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- Two -->
    <section id="two" class="wrapper style3">
        <div class="inner">
            <header class="align-center">
                <p>For business enquiries, please contact us!</p>
                <h2><a href="contactus.php" class="no-underline" style="color: purple;">Youssef Aoun</a></h2>
            </header>
        </div>
    </section><!-- Three -->
    <section id="three" class="wrapper style2">
        <div class="inner">
            <header class="align-center">
                <p class="special">Find below the events over our site.</p>
                <h2>Press on an event to view its details or book it</h2>
            </header>
            <div class="gallery">
                <?php
                include('backend/db.php');
                $sql = "SELECT id, image, title FROM event";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $imagePath = "assets/images/" . $row['image'];
                        $title = $row['title'];
                        $eventId = $row['id']; 
                
                        
                        echo '
                    <div>
                        <div class="image fit">
                            <a href="event_details.php?id=' . $eventId . '">
                                <img src="' . $imagePath . '" alt="' . htmlspecialchars($title) . '" width="600" height="300">
                            </a>
                        </div>
                    </div>';
                    }
                } else {
                    echo "<p>No events found.</p>";
                }

                $conn->close(); // Close the database connection
                ?>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="container">
            <ul class="icons">
                <li><a href="https://github.com/youssef-aoun" class="icon fa-github" target="_blank"><span
                            class="label">Github</span></a></li>
                <li><a href="https://linkedin.com/in/youssef-aoun-/" target="_blank" class="icon fa-linkedin"><span
                            class="label">LinkedIn</span></a></li>
                <li><a href="https://www.hackerrank.com/profile/y_aoun" target="_blank"><img
                            src="assets/images/hackerrank.png" alt="hackerrank profile"
                            style="width: 40px; height: auto;"></a></li>
                <li>
                    <a href="mailto:y.aoun@outlook.com" class="icon fa-envelope-o" target="_blank"
                        rel="noopener noreferrer">
                        <span class="label">Email</span>
                    </a>
                </li>
            </ul>
        </div>
    </footer>
    <div class="copyright">
        Made with love by Youssef Aoun.
    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>