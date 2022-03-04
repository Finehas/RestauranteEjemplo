<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inicio de Sesión</title>
    <!--Token-->
    <meta name="token" id="token" value="{{ csrf_token() }}">

    <!-- Fuentes personalizadas-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Estilos de la plantilla-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
     <!--Icono del proyecto -->
    <link rel="shortcut icon" href="imagenes/restaurantelogo.jpg" />
    <!--Alertas personalizadas-->
    <link rel="stylesheet" href="css/alertify.css">
    <link rel="stylesheet" href="css/alertify.rtl.css">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Datos de formulario -->
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Accede a tu cuenta de administrador</h1>
                                <h1 class="h4 text-gray-900 mb-4">Contraseña o usuario incorrecto</h1>

                            </div>
                            <form class="user" method="GET" action="{{url('validar')}}">
                                
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        placeholder="Usuario" name="user">
                                </div>
                                 <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        placeholder="Contraseña" name="password">
                                </div>
                                
                                <button class="btn btn-primary btn-user btn-block">Acceder</button> 
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{url('sesion')}}">Ingresa como Comensal</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{url('/')}}">Crear nueva cuenta de comensal</a>
                            </div>
                        </div>
                        </div>
                    </div>
                     <div class="col-lg-3"></div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/vue.js"></script>
    <script type="text/javascript" src="js/vue-resource.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!--alertas personalizadas-->
    <script type="text/javascript" src="js/alertify.js"></script> 
    <!--Script del proyecto-->
    <script type="text/javascript" src="js/proyecto/comensales.js"></script>
</body>

</html>