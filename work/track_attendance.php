<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $conn = new mysqli('localhost', 'root', '', 'school_management');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO attendance (student_id, course_id, date, status) VALUES ('$student_id', '$course_id', '$date', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Attendance recorded successfully";
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
  Date: <input type="date" name="date"><br>
  Status: 
  <select name="status">
    <option value="Present">Present</option>
    <option value="Absent">Absent</option>
  </select><br>
  <input type="submit">
</form>
</body>
</html>
