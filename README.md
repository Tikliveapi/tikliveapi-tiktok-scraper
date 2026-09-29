# TikLiveAPI - PHP Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tikliveapi/tiktok-scraper.svg)](https://packagist.org/packages/tikliveapi/tiktok-scraper)
[![Total Downloads](https://img.shields.io/packagist/dt/tikliveapi/tiktok-scraper.svg)](https://packagist.org/packages/tikliveapi/tiktok-scraper)
[![License](https://img.shields.io/packagist/l/tikliveapi/tiktok-scraper.svg)](https://packagist.org/packages/tikliveapi/tiktok-scraper)

A simple PHP wrapper for [**TikLiveAPI**](https://www.tikliveapi.com/) - a fast, reliable **TikTok Scraper API** for real-time user, video, music, hashtag, and search data.

**Website:** [tikliveapi.com](https://www.tikliveapi.com/) · **Documentation:** [tikliveapi.com/documentation](https://www.tikliveapi.com/documentation/) · **Get an API key:** [tikliveapi.com/register](https://www.tikliveapi.com/register/)

## Features

- **Easy to use:** Simple object-oriented interface.
- **Lightweight:** One class file; needs only PHP 7.4+ with the cURL and JSON extensions.
- **Comprehensive:** Access User, Video, Search, and Music data.

## Pricing and limits

- New accounts get 100 free credits after email verification, no card required.
- Pay-as-you-go: one successful request costs one credit, and credits never expire.
- Standard rate limit: 200 requests per minute (can be raised on request).
- Every request is fetched from TikTok in real time. TikLiveAPI does not store or cache TikTok data.

## Installation

### Composer (recommended)

```bash
composer require tikliveapi/tiktok-scraper
```

Then include Composer's autoloader:

```php
require 'vendor/autoload.php';
```

### Manual

1. Download `TikLiveAPI.php` and include it in your project.
2. Create an account at [tikliveapi.com/register](https://www.tikliveapi.com/register/) and copy your API key from your profile page.

## Usage

```php
require 'vendor/autoload.php'; // or: require 'TikLiveAPI.php';

// Initialize with your API Key
$api = new TikLiveAPI('YOUR_API_KEY');

// Get User ID
$result = $api->getUserID('tiktok');
print_r($result);

// Get User Info
$info = $api->getUserInfo('tiktok');
print_r($info);
```

## Available Endpoints

### Users
- **User ID** (`getUserID`): Get the unique User ID by username.
- **User Info** (`getUserInfo`): Get detailed user information by username.
- **User Info by ID** (`getUserInfoByID`): Get user information by numeric ID.
- **User Posts** (`getUserPosts`): Retrieve posts from a specific user.
- **User Followers** (`getUserFollowers`): Get the list of followers for a user.
- **User Following** (`getUserFollowing`): Get the list of accounts a user is following.
- **User Search** (`searchUser`): Search for users by keyword.
- **User Collections** (`getUserCollections`): Get user collections (favorites).
- **User Liked Posts** (`getUserLikedPosts`): Get posts liked by a user.
- **User Playlists** (`getUserPlaylists`): Get playlists created by a user.
- **User Stories** (`getUserStories`): Get stories from a user.

### Posts (Videos)
- **Post Detail** (`getPostDetail`): Get detailed information about a specific post.
- **Post Comments** (`getPostComments`): Get comments for a specific post.
- **Post Comment Replies** (`getPostCommentReplies`): Get replies to a specific comment.
- **Post Music** (`getMusicPosts`): Get posts associated with a specific music track.
- **Post Challenge** (`getChallengePosts`): Get posts associated with a specific challenge.
- **Post Playlist** (`getPlaylistPosts`): Get posts from a specific playlist.
- **Posts Collection** (`getCollectionPosts`): Get posts from a specific collection.
- **Post Search** (`searchVideo`): Search for posts (videos) by keyword.

### Music
- **Music Info** (`getMusicInfo`): Get details about a music track.
- **Music Posts** (`getMusicPosts`): Get posts that use a specific music track.

### Challenge (Hashtags)
- **Challenge Info (ID)** (`getChallengeInfoByID`): Get challenge info by ID.
- **Challenge Info (Name)** (`getChallengeInfoByName`): Get challenge info by name (hashtag).
- **Challenge Posts** (`getChallengePosts`): Get posts for a specific challenge.
- **Challenge Search** (`searchChallenge`): Search for challenges.

### Playlist (Mix)
- **Playlist Info** (`getPlaylistInfo`): Get playlist details.
- **Playlist Posts** (`getPlaylistPosts`): Get posts in a playlist.
- **Playlist by User** (`getUserPlaylists`): Get playlists for a user.

### Collection
- **Collection Info** (`getCollectionInfo`): Get collection details.
- **Collection Posts** (`getCollectionPosts`): Get posts in a collection.
- **Collection by User** (`getUserCollections`): Get collections for a user.

### Download
- **Download Video** (`downloadVideo`): Download a video without watermark.
- **Download Music** (`downloadMusic`): Download music track.

### Region
- **Region List** (`getRegionList`): Get list of available regions.

### Ads
- **Ads Detail** (`getAdsDetail`): Get ad details.

For full documentation and parameter details, visit [https://www.tikliveapi.com/documentation/](https://www.tikliveapi.com/documentation/).

## Disclaimer

TikLiveAPI is an independent service and is not affiliated with TikTok or ByteDance. Use the data in line with TikTok's terms and the privacy laws that apply to you.

## License

MIT
