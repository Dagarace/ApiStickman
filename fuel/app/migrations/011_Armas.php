<?php

namespace Fuel\Migrations;

/**
 * Description of 011_Armas
 *
 * @author alumnos
 */
class Armas {
   
    function up(){
        
        \DBUtil::create_table('Armas', array(
            'id_arma' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
            'ataque_arma' => array('type' => 'int', 'constraint' => 3),
        ), array('id_arma'));
   
    }
    
    function down(){
        
        \DBUtil::drop_table('Armas');
        
    }
    
}
