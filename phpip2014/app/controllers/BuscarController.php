<?php

class BuscarController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        return "buscar index";
        /*
         * Session::reflash();
        if (Session::get('buscar.mode') == 'searchterm'){
            return Redirect::route('buscar.store');
            //$this->store();
        }
        //return "index -> home " . Session::get('buscar.mode') . '--' ;
        return Redirect::route('home');
        * */
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


	public function iplist()
	{
		//
        if (Input::has('iplist')){
            // $query = "select * from addresses where ip like '%$ip.%' order by id";
            Session::flash('buscar.mode', 'iplist');
            Session::flash('buscar.iplist', Input::get('iplist'));
            $buscando = Input::get('iplist');
            
        } else {
            //Session::reflash();
            Session::keep(array('buscar.mode', 'buscar.searchterm', 'buscar.searchfield', 'buscar.iplist'));
            if (Session::get('buscar.mode') == 'iplist'){
                $buscando = Session::get('buscar.iplist');
            } else {
                $buscando = '';
            }
        }
        if (strlen($buscando) < 2){
            return Redirect::route('home');
        }
        $lista = DB::table('addresses')->whereRaw("ip LIKE '%". $buscando . ".%'")->orderBy('id', 'ASC')->paginate(256);
        $contador = DB::table('addresses')->whereRaw("ip LIKE '%". $buscando . ".%'")->count();

        return View::make('phpip/iplist')->with('posts', $lista)->with('buscando', $buscando)->with('contador', $contador);
        
        //return "show iplist";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    }
    
    
	public function buscar()
	{
		// $query = "select * from addresses where ".$source." like '%".$searchterm."%' ";
        // a punto de ser obsoleto !! - atencion modificar index ?

        if (Input::has('searchterm')){
            // $query = "select * from addresses where ".$source." like '%".$searchterm."%' ";
            Session::flash('buscar.mode', 'searchterm');
            Session::flash('buscar.searchterm', Input::get('searchterm'));
            Session::flash('buscar.searchfield', Input::get('searchfield'));
            $buscando = Input::get('searchterm');
            $buscando_in = Input::get('searchfield');
            
        } else {
            //Session::reflash();
            Session::keep(array('buscar.mode', 'buscar.searchterm', 'buscar.searchfield', 'buscar.iplist'));
            if (Session::get('buscar.mode') == 'searchterm'){
                $buscando = Session::get('buscar.searchterm');
                $buscando_in = Session::get('buscar.searchfield');
            } else {
                $buscando = '';
            }
        }
        if (strlen($buscando) < 2){
            //return "store -> home"; // eliminar valores de session
            return Redirect::route('home')->withErrors('Cadena de busqueda demasiado corta' );
        }
        $lista = DB::table('addresses')->whereRaw($buscando_in . " LIKE '%". $buscando . "%'")->orderBy('client', 'ASC')->orderBy('ip', 'ASC')->paginate(20);
        $contador = DB::table('addresses')->whereRaw($buscando_in . " LIKE '%". $buscando . "%'")->count();
        if ($contador < 1){
            //return "store -> home"; // eliminar valores de session
            return Redirect::route('home')->withErrors('No se encontraron registros con ' . $buscando . ' en ' . $buscando_in);
        }
        //return "hola buscar " . $buscando_in . $buscando ;
        //exit;

        return View::make('phpip/buscando')->with('posts', $lista)->with('buscando', $buscando)->with('buscando_in', $buscando_in)->with('contador', $contador);

        //return "buscar store";
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// obsolete, ver ipinfo.show() !!
        
        /*
         * $post = DB::table('addresses')->where('id', $id)->get();
        if (is_null($post)) {
            //return 'no existe';
            return "show -> home";
            return Redirect::back()->withErrors('ID: ' . $id . ' no existe');
        }
        
        return View::make('phpip/ipdetails')->with('post', $post[0]);
        * */
        
        //return "hola show";
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
