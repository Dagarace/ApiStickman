<?php


namespace Fuel\Migrations;

/**
 * Description of 007_Normales
 *
 * @author alumnos
 */
class Normales {
    
      function up(){
        
        \DBUtil::create_table('Normales', array(
            'id_normales' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
        ), array('id_normales'));
   
    }
    
    function down(){
        
        \DBUtil::drop_table('Normales');
        
    }
    
}
