<!doctype html>
<html>
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
   <!-- Bootstrap -->
    {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> //-->
<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> //-->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
-->
    {{ HTML::script('assets/jquery/jquery-1.11.1.min.js') }}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> 
    //-->
    {{ HTML::script('assets/js/bootstrap.min.js') }}


<title>@yield('title', 'Informacion de clientes PHPIP')</title>
</head>
 
<body>
<div class="container">
  
    <nav class="navbar navbar-default" role="navigation">
        
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="{{ route('home') }}" ><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
            <li>@yield('webmodulo')</li>
          </ul>

             <ul class="nav navbar-nav navbar-right">
                 @if(Auth::check())
                     @if(Auth::user()->access_level == 'admin')
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Administración <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('adminusers.index') }}" ><span class="glyphicon glyphicon-user"></span> Usuarios</a></li>
                            
                            <li class="divider"></li>
                            <li><a href="{{ route('adminusers.index') }}" ><span class="glyphicon glyphicon-list"></span> Rangos IP</a></li>
                            
                      </ul>
                    </li>
                     @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span>
                            <b><span class="text-info">{{ Auth::user()->username }}</span></b> 
                            <span class="caret"></span>
                        </a>
                      <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('users.pass') }}" >Nueva Contraseña</a></li>
                      </ul>
                    </li>

                        <li>
                        <a href="{{ route('logout') }}" > <span class="glyphicon glyphicon-off"></span> Logout </a></li>
                @else
                        <li><a href="{{ route('login') }}" ><span class="glyphicon glyphicon-user"></span> Login</a></li>
                @endif


              </ul>            
        </div><!-- /.navbar-collapse -->
          
      </div><!-- /.container-fluid -->
    </nav>

    @if($errors->count() > 0)
        <div class="alert alert-danger" role="alert">        
            <a class="close" data-dismiss="alert">×</a>   
            <h4 class="alert-heading">Atención !</h4>
            <!--recorremos los errores en un loop y los mostramos-->
            @foreach ($errors->all('<p>:message</p>') as $message)
                {{ $message }}
            @endforeach
             
        </div>
    @endif

    @if(Session::has('flashmessage'))
        <div class="alert alert-info" role="alert">        
            <a class="close" data-dismiss="alert">×</a>   
   <!--mostramos mensajes conforme pasen acontecimientos-->
            {{ Session::get('flashmessage') }}
        </div>
    @endif            

    @yield('content')
</div>


    
</body>
 
</html>
