<?php

class Blog_model extends CI_Model{
    private $id;
    private $title;
    private $content;
    private $img;
    private $date;

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert_blog($_title,$_content,$_img){
        $this->title = $_title;
        $this->content = $_content;
        $this->img = $_img;

        $data = array(
            'title' => $this->title,
            'content' => $this->content,
            'img' => './uploads/'.$this->img['file_name']
        );

        $this->db->insert('blog', $data);

        return $this->db->insert_id();
    }

    public function update_blog($title,$content,$img,$date,$id){
        $this->db->set('title', $title);
        $this->db->set('content', $content);
        $this->db->set('img', './uploads/'.$img['file_name']);
        $this->db->set('date', $date);

        $this->db->where('id', $id);
        $this->db->update('blog');

        return $this->db->affected_rows();
    }

    public function delete_blogs($ids){
        $this->db->where_in('id', $ids);
        $this->db->delete('blog');

        return $this->db->affected_rows();
    }

    public function retrieve_blog($id){
        $query = $this->db->get_where('blog');
        if (!empty($id)){
            $query = $this->db->get_where('blog',array('id' => $id));
        }

        return $query->row_array();
    }

    public function retrieve_blogs(){
        $query = $this->db->get('blog');

        return $query->result();
    }
}