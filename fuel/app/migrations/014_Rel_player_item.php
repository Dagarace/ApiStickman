<?php

namespace Fuel\Migrations;

/**
 * Description of 014_Rel_player_item
 *
 * @author alumnos
 */
class Rel_player_item {
    function up(){
        
        \DBUtil::create_table('Rel_player_item', array(
            'id_player' => array('type' => 'int', 'constraint' => 11),
            'id_item' => array('type' => 'int', 'constraint' => 11),
        ), array('id_player','id_item'));
   
    }
    
    function down(){
        
        \DBUtil::drop_table('Rel_player_item');
        
    }
}
