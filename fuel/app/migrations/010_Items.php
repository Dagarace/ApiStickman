<?php


namespace Fuel\Migrations;

/**
 * Description of 010_Items
 *
 * @author alumnos
 */
class Items {
    function up(){
        
        \DBUtil::create_table('Items', array(
            'id_items' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
            'descripcion_items' => array('type' => 'varchar', 'constraint' => 244),
            'nombre_items' => array('type' => 'varchar', 'constraint' => 100),
            'tinta_items' => array('type' => 'int', 'constraint' => 3),
            'tinta_gold_items' => array('type' => 'int', 'constraint' => 5),
            'url_foto_items' => array('type' => 'varchar', 'constraint' => 100),
            'tipo_items' => array('type' => 'varchar', 'constraint' => 100),
            'id_arma' => array('type' => 'int', 'constraint' => 11),
            'id_skin' => array('type' => 'int', 'constraint' => 11),
            'id_escudo' => array('type' => 'int', 'constraint' => 11),
        ), array('id_items'));
   
    }
    
    function down(){
        
        \DBUtil::drop_table('Items');
        
    }
}
