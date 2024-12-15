<?php

$cities = [
    'espana' => [
        ['value' => 'madrid', 'name' => 'Madrid'],
        ['value' => 'barcelona', 'name' => 'Barcelona'],
        ['value' => 'valencia', 'name' => 'Valencia']
    ],
    'mexico' => [
        ['value' => 'cdmx', 'name' => 'Ciudad de México'],
        ['value' => 'guadalajara', 'name' => 'Guadalajara'],
        ['value' => 'monterrey', 'name' => 'Monterrey']
    ]
];

// Obtener el país enviado por AJAX
$country = $_POST['country'];

// Devolver las ciudades correspondientes en formato JSON
if (array_key_exists($country, $cities)) {
    echo json_encode($cities[$country]);
} else {
    echo json_encode([]);
}
