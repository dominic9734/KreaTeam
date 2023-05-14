<?php


// read the JSON content from the file
$json = file_get_contents('../data.json');


// decode the JSON data to PHP data
$data = json_decode($json, true);

// set the CSV filename
$csvuploadfilename = "Export_MA_AEBOLIB_" . date('Y-m-d') . ".csv";

$delimiter = ",";

$csvupload = fopen('php://memory', 'w');

// set the CSV header fields
$csvHeader = array('Question', 'XCoordinate', 'Ycoordinate');

// write the CSV header
fputcsv($csvupload, $csvHeader, $delimiter);

// loop through the data and write to CSV file
foreach ($data as $row) {
    $lineData = array(
        $row['Question'],
        $row['Xcoordinate'],
        $row['Ycoordinate']
    );
    fputcsv($csvupload, $lineData, $delimiter);
}
fseek($csvupload, 0);

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $csvuploadfilename . '";');

fpassthru($csvupload);
exit();
