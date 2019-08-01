<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Update_admin extends CI_Migration { //adiciona um usuário admin à tabela login

        public function up()
        {
              $this->db->set('senha', password_hash('1234', PASSWORD_DEFAULT));
              $this->db->where('usuario', 'admin');
              $this->db->update('login');
        }
 
        public function down()
        {
              $this->db->set('senha', '1234');
              $this->db->where('usuario', 'admin');
              $this->db->update('login');
        }
}