<?php


Auth::routes();

/*
|--------------------------------------------------------------------------
| Web Routes for Admin Panel
|--------------------------------------------------------------------------
|
| These are the routes declared for Admin Panel
|
*/
Route::get('/', function() {

    return redirect()->route('login');
});

/********** Admin accessible routes as a Guest User start **********/

Route::group(['middleware' => ['admin.guest']], function () {

    Route::get('/home', ['as'=> 'home', 'uses' => 'HomeController@index']);
    Route::get('rooms/{room}', ['as'=> 'home.rooms.show', 'uses' => 'HomeController@show']);
    Route::get('rooms/book/{room}', ['as'=> 'home.rooms.book', 'uses' => 'HomeController@book']);
    Route::post('rooms/book', ['as'=> 'home.rooms.store', 'uses' => 'HomeController@store']);

});

/******* Redirect to admin login *********/
Route::get('/admin', function() {

	return redirect()->route('admin.login');
});

/***** Redirect to Customer login ***/
Route::get('/company', function() {

    return redirect()->route('company.login');
});

/********** Admin accessible routes as a Guest User start **********/

Route::group(['middleware' => ['admin.guest']], function () {

	Route::get('admin', function() {
		return redirect()->route('admin.login');
	});

	Route::get('admin/login', ['as'=> 'admin.login', 'uses' => 'Admin\UserController@viewLogin']);
	Route::post('admin/authenticate', ['as'=> 'admin.users.authenticate', 'uses' => 'Admin\UserController@authenticate']);

});

/********** Admin accessible routes as a Guest User end **********/


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
	Route::get('admin/settings/general', ['as'=> 'admin.settings.general', 'uses' => 'Admin\SettingsController@generalSetting']);
	Route::patch('admin/settings/general', ['as'=> 'admin.userStatuses.addOrUpdate', 'uses' => 'Admin\SettingsController@addOrUpdate']);

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
	Route::get('admin/companies/{companies}/edit/{wizard?}', ['as'=> 'admin.companies.edit', 'uses' => 'Admin\CompanyController@edit']);

	// Company Profile route
	Route::get('admin/company/{id}/profile', ['as'=> 'admin.company.profile', 'uses' => 'Admin\CompanyController@profile']);


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
	Route::put('admin/companyModules/update', ['as'=> 'admin.companyModules.update', 'uses' => 'Admin\CompanyModuleController@update']);
	Route::patch('admin/companyModules/update', ['as'=> 'admin.companyModules.update', 'uses' => 'Admin\CompanyModuleController@update']);
	Route::delete('admin/companyModules/delete', ['as'=> 'admin.companyModules.destroy', 'uses' => 'Admin\CompanyModuleController@destroy']);
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

	// routes created by nazir start
	Route::get('admin/companyInvoices', ['as'=> 'admin.companyInvoices.index', 'uses' => 'Admin\CompanyInvoiceController@index']);
	Route::get('admin/companyInvoices/generate/{company_id}',['as' => 'admin.generateInvoice','uses' => 'Admin\CompanyInvoiceController@createInvoiceByCompanyId']);
	Route::get('admin/companyInvoices/sendInvoice/{company_id}',['as' => 'admin.sendInvoice','uses' => 'Admin\CompanyInvoiceController@sendLatestInvoiceToCompanyContractPerson']);
	Route::get('admin/companyInvoices/sendInvoice/{company_id}/{invoice_id}',['as' => 'admin.sendInvoiceById','uses' => 'Admin\CompanyInvoiceController@sendInvoiceToCompanyContractPersonByInvoiceId']);
	Route::get('admin/companyInvoices/viewInvoice/{company_id}/{invoice_id}',['as' => 'admin.viewInvoice','uses' => 'Admin\CompanyInvoiceController@viewInvoiceByCompanyId']);
	// routes created by nazir end

	Route::post('admin/companyInvoices', ['as'=> 'admin.companyInvoices.store', 'uses' => 'Admin\CompanyInvoiceController@store']);
	Route::get('admin/companyInvoices/create', ['as'=> 'admin.companyInvoices.create', 'uses' => 'Admin\CompanyInvoiceController@create']);
	Route::put('admin/companyInvoices/update', ['as'=> 'admin.companyInvoices.update', 'uses' => 'Admin\CompanyInvoiceController@update']);
	Route::patch('admin/companyInvoices/update', ['as'=> 'admin.companyInvoices.update', 'uses' => 'Admin\CompanyInvoiceController@update']);

	Route::delete('admin/companyInvoices/{companyInvoices}', ['as'=> 'admin.companyInvoices.destroy', 'uses' => 'Admin\CompanyInvoiceController@destroy']);

	Route::get('admin/companyInvoices/{companyInvoices}', ['as'=> 'admin.companyInvoices.show', 'uses' => 'Admin\CompanyInvoiceController@show']);
	Route::get('admin/companyInvoices/{companyInvoices}/edit', ['as'=> 'admin.companyInvoices.edit', 'uses' => 'Admin\CompanyInvoiceController@edit']);



	Route::get('admin/modules', ['as'=> 'admin.modules.index', 'uses' => 'Admin\ModuleController@index']);
	Route::post('admin/modules', ['as'=> 'admin.modules.store', 'uses' => 'Admin\ModuleController@store']);
	Route::get('admin/modules/create', ['as'=> 'admin.modules.create', 'uses' => 'Admin\ModuleController@create']);
	Route::put('admin/modules/{modules}', ['as'=> 'admin.modules.update', 'uses' => 'Admin\ModuleController@update']);
	Route::patch('admin/modules/{modules}', ['as'=> 'admin.modules.update', 'uses' => 'Admin\ModuleController@update']);
	Route::delete('admin/modules/{modules}', ['as'=> 'admin.modules.destroy', 'uses' => 'Admin\ModuleController@destroy']);
	Route::get('admin/modules/{modules}', ['as'=> 'admin.modules.show', 'uses' => 'Admin\ModuleController@show']);
	Route::get('admin/modules/{modules}/edit', ['as'=> 'admin.modules.edit', 'uses' => 'Admin\ModuleController@edit']);


	//composer require barryvdh/laravel-dompdf

	// route for invoice generation testing by moiz
	Route::get('admin/company/invoice', ['as'=> 'admin.invoice.view', 'uses' => 'Admin\CompanyController@invoiceView']);

	// route for admin account settings view
	Route::get('admin/accountSettings', ['as'=> 'admin.accountSettings.view', 'uses' => 'Admin\UserController@accountSettingsView']);

	// route for admin account settings store
	Route::post('admin/accountSettings/store', ['as'=> 'admin.accountSettings.store', 'uses' => 'Admin\UserController@accountSettingsStore']);

	Route::post('validate/siteAdmin/email', ['as'=> 'validate.siteAdmin.email', 'uses' => 'General\ValidationController@siteAdminEmail']);
	
	Route::post('admin/accountSettings/removeProfilePic', ['as'=> 'admin.accountSettings.removeProfilePic', 'uses' => 'Admin\UserController@accountSettingsRemoveProfilePic']);

	//composer require barryvdh/laravel-dompdf

	// route for invoice generation testing by moiz
	Route::get('admin/company/invoice', ['as'=> 'admin.invoice.view', 'uses' => 'Admin\CompanyController@invoiceView']);











	//Route::group(['middleware' => ['auth']], function() {
	    // Group Create/Edit/Delete Routes
	    // Route::resource('group', 'Admin\AdminGroupController');


	Route::get('admin/groups', ['as'=> 'admin.newsletter.groups.index', 'uses' => 'Admin\AdminGroupController@index']);
	Route::post('admin/groups', ['as'=> 'admin.newsletter.groups.store', 'uses' => 'Admin\AdminGroupController@store']);
	Route::get('admin/groups/create', ['as'=> 'admin.newsletter.groups.create', 'uses' => 'Admin\AdminGroupController@create']);
	Route::put('admin/groups/{group}/update', ['as'=> 'admin.newsletter.groups.update', 'uses' => 'Admin\AdminGroupController@update']);
	Route::patch('admin/groups/{group}/update', ['as'=> 'admin.newsletter.groups.update', 'uses' => 'Admin\AdminGroupController@update']);
	Route::delete('admin/groups/{group}/delete', ['as'=> 'admin.newsletter.groups.destroy', 'uses' => 'Admin\AdminGroupController@destroy']);
	Route::get('admin/groups/{group}', ['as'=> 'admin.newsletter.groups.show', 'uses' => 'Admin\AdminGroupController@show']);
	Route::get('admin/groups/{group}/edit', ['as'=> 'admin.newsletter.groups.edit', 'uses' => 'Admin\AdminGroupController@edit']);
	Route::post('admin/groups/upload', ['as'=> 'admin.newsletter.groups.upload', 'uses' => 'Admin\AdminGroupController@upload']);
	Route::get('admin/groups/get', ['as'=> 'admin.newsletter.groups.get', 'uses' => 'Admin\AdminGroupController@sendmail']);
	Route::post('admin/groups/mailto', ['as'=> 'admin.newsletter.groups.mailto', 'uses' => 'Admin\AdminGroupController@mailto']);





	    Route::resource('customer', 'Admin\AdminCustomerController');
	    //Send mail view
	    Route::get('/sendmail', ['as'=> 'admin.newsletter.sendmail', 'uses' => 'Admin\AdminGroupController@sendmail']);
//	});
	/*
	 * Mail Send
	 /
	Route::post('/group/mailto', 'GroupController@mailto')->name("group.mailto");
	/
	  File Upload
	 /
	Route::post('/group/upload', 'GroupController@upload');
	/*
	 * Analytics from sendgrid
	 */
	Route::get('admin/newsletter/dashboard', ['as'=> 'admin.newsletter.dashboard', 'uses' => 'Admin\AdminNewsLetterController@analytic']);

















});

/********** Company Admin accessible routes as a Guest User start **********/


Route::group(['middleware' => ['company.guest']], function () {
    Route::get("admin/settings/city/{id}",['uses' => 'Admin\UserController@getCityByStateId']);
    Route::get('company/login', ['as'=> 'company.login', 'uses' => 'Company\UserController@viewLogin']);
    Route::post('company/authenticate', ['as'=> 'company.users.authenticate', 'uses' => 'Company\UserController@authenticate']);

});

/********** Company Admin accessible routes as a Guest User end **********/

/********** Company Admin accessible routes as an Authenticated User start **********/

Route::group(['middleware' => ['company.auth']], function () {

    Route::get('company/dashboard', ['as' => 'company.dashboard', 'uses' => 'Company\DashboardController@index']);
    Route::get('company/dashboard/profile', ['as' => 'company.dashboard.profile', 'uses' => 'Company\DashboardController@profile']);

    Route::get('company/logout', ['as' => 'company.logout', 'uses' => 'Company\UserController@logout']);

    Route::get('company/users', ['as' => 'company.users.index', 'uses' => 'Company\UserController@index']);
    Route::post('company/users', ['as' => 'company.users.store', 'uses' => 'Company\UserController@store']);
    Route::get('company/users/create', ['as' => 'company.users.create', 'uses' => 'Company\UserController@create']);
    Route::put('company/users/{users}', ['as' => 'company.users.update', 'uses' => 'Company\UserController@update']);
    Route::patch('company/users/{users}', ['as' => 'company.users.update', 'uses' => 'Company\UserController@update']);
    Route::delete('company/users/{users}', ['as' => 'company.users.destroy', 'uses' => 'Company\UserController@destroy']);
    Route::get('company/users/{users}', ['as' => 'company.users.show', 'uses' => 'Company\UserController@show']);
    Route::get('company/users/{users}/edit', ['as' => 'company.users.edit', 'uses' => 'Company\UserController@edit']);

    Route::get('company/companyBuildings', ['as'=> 'company.companyBuildings.index', 'uses' => 'Company\CompanyBuildingController@index']);
    //Route::post('company/companyBuildings', ['as'=> 'company.companyBuildings.store', 'uses' => 'Company\CompanyBuildingController@store']);
    //Route::get('company/companyBuildings/create', ['as'=> 'company.companyBuildings.create', 'uses' => 'Company\CompanyBuildingController@create']);
    Route::put('company/companyBuildings/{companyBuildings}', ['as'=> 'company.companyBuildings.update', 'uses' => 'Company\CompanyBuildingController@update']);
    Route::patch('company/companyBuildings/{companyBuildings}', ['as'=> 'company.companyBuildings.update', 'uses' => 'Company\CompanyBuildingController@update']);
    Route::delete('company/companyBuildings/{companyBuildings}', ['as'=> 'company.companyBuildings.destroy', 'uses' => 'Company\CompanyBuildingController@destroy']);
    Route::get('company/companyBuildings/{companyBuildings}', ['as'=> 'company.companyBuildings.show', 'uses' => 'Company\CompanyBuildingController@show']);
    Route::get('company/companyBuildings/{companyBuildings}/edit', ['as'=> 'company.companyBuildings.edit', 'uses' => 'Company\CompanyBuildingController@edit']);

    Route::get('company/companyFloorRooms', ['as'=> 'company.companyFloorRooms.index', 'uses' => 'Company\CompanyFloorRoomController@index']);
    Route::post('company/companyFloorRooms', ['as'=> 'company.companyFloorRooms.store', 'uses' => 'Company\CompanyFloorRoomController@store']);
    Route::get('company/companyFloorRooms/create', ['as'=> 'company.companyFloorRooms.create', 'uses' => 'Company\CompanyFloorRoomController@create']);
    Route::put('company/companyFloorRooms/{companyFloorRooms}', ['as'=> 'company.companyFloorRooms.update', 'uses' => 'Company\CompanyFloorRoomController@update']);
    Route::patch('company/companyFloorRooms/{companyFloorRooms}', ['as'=> 'company.companyFloorRooms.update', 'uses' => 'Company\CompanyFloorRoomController@update']);
    Route::delete('company/companyFloorRooms/{companyFloorRooms}', ['as'=> 'company.companyFloorRooms.destroy', 'uses' => 'Company\CompanyFloorRoomController@destroy']);
    Route::get('company/companyFloorRooms/{companyFloorRooms}', ['as'=> 'company.companyFloorRooms.show', 'uses' => 'Company\CompanyFloorRoomController@show']);
    Route::get('company/companyFloorRooms/{companyFloorRooms}/edit', ['as'=> 'company.companyFloorRooms.edit', 'uses' => 'Company\CompanyFloorRoomController@edit']);

    Route::get('company/services', ['as'=> 'company.services.index', 'uses' => 'Company\ServiceController@index']);
    Route::post('company/services', ['as'=> 'company.services.store', 'uses' => 'Company\ServiceController@store']);
    Route::get('company/services/create', ['as'=> 'company.services.create', 'uses' => 'Company\ServiceController@create']);
    Route::put('company/services/{services}', ['as'=> 'company.services.update', 'uses' => 'Company\ServiceController@update']);
    Route::patch('company/services/{services}', ['as'=> 'company.services.update', 'uses' => 'Company\ServiceController@update']);
    Route::delete('company/services/{services}', ['as'=> 'company.services.destroy', 'uses' => 'Company\ServiceController@destroy']);
    Route::get('company/services/{services}', ['as'=> 'company.services.show', 'uses' => 'Company\ServiceController@show']);
    Route::get('company/services/{services}/edit', ['as'=> 'company.services.edit', 'uses' => 'Company\ServiceController@edit']);

    Route::get('company/rooms', ['as'=> 'company.rooms.index', 'uses' => 'Company\RoomController@index']);
    Route::post('company/rooms', ['as'=> 'company.rooms.store', 'uses' => 'Company\RoomController@store']);
    Route::get('company/rooms/create', ['as'=> 'company.rooms.create', 'uses' => 'Company\RoomController@create']);
    Route::put('company/rooms/{rooms}', ['as'=> 'company.rooms.update', 'uses' => 'Company\RoomController@update']);
    Route::patch('company/rooms/{rooms}', ['as'=> 'company.rooms.update', 'uses' => 'Company\RoomController@update']);
    Route::delete('company/rooms/{rooms}', ['as'=> 'company.rooms.destroy', 'uses' => 'Company\RoomController@destroy']);
    Route::get('company/rooms/{rooms}', ['as'=> 'company.rooms.show', 'uses' => 'Company\RoomController@show']);
    Route::get('company/rooms/{rooms}/edit', ['as'=> 'company.rooms.edit', 'uses' => 'Company\RoomController@edit']);

    Route::get('company/contracts', ['as'=> 'company.contracts.index', 'uses' => 'Company\RoomContractController@index']);
    Route::post('company/contracts', ['as'=> 'company.contracts.store', 'uses' => 'Company\RoomContractController@store']);
    Route::get('company/contracts/create', ['as'=> 'company.contracts.create', 'uses' => 'Company\RoomContractController@create']);
    Route::put('company/contracts/{contracts}', ['as'=> 'company.contracts.update', 'uses' => 'Company\RoomContractController@update']);
    Route::patch('company/contracts/{contracts}', ['as'=> 'company.contracts.update', 'uses' => 'Company\RoomContractController@update']);
    Route::delete('company/contracts/{contracts}', ['as'=> 'company.contracts.destroy', 'uses' => 'Company\RoomContractController@destroy']);
    Route::get('company/contracts/{contracts}', ['as'=> 'company.contracts.show', 'uses' => 'Company\RoomContractController@show']);
    Route::get('company/contracts/{contracts}/edit', ['as'=> 'company.contracts.edit', 'uses' => 'Company\RoomContractController@edit']);

    Route::post('company/companies', ['as'=> 'company.companies.store', 'uses' => 'Company\CompanyController@store']);
    Route::put('company/companies/{companies}', ['as'=> 'company.companies.update', 'uses' => 'Company\CompanyController@update']);
    Route::patch('company/companies/{companies}', ['as'=> 'company.companies.update', 'uses' => 'Company\CompanyController@update']);
    Route::post('company/companyContactPeople', ['as'=> 'company.companyContactPeople.store', 'uses' => 'Company\CompanyContactPersonController@store']);
    Route::put('company/companyContactPeople', ['as'=> 'company.companyContactPeople.update', 'uses' => 'Company\CompanyContactPersonController@update']);
    Route::patch('company/companyContactPeople', ['as'=> 'company.companyContactPeople.update', 'uses' => 'Company\CompanyContactPersonController@update']);

    // Invoice Generator
    // routes created by nazir start
    Route::get('company/companyInvoices', ['as'=> 'company.companyInvoices.index', 'uses' => 'Company\CompanyInvoiceController@index']);
    Route::get('company/companyInvoices/generate/{company_id}',['as' => 'company.generateInvoice','uses' => 'Company\CompanyInvoiceController@createInvoiceByCompanyId']);
    Route::get('company/companyInvoices/sendInvoice/{company_id}',['as' => 'company.sendInvoice','uses' => 'Company\CompanyInvoiceController@sendLatestInvoiceToCompanyContractPerson']);


    Route::group(['middleware' => ['newsletter.auth']], function () {
        //NewsLetter System Integration
        // Group
        Route::get('company/group', ['as'=> 'company.newsletterGroups.index', 'uses' => 'Company\NewsLetterGroupController@index']);
        Route::post('company/group', ['as'=> 'company.newsletterGroups.store', 'uses' => 'Company\NewsLetterGroupController@store']);
        Route::get('company/group/create', ['as'=> 'company.newsletterGroups.create', 'uses' => 'Company\NewsLetterGroupController@create']);
        Route::put('company/group/{group}', ['as'=> 'company.newsletterGroups.update', 'uses' => 'Company\NewsLetterGroupController@update']);
        Route::patch('company/group/{group}', ['as'=> 'company.newsletterGroups.update', 'uses' => 'Company\NewsLetterGroupController@update']);
        Route::delete('company/group/{group}', ['as'=> 'company.newsletterGroups.destroy', 'uses' => 'Company\NewsLetterGroupController@destroy']);
        Route::get('company/group/{group}', ['as'=> 'company.newsletterGroups.show', 'uses' => 'Company\NewsLetterGroupController@show']);
        Route::get('company/group/{group}/edit', ['as'=> 'company.newsletterGroups.edit', 'uses' => 'Company\NewsLetterGroupController@edit']);
        Route::get('company/sendmail', ['as'=> 'company.newsletterGroups.sendmail', 'uses' => 'Company\NewsLetterGroupController@sendmail']);

        Route::post('company/mailto', ['as'=> 'company.newsletters.sendmail', 'uses' => 'Company\NewsLetterGroupController@mailto']);

        Route::get('company/newsletter', ['as'=> 'company.newsletter.dashboard', 'uses' => 'Company\NewsLetterHomeController@analytic']);
        Route::post('company/newsletter', ['as'=> 'company.newsletter.fetch', 'uses' => 'Company\NewsLetterHomeController@analytic']);

        //Customer
        Route::get('company/customerList', ['as'=> 'company.newsletterCustomers.list', 'uses' => 'Company\NewsLetterCustomerController@lists']);
        Route::get('company/customer', ['as'=> 'company.newsletterCustomers.index', 'uses' => 'Company\NewsLetterCustomerController@index']);
        Route::post('company/customer', ['as'=> 'company.newsletterCustomers.store', 'uses' => 'Company\NewsLetterCustomerController@store']);
        Route::get('company/customer/create', ['as'=> 'company.newsletterCustomers.create', 'uses' => 'Company\NewsLetterCustomerController@create']);
        Route::put('company/customer/{customer}', ['as'=> 'company.newsletterCustomers.update', 'uses' => 'Company\NewsLetterCustomerController@update']);
        Route::patch('company/customer/{customer}', ['as'=> 'company.newsletterCustomers.update', 'uses' => 'Company\NewsLetterCustomerController@update']);
        Route::delete('company/customer/{customer}', ['as'=> 'company.newsletterCustomers.destroy', 'uses' => 'Company\NewsLetterCustomerController@destroy']);
        Route::get('company/customer/{customer}', ['as'=> 'company.newsletterCustomers.show', 'uses' => 'Company\NewsLetterCustomerController@show']);
        Route::get('company/customer/{customer}/edit', ['as'=> 'company.newsletterCustomers.edit', 'uses' => 'Company\NewsLetterCustomerController@edit']);
    });

});

/********** Company Admin accessible routes as an Authenticated User end **********/


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
	Route::get('mail', ['as'=> 'mail.send', 'uses' => 'General\ValidationController@sendMail']);

	// Temporary Routes By Moiz for UIs Designing
	Route::get('temp_company/booking/add', ['as'=> 'temp.company.booking.add', 'uses' => 'Company\Conference\RoomController@addBooking']);
	Route::get('temp_company/room/add', ['as'=> 'temp.company.room.add', 'uses' => 'Company\Conference\RoomController@addRoom']);
	Route::get('temp_company/roomLayout/add', ['as'=> 'temp.company.roomLayout.add', 'uses' => 'Company\Conference\RoomController@addRoomLayout']);
	Route::get('temp_company/equipment/add', ['as'=> 'temp.company.equipments.add', 'uses' => 'Company\Conference\RoomController@addEquipments']);
	Route::get('temp_company/equipment/criteria/add', ['as'=> 'temp.company.equipment.criteria.add', 'uses' => 'Company\Conference\RoomController@addEquipmentsCriteria']);
	Route::get('temp_company/foodndrink/add', ['as'=> 'temp.company.foodndrinks.add', 'uses' => 'Company\Conference\RoomController@addFoodnDrinks']);
	Route::get('temp_company/package/add', ['as'=> 'temp.company.package.add', 'uses' => 'Company\Conference\RoomController@addPackage']);
	Route::get('temp_company/customer/add', ['as'=> 'temp.company.customer.add', 'uses' => 'Company\Conference\RoomController@addCustomer']);

	// Conference Room Layout Routes
	Route::get('company/Conference/roomLayouts', ['as'=> 'company.conference.roomLayouts.index', 'uses' => 'Company\Conference\RoomLayoutController@index']);
	Route::post('company/Conference/roomLayouts', ['as'=> 'company.conference.roomLayouts.store', 'uses' => 'Company\Conference\RoomLayoutController@store']);
	Route::get('company/Conference/roomLayouts/create', ['as'=> 'company.conference.roomLayouts.create', 'uses' => 'Company\Conference\RoomLayoutController@create']);
	Route::put('company/Conference/roomLayouts/{roomLayouts}', ['as'=> 'company.conference.roomLayouts.update', 'uses' => 'Company\Conference\RoomLayoutController@update']);
	Route::patch('company/Conference/roomLayouts/{roomLayouts}', ['as'=> 'company.conference.roomLayouts.update', 'uses' => 'Company\Conference\RoomLayoutController@update']);
	Route::delete('company/Conference/roomLayouts/{roomLayouts}', ['as'=> 'company.conference.roomLayouts.destroy', 'uses' => 'Company\Conference\RoomLayoutController@destroy']);
	Route::get('company/Conference/roomLayouts/{roomLayouts}', ['as'=> 'company.conference.roomLayouts.show', 'uses' => 'Company\Conference\RoomLayoutController@show']);
	Route::get('company/Conference/roomLayouts/{roomLayouts}/edit', ['as'=> 'company.conference.roomLayouts.edit', 'uses' => 'Company\Conference\RoomLayoutController@edit']);

	// Conference Food and Drinks Routes
	Route::get('company/conference/foods', ['as'=> 'company.conference.foods.index', 'uses' => 'Company\Conference\FoodController@index']);
	Route::post('company/conference/foods', ['as'=> 'company.conference.foods.store', 'uses' => 'Company\Conference\FoodController@store']);
	Route::get('company/conference/foods/create', ['as'=> 'company.conference.foods.create', 'uses' => 'Company\Conference\FoodController@create']);
	Route::put('company/conference/foods/{foods}', ['as'=> 'company.conference.foods.update', 'uses' => 'Company\Conference\FoodController@update']);
	Route::patch('company/conference/foods/{foods}', ['as'=> 'company.conference.foods.update', 'uses' => 'Company\Conference\FoodController@update']);
	Route::delete('company/conference/foods/{foods}', ['as'=> 'company.conference.foods.destroy', 'uses' => 'Company\Conference\FoodController@destroy']);
	Route::get('company/conference/foods/{foods}', ['as'=> 'company.conference.foods.show', 'uses' => 'Company\Conference\FoodController@show']);
	Route::get('company/conference/foods/{foods}/edit', ['as'=> 'company.conference.foods.edit', 'uses' => 'Company\Conference\FoodController@edit']);

	// Conference Packages Routes
	Route::get('company/conference/packages', ['as'=> 'company.conference.packages.index', 'uses' => 'Company\Conference\PackagesController@index']);
	Route::post('company/conference/packages', ['as'=> 'company.conference.packages.store', 'uses' => 'Company\Conference\PackagesController@store']);
	Route::get('company/conference/packages/create', ['as'=> 'company.conference.packages.create', 'uses' => 'Company\Conference\PackagesController@create']);
	Route::put('company/conference/packages/{packages}', ['as'=> 'company.conference.packages.update', 'uses' => 'Company\Conference\PackagesController@update']);
	Route::patch('company/conference/packages/{packages}', ['as'=> 'company.conference.packages.update', 'uses' => 'Company\Conference\PackagesController@update']);
	Route::delete('company/conference/packages/{packages}', ['as'=> 'company.conference.packages.destroy', 'uses' => 'Company\Conference\PackagesController@destroy']);
	Route::get('company/conference/packages/{packages}', ['as'=> 'company.conference.packages.show', 'uses' => 'Company\Conference\PackagesController@show']);
	Route::get('company/conference/packages/{packages}/edit', ['as'=> 'company.conference.packages.edit', 'uses' => 'Company\Conference\PackagesController@edit']);

	// Conference Equipment Criteria Routes
	Route::get('company/conference/equipmentCriterias', ['as'=> 'company.conference.equipmentCriterias.index', 'uses' => 'Company\Conference\EquipmentCriteriaController@index']);
	Route::post('company/conference/equipmentCriterias', ['as'=> 'company.conference.equipmentCriterias.store', 'uses' => 'Company\Conference\EquipmentCriteriaController@store']);
	Route::get('company/conference/equipmentCriterias/create', ['as'=> 'company.conference.equipmentCriterias.create', 'uses' => 'Company\Conference\EquipmentCriteriaController@create']);
	Route::put('company/conference/equipmentCriterias/{equipmentCriterias}', ['as'=> 'company.conference.equipmentCriterias.update', 'uses' => 'Company\Conference\EquipmentCriteriaController@update']);
	Route::patch('company/conference/equipmentCriterias/{equipmentCriterias}', ['as'=> 'company.conference.equipmentCriterias.update', 'uses' => 'Company\Conference\EquipmentCriteriaController@update']);
	Route::delete('company/conference/equipmentCriterias/{equipmentCriterias}', ['as'=> 'company.conference.equipmentCriterias.destroy', 'uses' => 'Company\Conference\EquipmentCriteriaController@destroy']);
	Route::get('company/conference/equipmentCriterias/{equipmentCriterias}', ['as'=> 'company.conference.equipmentCriterias.show', 'uses' => 'Company\Conference\EquipmentCriteriaController@show']);
	Route::get('company/conference/equipmentCriterias/{equipmentCriterias}/edit', ['as'=> 'company.conference.equipmentCriterias.edit', 'uses' => 'Company\Conference\EquipmentCriteriaController@edit']);

	// Conference Equipment Routes
	Route::get('company/conference/equipments', ['as'=> 'company.conference.equipments.index', 'uses' => 'Company\Conference\EquipmentsController@index']);
	Route::post('company/conference/equipments', ['as'=> 'company.conference.equipments.store', 'uses' => 'Company\Conference\EquipmentsController@store']);
	Route::get('company/conference/equipments/create', ['as'=> 'company.conference.equipments.create', 'uses' => 'Company\Conference\EquipmentsController@create']);
	Route::put('company/conference/equipments/{equipments}', ['as'=> 'company.conference.equipments.update', 'uses' => 'Company\Conference\EquipmentsController@update']);
	Route::patch('company/conference/equipments/{equipments}', ['as'=> 'company.conference.equipments.update', 'uses' => 'Company\Conference\EquipmentsController@update']);
	Route::delete('company/conference/equipments/{equipments}', ['as'=> 'company.conference.equipments.destroy', 'uses' => 'Company\Conference\EquipmentsController@destroy']);
	Route::get('company/conference/equipments/{equipments}', ['as'=> 'company.conference.equipments.show', 'uses' => 'Company\Conference\EquipmentsController@show']);
	Route::get('company/conference/equipments/{equipments}/edit', ['as'=> 'company.conference.equipments.edit', 'uses' => 'Company\Conference\EquipmentsController@edit']);








/********** Conference module routes end  **********/






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










Route::get('company/conference/bookings', ['as'=> 'company.conference.conferenceBookings.index', 'uses' => 'Company\Conference\ConferenceBookingController@index']);
Route::post('company/conference/bookings', ['as'=> 'company.conference.conferenceBookings.store', 'uses' => 'Company\Conference\ConferenceBookingController@store']);
Route::get('company/conference/bookings/create', ['as'=> 'company.conference.conferenceBookings.create', 'uses' => 'Company\Conference\ConferenceBookingController@create']);
Route::put('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.update', 'uses' => 'Company\Conference\ConferenceBookingController@update']);
Route::patch('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.update', 'uses' => 'Company\Conference\ConferenceBookingController@update']);
Route::delete('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.destroy', 'uses' => 'Company\Conference\ConferenceBookingController@destroy']);
Route::get('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.show', 'uses' => 'Company\Conference\ConferenceBookingController@show']);
Route::get('company/conference/bookings/{conferenceBookings}/edit', ['as'=> 'company.conference.conferenceBookings.edit', 'uses' => 'Company\Conference\ConferenceBookingController@edit']);


Route::get('company/Conference/conferenceDurations', ['as'=> 'company/Conference.conferenceDurations.index', 'uses' => 'Company/conference\ConferenceDurationController@index']);
Route::post('company/Conference/conferenceDurations', ['as'=> 'company/Conference.conferenceDurations.store', 'uses' => 'Company/conference\ConferenceDurationController@store']);
Route::get('company/Conference/conferenceDurations/create', ['as'=> 'company/Conference.conferenceDurations.create', 'uses' => 'Company/conference\ConferenceDurationController@create']);
Route::put('company/Conference/conferenceDurations/{conferenceDurations}', ['as'=> 'company/Conference.conferenceDurations.update', 'uses' => 'Company/conference\ConferenceDurationController@update']);
Route::patch('company/Conference/conferenceDurations/{conferenceDurations}', ['as'=> 'company/Conference.conferenceDurations.update', 'uses' => 'Company/conference\ConferenceDurationController@update']);
Route::delete('company/Conference/conferenceDurations/{conferenceDurations}', ['as'=> 'company/Conference.conferenceDurations.destroy', 'uses' => 'Company/conference\ConferenceDurationController@destroy']);
Route::get('company/Conference/conferenceDurations/{conferenceDurations}', ['as'=> 'company/Conference.conferenceDurations.show', 'uses' => 'Company/conference\ConferenceDurationController@show']);
Route::get('company/Conference/conferenceDurations/{conferenceDurations}/edit', ['as'=> 'company/Conference.conferenceDurations.edit', 'uses' => 'Company/conference\ConferenceDurationController@edit']);


Route::get('company/Conference/conferenceBookingItems', ['as'=> 'company/Conference.conferenceBookingItems.index', 'uses' => 'Company/conference\ConferenceBookingItemController@index']);
Route::post('company/Conference/conferenceBookingItems', ['as'=> 'company/Conference.conferenceBookingItems.store', 'uses' => 'Company/conference\ConferenceBookingItemController@store']);
Route::get('company/Conference/conferenceBookingItems/create', ['as'=> 'company/Conference.conferenceBookingItems.create', 'uses' => 'Company/conference\ConferenceBookingItemController@create']);
Route::put('company/Conference/conferenceBookingItems/{conferenceBookingItems}', ['as'=> 'company/Conference.conferenceBookingItems.update', 'uses' => 'Company/conference\ConferenceBookingItemController@update']);
Route::patch('company/Conference/conferenceBookingItems/{conferenceBookingItems}', ['as'=> 'company/Conference.conferenceBookingItems.update', 'uses' => 'Company/conference\ConferenceBookingItemController@update']);
Route::delete('company/Conference/conferenceBookingItems/{conferenceBookingItems}', ['as'=> 'company/Conference.conferenceBookingItems.destroy', 'uses' => 'Company/conference\ConferenceBookingItemController@destroy']);
Route::get('company/Conference/conferenceBookingItems/{conferenceBookingItems}', ['as'=> 'company/Conference.conferenceBookingItems.show', 'uses' => 'Company/conference\ConferenceBookingItemController@show']);
Route::get('company/Conference/conferenceBookingItems/{conferenceBookingItems}/edit', ['as'=> 'company/Conference.conferenceBookingItems.edit', 'uses' => 'Company/conference\ConferenceBookingItemController@edit']);


Route::get('admin/paymentMethods', ['as'=> 'admin.paymentMethods.index', 'uses' => 'Admin\PaymentMethodController@index']);
Route::post('admin/paymentMethods', ['as'=> 'admin.paymentMethods.store', 'uses' => 'Admin\PaymentMethodController@store']);
Route::get('admin/paymentMethods/create', ['as'=> 'admin.paymentMethods.create', 'uses' => 'Admin\PaymentMethodController@create']);
Route::put('admin/paymentMethods/{paymentMethods}', ['as'=> 'admin.paymentMethods.update', 'uses' => 'Admin\PaymentMethodController@update']);
Route::patch('admin/paymentMethods/{paymentMethods}', ['as'=> 'admin.paymentMethods.update', 'uses' => 'Admin\PaymentMethodController@update']);
Route::delete('admin/paymentMethods/{paymentMethods}', ['as'=> 'admin.paymentMethods.destroy', 'uses' => 'Admin\PaymentMethodController@destroy']);
Route::get('admin/paymentMethods/{paymentMethods}', ['as'=> 'admin.paymentMethods.show', 'uses' => 'Admin\PaymentMethodController@show']);
Route::get('admin/paymentMethods/{paymentMethods}/edit', ['as'=> 'admin.paymentMethods.edit', 'uses' => 'Admin\PaymentMethodController@edit']);


Route::get('admin/paymentCycles', ['as'=> 'admin.paymentCycles.index', 'uses' => 'Admin\PaymentCycleController@index']);
Route::post('admin/paymentCycles', ['as'=> 'admin.paymentCycles.store', 'uses' => 'Admin\PaymentCycleController@store']);
Route::get('admin/paymentCycles/create', ['as'=> 'admin.paymentCycles.create', 'uses' => 'Admin\PaymentCycleController@create']);
Route::put('admin/paymentCycles/{paymentCycles}', ['as'=> 'admin.paymentCycles.update', 'uses' => 'Admin\PaymentCycleController@update']);
Route::patch('admin/paymentCycles/{paymentCycles}', ['as'=> 'admin.paymentCycles.update', 'uses' => 'Admin\PaymentCycleController@update']);
Route::delete('admin/paymentCycles/{paymentCycles}', ['as'=> 'admin.paymentCycles.destroy', 'uses' => 'Admin\PaymentCycleController@destroy']);
Route::get('admin/paymentCycles/{paymentCycles}', ['as'=> 'admin.paymentCycles.show', 'uses' => 'Admin\PaymentCycleController@show']);
Route::get('admin/paymentCycles/{paymentCycles}/edit', ['as'=> 'admin.paymentCycles.edit', 'uses' => 'Admin\PaymentCycleController@edit']);
