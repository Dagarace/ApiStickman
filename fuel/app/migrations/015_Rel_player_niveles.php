<?php

namespace Fuel\Migrations;

/**
 * Description of 015_Rel_player_niveles
 *
 * @author alumnos
 */
class Rel_player_niveles {
    function up(){
        
        \DBUtil::create_table('Rel_player_niveles', array(
            'id_player' => array('type' => 'int', 'constraint' => 11),
            'id_logro' => array('type' => 'int', 'constraint' => 11),
        ), array('id_player','id_logro'));
   
    }
    
    function down(){
        
        \DBUtil::drop_table('Rel_player_niveles');
        
    }
}
