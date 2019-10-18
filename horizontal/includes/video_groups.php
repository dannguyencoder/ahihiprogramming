<?php

function getVideoGroups($course_id)
{
    global $db;

    $sql = "SELECT * FROM video_groups WHERE course_id = $course_id";
//    echo $sql;

    $result = $db->query($sql);

    return $result->fetchAll();
}

?>