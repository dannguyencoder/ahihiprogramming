<?php

class File {

    private $db;

    public $title;
    public $description;
    public $link;
    public $video_id;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function get_all_files()
    {
        $sql = "SELECT * FROM files";

        return $this->db->query($sql)->fetchAll();
    }

    public function get_file_by_id($file_id)
    {
        $sql = "SELECT * FROM files WHERE id = $file_id";

        return $this->db->query($sql)->fetch();
    }

    public function get_files_by_video_id($video_id)
    {
        $sql = "SELECT * FROM files WHERE video_id = $video_id";

        return $this->db->query($sql)->fetchAll();
    }

    public function add_file()
    {
        $sql = "INSERT INTO files (title, description, link, video_id) VALUES ('$this->title', '$this->description', '$this->link', '$this->video_id')";

        return $this->db->query($sql);
    }

    public function update_file($file_id) {
        $sql = "UPDATE files SET title = '$this->title', description = '$this->description', link = '$this->link', video_id = '$this->video_id' WHERE id = $file_id";

        return $this->db->query($sql);
    }

    public function delete_file($file_id)
    {
        $sql = "DELETE FROM files WHERE id = $file_id";

        return $this->db->query($sql);
    }


}

?>