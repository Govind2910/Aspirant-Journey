<?php
include('config.php');
session_start();
// if ($_SESSION['role'] !== 'admin') {
//     header("Location: login.php");
//     exit();
// }

// Get video ID from URL
if(isset($_GET['id'])) {
    $video_id = $_GET['id'];
} else {
    // Handle error if ID is not provided
    echo "Error: Video ID not provided.";
    exit();
}

// Fetch video details from the database
$sql = "SELECT * FROM lessons WHERE id = $video_id";
$result = $conn->query($sql);

// Check if video exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $video_path = $row['file_path'];
} else {
    // Handle error if video not found
    echo "Error: Video not found.";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Video</title>
</head>
<body>
    <h1><?php echo $row['title']; ?></h1>
    <video width="640" height="360" controls>
        <source src="http://localhost/ProjectWeb/<?php echo $video_path; ?>" type="video/mp4">
        <?php echo $video_path; ?>
        Your browser does not support the video tag.
    </video>
</body>
</html>
