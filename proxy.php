<?php
require_once 'curl/curl.php';
$curl = new Curl;
if($_POST['method'] === 'get') {
    $response = $curl->get($_GET['_real_url'], isset($_POST['data']) ? $_POST['data'] : null);
    echo $response;
} else if ($_POST['method'] === 'post') {
    $response = $curl->post($_GET['_real_url'], isset($_POST['data']) ? $_POST['data'] : null);
    echo $response;
}