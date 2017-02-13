<?php

namespace Fuel\Migrations;

/**
 * Description of 003_Player
 *
 * @author Claudio
 */
class Player {
     function up(){
        
        \DBUtil::create_table('player', array(
            'id_player'=> array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
            'alias_player' => array('type' => 'varchar', 'constraint' => 100),
            'tinta_player' => array('type' => 'int', 'constraint' => 11),
            'tinta_gold_player' => array('type' => 'int', 'constraint' => 11),
            'puntuacion_player' => array('type' => 'int', 'constraint' => 11),
            ), array('id_player'));
    }
    
    function down(){
                 
    \DBUtil::drop_table('player'); 
        
    }
}
