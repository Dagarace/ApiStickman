<?php


/**
 * Description of Controller_Users
 *
 * @author alumnos
 */

use \Firebase\JWT\JWT;


class Controller_Users extends Controller_Rest {
    
    //Modo de codificar el token
    
    private $key = 'DG8¡_zXw7#CK9_#ft4A';
    private $algorithm = array('HS256');
    
    private function error($code, $mensaje)
    {
        return [
                    'code' => $code, 
                    'mensaje' => $mensaje,
                   
               ];
    }
    
    private function  exito($code, $mensaje)
    {
        return [
                    'code' => $code, 
                    'mensaje' => $mensaje,
               ];
    }

    








    private function LoginAuthentification ()
    {
        $tokenHeader = apache_request_headers();

         //isset — Determina si una variable está definida y no es NULL

         if(isset($tokenHeader['token']))
         {
            $token = $tokenHeader['token'];
            $datosUsers = JWT::decode($token, $this->key, $this->algorithm);      

            if(isset($datosUsers->email_user) and isset($datosUsers->password_user))
            {
                  $user = Model_user::find('all', array(
                                                        'where' => array(
                                                                          array('email_user', $datosUsers->email_user),
                                                                         )
                                           ));
                  
                  
                  if(!empty($user))
                  {
                      foreach ($user as $key => $value)
                      {
                            $id = $user[$key]->id_user;
                            $username = $user[$key]->email_user;
                            $password = $user[$key]->password_user;
                      }
                  }
                  else
                  {
                      return false;
                  }
            }
            else
            {
                  return false;
            }

            if($username == $datosUsers->email_user and $password == $datosUsers->password_user)
            {
                  return true;
            }
            else
            {
                 return false;
             }
        }
        else
        {
             return false;
        } 

    }

  
  //------------------------- FUNCION PARA HACER LOGIN -----------------------------//

  //--------------------------------------------------------------------------------//  

    public function post_login()
    {
    
        $user = new Model_user();
        $user = Model_User::find('all',array(
                                'where' => array(
                                                array('email_user', Input::post('email_user')),
                                               )
            ));
        
        if (!empty($user))
        {
            foreach ($user as $key => $value)
            {
                $id = $user[$key]->id_user;
                $username = $user[$key]->email_user;
                $password = $user[$key]->password_user;
            }
        }
        else
        {
             return $this->error($code = 500, $mensaje = 'Error de autentificacion');
        }
    
        if ($username == Input::post('email_user') && $password == Input::post('password_user'))
        {
       
            $token = array(
                            "id_user" => $id,
                            "email_user" => $username,
                            "password_user" => $password
            );

            $jwt = JWT::encode($token, $this->key);

            return
            [
                'code' => 200,
                'token' => $jwt
            ];
        }
        else
        {
            return $this->error($code = 500, $mensaje = 'Error de Autentificacion');
        }
    }
 
 
  //------------------------- DEVUELVE TODOS LOS USUARIOS-----------------------------//

  //--------------------------------------------------------------------------------//   
  
 
    public function get_users()
    {
        try
        {
            if($this->LoginAuthentification())
            {
            $entry = Model_user::find('all');
            return $entry;
            }
            else
            {
                return $this->error($code = 500, $mensaje = 'Error de Autentificacion');
            }
        }
        catch ( exception $e)
        {
             return $this->error($code = 500, $e->getMessage());
        }

    }
    

    
  //------------------------- DEVUELVE TODOS LOS USUARIOS CON ITEMS-----------------------------//

  //--------------------------------------------------------------------------------//   
  
 
    /*public function get_searchItems()
    {
        try 
        {
            $this->LoginAuthentification ();
            $user = new Model_items();
            $entry = Model_user::find('all') && Model_items::find('all');
            return $entry;
        }
        catch (Exception $e)
        {
           return $this->erro();
        }
    }*/
    
    
    
    
    
    
  //------------------------- DEVUELVE LOS USUARIOS POR ID   -----------------------------//

  //--------------------------------------------------------------------------------------//   
    
    public function get_user($id)
    {
        try
        { 
            if($this->LoginAuthentification())
            {
                $user = Model_user::find($id);
                return $this->response ( ['Email' => $user->email_user,
                                          'Constrasena' => $user->password_user,
                                          'Foto'=>$user->url_foto
                        
                                         ]);
            }
            else 
            {
                return $this->error($code = 500, $mensaje = 'Error de Autentificacion');
            }
        }
        catch ( exception $e)
        {
          return $this->error($code = 500, $mensaje = $e->getMessage());
        }
    }
    

  
  //------------------------- CREAR USUARIO-----------------------------//
  //           SI SE CREA UN USUARIO IGUAL SALE UN ERROR
  //--------------------------------------------------------------------------------//   

    public function post_create()
    {
        $new_user = new Model_user();
        $new_user->email_user = Input::post('email_user');
        $new_user->password_user = Input::post('password_user');
        $new_user->url_foto = Input::post('url_foto');

        if(empty($new_user->email_user))
        {
             return $this->error($code = 500, $mensaje = 'Error de Autentificacion');
        }
        else if(empty ($new_user->password_user ))
        {
            return $this->error($code = 500, $mensaje = 'Error de Autentificacion');
        }
       
        try
        {
            $new_user->save();
            return $this->exito($code = 200, $mesaje = 'Usuario Creado');
        } 
        catch ( exception $e)
        {
            return $this->error($code = 500, $mensaje = $e->getMessage());
        }
     }



 //----------------------------CAMBIAR DATOS USUARIO-------------------------------//
 
 //--------------------------------------------------------------------------------//   
    
    
  public function post_update($change_id)
  {
        
        try
        {
            if($this->LoginAuthentification()) 
            {
            $user = Model_user::find($change_id);
            $change_email = Input::post('email_user');
            $change_password = Input::post('password_user');
            $change_foto = Input::post('url_foto');

                    try
                    {
                        $user->email_user = $change_email;
                        $user->password_user = $change_password;
                        $user->url_foto = $change_foto;
                        $user->save();

                        return $this->response ([
                                                  'codigo'=> 200,
                                                  'mensaje' => 'usuario modificado', 
                                                  'descripcion' => [
                                                                    'Email' => $user->email_user, 
                                                                    'Constrasena' => $user->password_user ,
                                                                    'url_foto'=>$user->url_foto
                                                                   ]
                                                ]);
                    } 
                    catch ( exception $e)
                    {
                        return $this->error($code = 500, $mensaje = $e->getMessage());
                    }  
            }
            else
            {
                return $this->error($code = 500, $mensaje = 'Error de autentificacion');
            }
       }
       catch (exception $ex) 
       {
            return $this->error($code = 500, $mensaje = $ex->getMessage());
       }  
}
    
  //----------------------------ELIMINAR DATOS USUARIO POR ID-------------------------------//
 
 //--------------------------------------------------------------------------------//  
    
    public function post_delete($user_id)
   {
        try 
        {
            if($this->LoginAuthentification())
            {
                $new_user = Model_user::find('all');
                foreach ($new_user as $user)
                {
                    if( $user['id_user'] == $user_id)
                    {     
                       $user->delete($user_id);
                       return $this->exito($code = 200, $mensaje = 'Usuario Borrado');
                    }/*else
                    {
                        return $this->error($code = 401, $mensaje = 'Error de autentificacion');
                    }*/
                }
            }
            else
            {
                return $this->error($code = 401, $mensaje = 'Error de autentificacion');
            }
            
        } 
        catch (Exception $ex)
        {
                return $this->error($code = 500, $mensaje = $ex->getMessage());
        }
   }
 
}