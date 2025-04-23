<?php
require 'db.php';
if ($_FILES['xmlfile']['error'] === 0) {
    $xml = simplexml_load_file($_FILES['xmlfile']['tmp_name']);
    foreach ($xml->contact as $c) {
        $stmt = $conn->prepare("INSERT INTO contacts (name, phone) VALUES (?, ?)");
        $stmt->bind_param("ss", $c->name, $c->phone);
        $stmt->execute();
    }
    echo "Import successful. <a href='index.php'>Back to contacts</a>";
} else {
    echo "Failed to upload XML.";
}
?>
