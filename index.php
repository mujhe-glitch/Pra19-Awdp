<?php
include "db.php";
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $date = $_POST['date'];
    $stmt = $conn->prepare(
        "INSERT INTO student (name, contact, date) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $name, $contact, $date);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit();
}   
$result = $conn->query("SELECT * FROM student");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
</head>
<body>
<h2>Student Management System</h2>
<h3>Insert Student</h3>
<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" required>
    <br><br>
    <label>Contact:</label>
    <input type="text" name="contact" required>
    <br><br>
    <label>Date:</label>
    <input type="date" name="date" required>
    <br><br>
    <input type="submit" name="insert" value="Insert Student">
</form>
<br>
<hr>
<br>
<h3>All Students</h3>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Contact</th>
        <th>Date</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td>
            <?php echo $row['id']; ?>
        </td>
        <td>
            <?php echo $row['name']; ?>
        </td>
        <td>
            <?php echo $row['contact']; ?>
        </td>
        <td>
            <?php echo $row['date']; ?>
        </td>
        <td>
            <a href="update.php?id=<?php echo $row['id']; ?>">
                Update
            </a>
            |
            <a
                href="delete.php?id=<?php echo $row['id']; ?>"
                onclick="return confirm('Are you sure you want to delete this record?')"
            >
                Delete
            </a>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
