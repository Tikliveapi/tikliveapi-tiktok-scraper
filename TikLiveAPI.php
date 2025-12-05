<?php

class TikLiveAPI
{
    private $apiKey;
    private $baseUrl = "https://api.tikliveapi.com/";

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Make a request to the TikLiveAPI
     * 
     * @param string $endpoint The endpoint to call (e.g., 'userid')
     * @param array $params Query parameters (e.g., ['username' => 'tiktok'])
     * @return mixed JSON decoded response or raw response on error
     */
    public function request($endpoint, $params = [])
    {
        $url = $this->baseUrl . ltrim($endpoint, '/') . '/?' . http_build_query($params);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-Api-Key: " . $this->apiKey
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return ["error" => "cURL Error #:" . $err];
        } else {
            return json_decode($response, true);
        }
    }

    // --- Users Endpoints ---

    public function getUserID($username)
    {
        return $this->request('userid', ['username' => $username]);
    }

    public function getUserInfo($username)
    {
        return $this->request('userinfo-by-username', ['username' => $username]);
    }

    public function getUserInfoByID($userid)
    {
        return $this->request('userinfo-by-id', ['userid' => $userid]);
    }

    public function getUserPosts($userid, $count = 10, $cursor = 0)
    {
        return $this->request('user-posts', [
            'userid' => $userid,
            'count' => $count,
            'cursor' => $cursor
        ]);
    }

    public function getUserFollowers($userid, $count = 50, $time = 0)
    {
        return $this->request('user-followers', [
            'userid' => $userid,
            'count' => $count,
            'time' => $time
        ]);
    }

    public function getUserFollowing($userid, $count = 50, $time = 0)
    {
        return $this->request('user-following', [
            'userid' => $userid,
            'count' => $count,
            'time' => $time
        ]);
    }

    public function searchUser($keyword, $count = 10, $cursor = 0)
    {
        return $this->request('search-user', [
            'keyword' => $keyword,
            'count' => $count,
            'cursor' => $cursor
        ]);
    }

    public function getUserCollections($userid, $count = 10, $cursor = 0)
    {
        return $this->request('user-collections', [
            'userid' => $userid,
            'count' => $count,
            'cursor' => $cursor
        ]);
    }

    public function getUserLikedPosts($userid, $count = 2, $cursor = 0)
    {
        return $this->request('user-liked', [
            'userid' => $userid,
            'count' => $count,
            'cursor' => $cursor
        ]);
    }

    public function getUserPlaylists($userid, $count = 10, $cursor = 0)
    {
        return $this->request('user-playlists', [
            'userid' => $userid,
            'count' => $count,
            'cursor' => $cursor
        ]);
    }

    public function getUserStories($userid)
    {
        return $this->request('user-stories', ['userid' => $userid]);
    }

    // --- Posts (Videos) Endpoints ---

    public function getPostDetail($url)
    {
        return $this->request('post-detail', ['url' => $url]);
    }

    public function getPostComments($url, $count = 10, $cursor = 0)
    {
        return $this->request('post-comments', [
            'url' => $url,
            'count' => $count,
            'cursor' => $cursor
        ]);
    }

    public function getPostCommentReplies($video_id, $comment_id, $count = 10, $cursor = 0)
    {
        return $this->request('post-comment-replies', [
            'video_id' => $video_id,
            'comment_id' => $comment_id,
            'count' => $count,
            'cursor' => $cursor
        ]);
    }

    public function getMusicPosts($music_id, $count = 10, $cursor = 0)
    {
        return $this->request('music-posts', [
            'music_id' => $music_id,
            'count' => $count,
            'cursor' => $cursor
        ]);
    }

    public function getChallengePosts($challenge_id, $count = 10, $cursor = 0, $region = '')
    {
        return $this->request('challenge-posts', [
            'challenge_id' => $challenge_id,
            'count' => $count,
            'cursor' => $cursor,
            'region' => $region
        ]);
    }

    public function getPlaylistPosts($playlist_id, $count = 10, $cursor = 0)
    {
        return $this->request('playlist-posts', [
            'playlist_id' => $playlist_id,
            'count' => $count,
            'cursor' => $cursor
        ]);
    }

    public function getCollectionPosts($collection_id, $count = 10, $cursor = 0)
    {
        return $this->request('collection-posts', [
            'collection_id' => $collection_id,
            'count' => $count,
            'cursor' => $cursor
        ]);
    }

    public function searchVideo($keyword, $count = 10, $cursor = 0, $publish_time = 0, $sort_by = 0, $region = '')
    {
        return $this->request('search-video', [
            'keyword' => $keyword,
            'count' => $count,
            'cursor' => $cursor,
            'publish_time' => $publish_time,
            'sort_by' => $sort_by,
            'region' => $region
        ]);
    }

    // --- Music Endpoints ---

    public function getMusicInfo($music_id)
    {
        return $this->request('music-info', ['music_id' => $music_id]);
    }

    // --- Challenge Endpoints ---

    public function getChallengeInfoByID($id)
    {
        return $this->request('challenge-info-id', ['id' => $id]);
    }

    public function getChallengeInfoByName($name)
    {
        return $this->request('challenge-info-name', ['name' => $name]);
    }

    public function searchChallenge($keyword, $count = 10, $cursor = 0)
    {
        return $this->request('search-challenge', [
            'keyword' => $keyword,
            'count' => $count,
            'cursor' => $cursor
        ]);
    }

    // --- Playlist (Mix) Endpoints ---

    public function getPlaylistInfo($playlist_id)
    {
        return $this->request('playlist-info', ['playlist_id' => $playlist_id]);
    }

    // --- Download Endpoints ---

    public function downloadVideo($url)
    {
        return $this->request('download-video', ['url' => $url]);
    }

    public function downloadMusic($url)
    {
        return $this->request('download-music', ['url' => $url]);
    }

    // --- Collection Endpoints ---

    public function getCollectionInfo($collection_id)
    {
        return $this->request('collection-info', ['collection_id' => $collection_id]);
    }

    // --- Region Endpoints ---

    public function getRegionList()
    {
        return $this->request('region-list');
    }

    // --- Ads Endpoints ---

    public function getAdsDetail($url)
    {
        return $this->request('ads-detail', ['url' => $url]);
    }
}
?>