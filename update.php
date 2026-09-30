<?php
include "db.php";
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM student WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
if (!$row) {
    die("Student not found");
}
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $date = $_POST['date'];
    $stmt = $conn->prepare("UPDATE student SET name = ?, contact = ?, date = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $contact, $date, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
</head>
<body>
<h2>Update Student</h2>
<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    <br><br>
    <label>Contact:</label>
    <input type="text" name="contact" value="<?php echo $row['contact']; ?>" required>
    <br><br>
    <label>Date:</label>
    <input type="date" name="date" value="<?php echo $row['date']; ?>" required>
    <br><br>
    <input type="submit" name="update" value="Update Student">
</form>
<br>
<a href="index.php">Back</a>
</body>
</html>