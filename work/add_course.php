<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $teacher_id = $_POST['teacher_id'];

    $conn = new mysqli('localhost', 'root', '', 'school_management');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO courses (course_name, teacher_id) VALUES ('$course_name', '$teacher_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New course added successfully";
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
  Course Name: <input type="text" name="course_name"><br>
  Teacher ID: <input type="text" name="teacher_id"><br>
  <input type="submit">
</form>
</body>
</html>
