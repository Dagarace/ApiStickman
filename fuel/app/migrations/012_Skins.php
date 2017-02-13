<?php

namespace Fuel\Migrations;

/**
 * Description of 012_Skins
 *
 * @author alumnos
 */
class Skins {
   
     function up(){
        
        \DBUtil::create_table('Skins', array(
            'id_skin' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
        ), array('id_skin'));
   
    }
    
    function down(){
        
        \DBUtil::drop_table('Skins');
        
    }
    
}
