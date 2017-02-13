<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Fuel\Migrations;

/**
 * Description of 008_Bosses
 *
 * @author alumnos
 */
class Bosses {

      function up(){
        
        \DBUtil::create_table('Bosses', array(
            'id_bosses' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
        ), array('id_bosses'));
   
    }
    
    function down(){
        
        \DBUtil::drop_table('Bosses');
        
    }
    
}
