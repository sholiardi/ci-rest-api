<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->database();
        $this->load->dbforge();

    }

    function buat() {

        $this->dbforge->drop_table('telepon', TRUE);

        $fields = array(
            'id' => array(
                'type' => 'int',
                'constraint' => '10'
            ),
            'nama' => array(
                'type' => 'varchar',
                'constraint' => '50'
            ),
            'nomor' => array(
                'type' => 'varchar',
                'constraint' => '15'
            )
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('telepon', TRUE);

        $data = array(
            'id' => 1,
            'nama' => 'Orion',
            'nomor' => '08576666762'
        );

        $this->db->insert('telepon', $data);

        $data = array(
            'id' => 2,
            'nama' => 'Mars',
            'nomor' => '08576666770'
        );

        $result = $this->db->insert('telepon', $data);
        
        echo $result ? 'Seeding data success' : 'Seeding data failed';

    }

    function hapus() {

        if ($this->dbforge->drop_database('kontak'))
        {
            echo 'Database deleted!';
        }

    }

}

?>
