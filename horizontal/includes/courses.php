<?php

function getCourses($topic=null, $type=null, $limit=0) {
    global $db;
    
    $sql = 'SELECT * FROM courses WHERE 1=1';
    
    if ($topic) {
        $sql .= " AND topic='$topic'";
    }
    
    if ($type) {
        $sql .= " AND type='$type'";
    }

    $sql .= ' ORDER BY id DESC';

    if ($limit) {
        $sql .= " LIMIT $limit";
    }

    $result = $db->query($sql);

    return $result->fetchAll();
}

function getSingleCourseByTopicAndType($topic=null, $type=null, $limit=0) {
    global $db;

    $sql = 'SELECT * FROM courses WHERE 1=1';

    if ($topic) {
        $sql .= " AND topic='$topic'";
    }

    if ($type) {
        $sql .= " AND type='$type'";
    }

    $sql .= ' ORDER BY id DESC';

    if ($limit) {
        $sql .= " LIMIT $limit";
    }

    $result = $db->query($sql);

    return $result->fetch();
}

function getCourseBySlug($slug) {
    global $db;

    $sql = "SELECT * FROM courses WHERE slug = '$slug'";

    $result = $db->query($sql);

    return $result->fetch();
}

function getCourseTotalDuration($course_id) {
    global $db;

    $query = "select sum(videos.duration) as 'total_duration' from videos join video_groups on videos.video_group_id = video_groups.id join courses on video_groups.course_id = courses.id where courses.id = $course_id;";

    $result = $db->query($query);

    return $result->fetch();
}

function getNumberOfCourseVideos($course_id) {
    global $db;

    $query = "select count(*) as 'number_of_videos' from videos join video_groups on videos.video_group_id = video_groups.id join courses on video_groups.course_id = courses.id where courses.id = $course_id";

    $result = $db->query($query);

    return $result->fetch();
}

function getNumberOfCourseVideoGroups($course_id) {
    global $db;

    $query = "select count(*) as 'number_of_videos' from videos join video_groups on videos.video_group_id = video_groups.id join courses on video_groups.course_id = courses.id where courses.id = $course_id";

    $result = $db->query($query);

    return $result->fetch();
}

function getCourseByVideoId($video_id) {
    global $db;

    $query = "select courses.* from courses join video_groups on courses.id = video_groups.course_id join videos on videos.video_group_id = video_groups.id where videos.id = $video_id;";

    $result = $db->query($query);

    return $result->fetch();
}