<?php require 'db.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Contact List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h1 class="mb-4">Contact List</h1>
    <a href="create.php" class="btn btn-primary mb-3">Add Contact</a>
    <a href="import.php" class="btn btn-secondary mb-3 ms-2">Import from XML</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM contacts");
            if ($result && $result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['phone']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
            <?php
                endwhile;
            else:
                echo "<tr><td colspan='3' class='text-center'>No contacts found or query failed.</td></tr>";
            endif;
            ?>
        </tbody>
    </table>
</body>

</html>