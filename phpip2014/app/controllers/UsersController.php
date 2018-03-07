<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


/*
 * http://www.tek-tips.com/viewthread.cfm?qid=1520034
 * */

	public function validcheck_oldpw($usrdata)
	{
		// 
        /*
         * //check wrong user: return error
         * check missing pw64 of user ?
         *      check oldpw_valid: return error
         *      insert password = Hash::make(Input::get('password'));
         * 
         * get usrdata from db
         * missing user: return error
         * missing pw64: ...
         * 
         * */
        $user = User::where('username', $usrdata['username'])->first();
        if (is_null($user->password)){
            $input_passwd_in_oldpass = DB::select('CALL sp_oldpasswd(?)',array($usrdata['password']));
            if ($user->passwd == $input_passwd_in_oldpass[0]->oldpass){
                DB::table('user')->where('username', $usrdata['username'])->update(array('password' => Hash::make($usrdata['password'])));
            }
        }
        
	}


	public function showLogin()
	{
		// show the form
		return View::make('users/login');
	}

    public function doLogin()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            //'email'    => 'required|email', // make sure the email is an actual email
            'username'    => 'required|alphaNum', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        $messages = array(
            //'required' => 'The :attribute field is required.',
            'required' => 'El campo <b>:attribute</b> es obligatorio.',
            'min' => '<b>:attribute</b> debe ser tener al menos :min caracteres.',
            'integer' => '<b>:attribute</b> debe ser un número.',
            'email' => 'El campo <b>:attribute</b> debe ser un email.',
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules, $messages);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'username' 	=> Input::get('username'),
                'password' 	=> Input::get('password')
            );

            // attempt to do the login
            self::validcheck_oldpw($userdata);
            
            if (Auth::attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                
                return Redirect::route('home');

            } else {	 	
                // validation not successful, send back to form	
                return Redirect::to('login');

            }

        }
    }


    public function doLogout()
	{
        if (Auth::check()) {
            
            Auth::logout();
            return Redirect::route('home')
                ->with('flashmessage', 'You are successfully logged out.');
        }
        return Redirect::route('home');
	}
    

	public function showPass()
	{
		// show the form
		return View::make('users/pass');
	}
    
    public function doPass()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            //'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3', // password can only be alphanumeric and has to be greater than 3 characters
            'password2' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        $messages = array(
            //'required' => 'The :attribute field is required.',
            'required' => 'El campo <b>:attribute</b> es obligatorio.',
            'min' => '<b>:attribute</b> debe ser tener al menos :min caracteres.',
            'integer' => '<b>:attribute</b> debe ser un número.',
            'email' => 'El campo <b>:attribute</b> debe ser un email.',
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules, $messages);
        //$validator = Validator::make(Input::all(), User::$change_password_rules , $messages);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::route('users.pass')
                ->withErrors($validator); // send back all errors to the login form
                //->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            if (Input::get('password') != Input::get('password2')) {
                return Redirect::route('users.pass')
                    ->withErrors("Las contraseñas deben coincidir" ); // send back all errors to the login form
            }
            if (Hash::check(Input::get('password'), Auth::user()->password)) {
                return Redirect::route('users.pass')
                    ->withErrors("Debe elegir una contraseña NUEVA !!" ); // send back all errors to the login form
            }

            // Auth::user()->id
            $user = Auth::user();
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            return Redirect::route('home');

            // attempt to do the login
            /*if (Auth::attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                //echo 'SUCCESS!';
                return Redirect::route('home');

            } else {	 	

                // validation not successful, send back to form	
                return Redirect::route('users.pass');

            }
            * */

        }
    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
