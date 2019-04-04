<?php
/**
 * Created by PhpStorm.
 * User: singemazuo
 * Date: 2019-02-20
 * Time: 22:35
 */

class Resume_model extends CI_Model
{
    public $work_experience;
    public $education;
    public $skills;

    public function get_resume()
    {
        $query = $this->db->get('resume', 1);
        return $query->result();
    }

    public function insert_resume()
    {

    }

    public function update_resume()
    {

    }
}