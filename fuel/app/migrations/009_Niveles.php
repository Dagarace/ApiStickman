<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Fuel\Migrations;

/**
 * Description of 009_Niveles
 *
 * @author alumnos
 */
class Niveles {
   
    function up(){
        
        \DBUtil::create_table('Niveles', array(
            'id_nivel' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
            'descripcion_nivel' => array('type' => 'varchar', 'constraint' => 244),
            'nombre_nivel' => array('type' => 'varchar', 'constraint' => 100),
            'url_foto_nivel' => array('type' => 'varchar', 'constraint' => 100),
            'id_boss' => array('type' => 'int', 'constraint' => 11),
        ), array('id_nivel'));
   
    }
    
    function down(){
        
        \DBUtil::drop_table('Niveles');
        
    }
}
