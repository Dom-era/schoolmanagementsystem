<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $class = $_POST['class'];

    $conn = new mysqli('localhost', 'root', '', 'school_management');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO students (name, date_of_birth, class) VALUES ('$name', '$dob', '$class')";

    if ($conn->query($sql) === TRUE) {
        echo "New student registered successfully";
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
        Date of Birth: <input type="date" name="dob"><br>
        Class: <input type="text" name="class"><br>
        <input type="submit">
    </form>
</body>

</html>