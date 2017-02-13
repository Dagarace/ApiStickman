<?php

namespace Fuel\Migrations;

/**
 * Description of 016_Rel_normales_niveles
 *
 * @author alumnos
 */
class Rel_normales_niveles {
   
    function up(){
        
        \DBUtil::create_table('Rel_normales_niveles', array(
            'id_normal' => array('type' => 'int', 'constraint' => 11),
            'id_niveles' => array('type' => 'int', 'constraint' => 11),
        ), array('id_normal','id_niveles'));
   
    }
    
    function down(){
        
        \DBUtil::drop_table('Rel_normales_niveles');
        
    }
}
