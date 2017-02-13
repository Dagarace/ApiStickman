<?php

namespace Fuel\Migrations;

/**
 * Description of 006_Enemy
 *
 * @author alumnos
 */
class Enemy {
    
    function up(){
        
        \DBUtil::create_table('Enemy', array(
            'id_enemy' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
            'descripcion_enemy' => array('type' => 'varchar', 'constraint' => 244),
            'nombre_enemy' => array('type' => 'varchar', 'constraint' => 100),
            'atq_enemy' => array('type' => 'int', 'constraint' => 3),
            'vida_enemy' => array('type' => 'int', 'constraint' => 5),
            'url_foto_enemy' => array('type' => 'varchar', 'constraint' => 100),
            'id_normales' => array('type' => 'int', 'constraint' => 11),
            'id_bosses' => array('type' => 'int', 'constraint' => 11),
        ), array('id_enemy'));
   
    }
    
    function down(){
        
        \DBUtil::drop_table('Enemy');
        
    }
}
