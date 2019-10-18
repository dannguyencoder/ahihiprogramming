<?php

function getFilesByVideoId($video_id) {
    global $db;

    $sql = "SELECT * FROM files WHERE video_id = $video_id";

    $result = $db->query($sql);

    return $result->fetchAll();
}

?>