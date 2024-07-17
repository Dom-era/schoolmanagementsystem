<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $grade = $_POST['grade'];

    $conn = new mysqli('localhost', 'root', '', 'school_management');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO grades (student_id, course_id, grade) VALUES ('$student_id', '$course_id', '$grade')";

    if ($conn->query($sql) === TRUE) {
        echo "Grade assigned successfully";
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
  Student ID: <input type="text" name="student_id"><br>
  Course ID: <input type="text" name="course_id"><br>
  Grade: <input type="text" name="grade"><br>
  <input type="submit">
</form>
</body>
</html>
