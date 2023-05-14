<?php
// Database connection
$servername = "localhost";
$username = "akinrwim_fista";
$password = "123ASDlkj$$$";
$dbname = "akinrwim_fista";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert user data into the database
if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
 $password = sha1($_POST['password']);
    $skills = $_POST['skills'];
    $social_links = $_POST['social_links'];
    $biography = $_POST['biography'];
    $role_id = $_POST['role_id'];
    $date_added = time();
    $last_modified = time();
    $wishlist = $_POST['wishlist'];
    $title = $_POST['title'];
    $payment_keys = $_POST['payment_keys'];
    $verification_code = $_POST['verification_code'];
    $status = $_POST['status'];
    $is_instructor = $_POST['is_instructor'];
    $image = $_POST['image'];
    $sessions = $_POST['sessions'];
    
    // Prepare and bind the statement
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, skills, social_links, biography, role_id, date_added, last_modified, wishlist, title, payment_keys, verification_code, status, is_instructor, image, sessions) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssiissssssiss", $first_name, $last_name, $email, $password, $skills, $social_links, $biography, $role_id, $date_added, $last_modified, $wishlist, $title, $payment_keys, $verification_code, $status, $is_instructor, $image, $sessions);

    // Execute the statement
    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>

<!-- Sign up form -->
<form action="" method="POST">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" required><br><br>
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required><br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" required><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br><br>
    <label for="skills">Skills:</label>
    <textarea name="skills" required></textarea><br><br>
    <label for="social_links">Social Links:</label>
    <textarea name="social_links"></textarea><br><br>
    <label for="biography">Biography:</label>
    <textarea name="biography"></textarea><br><br>
    <label for="role_id">Role ID:</label>
<input type="number" name="role_id"><br><br>
<label for="wishlist">Wishlist:</label>
<textarea name="wishlist"></textarea><br><br>
<label for="title">Title:</label>
<textarea name="title"></textarea><br><br>
<label for="payment_keys">Payment Keys:</label>
<textarea name="payment_keys" required></textarea><br><br>
<label for="verification_code">Verification Code:</label>
<textarea name="verification_code"></textarea><br><br>
<label for="status">Status:</label>
<input type="number" name="status"><br><br>
<label for="is_instructor">Is Instructor:</label>
<input type="number" name="is_instructor" value="0"><br><br>
<label for="image">Image:</label>
<input type="text" name="image"><br><br>
<label for="sessions">Sessions:</label>
<textarea name="sessions" required></textarea><br><br>
<input type="submit" name="submit" value="Sign up">

</form>
