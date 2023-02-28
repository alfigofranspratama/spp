<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Studentaccount extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        isLogAdmin();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $data['tenth'] = $this->db->query("SELECT * FROM tb_users c LEFT JOIN student_data a ON c.id_users = a.users_id LEFT JOIN tb_class b ON a.class_id = b.class_id WHERE b.class = '10' ORDER BY a.class_id ASC")->result();
        $data['eleventh'] = $this->db->query("SELECT * FROM tb_users c LEFT JOIN student_data a ON c.id_users = a.users_id LEFT JOIN tb_class b ON a.class_id = b.class_id WHERE b.class = '11' ORDER BY a.class_id ASC")->result();
        $data['twelfth'] = $this->db->query("SELECT * FROM tb_users c LEFT JOIN student_data a ON c.id_users = a.users_id LEFT JOIN tb_class b ON a.class_id = b.class_id WHERE b.class = '12' ORDER BY a.class_id ASC")->result();
        $data['title'] = "Student Account";
        admin('transaction/view', $data);
    }

}

/* End of file Studentaccount.php */

?>