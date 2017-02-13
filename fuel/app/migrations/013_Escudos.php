<?php

namespace Fuel\Migrations;

/**
 * Description of 013_Escudos
 *
 * @author alumnos
 */
class Escudos {
    
    function up(){
        
        \DBUtil::create_table('Escudos', array(
            'id_escudo' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
            'defensa_escudo' => array('type' => 'int', 'constraint' => 3),
        ), array('id_escudo'));
   
    }
    
    function down(){
        
        \DBUtil::drop_table('Escudos');
        
    }
}
