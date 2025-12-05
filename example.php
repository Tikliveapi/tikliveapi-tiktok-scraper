<?php

require 'TikLiveAPI.php';

// Replace with your actual API Key
$apiKey = 'YOUR_API_KEY';

$api = new TikLiveAPI($apiKey);

echo "<h1>TikLiveAPI Example</h1>";

// Example 1: Get User ID
echo "<h2>Get User ID for 'tiktok'</h2>";
$userID = $api->getUserID('tiktok');
echo "<pre>" . print_r($userID, true) . "</pre>";

// Example 2: Get User Info
echo "<h2>Get User Info for 'tiktok'</h2>";
$userInfo = $api->getUserInfo('tiktok');
echo "<pre>" . print_r($userInfo, true) . "</pre>";

// Example 3: Get Post Detail
echo "<h2>Get Post Detail</h2>";
$postUrl = 'https://www.tiktok.com/@tiktok/video/7460937381265411370';
$postDetail = $api->getPostDetail($postUrl);
echo "<pre>" . print_r($postDetail, true) . "</pre>";

// Example 4: Search User
echo "<h2>Search User 'tiktok'</h2>";
$searchResult = $api->searchUser('tiktok');
echo "<pre>" . print_r($searchResult, true) . "</pre>";

echo "<hr>";
echo "<h3>For examples of all 37 endpoints, please visit the <a href='https://www.tikliveapi.com/documentation/' target='_blank'>Official Documentation</a>.</h3>";
?>