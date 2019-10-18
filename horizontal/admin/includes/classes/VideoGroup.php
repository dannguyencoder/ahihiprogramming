<?php

class VideoGroup {

    private $db;

    public $course_id;
    public $name;
    public $video_group_order;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function get_all_video_groups() {
        $sql = "SELECT * FROM video_groups";

        return $this->db->query($sql)->fetchAll();
    }

    public function get_video_group_by_id($video_group_id) {
        $sql = "SELECT * FROM video_groups WHERE id = '$video_group_id'";

        return $this->db->query($sql)->fetch();
    }

    public function get_video_groups_by_course_id($course_id) {
        $sql = "SELECT * FROM video_groups WHERE course_id = '$course_id'";

        return $this->db->query($sql)->fetchAll();
    }

    public function add_video_group() {
        $sql = "INSERT INTO video_groups(course_id, name, video_group_order) VALUES ('$this->course_id', '$this->name', '$this->video_group_order')";

        return $this->db->query($sql);
    }

    public function update_video_group($video_group_id) {
        $sql = "UPDATE video_groups SET course_id = '$this->course_id', name = '$this->name', video_group_order = '$this->video_group_order' WHERE id = '$video_group_id'";

        return $this->db->query($sql);
    }

    public function delete_video_group($video_group_id) {
        $sql = "DELETE FROM video_groups WHERE id = '$video_group_id'";
        return $this->db->query($sql);
    }

}

?>