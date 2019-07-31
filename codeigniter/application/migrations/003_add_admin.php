<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_admin extends CI_Migration { //adiciona um usuário admin à tabela login

        public function up()
        {
               $data = array(
                'usuario' => 'admin',
                'senha' => '1234'
                );

        $this->db->insert('login', $data);
        }
 
        public function down()
        {
                $this->db->where('usuario', 'admin');
                $this->db->where('senha', '1234');
                $this->db->delete('login');
        }
}