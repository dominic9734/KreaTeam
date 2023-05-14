<?php
// open the CSV file for reading
$file = fopen('data.csv', 'r');

// read the first row as the field names
$fields = fgetcsv($file);

// create an empty array to store the data
$data = array();

// loop through the remaining rows and add them to the array
while ($row = fgetcsv($file)) {
    // create a new array with the field names as keys
    $record = array();
    for ($i = 0; $i < count($fields); $i++) {
        $record[$fields[$i]] = $row[$i];
    }
    // add the record to the array
    $data[] = $record;
}

// close the CSV file
fclose($file);

// encode the data as JSON
$json = json_encode($data);

// save the JSON to a file
$file = 'data.json';
if (file_put_contents($file, $json)) {
    echo "JSON data saved successfully to $file";
} else {
    echo "Error saving JSON data to $file";
}
