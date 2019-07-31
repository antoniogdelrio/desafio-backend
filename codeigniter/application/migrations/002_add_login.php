<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_login extends CI_Migration {//adiciona a tabela de login para cadastro usuários do painel

        public function up()
        {
                $this->dbforge->add_field(array(
                        'usuario' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'senha' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                ));
                $this->dbforge->create_table('login');
        }
 
        public function down()
        {
                $this->dbforge->drop_table('login');
        }
}