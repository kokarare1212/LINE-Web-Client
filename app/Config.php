<?php

//Initialize
$config = [];

//Setting
$config["enable_signup"] = false;

//Locale
$config["language"] = "ja";
$config["location"] = "asia/tokyo";

//Dir
$config["document_root"] = $_SERVER["DOCUMENT_ROOT"];
$config["app_dir"] = $config["document_root"]."\/app";
$config["data_dir"] = $config["app_root"]."\/data";
$config["language_dir"] = $config["app_dir"]."\/language";
$config["vendor_dir"] = $config["document_root"]."\/vendor";

//File
$config["language_file"] = $config["language_dir"]."\/".$config["language"].".php";
$config["user_file"] = $config["app_dir"]."\/User.json";

//User
$config["user"] = json_decode(file_get_contents($config["user_file"]));