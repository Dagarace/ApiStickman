<?php

use \Firebase\JWT\JWT;

class Controller_Jwt extends Controller_Rest
{

    //Modo de codificar el token
    
    private $key = 'DG8¡_zXw7#CK9_#ft4A';
    private $algorithm = array('HS256');


    //Error si el usuario no esta registrado
    
    public static function errorAuth(){
        
        return [
            
            'code' => 401,
            'token' => 'Autentification error'
            
        ];
        
        
    }

    //Funcion de post con el login,
    
    public function post_login(){
    
        $user = new Model_user();
       
        //Creamos variable user y se la asignamos al modelo para recoger parametros de la BBDD
        
    $user = Model_User::find('all',array(
        'where' => array(
        array('email_user', Input::post('email_user')),
        )
        ));
    
    //Si el usuario no esta vacío que se ejecuto el foreach, para recoger y guardar los datos
    if (!empty($user)){
            
     foreach ($user as $key => $value){
        
         //Guarda en una variable el valor de la tabla de la BBDD       
       $id = $user[$key]->id_user;
       $username = $user[$key]->email_user;
       $password = $user[$key]->password_user;
     }
            
            
    }
    else{
        
       
        return print('usuario no registrado');
            
    }
    
    //Si los datos coinciden generamos el token
    //var_dump($password);
    if ($username == Input::post('email_user') && $password == Input::post('password_user')){
        
        
        $token = array(
            "id_user" => $id,
            "email_user" => $username,
            "password_user" => $password
        );
        
        //Lo codificamos a través de la key que hemos puesto al principio
        
        $jwt = JWT::encode($token, $this->key);
        
        
        //Nos devuelve el codigo de autentificacion con el token codificado y 
        //el code 200 que significa que ha tenido éxito
        return
        [
            'code' => 200,
            'token' => $jwt
        ];
        
        
        
    }else{
        
        print('usuario incorrecto');
        return $this->errorAuth();
        
    }
 }
 
 
 /**
  * 
  * Funcion para comprobar la verificacion del token y devolverte los valores del usuario que se busca
  * 
  */
 public function post_user(){
     
     //Si la variable datosUsers es true, accede al usuario y te lo muestra
     
     if ($this->LoginAuthentification()){
         
         $users = Model_user::find('all',array(
        'where' => array(
        array('email_user', Input::post('email_user')),
        )
        ));
         return $users; 
     }
     //Si datosUsers es falso, te da el error de autentificacion
     else{
         
         return $this->errorAuth();
         
     }
     
     
 }

 

 private function LoginAuthentification (){
      
      // Coge todas las variables que te pasa por la cabecera
      
      $tokenHeader = apache_request_headers();
      
      
      //Comprueba si el token esta activo, y lo compara, si la informacion es la misma 
      //a la de la BBDD te autentifica, si no, te lanza un error
      
      //isset — Determina si una variable está definida y no es NULL


      if(isset($tokenHeader['token']))
      {
          //creamos una variable para almacenar el token que te devuelve por la cabecera
          
          $token = $tokenHeader['token'];
          
          //Al recibir la info de la cabecera, se descodifica los datos con la llave 
          //y el algorithmo de la funcion anterior
          
           $datosUsers = JWT::decode($token, $this->key, $this->algorithm);      
          
           //Una vez descodificamos comprobamos si el usuario que devuelve es el mismo que el 
           //usuario introducido y si la contraseña introducida es la misma que la que te devuelve
           
           if(isset($datosUsers->email_user) and isset($datosUsers->password_user)){
               
               //Creamos una variable en el que metemos el modelo, en esta variable
               //vamos a hacer una 'query' en la que preguntamos al modelo de la BBDD
               //que cogemos del array: find('all'), donde: 'where', el campo email_user sea
               //el mismo que esta puesto en la BBDD (Este email_user es el que se mete por
               //consulta del cliente)
               
               
               $user = Model_user::find('all', array(
                   
                   'where' => array(
                       
                       array('email_user', $datosUsers->email_user),
                   )
                   ));
               
               //Si el usuario no esta vacío recorre el array user, para guardar los datos
               //para comprobarlos con el token
               

                //empty — Determina si una variable está vacía
               if(!empty($user)){
                   
                   foreach ($user as $key => $value){
        
         //Guarda en una variable el valor de la tabla de la BBDD       
                            $id = $user[$key]->id_user;
                            $username = $user[$key]->email_user;
                            $password = $user[$key]->password_user;
                         }
                   
                   
               }
               
           }
           
           //Al no haber usuario, no puede haber autentificacion por lo que la variable
           // es false
           
           else{
               
               return false;
           }
           
           //Si el usuario y la contraseña que introduce el cliente 
           //coinciden con los de la base de datos el token descodificado se envia
           // al cliente haciendo la variable $datosUser true
           
           if($username == $datosUsers->email_user and $password == $datosUsers->password_user)
           {
               return true;
           }
           //Si la contraseña y el usuario no coincide te devuelve false y no te loguea
          else{
              
              return false;
              
          }
      }
      
      //Si el token que recibimos por la cabecera es falso, devolvemos la variable false, y no
      //descodificamos el token, porque no esta autorizado
      
      else{
          return false;
      } 
      
  }

}

