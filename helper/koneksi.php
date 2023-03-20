<?php

$host = "localhost";
$username = "javavolc_wa";
$password = "mwb546hs51";
$db = "javavolc_wa";

$koneksi = mysqli_connect($host, $username, $password, $db) or die("GAGAL");

$base_url = "https://wa.javavolcanorendezvous.com/";
date_default_timezone_set('Asia/Jakarta');
