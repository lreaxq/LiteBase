# LiteBase: A Simple PHP-Based Database System

LiteBase is a simple PHP-based database system. It stores data using a file-based approach and provides basic database functionalities.

## Features

- Basic database functions: LiteBase provides basic database functions such as storing, retrieving, updating, and deleting data.
- File-based data storage: Data is stored using a file-based approach, making installation and usage straightforward.
- Error handling: LiteBase handles error conditions and provides feedback to the user.

## Installation

1. Download the LiteBase files.
2. Upload the files to your server.
3. Great, now you can use LiteBase on your site.
4. To access the admin panel, simply go to the address `example.com/mylitebase`. The default password is `123`.

## Usage

LiteBase can be used with the following basic functions:

- `litebase_get('table name', 'word', 'column')`: Retrieves the column containing the specified word from the table.
- `litebase_insert('table name', 'data')`: Inserts the provided data into the table.
- `litebase_delete('table name', 'word', 'column')`: Deletes the column containing the specified word from the table.
- `litebase_getLine('table name', 'row')`: Used to retrieve a specific row.
- `litebase_dump('table name')`: Used to retrieve the entire database table.

## Example Usage

```php
<?php
// LiteBase example usage

// Include LiteBase libraries
include("/LiteBase/LiteBase-1.0.php");

// Database file and table name
$database = 'my_database';
$table = 'my_table';

// Example for adding data
$data = 'John Doe,30,New York';

// Insert the data
$result = litebase_insert($table, $data);

// Check the result
if ($result) {
    echo "Data added successfully.";
} else {
    echo "An error occurred while adding data.";
}
?>
