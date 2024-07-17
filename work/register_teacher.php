<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $subject = $_POST['subject'];

    $conn = new mysqli('localhost', 'root', '', 'school_management');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO teachers (name, subject) VALUES ('$name', '$subject')";

    if ($conn->query($sql) === TRUE) {
        echo "New teacher registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="name"><br>
  Subject: <input type="text" name="subject"><br>
  <input type="submit">
</form>
</body>
</html>
