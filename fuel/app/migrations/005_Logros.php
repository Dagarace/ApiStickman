<?php

namespace Fuel\Migrations;

/**
 * Description of 005_Logros
 *
 * @author alumnos
 */
class Logros {
    
    function up(){
        
        \DBUtil::create_table('Logros', array(
            'id_logros' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
            'descripcion_logros' => array('type' => 'varchar', 'constraint' => 244, 'null'=>true),
            'nombre_logros' => array('type' => 'varchar', 'constraint' => 100),
            'premio_logros' => array('type' => 'int', 'constraint' => 11),           
        ), array('id_Logros'));
   
    }
    
    function down(){
        
        \DBUtil::drop_table('Logros');
        
    }
    
}
