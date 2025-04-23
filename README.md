# CRUD App with XML Import

This is a basic PHP CRUD application for storing contacts, with support for bulk import via XML.

## Features
- Add, Edit, Delete, View contacts
- Upload and import contacts from an XML file

## How to Use
1. Create a MySQL database named `contacts_app`.
2. Import the following table:

```sql
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

3. Run the app in a local server (XAMPP, Laragon, etc.)

4. Use `import.php` to upload a sample XML like:
