<?php

class Video {

    private $db;

    public $title;
    public $thumbnail;
    public $description;
    public $link;
    public $duration;
    public $video_order;
    public $video_group_id;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function get_all_videos() {
        $sql = "SELECT * FROM videos";

        return $this->db->query($sql)->fetchAll();
    }

    public function get_video_by_id($video_id) {
        $sql = "SELECT * FROM videos WHERE id = '$video_id'";

        return $this->db->query($sql)->fetch();
    }

    public function get_videos_by_video_group_id($video_group_id) {
        $sql = "SELECT * FROM videos WHERE video_group_id = '$video_group_id'";

        return $this->db->query($sql)->fetchAll();
    }

    public function add_video() {
        $sql = "INSERT INTO videos (title, thumbnail, description, link, duration, video_order, video_group_id) VALUES ('$this->title', '$this->thumbnail', '$this->description', '$this->link', '$this->duration', '$this->video_order', '$this->video_group_id')";

        return $this->db->query($sql);
    }

    public function update_video($video_id) {
        $sql = "UPDATE videos SET title = '$this->title', thumbnail = '$this->thumbnail', description = '$this->description', link = '$this->link', duration = '$this->duration', video_order = '$this->video_order', video_group_id = '$this->video_group_id' WHERE id = $video_id";

        return $this->db->query($sql);
    }

    public function delete_video($video_id) {
        $sql = "DELETE FROM videos WHERE id = '$video_id'";

        return $this->db->query($sql);
    }

}

?>