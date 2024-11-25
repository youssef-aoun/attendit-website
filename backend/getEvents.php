<?php
include('db.php'); 


$sql = "SELECT image, title, location FROM event";  
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    echo '<section class="banner full">';

    
    while ($row = $result->fetch_assoc()) {
    
        $imagePath = "/assets/images/" . $row['image'];  
        $title = $row['title'];  
        $location = $row['location'];  

        echo '
        <article>
            <img src="' . $imagePath . '" alt="" width="1440" height="961">
            <div class="inner">
                <header>
                    <h1>' . $title . '</h1>
                    <h5>' . $location . '</h5>
                </header>
            </div>
        </article>';
    }

    echo '</section>'; // Close the banner section
} else {
    echo "No events found in the database.";
}

$conn->close();
?>
