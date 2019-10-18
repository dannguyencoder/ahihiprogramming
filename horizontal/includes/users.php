<?php

function getUserById($user_id) {
    global $db;

    $sql = "SELECt * FROM users WHERE id = $user_id";

    $result = $db->query($sql);

    return $result->fetch();
}

function getNumberOfCoursesByUser($user_id) {
    global $db;

    $sql = "select count(*) as 'number_of_courses' from courses where user_id = $user_id";

    $result = $db->query($sql);

    return $result->fetch()['number_of_courses'];
}

?>