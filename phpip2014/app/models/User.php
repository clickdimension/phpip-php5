<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
    protected $fillable = array('username', 'email', 'password', 'passwd', 'access_level', 'is_inactive');
    

    public static $rules = array(
        'username' => 'Required|unique:user|Min:3',
        'email'    => 'required|unique:user|email',
            //'email'    => 'required|email' // make sure the email is an actual email
            //'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

    
    public static $messages;
 
    public static function passesValidation($data, $id = 'new') {
        $messages = array(
            //'required' => 'The :attribute field is required.',
            'required' => 'El campo <b>:attribute</b> es obligatorio.',
            'min' => '<b>:attribute</b> debe ser tener al menos :min caracteres.',
            'integer' => '<b>:attribute</b> debe ser un número.',
            'email' => 'El campo <b>:attribute</b> debe ser un email.',
            'unique' => '<b>:attribute</b> ya existe.',
        );
        
        if ($id == 'new') {
            static::$rules['password'] = 'required|alphaNum|min:3';

        } else {
            static::$rules['email'] = 'required|unique:user,email,' . $id . '|email';
            static::$rules['username'] = 'Required|unique:user,username,' . $id . '|Min:3';
            if (strlen($data['password']) > 2) {
                static::$rules['password'] = 'required|alphaNum|min:3';
            }
        }
        
        $validation = Validator::make($data, static::$rules, $messages);    
        
        if($validation->passes()) {
            return true;
        }
        
        static::$messages = $validation->messages();
        
        return false;
    }



}
