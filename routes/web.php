<?php


// Auth::routes();

/*
|--------------------------------------------------------------------------
| Web Routes for Admin Panel
|--------------------------------------------------------------------------
|
| These are the routes declared for Admin Panel
|
*/

Route::get('/', function() {

	return redirect()->route('admin.login');
});

/********** Admin accessible routes as a Guest User start **********/

Route::group(['middleware' => ['admin.guest']], function () {

	Route::get('admin/login', ['as'=> 'admin.login', 'uses' => 'Admin\UserController@viewLogin']);
	Route::post('admin/authenticate', ['as'=> 'admin.users.authenticate', 'uses' => 'Admin\UserController@authenticate']);

});

/********** Admin accessible routes as a Guest User end **********/


# --------------------------------------------------------------------------


/********** Admin accessible routes as an Authenticated User start **********/

Route::group(['middleware' => ['admin.auth']], function () {

	Route::get('admin/dashboard', ['as'=> 'admin.dashboard', 'uses' => 'Admin\DashboardController@index']);

	Route::get('admin/logout', ['as'=> 'admin.logout', 'uses' => 'Admin\UserController@logout']);

	Route::get('admin/users', ['as'=> 'admin.users.index', 'uses' => 'Admin\UserController@index']);
	Route::post('admin/users', ['as'=> 'admin.users.store', 'uses' => 'Admin\UserController@store']);
	Route::get('admin/users/create', ['as'=> 'admin.users.create', 'uses' => 'Admin\UserController@create']);
	Route::put('admin/users/{users}', ['as'=> 'admin.users.update', 'uses' => 'Admin\UserController@update']);
	Route::patch('admin/users/{users}', ['as'=> 'admin.users.update', 'uses' => 'Admin\UserController@update']);
	Route::delete('admin/users/{users}', ['as'=> 'admin.users.destroy', 'uses' => 'Admin\UserController@destroy']);
	Route::get('admin/users/{users}', ['as'=> 'admin.users.show', 'uses' => 'Admin\UserController@show']);
	Route::get('admin/users/{users}/edit', ['as'=> 'admin.users.edit', 'uses' => 'Admin\UserController@edit']);


	Route::get('admin/settings/user_roles', ['as'=> 'admin.userRoles.index', 'uses' => 'Admin\UserRoleController@index']);
	Route::post('admin/settings/user_roles', ['as'=> 'admin.userRoles.store', 'uses' => 'Admin\UserRoleController@store']);
	Route::get('admin/settings/user_roles/create', ['as'=> 'admin.userRoles.create', 'uses' => 'Admin\UserRoleController@create']);
	Route::put('admin/settings/user_roles/{userRoles}', ['as'=> 'admin.userRoles.update', 'uses' => 'Admin\UserRoleController@update']);
	Route::patch('admin/settings/user_roles/{userRoles}', ['as'=> 'admin.userRoles.update', 'uses' => 'Admin\UserRoleController@update']);
	Route::delete('admin/settings/user_roles/{userRoles}', ['as'=> 'admin.userRoles.destroy', 'uses' => 'Admin\UserRoleController@destroy']);
	Route::get('admin/settings/user_roles/{userRoles}', ['as'=> 'admin.userRoles.show', 'uses' => 'Admin\UserRoleController@show']);
	Route::get('admin/settings/user_roles/{userRoles}/edit', ['as'=> 'admin.userRoles.edit', 'uses' => 'Admin\UserRoleController@edit']);


	Route::get('admin/settings/account_status', ['as'=> 'admin.userStatuses.index', 'uses' => 'Admin\UserStatusController@index']);
	Route::post('admin/settings/account_status', ['as'=> 'admin.userStatuses.store', 'uses' => 'Admin\UserStatusController@store']);
	Route::get('admin/settings/account_status/create', ['as'=> 'admin.userStatuses.create', 'uses' => 'Admin\UserStatusController@create']);
	Route::put('admin/settings/account_status/{userStatuses}', ['as'=> 'admin.userStatuses.update', 'uses' => 'Admin\UserStatusController@update']);
	Route::patch('admin/settings/account_status/{userStatuses}', ['as'=> 'admin.userStatuses.update', 'uses' => 'Admin\UserStatusController@update']);
	Route::delete('admin/settings/account_status/{userStatuses}', ['as'=> 'admin.userStatuses.destroy', 'uses' => 'Admin\UserStatusController@destroy']);
	Route::get('admin/settings/account_status/{userStatuses}', ['as'=> 'admin.userStatuses.show', 'uses' => 'Admin\UserStatusController@show']);
	Route::get('admin/settings/account_status/{userStatuses}/edit', ['as'=> 'admin.userStatuses.edit', 'uses' => 'Admin\UserStatusController@edit']);


	Route::get('admin/companies', ['as'=> 'admin.companies.index', 'uses' => 'Admin\CompanyController@index']);
	Route::post('admin/companies', ['as'=> 'admin.companies.store', 'uses' => 'Admin\CompanyController@store']);
	Route::get('admin/companies/create', ['as'=> 'admin.companies.create', 'uses' => 'Admin\CompanyController@create']);
	Route::put('admin/companies/{companies}', ['as'=> 'admin.companies.update', 'uses' => 'Admin\CompanyController@update']);
	Route::patch('admin/companies/{companies}', ['as'=> 'admin.companies.update', 'uses' => 'Admin\CompanyController@update']);
	Route::delete('admin/companies/{companies}', ['as'=> 'admin.companies.destroy', 'uses' => 'Admin\CompanyController@destroy']);
	Route::get('admin/companies/{companies}', ['as'=> 'admin.companies.show', 'uses' => 'Admin\CompanyController@show']);
	Route::get('admin/companies/{companies}/edit', ['as'=> 'admin.companies.edit', 'uses' => 'Admin\CompanyController@edit']);


	Route::get('admin/modules', ['as'=> 'admin.modules.index', 'uses' => 'Admin\ModuleController@index']);
	Route::post('admin/modules', ['as'=> 'admin.modules.store', 'uses' => 'Admin\ModuleController@store']);
	Route::get('admin/modules/create', ['as'=> 'admin.modules.create', 'uses' => 'Admin\ModuleController@create']);
	Route::put('admin/modules/{modules}', ['as'=> 'admin.modules.update', 'uses' => 'Admin\ModuleController@update']);
	Route::patch('admin/modules/{modules}', ['as'=> 'admin.modules.update', 'uses' => 'Admin\ModuleController@update']);
	Route::delete('admin/modules/{modules}', ['as'=> 'admin.modules.destroy', 'uses' => 'Admin\ModuleController@destroy']);
	Route::get('admin/modules/{modules}', ['as'=> 'admin.modules.show', 'uses' => 'Admin\ModuleController@show']);
	Route::get('admin/modules/{modules}/edit', ['as'=> 'admin.modules.edit', 'uses' => 'Admin\ModuleController@edit']);

});



# --------------------------------------------------------------------------


/********** Admin accessible routes as an Authenticated User end **********/
