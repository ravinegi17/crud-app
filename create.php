<?php
require 'db.php';
$error = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Check if phone already exists
    $check = $conn->prepare("SELECT id FROM contacts WHERE phone = ?");
    $check->bind_param("s", $phone);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $error = "Phone number already exists!";
    } else {
        $stmt = $conn->prepare("INSERT INTO contacts (name, phone) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $phone);
        $stmt->execute();
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2>Add New Contact</h2>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input name="phone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</body>

</html>