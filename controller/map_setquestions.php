<?php
//show errors
ini_set('display_errors', 1);

// create a PHP array with some data
$data = array(
    array(
        'Question' => 'Wo ist die Hauptstadt Bern?',
        'Xcoordinate' => 7.448011082151089,
        'Ycoordinate' => 46.94796480014656
    ),
    array(
        'Question' => 'Wie viele Bundesländer hat Deutschland?',
        'Xcoordinate' => 10.451526308774876,
        'Ycoordinate' => 51.16569115235937
    )
);


// encode the data as JSON
$json = json_encode($data);

// save the JSON to a file
$file = '../data.json';
if (file_put_contents($file, $json)) {
    echo "JSON data saved successfully to $file";
} else {
    echo "Error saving JSON data to $file";
}
