<?php
session_start();

$HOST_NAME = "http://localhost";
$ROOT_URL = "/dashboard/PHP/Laptop_Store";
$IMG_URL = "$ROOT_URL/images";
$LAYOUT_URL = $_SERVER["DOCUMENT_ROOT"] . "$ROOT_URL/layouts";

$IMAGE_DIR = $_SERVER["DOCUMENT_ROOT"] . "$ROOT_URL/images";

$MESSAGE = "";



function ConvertNum($num)
{
    $numConvert =  number_format($num, 0, '.', ',');
    return $numConvert;
}
function ConvertTimeCurrent($timeConvert, $timeCurrent)
{
    $timestamp = strtotime($timeConvert);
    $current_time = strtotime($timeCurrent);
    // $current_time = time() ; // Get the current time in milliseconds

    // Calculate the time difference
    $time_difference = $current_time - $timestamp;

    // Define time intervals in seconds
    $minute = 60;
    $hour = 60 * $minute;
    $day = 24 * $hour;
    $week = 7 * $day;
    $month = 30 * $day;
    $year = 365 * $day;

    // Determine the appropriate relative time
    if ($time_difference < $minute) {
        $relative_time = $time_difference . ' seconds ago';
    } elseif ($time_difference < $hour) {
        $relative_time = floor($time_difference / $minute) . ' minutes ago';
    } elseif ($time_difference < $day) {
        $relative_time = floor($time_difference / $hour) . ' hours ago';
    } elseif ($time_difference < $week) {
        $relative_time = floor($time_difference / $day) . ' days ago';
    } elseif ($time_difference < $month) {
        $relative_time = floor($time_difference / $week) . ' weeks ago';
    } elseif ($time_difference < $year) {
        $relative_time = floor($time_difference / $month) . ' months ago';
    } else {
        $relative_time = floor($time_difference / $year) . ' years ago';
    }

    return $relative_time;
}
function get_new_bills()
{
    $sql = "SELECT count(*) as count_new_bills FROM bills where status = 0";
    return pdo_query_one($sql);
}
function save_file($fieldname, $target_dir)
{
    $file_uploaded = $_FILES[$fieldname];
    $file_name = basename($file_uploaded["name"]);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    return $file_name;
}

function add_cookie($name, $value, $day)
{
    setcookie($name, $value, time() + (86400 * $day), "/");
}

function delete_cookie($name)
{
    add_cookie($name, "", -1);
}

function get_cookie($name)
{
    return $_COOKIE[$name] ?? '';
}

function check_login()
{
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['role'] >= 1) {
            if ($_SESSION['user']['role'] == 2) {
                return;
            }
            if (strpos($_SERVER["REQUEST_URI"], '/account/') == FALSE) {
                return;
            }
        }
        if (strpos($_SERVER["REQUEST_URI"], '/admin/') == FALSE) {
            return;
        }
    }
    header("location: /dashboard/PHP/Laptop_Store/sign-in/sign-in.php");
}
