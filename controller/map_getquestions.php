<?php

// read the JSON data from file
$file = '../data.json';
$json = file_get_contents($file);
$data = json_decode($json, true);

//return to the ajax as json
echo json_encode($data);
