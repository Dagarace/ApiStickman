<?php

namespace Fuel\Migrations;

/**
 * Description of 002_Admin
 *
 * @author Claudio
 */
class Admin {
      function up(){
        
        \DBUtil::create_table('admin', array(
            'id_admin'=> array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
            'nombre_admin' => array('type' => 'varchar', 'constraint' => 100),
            'apellido_admin' => array('type' => 'varchar', 'constraint' => 100),
            'tfn_admin' => array('type' => 'varchar', 'constraint' => 12),
            ), array('id_admin'));
    }
    
    function down(){
                 
    \DBUtil::drop_table('admin'); 
        
    }
    
    
    }
