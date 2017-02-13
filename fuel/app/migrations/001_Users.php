<?php

namespace Fuel\Migrations;

/**
 * Description of 001_Users
 *
 * @author Claudio
 */
class Users {
 
    function up(){
        
        \DBUtil::create_table('users', array(
            'id_user'=> array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
            'url_foto' => array('type' => 'varchar', 'constraint' => 100, 'null'=>true),
            'email_user' => array('type' => 'varchar', 'constraint' => 100),
            'password_user' => array('type' => 'varchar', 'constraint' => 255),
            'id_admin' => array('type' => 'int', 'constraint' => 11),
            'id_player' => array('type' => 'int', 'constraint' => 11),
            ), array('id_user'));

        \DB::query("ALTER TABLE `users` ADD UNIQUE(`email_user`);")->execute();
    }
    
    function down(){
                 
    \DBUtil::drop_table('users'); 
        
    }
    
    
}
