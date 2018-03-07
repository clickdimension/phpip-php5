<?php

//use Illuminate\Auth\UserTrait;
//use Illuminate\Auth\UserInterface;
//use Illuminate\Auth\Reminders\RemindableTrait;
//use Illuminate\Auth\Reminders\RemindableInterface;

//class com_rubro extends Eloquent implements UserInterface, RemindableInterface {
// thanks http://stackoverflow.com/questions/14076392/laravel-model-and-table-naming-with-underscore

class Addresses extends Eloquent{

//	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'addresses';
    protected $fillable = array('ip','mask','gateway','description','client','clientcontact','phone','email','notes','id_cliente','direccion','fecha_inicio','downlink','uplink','equipo','marca','modelo','s_n','ip_gw_lan','downlink_nac','uplink_nac','celda','id_contabilidad');// 'id',

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	protected $hidden = array('password', 'remember_token');
	 */

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

}
