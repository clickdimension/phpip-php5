<?php

class IpinfoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        //return "ipinfo index";
        return Redirect::route('home');
        /* Session::reflash();

        return Redirect::route('buscar.store'); 
        * */
        //return Session::get('buscar.mode');
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
		// -- obsolete
        return "ipinfo store";
        
        /*
        if (Input::has('searchterm')){
            // $query = "select * from addresses where ".$source." like '%".$searchterm."%' ";
            Session::flash('buscar.mode', 'searchterm');
            Session::flash('buscar.searchterm', Input::get('searchterm'));
            Session::flash('buscar.searchfield', Input::get('searchfield'));
            $buscando = Input::get('searchterm');
            $buscando_in = Input::get('searchfield');
            
        } else {
            Session::reflash();
            if (Session::get('buscar.mode') == 'searchterm'){
                $buscando = Session::get('buscar.searchterm');
                $buscando_in = Session::get('buscar.searchfield');
            } else {
                $buscando = '';
            }
        }
        if (strlen($buscando) < 2){
            return "store -> home"; // eliminar valores de session
            return Redirect::route('home');
        }
        $lista = DB::table('addresses')->whereRaw($buscando_in . " LIKE '%". $buscando . "%'")->orderBy('id', 'ASC')->paginate(20);
        $contador = DB::table('addresses')->whereRaw($buscando_in . " LIKE '%". $buscando . "%'")->count();

        return View::make('phpip/buscando')->with('posts', $lista)->with('buscando', $buscando)->with('buscando_in', $buscando_in)->with('contador', $contador);
        * */

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
        Session::keep(array('buscar.mode', 'buscar.searchterm', 'buscar.searchfield', 'buscar.iplist'));
        $post = DB::table('addresses')->where('id', $id)->get();
        if (is_null($post)) {
            //return 'no existe';
            return "show -> home";
            return Redirect::back()->withErrors('ID: ' . $id . ' no existe');
        }
        
        return View::make('phpip/ipdetails')->with('post', $post[0]);
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
        Session::keep(array('buscar.mode', 'buscar.searchterm', 'buscar.searchfield', 'buscar.iplist'));
        $post = DB::table('addresses')->where('id', $id)->get();
        if (is_null($post)) {
            return Redirect::back()->withErrors('ID: ' . $id . ' no existe');
        }
        
        return View::make('phpip/ipedit')->with('post', $post[0]);
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
        Session::keep(array('buscar.mode', 'buscar.searchterm', 'buscar.searchfield', 'buscar.iplist'));
        $post = Addresses::find($id);
        if (is_null($post)) {
            return Redirect::back()->withErrors('ID: ' . $id . ' no existe');
        }
        // falta validacion...

        $data = Input::all();
        $post->fill($data);
        $post->save();
        return Redirect::route('ipinfo.show', array($id))->with("flashmessage" ,'Registro actualizado');

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
