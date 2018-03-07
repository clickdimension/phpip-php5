<?php

class AdminUsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// {{ route('adminusers.index') }}
        $usuarios = DB::table('user')->orderBy('username', 'ASC')->paginate(20);
        //return "AdminUsersController - index";
        return View::make('users/adm_index')->with('posts', $usuarios);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// crear nuevo usuario
        return View::make('users/adm_create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        if( ! User::passesValidation(Input::all()) ) {
            return Redirect::back()->withInput()->withErrors(User::$messages);
        }
        if (Input::get('password') != Input::get('password2')) {
            return Redirect::back()->withInput()->withErrors("Las contraseñas deben coincidir");
            //return Redirect::route('users.pass')
            //    ->withErrors("Las contraseñas deben coincidir" ); // send back all errors to the login form
        }
        
        $usuario = new User;
        
        $usuario->username = Input::get('username');
        $usuario->password = Hash::make(Input::get('password'));
        $usuario->access_level = Input::get('access_level');
        $usuario->email = Input::get('email');
        $usuario->save();
        
        //return Redirect::route('rubros.show', array($rubro->id));
        return Redirect::route('adminusers.index');
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
        $usuario = User::find($id);
        if (is_null($usuario)) {
            //return 'no existe';
            return Redirect::route('adminusers.index')->withErrors('ID: ' . $id . ' no existe');
        }
        
        return View::make('users/adm_edit')->with('post', $usuario);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $usuario = User::find($id);
        if (is_null($usuario)) {
            //return 'no existe';
            return Redirect::route('adminusers.index')->withErrors('ID: ' . $id . ' no existe');
        }


        $data = Input::all();
        
        if (strlen(Input::get('password')) > 2) {
            if( ! User::passesValidation(Input::all(), $id) ) {
                return Redirect::back()->withInput()->withErrors(User::$messages);
            }
            if (Input::get('password') != Input::get('password2')) {
                return Redirect::back()->withInput()->withErrors("Las contraseñas deben coincidir");
                //return Redirect::route('users.pass')
                //    ->withErrors("Las contraseñas deben coincidir" ); // send back all errors to the login form
            }
            $data['password'] = Hash::make(Input::get('password'));

        } else {
            //if( ! User::passesValidation(Input::all(), 'skip_password') ) {
            if( ! User::passesValidation(Input::all(), $id) ) {
                return Redirect::back()->withInput()->withErrors(User::$messages);
            }
            unset($data['password']);
        }

        $usuario->fill($data);
        $usuario->save();
        
        //return Redirect::route('rubros.show', array($rubro->id));
        return Redirect::route('adminusers.edit', array($usuario->id))->with("flashmessage" , "Guardaro con éxito");
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
        User::destroy($id);
        //return Redirect::route('adminusers.index')->withMessage('ID: ' . $id . ' eliminado');
        return Redirect::route('adminusers.index')->with("flashmessage" ,'ID: ' . $id . ' eliminado');
	}


}
