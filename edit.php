<?php
require 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM contacts WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $conn->prepare("UPDATE contacts SET name = ?, phone = ? WHERE id = ?");
    $stmt->bind_param("ssi", $_POST['name'], $_POST['phone'], $id);
    $stmt->execute();
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Edit Contact</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input name="phone" class="form-control" value="<?= htmlspecialchars($row['phone']) ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</body>
</html>
