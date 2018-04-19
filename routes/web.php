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


	Route::get('admin/discountTypes', ['as'=> 'admin.discountTypes.index', 'uses' => 'Admin\DiscountTypeController@index']);
	Route::post('admin/discountTypes', ['as'=> 'admin.discountTypes.store', 'uses' => 'Admin\DiscountTypeController@store']);
	Route::get('admin/discountTypes/create', ['as'=> 'admin.discountTypes.create', 'uses' => 'Admin\DiscountTypeController@create']);
	Route::put('admin/discountTypes/{discountTypes}', ['as'=> 'admin.discountTypes.update', 'uses' => 'Admin\DiscountTypeController@update']);
	Route::patch('admin/discountTypes/{discountTypes}', ['as'=> 'admin.discountTypes.update', 'uses' => 'Admin\DiscountTypeController@update']);
	Route::delete('admin/discountTypes/{discountTypes}', ['as'=> 'admin.discountTypes.destroy', 'uses' => 'Admin\DiscountTypeController@destroy']);
	Route::get('admin/discountTypes/{discountTypes}', ['as'=> 'admin.discountTypes.show', 'uses' => 'Admin\DiscountTypeController@show']);
	Route::get('admin/discountTypes/{discountTypes}/edit', ['as'=> 'admin.discountTypes.edit', 'uses' => 'Admin\DiscountTypeController@edit']);



	Route::get('admin/companies', ['as'=> 'admin.companies.index', 'uses' => 'Admin\CompanyController@index']);
	Route::post('admin/companies', ['as'=> 'admin.companies.store', 'uses' => 'Admin\CompanyController@store']);
	Route::get('admin/companies/create', ['as'=> 'admin.companies.create', 'uses' => 'Admin\CompanyController@create']);
	Route::put('admin/companies/{companies}', ['as'=> 'admin.companies.update', 'uses' => 'Admin\CompanyController@update']);
	Route::patch('admin/companies/{companies}', ['as'=> 'admin.companies.update', 'uses' => 'Admin\CompanyController@update']);
	Route::delete('admin/companies/{companies}', ['as'=> 'admin.companies.destroy', 'uses' => 'Admin\CompanyController@destroy']);
	Route::get('admin/companies/{companies}', ['as'=> 'admin.companies.show', 'uses' => 'Admin\CompanyController@show']);
	Route::get('admin/companies/{companies}/edit', ['as'=> 'admin.companies.edit', 'uses' => 'Admin\CompanyController@edit']);


	Route::get('admin/companyContactPeople', ['as'=> 'admin.companyContactPeople.index', 'uses' => 'Admin\CompanyContactPersonController@index']);
	Route::post('admin/companyContactPeople', ['as'=> 'admin.companyContactPeople.store', 'uses' => 'Admin\CompanyContactPersonController@store']);
	Route::get('admin/companyContactPeople/create', ['as'=> 'admin.companyContactPeople.create', 'uses' => 'Admin\CompanyContactPersonController@create']);
	Route::put('admin/companyContactPeople', ['as'=> 'admin.companyContactPeople.update', 'uses' => 'Admin\CompanyContactPersonController@update']);
	Route::patch('admin/companyContactPeople', ['as'=> 'admin.companyContactPeople.update', 'uses' => 'Admin\CompanyContactPersonController@update']);
	Route::delete('admin/companyContactPeople/delete', ['as'=> 'admin.companyContactPeople.destroy', 'uses' => 'Admin\CompanyContactPersonController@destroy']);
	Route::get('admin/companyContactPeople/{companyContactPeople}', ['as'=> 'admin.companyContactPeople.show', 'uses' => 'Admin\CompanyContactPersonController@show']);
	Route::get('admin/companyContactPeople/{companyContactPeople}/edit', ['as'=> 'admin.companyContactPeople.edit', 'uses' => 'Admin\CompanyContactPersonController@edit']);


	Route::get('admin/companyBuildings', ['as'=> 'admin.companyBuildings.index', 'uses' => 'Admin\CompanyBuildingController@index']);
	Route::post('admin/companyBuildings', ['as'=> 'admin.companyBuildings.store', 'uses' => 'Admin\CompanyBuildingController@store']);
	Route::get('admin/companyBuildings/create', ['as'=> 'admin.companyBuildings.create', 'uses' => 'Admin\CompanyBuildingController@create']);
	Route::put('admin/companyBuildings/update', ['as'=> 'admin.companyBuildings.update', 'uses' => 'Admin\CompanyBuildingController@update']);
	Route::patch('admin/companyBuildings/update', ['as'=> 'admin.companyBuildings.update', 'uses' => 'Admin\CompanyBuildingController@update']);
	Route::delete('admin/companyBuildings/delete/building', ['as'=> 'admin.companyBuildings.destroy.building', 'uses' => 'Admin\CompanyBuildingController@destroyBuilding']);
	Route::delete('admin/companyBuildings/delete/floor', ['as'=> 'admin.companyBuildings.destroy.floor', 'uses' => 'Admin\CompanyBuildingController@destroyFloor']);
	Route::get('admin/companyBuildings/{companyBuildings}', ['as'=> 'admin.companyBuildings.show', 'uses' => 'Admin\CompanyBuildingController@show']);
	Route::get('admin/companyBuildings/{companyBuildings}/edit', ['as'=> 'admin.companyBuildings.edit', 'uses' => 'Admin\CompanyBuildingController@edit']);


	Route::get('admin/companyFloorRooms', ['as'=> 'admin.companyFloorRooms.index', 'uses' => 'Admin\CompanyFloorRoomController@index']);
	Route::post('admin/companyFloorRooms', ['as'=> 'admin.companyFloorRooms.store', 'uses' => 'Admin\CompanyFloorRoomController@store']);
	Route::get('admin/companyFloorRooms/create', ['as'=> 'admin.companyFloorRooms.create', 'uses' => 'Admin\CompanyFloorRoomController@create']);
	Route::put('admin/companyFloorRooms/{companyFloorRooms}', ['as'=> 'admin.companyFloorRooms.update', 'uses' => 'Admin\CompanyFloorRoomController@update']);
	Route::patch('admin/companyFloorRooms/{companyFloorRooms}', ['as'=> 'admin.companyFloorRooms.update', 'uses' => 'Admin\CompanyFloorRoomController@update']);
	Route::delete('admin/companyFloorRooms/{companyFloorRooms}', ['as'=> 'admin.companyFloorRooms.destroy', 'uses' => 'Admin\CompanyFloorRoomController@destroy']);
	Route::get('admin/companyFloorRooms/{companyFloorRooms}', ['as'=> 'admin.companyFloorRooms.show', 'uses' => 'Admin\CompanyFloorRoomController@show']);
	Route::get('admin/companyFloorRooms/{companyFloorRooms}/edit', ['as'=> 'admin.companyFloorRooms.edit', 'uses' => 'Admin\CompanyFloorRoomController@edit']);


	Route::get('admin/companyContracts', ['as'=> 'admin.companyContracts.index', 'uses' => 'Admin\CompanyContractController@index']);
	Route::post('admin/companyContracts', ['as'=> 'admin.companyContracts.store', 'uses' => 'Admin\CompanyContractController@store']);
	Route::get('admin/companyContracts/create', ['as'=> 'admin.companyContracts.create', 'uses' => 'Admin\CompanyContractController@create']);
	Route::put('admin/companyContracts/{companyContracts}', ['as'=> 'admin.companyContracts.update', 'uses' => 'Admin\CompanyContractController@update']);
	Route::patch('admin/companyContracts/{companyContracts}', ['as'=> 'admin.companyContracts.update', 'uses' => 'Admin\CompanyContractController@update']);
	Route::delete('admin/companyContracts/{companyContracts}', ['as'=> 'admin.companyContracts.destroy', 'uses' => 'Admin\CompanyContractController@destroy']);
	Route::get('admin/companyContracts/{companyContracts}', ['as'=> 'admin.companyContracts.show', 'uses' => 'Admin\CompanyContractController@show']);
	Route::get('admin/companyContracts/{companyContracts}/edit', ['as'=> 'admin.companyContracts.edit', 'uses' => 'Admin\CompanyContractController@edit']);


	Route::get('admin/companyModules', ['as'=> 'admin.companyModules.index', 'uses' => 'Admin\CompanyModuleController@index']);
	Route::post('admin/companyModules', ['as'=> 'admin.companyModules.store', 'uses' => 'Admin\CompanyModuleController@store']);
	Route::get('admin/companyModules/create', ['as'=> 'admin.companyModules.create', 'uses' => 'Admin\CompanyModuleController@create']);
	Route::put('admin/companyModules/{companyModules}', ['as'=> 'admin.companyModules.update', 'uses' => 'Admin\CompanyModuleController@update']);
	Route::patch('admin/companyModules/{companyModules}', ['as'=> 'admin.companyModules.update', 'uses' => 'Admin\CompanyModuleController@update']);
	Route::delete('admin/companyModules/{companyModules}', ['as'=> 'admin.companyModules.destroy', 'uses' => 'Admin\CompanyModuleController@destroy']);
	Route::get('admin/companyModules/{companyModules}', ['as'=> 'admin.companyModules.show', 'uses' => 'Admin\CompanyModuleController@show']);
	Route::get('admin/companyModules/{companyModules}/edit', ['as'=> 'admin.companyModules.edit', 'uses' => 'Admin\CompanyModuleController@edit']);


	Route::get('admin/companyUsers', ['as'=> 'admin.companyUsers.index', 'uses' => 'Admin\CompanyUserController@index']);
	Route::post('admin/companyUsers', ['as'=> 'admin.companyUsers.store', 'uses' => 'Admin\CompanyUserController@store']);
	Route::get('admin/companyUsers/create', ['as'=> 'admin.companyUsers.create', 'uses' => 'Admin\CompanyUserController@create']);
	Route::put('admin/companyUsers/update', ['as'=> 'admin.companyUsers.update', 'uses' => 'Admin\CompanyUserController@update']);
	Route::patch('admin/companyUsers/update', ['as'=> 'admin.companyUsers.update', 'uses' => 'Admin\CompanyUserController@update']);
	Route::delete('admin/companyUsers/delete', ['as'=> 'admin.companyUsers.destroy', 'uses' => 'Admin\CompanyUserController@destroy']);
	Route::get('admin/companyUsers/{companyUsers}', ['as'=> 'admin.companyUsers.show', 'uses' => 'Admin\CompanyUserController@show']);
	Route::get('admin/companyUsers/{companyUsers}/edit', ['as'=> 'admin.companyUsers.edit', 'uses' => 'Admin\CompanyUserController@edit']);



	Route::get('admin/modules', ['as'=> 'admin.modules.index', 'uses' => 'Admin\ModuleController@index']);
	Route::post('admin/modules', ['as'=> 'admin.modules.store', 'uses' => 'Admin\ModuleController@store']);
	Route::get('admin/modules/create', ['as'=> 'admin.modules.create', 'uses' => 'Admin\ModuleController@create']);
	Route::put('admin/modules/{modules}', ['as'=> 'admin.modules.update', 'uses' => 'Admin\ModuleController@update']);
	Route::patch('admin/modules/{modules}', ['as'=> 'admin.modules.update', 'uses' => 'Admin\ModuleController@update']);
	Route::delete('admin/modules/{modules}', ['as'=> 'admin.modules.destroy', 'uses' => 'Admin\ModuleController@destroy']);
	Route::get('admin/modules/{modules}', ['as'=> 'admin.modules.show', 'uses' => 'Admin\ModuleController@show']);
	Route::get('admin/modules/{modules}/edit', ['as'=> 'admin.modules.edit', 'uses' => 'Admin\ModuleController@edit']);


	// route for invoice generation testing by moiz
	Route::get('admin/company/invoice', ['as'=> 'admin.invoice.view', 'uses' => 'Admin\CompanyController@invoiceView']);
	
	// route for admin account settings view
	Route::get('admin/accountSettings', ['as'=> 'admin.accountSettings.view', 'uses' => 'Admin\UserController@accountSettingsView']);

	// route for admin account settings store
	Route::post('admin/accountSettings/store', ['as'=> 'admin.accountSettings.store', 'uses' => 'Admin\UserController@accountSettingsStore']);

	Route::post('validate/siteAdmin/email', ['as'=> 'validate.siteAdmin.email', 'uses' => 'General\ValidationController@siteAdminEmail']);
	
	Route::post('admin/accountSettings/removeProfilePic', ['as'=> 'admin.accountSettings.removeProfilePic', 'uses' => 'Admin\UserController@accountSettingsRemoveProfilePic']);


});



# --------------------------------------------------------------------------


/********** Admin accessible routes as an Authenticated User end **********/




/*
|--------------------------------------------------------------------------
| Web Routes for Conference Module
|--------------------------------------------------------------------------
|
| These are the routes declared for General purpose
|
*/


/********** Conference module routes start here **********/


	Route::get('temp_company/login', ['as'=> 'temp.company.login', 'uses' => 'Company\Conference\LoginController@index']);
	Route::post('temp_company/authenticate', ['as'=> 'temp.company.authenticate', 'uses' => 'Company\Conference\LoginController@authenticate']);
	Route::get('temp_company/dashboard', ['as'=> 'temp.company.dashboard', 'uses' => 'Company\Conference\LoginController@dashboard']);



/********** Conference module routes end here **********/






/*
|--------------------------------------------------------------------------
| Web Routes for General purpose
|--------------------------------------------------------------------------
|
| These are the routes declared for General purpose
|
*/


/********** General routes start here **********/

Route::post('cities', ['as'=> 'cities.list', 'uses' => 'General\GeoController@getCities']);
Route::post('validate/contract_no', ['as'=> 'validate.contract', 'uses' => 'General\ValidationController@contractNo']);
Route::post('validate/admin', ['as'=> 'validate.admin', 'uses' => 'General\ValidationController@adminEmail']);


/********** General routes end here **********/




// For selectively chosen routes:
	/*Route::group(['prefix' => Waavi\Translation\Facades\UriLocalizer::localeFromRequest(2)], function () {
		
		Route::get('hello/world', function() {
			return \UriLocalizer::localeFromRequest()." Hello world";

	}); */


/*Route::group(['prefix' => \UriLocalizer::localeFromRequest(2), 'middleware' => 'localize:2'], function () {
	    Route::get('/test', function() {
			return \UriLocalizer::localeFromRequest()." Hello world";

	    });
	});
*/






