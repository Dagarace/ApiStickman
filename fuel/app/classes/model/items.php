<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model_items extends Orm\Model {
 
    protected static $_table_name = 'Items';
    protected static $_primary_key = array('id_items');
    protected static $_properties = array(
        
            'id_items' ,
            'descripcion_items' => array('type' => 'varchar', 'constraint' => 244),
            'nombre_items' => array('type' => 'varchar', 'constraint' => 100),
            'tinta_items' => array('type' => 'int', 'constraint' => 3),
            'tinta_gold_items' => array('type' => 'int', 'constraint' => 5),
            'url_foto_items' => array('type' => 'varchar', 'constraint' => 100),
            'tipo_items' => array('type' => 'varchar', 'constraint' => 100),
            'id_arma' => array('type' => 'int', 'constraint' => 11),
            'id_skin' => array('type' => 'int', 'constraint' => 11),
            'id_escudo' => array('type' => 'int', 'constraint' => 11)
            
    
    );
    
}

