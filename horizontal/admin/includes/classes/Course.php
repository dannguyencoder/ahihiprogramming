<?php

class Course {

    private $db;

    public $topic;
    public $type;
    public $name;
    public $slug;
    public $short_description;
    public $long_description;
    public $thumbnail;
    public $old_price;
    public $price;
    public $remaining_slots;
    public $inner_description;
    public $course_order;
    public $user_id;
    public $is_active;



    public function __construct($db)
    {
        $this->db = $db;
    }

    public function get_all_courses() {
        $sql = "SELECT * FROM courses";

        return $this->db->query($sql)->fetchAll();
    }

    public function get_course_by_id($courseId) {
        $sql = "SELECT * FROM courses where id = '$courseId'";

        return $this->db->query($sql)->fetch();
    }

    public function add_course() {
        $sql = "INSERT INTO courses (topic, type, name, slug, short_description, long_description, thumbnail, old_price, price, remaining_slots, inner_description, course_order, user_id, is_active) VALUES ('$this->topic', '$this->type', '$this->name', '$this->slug', '$this->short_description', '$this->long_description', '$this->thumbnail', '$this->old_price', '$this->price', '$this->remaining_slots', '$this->inner_description', '$this->course_order', '$this->user_id',  '$this->is_active')";

        return $this->db->query($sql);
    }

    public function update_course($course_id){
        $sql = "UPDATE courses SET topic = '$this->topic', type = '$this->type', name = '$this->name', slug = '$this->slug', short_description =  '$this->short_description', long_description = '$this->long_description', thumbnail = '$this->thumbnail', old_price = '$this->old_price', price = '$this->price', remaining_slots = '$this->remaining_slots', inner_description = '$this->inner_description', course_order = '$this->course_order', user_id = '$this->user_id', is_active = '$this->is_active' WHERE id = $course_id";

        return $this->db->query($sql);
    }

    public function delete_course($course_id) {
        $sql = "DELETE FROM courses WHERE id = '$course_id'";

        return $this->db->query($sql);
    }

}

?>