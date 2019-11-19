<?php
include_once '../src/lib.php';
$data = file_get_contents('config.txt');
$translation = new Vlan_translation($data);

// test by 16 port
$test_by_ports = $translation->get_translation_by_port(16);

$real_ports = [
    [
        "port" => 16,
        "cvid" => 220,
        "action" => "add",
        "svid" => 283,
    ],
    [
        "port" => 16,
        "cvid" => 221,
        "action" => "add",
        "svid" => 283,
    ]
];

if($real_ports == $test_by_ports) print "Ok \n";
else print "Error: Get translation by port #16 \n";


// test by 13 port
$test_by_ports = $translation->get_translation_by_port(13);

$real_ports = [
    [
        "port" => 13,
        "cvid" => 800,
        "action" => "add",
        "svid" => 810,
    ],
];

if($real_ports == $test_by_ports) print "Ok \n";
else print "Error: Get translation by port #13 \n";

// test by action add
$test_by_action = $translation->get_translation_by_action("add");

$real_ports = [
    "port" => 14,
    "cvid" => 800,
    "action" => "add",
    "svid" => 810,
];

if($real_ports == $test_by_action[9]) print "Ok \n";
else print "Error: Get translation by action add \n";


// test by cvid
$test_by_cvid = $translation->get_translation_by_сvid(218);

$real_ports = [
    [
        "port" => 1,
        "cvid" => 218,
        "action" => "replace",
        "svid" => 281,
    ],
];

if($real_ports == $test_by_cvid) print "Ok \n";
else print "Error: Get translation by cvid add \n";


// test by svid
$test_by_svid = $translation->get_translation_by_svid(2138);

$real_ports = [
    [
        "port" => 1,
        "cvid" => 1908,
        "action" => "replace",
        "svid" => 2138,
    ],
];

if($real_ports == $test_by_svid) print "Ok \n";
else print "Error: Get translation by svid add \n";
?>
