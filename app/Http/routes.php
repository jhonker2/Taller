<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//termina rutas de administracion
//ruta para ingresar servicios en administracion
Route::post('welcomeAdmin/Servicios/agregarServicio',array('as'=>'saveServios','uses'=>'ServiciosControllers@store'));
Route::resource('welcomeAdmin/Servicios','ServiciosControllers');
//fin ruta para ingresar servicios en administracion

//ruta para ingresar categoria usuarios en administracion
Route::post('welcomeAdmin/CategoriaUsuarios/agregarCategoriaUsuarios',array('as'=>'saveCateUsu','uses'=>'CategoriaUserControllers@store'));
Route::resource('welcomeAdmin/CategoriaUsuarios','CategoriaUserControllers');
//fin ruta para ingresar categoria usuarios en administracion

//Rutas de Reportes
Route::get('welcomeAdmin/crear_reporte_productos/{tipo}', 'PdfController@index');
Route::get('welcomeAdmin/crear_reporte_producto/{tipo}','PdfController@crear_reporte_producto');
Route::get('welcomeAdmin/crear_reporte_maquinarias/{tipo}','PdfController@crear_reporte_maquinarias');
Route::get('welcomeAdmin/crear_reporte_proveedores/{tipo}','PdfController@crear_reporte_proveedor');
Route::get('welcomeAdmin/crear_reporte_factura_ventas/{tipo}','PdfController@crear_reporte_facturas_ventas');
Route::get('welcomeAdmin/crear_reporte_Proforma/{tipo}','PdfController@crear_reporte_Proforma');
Route::get('welcomeAdmin/crear_reporte_Estado_Proformas/{tipo}','PdfController@crear_reporte_Estado_Proforma');
Route::get('welcomeAdmin/crear_reporte_MateriaPrimas/{tipo}','PdfController@crear_reporte_materiaPrimas');
//fin de reportes

//ruta para ingresar usuarios en administracion
Route::post('welcomeAdmin/Usuarios/agregarUsuarios',array('as'=>'saveUsu','uses'=>'UsuariosControllers@store'));
Route::resource('welcomeAdmin/Usuarios','UsuariosControllers');
//fin ruta para ingresar usuarios en administracion

//ruta para ingresar empleados en administracion
Route::post('welcomeAdmin/Empleados/agregarEmpleados',array('as'=>'saveEmple','uses'=>'EmpleadoControllers@store'));
Route::post('welcomeAdmin/Empleados/actualizarEmpleado/{cedula}','EmpleadoControllers@actualizarEmpleado');
Route::resource('welcomeAdmin/Empleados','EmpleadoControllers');
route::get('welcomeAdmin/Empleados/editar',function(){
	return view('AdminTaller.Empleado.EditEmpleado');
});
route::get('welcomeAdmin/empleado/{cedula}','EmpleadoControllers@buscarCedula');
//fin ruta para ingresar empleados en administracion

//ruta para ingresar categoriasProductos en administracion
Route::post('welcomeAdmin/CategoriaProductos/agregarCategoriaProductos', array('as'=>'saveInfo','uses'=>'CategoriaProductosControllers@store'));
Route::resource('welcomeAdmin/CategoriaProductos','CategoriaProductosControllers');
//fin ruta para ingresar categoriaproductos en administracion

//ruta para ingresar Productos en administracion
Route::post('welcomeAdmin/Productos/agregarProductos',array('as'=>'saveProdu','uses'=>'ProductosControllers@store'));
Route::resource('welcomeAdmin/Productos','ProductosControllers');
//fin ruta para ingresar Productos en administracion

//Rol de pago
route::resource('welcomeAdmin/Rol_pago','RolpController');
Route::post('welcomeAdmin/Rol_pago/registrarRol',array('as'=>'saveRol','uses'=>'RolpController@store'));
route::get('welcomeAdmin/Rol_pago/empleado/{cedula}','RolpController@search_empleado');
//fin ingreso de rol de pago

//ruta para ingresar Facturas ventas en administracion
Route::resource('welcomeAdmin/FacturaVenta','FacturaVentasControllers');
Route::get('welcomeAdmin/Venta','FacturaVentasControllers@create');
route::get('welcomeAdmin/AnularFacturaVenta/{id}','FacturaVentasControllers@AnularFactura');
route::get('welcomeAdmin/RealizarFacturaVenta/{id}','FacturaVentasControllers@RealizarFactura');
Route::post('welcomeAdmin/FacturaV/{id}','FacturaVentasControllers@actualizarStock');
Route::post('welcomeAdmin/FacturaVenta/agregarFacturaVenta',array('as'=>'saveFact','uses'=>'FacturaVentasControllers@store'));
Route::post('welcomeAdmin/Factura/agregarFacturaVenta',array('as'=>'saveDetFact','uses'=>'FacturaVentasControllers@addDetalle'));

//Route::post('welcomeAdmin/Proforma/agregarProformaVenta',array('as'=>'saveFact','uses'=>'FacturaVentasControllers@store'));
route::get('welcomeAdmin/Factura/{id}','FacturaVentasControllers@Search_Producto');/*Route::post('welcomeAdmin/FacturaVenta/agregarFacturaServicios',array('as'=>'saveFactSer','uses'=>'FacturaServiciosControllers@store'));
Route::resource('welcomeAdmin/FacturaVentas','FacturaServiciosControllers');*/
//fin ruta para ingresar Factura ventas en administracion

//realizar una proforma
Route::resource('welcomeAdmin/FacturaProforma','ProformaController');
Route::get('welcomeAdmin/Proforma/','ProformaController@create');
route::get('welcomeAdmin/AnularFacturaProforma/{id}','ProformaController@AnularProforma');
route::get('welcomeAdmin/RealizarFacturaProforma/{id}','ProformaController@RealizarProforma');
Route::post('welcomeAdmin/FacturaProforma/agregarProformaVenta',array('as'=>'saveProfo','uses'=>'ProformaController@store'));
Route::post('welcomeAdmin/Factura/agregarFacturaDetalle',array('as'=>'saveDetPro','uses'=>'ProformaController@addDetalle'));
//fin de proforma

//ruta para ingresar Facturas Compras materiales en administracion
Route::resource('welcomeAdmin/FacturaCompra','FacturaCompraMaterialeControllers');
Route::post('welcomeAdmin/FacturaCompra/agregarFacturaCompra',array('as'=>'saveFactCom','uses'=>'FacturaCompraMaterialeControllers@store'));
Route::post('welcomeAdmin/Factura/agregarFacturaCompra',array('as'=>'saveDetFactCom','uses'=>'FacturaCompraMaterialeControllers@addDetalle'));
//route::get('welcomeAdmin/FacturaCompra/{id}','FacturaCompraMaterialeControllers@search_materia');
Route::post('welcomeAdmin/FacturaC/{id}','FacturaCompraMaterialeControllers@actualizarStock');
route::get('welcomeAdmin/FacturaComp/{id}','FacturaCompraMaterialeControllers@Search_Material');

//fin ruta para ingresar Factura compras materiales en administracion

//ruta para ingresar Solicitud Pedido en administracion
Route::post('welcomeAdmin/SolicitarPedidos/agregarSolicitudPedidos',array('as'=>'saveSoliPe','uses'=>'SolicitarPedidoControllers@store'));
Route::post('welcomeAdmin/SolicitarPedidos/agregarDetalleSolicitud',array('as'=>'savedetSoli','uses'=>'SolicitarPedidoControllers@addDetalle'));
Route::resource('welcomeAdmin/SolicitarPedidos','SolicitarPedidoControllers');
route::get('welcomeAdmin/Solicitar/{id}','SolicitarPedidoControllers@search_materia');
//fin ruta para ingresar Solicitud Pedido en administracion

//ruta para ingresar Proovedores en administracion
Route::post('welcomeAdmin/Proveedores/agregarProveedores',array('as'=>'saveProvee','uses'=>'ProveedoresControllers@store'));
Route::resource('welcomeAdmin/Proveedores','ProveedoresControllers');
//fin ruta para ingresar Proovedores en administracion

//ruta para ingresar Materias Primas en administracion
Route::post('welcomeAdmin/MateriasPrimas/agregarMateriasPrimas',array('as'=>'saveMatePri','uses'=>'MateriasPrimasControllers@store'));
Route::resource('welcomeAdmin/MateriasPrimas','MateriasPrimasControllers');
Route::get('welcomeAdmin/Devolucion','MateriasPrimasControllers@Devuluciones');
//fin ruta para ingresar Materias Primas en administracion

//ruta para ingresar Maquinarias en administracion
Route::post('welcomeAdmin/Maquinarias/agregarMaquinarias',array('as'=>'saveMaqui','uses'=>'MaquinariasControllers@store'));
Route::resource('welcomeAdmin/Maquinarias','MaquinariasControllers');
//fin ruta para ingresar maquinarias en administracion

//ruta para ingresar Clientes en administracion
Route::post('welcomeAdmin/Clientes/agregarClientes',array('as'=>'saveClie','uses'=>'ClientesControllers@store'));
Route::resource('welcomeAdmin/Clientes','ClientesControllers');
Route::get('welcomeAdmin/client/{cedula}','ClientesControllers@cedulaCliente');
Route::post('welcomeAdmin/Clientes/actualizarCliente/{cedula}','ClientesControllers@actualizarCliente');

//fin ruta para ingresar Clientes en administracion

//ruta para ingresar usuarios en administracion
Route::post('welcomeAdmin/Usuarios/agregarUsuarios',array('as'=>'saveUsu','uses'=>'UsuariosControllers@store'));
Route::resource('welcomeAdmin/Usuarios','UsuariosControllers');
//fin ruta para ingresar usuarios en administracion

//cargar datos de  categoria productos
route::get('CategoriaProductoid/{id}','CategoriaProductosControllers@edit');
//fin cargar categoria productos

//cargar datos de servicios
route::get('servicioid/{id}','ServiciosControllers@edit');
//fin cargar datos servicios

//cargar datos de Producttos
route::get('Productosid/{id}','ProductosControllers@edit');
//fin cargar datos Productos

//cargar datos de categoria usuarios
route::get('CategoriaUsuariosId/{id}','CategoriaUserControllers@edit');
//fin cargar datos de categoria Usuarios

//cargar datos de usuarios
//route::get('UsuariosId/{id}','UsuariosControllers@edit');
//fin cargar datos de Usuarios


//RUTAS DEL BODEGERO

Route::resource('welcomeAdmin/Bodega','BodegaController');
route::get('welcomeAdmin/numProducto/{id}','BodegaController@numProd');
route::get('welcomeAdmin/IDProducto/{id}','BodegaController@RestarProducto');
Route::get('welcomeAdmin/BodegaEntregado','BodegaController@listaEntregado');

//FIN



// rutas login
Route::group(['middleware' => ['web']], function () {

	Route::get('/', function () {
	if (Auth::guest()){
			 return view('welcome');
    	}else{
    		 return Redirect::to('welcomeAdmin/home');
    	}
    });
	Route::post('log',array('as'=>'login', 'uses'=>'LogController@store'));
	Route::get('logout','LogController@logout');
	Route::get('welcomeAdmin/home', 'HomeController@index');
});

