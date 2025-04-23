<!DOCTYPE html>
<html>
<head>
    <title>Import XML</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Import Contacts from XML</h2>
    <form action="process_import.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">XML File</label>
            <input type="file" name="xmlfile" accept=".xml" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload & Import</button>
    </form>
</body>
</html>
