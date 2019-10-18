<?php

function getVideos($limit = 0)
{
    global $db;

    $sql = 'SELECT * FROM videos ORDER BY id DESC';

    if ($limit) {
        $sql .= " LIMIT $limit";
    }

    $result = $db->query($sql);

    return $result->fetchAll();
}

function getVideosByTopic($topic = null, $limit = 0)
{
    global $db;

    $sql = 'select videos.* from videos join video_groups on videos.video_group_id = video_groups.id join courses on video_groups.course_id = courses.id WHERE 1=1';

    if ($topic) {
        $sql .= " AND courses.topic='$topic'";
    }

    $sql .= ' ORDER BY videos.id DESC';

    if ($limit) {
        $sql .= " LIMIT $limit";
    }

    $result = $db->query($sql);

    return $result->fetchAll();
}

function getVideosByGroup($video_group_id) {
    global $db;

    $sql = "SELECT * FROM videos WHERE video_group_id = $video_group_id";

    $result = $db->query($sql);

    return $result->fetchAll();
}

function getVideoById($video_id) {
    global $db;

    $sql = "SELECT * FROM videos WHERE id = $video_id";

    $result = $db->query($sql);

    return $result->fetch();
}