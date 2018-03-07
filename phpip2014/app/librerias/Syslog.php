<?php

//use Illuminate\Auth\UserTrait;
//use Illuminate\Auth\UserInterface;
//use Illuminate\Auth\Reminders\RemindableTrait;
//use Illuminate\Auth\Reminders\RemindableInterface;

//class com_rubro extends Eloquent implements UserInterface, RemindableInterface {
// thanks http://stackoverflow.com/questions/14076392/laravel-model-and-table-naming-with-underscore

class Syslog {

//	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sys_log';
    //protected $fillable = array('rubro', 'descripcion', 'peso');
    // Function to get the client ip address

    public static function client_ip() {
        /*if ($_SERVER['HTTP_CLIENT_IP'])
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        elseif($_SERVER['HTTP_X_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        elseif($_SERVER['HTTP_X_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        elseif($_SERVER['HTTP_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        elseif($_SERVER['HTTP_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        elseif($_SERVER['REMOTE_ADDR'])
            $ipaddress = $_SERVER['REMOTE_ADDR'];
            * */
        //else
        //    $ipaddress = 'UNKNOWN';
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');

        return $ipaddress;
    }


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	protected $hidden = array('password', 'remember_token');

    public static $rules = array(
        'rubro' => 'Required|Min:3|Max:80',
        'peso'       => 'Required|Integer|Min:1'
    );
    
    public static $messages;
 
    public static function passesValidation($data) {
        $messages = array(
            //'required' => 'The :attribute field is required.',
            'required' => 'El campo <b>:attribute</b> es obligatorio.',
            'min' => '<b>:attribute</b> debe ser tener al menos :min caracteres.',
            'integer' => '<b>:attribute</b> debe ser un número.',
        );

        $validation = Validator::make($data, static::$rules, $messages);    
        
        if($validation->passes()) {
            return true;
        }
        
        static::$messages = $validation->messages();
        
        return false;
    }
	 */

}
