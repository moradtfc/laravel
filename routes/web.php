<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/scotiabank/dashboard', 'HomeController@scotiauser')->name('scotiabank/dashboard')->middleware('auth', 'role:scotiabank');

Route::get('/registro-categoria', 'CategoryController@openCategory')->middleware('auth', 'role:admin');

Route::post('/registrar-categoria', 'CategoryController@addCategory');

Route::get('/listado-categoria', 'CategoryController@listCategories');


Route::get('/eliminar-categoria/{id}', 'CategoryController@listCategories');

// **      Users         **//
Route::get('/registrar-usuario', 'UserController@openUser');
Route::post('/registro-usuario', 'UserController@addUser');
Route::get('/listado-usuario', 'UserController@listUser');

Route::get('/socios/cambiar_contrasena', 'AuthController@openChangePasswordView');
Route::post('/socios/actualizar_contrasena', 'AuthController@updatePassword');


/* BRANDS */

Route::get('/perfil-brand/{id}','BrandController@profileBrand');

Route::get('/listado-brand', 'BrandController@listBrand');

Route::get('/registro-brand', 'BrandController@openBrand');

Route::post('/registrar-brand', 'BrandController@addBrand');



/* STORES */
Route::get('/listado-store', 'StoreController@listStore');
Route::get('/registro-store', 'StoreController@openStore');
Route::post('/registrar-store', 'StoreController@addStore');


Route::group(['middleware' => ['auth', 'role:admin']], function(){

Route::get('/admin/dashboard', 'HomeController@indexuser')->name('admin/dashboard');

Route::get('/delete-user/{id}', 'UserController@deleteUser')->name('delete-user/');

});





/* CATALOGOS */

Route::get('/registro-catalogo', 'CatalogueController@openCatalogue');

Route::post('/registrar-catalogo', 'CatalogueController@addCatalogue');

Route::get('/listado-catalogo', 'CatalogueController@listCatalogue');

Route::get('/delete-catalogo/{id}', 'CatalogueController@deleteCatalogue')->name('delete-catalogue/');


/* PRODUCTS */

Route::get('/registro-productos', 'ProductController@openProductRegistration');
Route::get('/registro-store', 'StoreController@openStore');
Route::post('/registrar-productos', 'ProductController@addProduct');
Route::get('admin/ficha_productos/{id}','ProductController@fichaProducts');
Route::get('/listado-productos','ProductController@listProductsAdmin');
Route::post('admin/scotiabank/comentar_producto','CommentsController@comentar');
Route::post('admin/products/update_status', 'CommentsController@update_status');


/*///////////////////////// SOCIOS *////////////////////////////////////

Route::group(['middleware' => ['auth', 'role:socio']], function(){

Route::get('/socios/comentarios', 'Socios\CommentsController@listComments')->name('socios/comentarios');
Route::get('/socios/listado_productos','Socios\ProductController@listProducts');
Route::get('/socios/listado_productos_staging','Socios\ProductController@listStagingProducts');

Route::get('/socios/marcas', 'Socios\ProductController@listBrands');

Route::get('/socios/detalle_marca/{id}','Socios\ProductController@brandDetail');


});

/*///////////////////////// SCOTIABANK *////////////////////////////////////



    Route::get('/scotiabank/comentarios', 'Scotiabank\CommentsController@listComments')->name('socios/comentarios');
    Route::get('/scotiabank/listado_productos','Scotiabank\ProductController@listProducts');
    Route::get('/scotiabank/listado_productos_staging','Scotiabank\ProductController@listStagingProducts');
    Route::get('/scotiabank/producto/detalle_producto/{id}','Scotiabank\ProductController@detailProduct');

    Route::get('/scotiabank/marcas', 'Scotiabank\ProductController@listBrands');

    Route::get('/scotiabank/detalle_marca/{id}','Scotiabank\ProductController@brandDetail');

    Route::post('/scotiabank/producto/update_status/{id}', 'CommentsController@update_status');

    Route::get('/scotiabank/listado_comentarios', 'Scotiabank\CommentsController@listHistorialComments');







////// PRODUCTOS /////////
Route::get('/socios/producto/listado_productos','Socios\ProductController@listProducts');


Route::get('/socios/producto/detalle_producto/{id}','Socios\ProductController@detailProduct');

Route::post('/socios/producto/comentar_producto','Socios\CommentsController@comment');

Route::post('/socios/producto/update_status/{id}', 'CommentsController@update_status');


////// MARCAS /////////
Route::post('/socios/marcas/comentar_tienda','Socios\CommentsStoreController@comment');

//COMENTARIOS

Route::get('/listado-comentarios', 'CommentsController@list_comentarios');

Route::post('/borrar-comentario/{id}', 'Socios\CommentsController@deleteComment');

Route::post('/borrar-comentario-store/{id}', 'Socios\CommentsStoreController@deleteCommentStore');


/* PRODUCTOS - SCOTIABANK */
Route::post('/scotiabank/registrar_productos', 'Scotiabank\ProductController@addProduct');
Route::get('/scotiabank/registro_producto', 'Scotiabank\ProductController@openProductRegistration');
Route::post('/scotiabank/producto/editar_producto/{id}','Scotiabank\ProductController@updateProduct');
//ROLE - SCOTIABANK//

Route::get('/scotiabank/categoria/listado_categorias','Scotiabank\CategoryController@listCategory');
Route::get('/scotiabank/categoria/detalle_categoria/{id}','Scotiabank\CategoryController@showCategory');
Route::post('/scotiabank/categoria/editar_categoria/{id}','Scotiabank\CategoryController@updateCategory');
Route::get('/scotiabank/categoria/eliminar_categoria/{id}','Scotiabank\CategoryController@deleteCategory');


//SCOTIABANK - BRANDS//
Route::get('/scotiabank/listado-brand','Scotiabank\BrandController@listBrand');
Route::get('/scotiabank/listado_brand/{id}','Scotiabank\BrandController@showBrand');
Route::post('/scotiabank/editar_brand/{id}','Scotiabank\BrandController@updateBrand');
Route::get('/scotiabank/cancelar_proceso','Scotiabank\BrandController@eventCancelBrand');
Route::get('/scotiabank/eliminar_brand/{id}','Scotiabank\BrandController@deleteBrand');

//SCOTIABANK - STORES //
Route::get('scotiabank/listado-store','Scotiabank\StoreController@listStore');
Route::get('scotiabank/detalle_store/{id}','Scotiabank\StoreController@showStore');
Route::get('scotiabank/eliminar_store/{id}','Scotiabank\StoreController@deleteStore');
Route::get('scotiabank/cancel_proceso','Scotiabank\StoreController@eventCancelStore');
Route::post('scotiabank/update_store/{id}','Scotiabank\StoreController@updateStore');


//SCOTIABANK - USERS //
Route::get('/scotiabank/listado_usuarios','Scotiabank\UserController@listUser');
Route::get('/scotiabank/registro_usuarios','Scotiabank\UserController@registerUser');
Route::post('/scotiabank/registrar-usuario','Scotiabank\UserController@addUser');
Route::get('/scotiabank/detalle_usuarios/{id}','Scotiabank\UserController@showUser');
Route::get('/scotiabank/cancelar_proceso_user','Scotiabank\UserController@eventCancelUser');
Route::post('/scotiabank/editar-usuario/{id}','Scotiabank\UserController@updateUser');
Route::get('/scotiabank/eliminar_user/{id}','Scotiabank\UserController@deleteUser');





