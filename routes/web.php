<?php


/*
|--------------------------------------------------------------------------
| Web Routes for Admin Panel
|--------------------------------------------------------------------------
|
| These are the routes declared for Admin Panel
|
*/


/********** Admin accessible routes as a Guest User start **********/

Route::group(['middleware' => ['admin.guest']], function () {

    Route::get('/home', ['as'=> 'home', 'uses' => 'HomeController@index']);
    Route::get('rooms/{room}', ['as'=> 'home.rooms.show', 'uses' => 'HomeController@show']);
    Route::get('rooms/book/{room}', ['as'=> 'home.rooms.book', 'uses' => 'HomeController@book']);
    Route::post('rooms/book', ['as'=> 'home.rooms.store', 'uses' => 'HomeController@store']);

});


// Test Route For User Roles and Permission

Route::get('permissions/role/{name}', ['uses' => 'Admin\TestController@addRole']);
Route::get('permissions/permission/{name}', ['uses' => 'Admin\TestController@addPermission']);
Route::get('permissions/assignRole/{user_id}/{name}', ['uses' => 'Admin\TestController@assignRoleToUser']);
Route::get('permissions/assignPermission/{user_id}/{name}', ['uses' => 'Admin\TestController@assignPermissionToUser']);
Route::get('permissions/{role}/{permission}', ['uses' => 'Admin\TestController@assignPermissionToRole']);




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

// Route::group(['middleware' => ['role:Admin']], function () {

	

	# Admin Account related routes
	Route::get('admin/dashboard', ['as'=> 'admin.dashboard', 'uses' => 'Admin\DashboardController@index']);
	Route::get('admin/logout', ['as'=> 'admin.logout', 'uses' => 'Admin\UserController@logout']);
	Route::get('admin/settings/account', ['as'=> 'admin.accountSettings.view', 'uses' => 'Admin\UserController@accountSettingsView']);
	Route::post('admin/settings/account', ['as'=> 'admin.accountSettings.store', 'uses' => 'Admin\UserController@accountSettingsStore']);
	Route::post('admin/settings/account/removeProfilePic', ['as'=> 'admin.accountSettings.removeProfilePic', 'uses' => 'Admin\UserController@accountSettingsRemoveProfilePic']);

	Route::post('admin/users/updateUser', ['as'=> 'admin.users.updateUser', 'uses' => 'Admin\UserController@updateUser']);
	
	Route::post('admin/users/verifyEmail', ['as'=> 'admin.users.verifyEmail', 'uses' => 'Admin\UserController@verifyEmail']);
	# Admin Users Section routes

	Route::group(['middleware' => ['admin.permissions:users']], function () {

		Route::get('admin/users', ['as'=> 'admin.users.index', 'uses' => 'Admin\UserController@index']);
		Route::post('admin/users', ['as'=> 'admin.users.store', 'uses' => 'Admin\UserController@store']);
		Route::get('admin/users/create', ['as'=> 'admin.users.create', 'uses' => 'Admin\UserController@create']);
		Route::put('admin/users/{users}', ['as'=> 'admin.users.update', 'uses' => 'Admin\UserController@update']);
		Route::patch('admin/users/{users}', ['as'=> 'admin.users.update', 'uses' => 'Admin\UserController@update']);
		Route::delete('admin/users/{users}', ['as'=> 'admin.users.destroy', 'uses' => 'Admin\UserController@destroy']);
		Route::get('admin/users/{users}', ['as'=> 'admin.users.show', 'uses' => 'Admin\UserController@show']);
		Route::get('admin/users/{users}/edit', ['as'=> 'admin.users.edit', 'uses' => 'Admin\UserController@edit']);

	});

	Route::group(['middleware' => ['admin.permissions:settings']], function () {

		Route::post('admin/settings/user_roles/checkCode', ['as'=> 'admin.userRoles.checkCode', 'uses' => 'Admin\UserRoleController@checkCode']);
		Route::post('admin/settings/change_permission', ['as'=> 'admin.users.changePermission', 'uses' => 'Admin\UserRoleController@changePermission']);
		# Admin Settings Section ----> User Roles routes
		Route::get('admin/settings/user_roles', ['as'=> 'admin.userRoles.index', 'uses' => 'Admin\UserRoleController@index']);
		Route::post('admin/settings/user_roles', ['as'=> 'admin.userRoles.store', 'uses' => 'Admin\UserRoleController@store']);
		Route::get('admin/settings/user_roles/create', ['as'=> 'admin.userRoles.create', 'uses' => 'Admin\UserRoleController@create']);
		Route::put('admin/settings/user_roles/{userRoles}', ['as'=> 'admin.userRoles.update', 'uses' => 'Admin\UserRoleController@update'])
				->where(['userRoles'=>'[0-9]+']);
		Route::patch('admin/settings/user_roles/{userRoles}', ['as'=> 'admin.userRoles.update', 'uses' => 'Admin\UserRoleController@update'])
				->where(['userRoles'=>'[0-9]+']);
		Route::delete('admin/settings/user_roles/{userRoles}', ['as'=> 'admin.userRoles.destroy', 'uses' => 'Admin\UserRoleController@destroy'])
				->where(['userRoles'=>'[0-9]+']);
		// Route::get('admin/settings/user_roles/{userRoles}', ['as'=> 'admin.userRoles.show', 'uses' => 'Admin\UserRoleController@show']);
		Route::get('admin/settings/user_roles/{userRoles}/edit', ['as'=> 'admin.userRoles.edit', 'uses' => 'Admin\UserRoleController@edit'])
				->where(['userRoles'=>'[0-9]+']);


		# Admin Settings Section ----> Account Status routes
		Route::get('admin/settings/account_status', ['as'=> 'admin.userStatuses.index', 'uses' => 'Admin\UserStatusController@index']);
		Route::post('admin/settings/account_status', ['as'=> 'admin.userStatuses.store', 'uses' => 'Admin\UserStatusController@store']);
		Route::get('admin/settings/account_status/create', ['as'=> 'admin.userStatuses.create', 'uses' => 'Admin\UserStatusController@create']);
		Route::put('admin/settings/account_status/{userStatuses}', ['as'=> 'admin.userStatuses.update', 'uses' => 'Admin\UserStatusController@update'])
				->where(['userStatuses'=>'[0-9]+']);
		Route::patch('admin/settings/account_status/{userStatuses}', ['as'=> 'admin.userStatuses.update', 'uses' => 'Admin\UserStatusController@update'])
				->where(['userStatuses'=>'[0-9]+']);;
		Route::delete('admin/settings/account_status/{userStatuses}', ['as'=> 'admin.userStatuses.destroy', 'uses' => 'Admin\UserStatusController@destroy'])
				->where(['userStatuses'=>'[0-9]+']);;
		// Route::get('admin/settings/account_status/{userStatuses}', ['as'=> 'admin.userStatuses.show', 'uses' => 'Admin\UserStatusController@show']);
		Route::get('admin/settings/account_status/{userStatuses}/edit', ['as'=> 'admin.userStatuses.edit', 'uses' => 'Admin\UserStatusController@edit'])
				->where(['userStatuses'=>'[0-9]+']);;


		# Admin Settings Section ----> General Settings routes
		Route::get('admin/settings/general', ['as'=> 'admin.settings.general', 'uses' => 'Admin\SettingsController@generalSetting']);
		Route::patch('admin/settings/general', ['as'=> 'admin.userStatuses.addOrUpdate', 'uses' => 'Admin\SettingsController@addOrUpdate']);

		# Admin Settings Section ----> permission routes
		Route::get('admin/permissions', ['as'=> 'admin.permissions.index', 'uses' => 'Admin\PermissionController@index']);
		Route::post('admin/permissions', ['as'=> 'admin.permissions.store', 'uses' => 'Admin\PermissionController@store']);
		Route::get('admin/permissions/create', ['as'=> 'admin.permissions.create', 'uses' => 'Admin\PermissionController@create']);
		Route::put('admin/permissions/{permissions}', ['as'=> 'admin.permissions.update', 'uses' => 'Admin\PermissionController@update']);
		Route::patch('admin/permissions/{permissions}', ['as'=> 'admin.permissions.update', 'uses' => 'Admin\PermissionController@update']);
		Route::delete('admin/permissions/{permissions}', ['as'=> 'admin.permissions.destroy', 'uses' => 'Admin\PermissionController@destroy']);
		Route::get('admin/permissions/{permissions}', ['as'=> 'admin.permissions.show', 'uses' => 'Admin\PermissionController@show']);
		Route::get('admin/permissions/{permissions}/edit', ['as'=> 'admin.permissions.edit', 'uses' => 'Admin\PermissionController@edit']);


	});



	Route::group(['middleware' => ['admin.permissions:newletters']], function () {

		# Admin Newsletter Section --->  Groups routes
		Route::get('admin/newsletter/groups', ['as'=> 'admin.newsletter.groups.index', 'uses' => 'Admin\AdminGroupController@index']);
		Route::post('admin/newsletter/groups', ['as'=> 'admin.newsletter.groups.store', 'uses' => 'Admin\AdminGroupController@store']);
		Route::get('admin/newsletter/groups/create', ['as'=> 'admin.newsletter.groups.create', 'uses' => 'Admin\AdminGroupController@create']);
		Route::put('admin/newsletter/groups/{group}/update', ['as'=> 'admin.newsletter.groups.update', 'uses' => 'Admin\AdminGroupController@update'])
				->where(['group'=>'[0-9]+']);
		Route::patch('admin/newsletter/groups/{group}/update', ['as'=> 'admin.newsletter.groups.update', 'uses' => 'Admin\AdminGroupController@update'])
				->where(['group'=>'[0-9]+']);;
		Route::delete('admin/newsletter/groups/{group}/delete', ['as'=> 'admin.newsletter.groups.destroy', 'uses' => 'Admin\AdminGroupController@destroy'])
				->where(['group'=>'[0-9]+']);
		// Route::get('admin/newsletter/groups/{group}', ['as'=> 'admin.newsletter.groups.show', 'uses' => 'Admin\AdminGroupController@show'])
		// 		->where(['group'=>'[0-9]+']);
		Route::get('admin/newsletter/groups/{group}/edit', ['as'=> 'admin.newsletter.groups.edit', 'uses' => 'Admin\AdminGroupController@edit'])
				->where(['group'=>'[0-9]+']);
		Route::post('admin/newsletter/groups/upload', ['as'=> 'admin.newsletter.groups.upload', 'uses' => 'Admin\AdminGroupController@upload']);
		// Route::get('admin/newsletter/groups/get', ['as'=> 'admin.newsletter.groups.get', 'uses' => 'Admin\AdminGroupController@sendmail']);
		Route::post('admin/newsletter/groups/mailto', ['as'=> 'admin.newsletter.groups.mailto', 'uses' => 'Admin\AdminGroupController@mailto']);
		Route::get('admin/newsletter/sendmail', ['as'=> 'admin.newsletter.sendmail', 'uses' => 'Admin\AdminGroupController@sendmail']);



		# Admin Newsletter Section --->  Dashboard routes
		Route::get('admin/newsletter/dashboard', ['as'=> 'admin.newsletter.dashboard', 'uses' => 'Admin\AdminNewsLetterController@analytic']);


		# Admin Newsletter Section --->  Customer routes
		Route::get('admin/customer', ['as'=> 'admin.customers.index', 'uses' => 'Admin\AdminCustomerController@index']);
		Route::post('admin/customer', ['as'=> 'admin.customers.store', 'uses' => 'Admin\AdminCustomerController@store']);
		Route::get('admin/customer/create', ['as'=> 'admin.customers.create', 'uses' => 'Admin\AdminCustomerController@create']);
		Route::put('admin/customer/{customer}', ['as'=> 'admin.customers.update', 'uses' => 'Admin\AdminCustomerController@update'])
				->where(['customer'=>'[0-9]+']);
		Route::patch('admin/customer/{customer}', ['as'=> 'admin.customers.update', 'uses' => 'Admin\AdminCustomerController@update'])
				->where(['customer'=>'[0-9]+']);
		Route::delete('admin/customer/{customer}', ['as'=> 'admin.customers.destroy', 'uses' => 'Admin\AdminCustomerController@destroy'])
				->where(['customer'=>'[0-9]+']);
		// Route::get('admin/modules/{modules}', ['as'=> 'admin.customers.show', 'uses' => 'Admin\AdminCustomerController@show'])
		// 		->where(['modules'=>'[0-9]+']);
		Route::get('admin/customer/{customer}/edit', ['as'=> 'admin.customers.edit', 'uses' => 'Admin\AdminCustomerController@edit'])
				->where(['customer'=>'[0-9]+']);

	});

	Route::group(['middleware' => ['admin.permissions:modules']], function () {

		# Admin Modules Section routes
		Route::get('admin/modules', ['as'=> 'admin.modules.index', 'uses' => 'Admin\ModuleController@index']);
		Route::post('admin/modules', ['as'=> 'admin.modules.store', 'uses' => 'Admin\ModuleController@store']);
		Route::get('admin/modules/create', ['as'=> 'admin.modules.create', 'uses' => 'Admin\ModuleController@create']);
		Route::put('admin/modules/{modules}', ['as'=> 'admin.modules.update', 'uses' => 'Admin\ModuleController@update'])
				->where(['modules'=>'[0-9]+']);
		Route::patch('admin/modules/{modules}', ['as'=> 'admin.modules.update', 'uses' => 'Admin\ModuleController@update'])
				->where(['modules'=>'[0-9]+']);
		Route::delete('admin/modules/{modules}', ['as'=> 'admin.modules.destroy', 'uses' => 'Admin\ModuleController@destroy'])
				->where(['modules'=>'[0-9]+']);
		// Route::get('admin/modules/{modules}', ['as'=> 'admin.modules.show', 'uses' => 'Admin\ModuleController@show'])
		// 		->where(['modules'=>'[0-9]+']);
		Route::get('admin/modules/{modules}/edit', ['as'=> 'admin.modules.edit', 'uses' => 'Admin\ModuleController@edit'])
				->where(['modules'=>'[0-9]+']);

	});


	Route::group(['middleware' => ['admin.permissions:payments']], function () {

		Route::post('admin/paymentMethods/code', ['as'=> 'admin.paymentMethods.verifyCodeExist', 'uses' => 'Admin\PaymentMethodController@verifyCodeExist']);
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

	});


	Route::group(['middleware' => ['admin.permissions:companies']], function () {
	# Admin Companies Section ----> Companies routes

		// Quick login for admin in company admin user account
		Route::get('admin/companies/login/{company}/{user?}', ['as'=> 'admin.companies.login', 'uses' => 'Admin\CompanyController@adminLoginAsCompanyAdmin'])
					->where(['company'=>'[0-9]+', 'user'=>'[0-9]+']);	


		Route::get('admin/companies', ['as'=> 'admin.companies.index', 'uses' => 'Admin\CompanyController@index']);
		Route::post('admin/companies', ['as'=> 'admin.companies.store', 'uses' => 'Admin\CompanyController@store']);
		Route::get('admin/companies/create', ['as'=> 'admin.companies.create', 'uses' => 'Admin\CompanyController@create']);
		Route::put('admin/companies/{companies}', ['as'=> 'admin.companies.update', 'uses' => 'Admin\CompanyController@update'])
				->where(['companies'=>'[0-9]+']);
		Route::patch('admin/companies/{companies}', ['as'=> 'admin.companies.update', 'uses' => 'Admin\CompanyController@update'])
				->where(['companies'=>'[0-9]+']);
		Route::delete('admin/companies/{companies}', ['as'=> 'admin.companies.destroy', 'uses' => 'Admin\CompanyController@destroy'])
				->where(['companies'=>'[0-9]+']);
		// Route::get('admin/companies/{companies}', ['as'=> 'admin.companies.show', 'uses' => 'Admin\CompanyController@show']);
		Route::get('admin/companies/{companies}/edit/{wizard?}', ['as'=> 'admin.companies.edit', 'uses' => 'Admin\CompanyController@edit'])
				->where(['companies'=>'[0-9]+']);

		// Company Profile route
		Route::get('admin/company/{id}/profile', ['as'=> 'admin.company.profile', 'uses' => 'Admin\CompanyController@profile'])
				->where(['id'=>'[0-9]+']);


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



		# Admin Companies Section ----> Company Contact Persons routes
		// Route::get('admin/companies/contact_persons', ['as'=> 'admin.companyContactPeople.index', 'uses' => 'Admin\CompanyContactPersonController@index']);
		Route::post('admin/companies/contact_persons', ['as'=> 'admin.companyContactPeople.store', 'uses' => 'Admin\CompanyContactPersonController@store']);
		// Route::get('admin/companies/contact_persons/create', ['as'=> 'admin.companyContactPeople.create', 'uses' => 'Admin\CompanyContactPersonController@create']);
		Route::put('admin/companies/contact_persons/update', ['as'=> 'admin.companyContactPeople.update', 'uses' => 'Admin\CompanyContactPersonController@update']);
		Route::patch('admin/companies/contact_persons/update', ['as'=> 'admin.companyContactPeople.update', 'uses' => 'Admin\CompanyContactPersonController@update']);
		Route::delete('admin/companies/contact_persons/delete', ['as'=> 'admin.companyContactPeople.destroy', 'uses' => 'Admin\CompanyContactPersonController@destroy']);
		// Route::get('admin/companies/contact_persons/{companyContactPeople}', ['as'=> 'admin.companyContactPeople.show', 'uses' => 'Admin\CompanyContactPersonController@show']);
		// Route::get('admin/companies/contact_persons/{companyContactPeople}/edit', ['as'=> 'admin.companyContactPeople.edit', 'uses' => 'Admin\CompanyContactPersonController@edit']);




		# Admin Companies Section ----> Company Buildings routes
		// Route::get('admin/companies/buildings', ['as'=> 'admin.companyBuildings.index', 'uses' => 'Admin\CompanyBuildingController@index']);
		Route::post('admin/companies/buildings', ['as'=> 'admin.companyBuildings.store', 'uses' => 'Admin\CompanyBuildingController@store']);
		// Route::get('admin/companies/buildings/create', ['as'=> 'admin.companyBuildings.create', 'uses' => 'Admin\CompanyBuildingController@create']);
		Route::put('admin/companies/buildings/update', ['as'=> 'admin.companyBuildings.update', 'uses' => 'Admin\CompanyBuildingController@update']);
		Route::patch('admin/companies/buildings/update', ['as'=> 'admin.companyBuildings.update', 'uses' => 'Admin\CompanyBuildingController@update']);
		Route::delete('admin/companies/buildings/delete/building', ['as'=> 'admin.companyBuildings.destroy.building', 'uses' => 'Admin\CompanyBuildingController@destroyBuilding']);
		Route::delete('admin/companies/buildings/delete/floor', ['as'=> 'admin.companyBuildings.destroy.floor', 'uses' => 'Admin\CompanyBuildingController@destroyFloor']);
		// Route::get('admin/companies/buildings/{companyBuildings}', ['as'=> 'admin.companyBuildings.show', 'uses' => 'Admin\CompanyBuildingController@show']);
		// Route::get('admin/companies/buildings/{companyBuildings}/edit', ['as'=> 'admin.companyBuildings.edit', 'uses' => 'Admin\CompanyBuildingController@edit']);



		# Admin Companies Section ----> Company Floor Rooms routes
		// Route::get('admin/companies/floor_rooms', ['as'=> 'admin.companyFloorRooms.index', 'uses' => 'Admin\CompanyFloorRoomController@index']);
		// Route::post('admin/companies/floor_rooms', ['as'=> 'admin.companyFloorRooms.store', 'uses' => 'Admin\CompanyFloorRoomController@store']);
		// Route::get('admin/companies/floor_rooms/create', ['as'=> 'admin.companyFloorRooms.create', 'uses' => 'Admin\CompanyFloorRoomController@create']);
		// Route::put('admin/companies/floor_rooms/{companyFloorRooms}', ['as'=> 'admin.companyFloorRooms.update', 'uses' => 'Admin\CompanyFloorRoomController@update']);
		// Route::patch('admin/companies/floor_rooms/{companyFloorRooms}', ['as'=> 'admin.companyFloorRooms.update', 'uses' => 'Admin\CompanyFloorRoomController@update']);
		// Route::delete('admin/companies/floor_rooms/{companyFloorRooms}', ['as'=> 'admin.companyFloorRooms.destroy', 'uses' => 'Admin\CompanyFloorRoomController@destroy']);
		// Route::get('admin/companies/floor_rooms/{companyFloorRooms}', ['as'=> 'admin.companyFloorRooms.show', 'uses' => 'Admin\CompanyFloorRoomController@show']);
		// Route::get('admin/companies/floor_rooms/{companyFloorRooms}/edit', ['as'=> 'admin.companyFloorRooms.edit', 'uses' => 'Admin\CompanyFloorRoomController@edit']);




		# Admin Companies Section ----> Company Contracts routes
		// Route::get('admin/companies/contracts', ['as'=> 'admin.companyContracts.index', 'uses' => 'Admin\CompanyContractController@index']);
		Route::post('admin/companies/contracts', ['as'=> 'admin.companyContracts.store', 'uses' => 'Admin\CompanyContractController@store']);
		// Route::get('admin/companies/contracts/create', ['as'=> 'admin.companyContracts.create', 'uses' => 'Admin\CompanyContractController@create']);
		Route::put('admin/companies/contracts/{companyContracts}', ['as'=> 'admin.companyContracts.update', 'uses' => 'Admin\CompanyContractController@update'])
				->where(['companyContracts'=>'[0-9]+']);
		Route::patch('admin/companies/contracts/{companyContracts}', ['as'=> 'admin.companyContracts.update', 'uses' => 'Admin\CompanyContractController@update'])
				->where(['companyContracts'=>'[0-9]+']);
		// Route::delete('admin/companies/contracts/{companyContracts}', ['as'=> 'admin.companyContracts.destroy', 'uses' => 'Admin\CompanyContractController@destroy']);
		// Route::get('admin/companies/contracts/{companyContracts}', ['as'=> 'admin.companyContracts.show', 'uses' => 'Admin\CompanyContractController@show']);
		// Route::get('admin/companies/contracts/{companyContracts}/edit', ['as'=> 'admin.companyContracts.edit', 'uses' => 'Admin\CompanyContractController@edit']);




		# Admin Companies Section ----> Company Modules Routes
		// Route::get('admin/companies/modules', ['as'=> 'admin.companyModules.index', 'uses' => 'Admin\CompanyModuleController@index']);
		Route::post('admin/companies/modules', ['as'=> 'admin.companyModules.store', 'uses' => 'Admin\CompanyModuleController@store']);
		// Route::get('admin/companies/modules/create', ['as'=> 'admin.companyModules.create', 'uses' => 'Admin\CompanyModuleController@create']);
		Route::put('admin/companies/modules/update', ['as'=> 'admin.companyModules.update', 'uses' => 'Admin\CompanyModuleController@update']);
		Route::patch('admin/companies/modules/update', ['as'=> 'admin.companyModules.update', 'uses' => 'Admin\CompanyModuleController@update']);
		Route::delete('admin/companies/modules/delete', ['as'=> 'admin.companyModules.destroy', 'uses' => 'Admin\CompanyModuleController@destroy']);
		// Route::get('admin/companies/modules/{companyModules}', ['as'=> 'admin.companyModules.show', 'uses' => 'Admin\CompanyModuleController@show']);
		// Route::get('admin/companies/modules/{companyModules}/edit', ['as'=> 'admin.companyModules.edit', 'uses' => 'Admin\CompanyModuleController@edit']);




		# Admin Companies Section ----> Company Users routes
		// Route::get('admin/companies/users', ['as'=> 'admin.companyUsers.index', 'uses' => 'Admin\CompanyUserController@index']);
		Route::post('admin/companies/users', ['as'=> 'admin.companyUsers.store', 'uses' => 'Admin\CompanyUserController@store']);
		// Route::get('admin/companies/users/create', ['as'=> 'admin.companyUsers.create', 'uses' => 'Admin\CompanyUserController@create']);
		Route::put('admin/companies/users/update', ['as'=> 'admin.companyUsers.update', 'uses' => 'Admin\CompanyUserController@update']);
		Route::patch('admin/companies/users/update', ['as'=> 'admin.companyUsers.update', 'uses' => 'Admin\CompanyUserController@update']);
		Route::delete('admin/companies/users/delete', ['as'=> 'admin.companyUsers.destroy', 'uses' => 'Admin\CompanyUserController@destroy']);
		// Route::get('admin/companies/users/{companyUsers}', ['as'=> 'admin.companyUsers.show', 'uses' => 'Admin\CompanyUserController@show']);
		// Route::get('admin/companies/users/{companyUsers}/edit', ['as'=> 'admin.companyUsers.edit', 'uses' => 'Admin\CompanyUserController@edit']);


	});


	Route::group(['middleware' => ['admin.permissions:invoices']], function () {

		# Admin Companies Section ----> Company Invoices routes
		Route::get('admin/companies/invoices', ['as'=> 'admin.companyInvoices.index', 'uses' => 'Admin\CompanyInvoiceController@index']);
		Route::get('admin/companies/{company_id}/invoices/create',['as' => 'admin.companyInvoices.generateInvoice','uses' => 'Admin\CompanyInvoiceController@createInvoiceByCompanyId'])
				->where(['company_id'=>'[0-9]+']);
		Route::get('admin/companies/{company_id}/invoices/send',['as' => 'admin.sendInvoice','uses' => 'Admin\CompanyInvoiceController@sendLatestInvoiceToCompanyContractPerson'])
				->where(['company_id'=>'[0-9]+']);
		Route::get('admin/companies/{company_id}/invoices/send/{invoice_id}',['as' => 'admin.sendInvoiceById','uses' => 'Admin\CompanyInvoiceController@sendInvoiceToCompanyContactPersonByInvoiceId'])
				->where(['company_id'=>'[0-9]+', 'invoice_id'=>'[0-9]+']);
		Route::get('admin/companies/{company_id}/invoices/show/{invoice_id}',['as' => 'admin.viewInvoice','uses' => 'Admin\CompanyInvoiceController@viewInvoiceByCompanyId'])
				->where(['company_id'=>'[0-9]+', 'invoice_id'=>'[0-9]+']);
		Route::post('admin/companies/invoices', ['as'=> 'admin.companyInvoices.store', 'uses' => 'Admin\CompanyInvoiceController@store']);
		Route::put('admin/companies/invoices/update', ['as'=> 'admin.companyInvoices.update', 'uses' => 'Admin\CompanyInvoiceController@update']);
		Route::patch('admin/companies/invoices/update', ['as'=> 'admin.companyInvoices.update', 'uses' => 'Admin\CompanyInvoiceController@update']);
		Route::delete('admin/companies/{companyInvoices}/invoices', ['as'=> 'admin.companyInvoices.destroy', 'uses' => 'Admin\CompanyInvoiceController@destroy'])
				->where(['companyInvoices'=>'[0-9]+']);
		// Route::get('admin/companies/invoices/{companyInvoices}', ['as'=> 'admin.companyInvoices.show', 'uses' => 'Admin\CompanyInvoiceController@show'])
		// 		->where(['company_id'=>'[0-9]+']);
		// Route::get('admin/companies/invoices/{companyInvoices}/edit', ['as'=> 'admin.companyInvoices.edit', 'uses' => 'Admin\CompanyInvoiceController@edit']);
		// Route::get('admin/companies/invoices/create', ['as'=> 'admin.companyInvoices.create', 'uses' => 'Admin\CompanyInvoiceController@create']);

	});


	Route::group(['middleware' => ['admin.permissions:supports']], function () {

		Route::get('admin/supportStatuses', ['as'=> 'admin.supportStatuses.index', 'uses' => 'Admin\SupportStatusController@index']);
		Route::post('admin/supportStatuses', ['as'=> 'admin.supportStatuses.store', 'uses' => 'Admin\SupportStatusController@store']);
		Route::get('admin/supportStatuses/create', ['as'=> 'admin.supportStatuses.create', 'uses' => 'Admin\SupportStatusController@create']);
		Route::put('admin/supportStatuses/{supportStatuses}', ['as'=> 'admin.supportStatuses.update', 'uses' => 'Admin\SupportStatusController@update']);
		Route::patch('admin/supportStatuses/{supportStatuses}', ['as'=> 'admin.supportStatuses.update', 'uses' => 'Admin\SupportStatusController@update']);
		Route::delete('admin/supportStatuses/{supportStatuses}', ['as'=> 'admin.supportStatuses.destroy', 'uses' => 'Admin\SupportStatusController@destroy']);
		Route::get('admin/supportStatuses/{supportStatuses}', ['as'=> 'admin.supportStatuses.show', 'uses' => 'Admin\SupportStatusController@show']);
		Route::get('admin/supportStatuses/{supportStatuses}/edit', ['as'=> 'admin.supportStatuses.edit', 'uses' => 'Admin\SupportStatusController@edit']);


		Route::get('admin/supportCategories', ['as'=> 'admin.supportCategories.index', 'uses' => 'Admin\SupportCategoryController@index']);
		Route::post('admin/supportCategories', ['as'=> 'admin.supportCategories.store', 'uses' => 'Admin\SupportCategoryController@store']);
		Route::get('admin/supportCategories/create', ['as'=> 'admin.supportCategories.create', 'uses' => 'Admin\SupportCategoryController@create']);
		Route::put('admin/supportCategories/{supportCategories}', ['as'=> 'admin.supportCategories.update', 'uses' => 'Admin\SupportCategoryController@update']);
		Route::patch('admin/supportCategories/{supportCategories}', ['as'=> 'admin.supportCategories.update', 'uses' => 'Admin\SupportCategoryController@update']);
		Route::delete('admin/supportCategories/{supportCategories}', ['as'=> 'admin.supportCategories.destroy', 'uses' => 'Admin\SupportCategoryController@destroy']);
		Route::get('admin/supportCategories/{supportCategories}', ['as'=> 'admin.supportCategories.show', 'uses' => 'Admin\SupportCategoryController@show']);
		Route::get('admin/supportCategories/{supportCategories}/edit', ['as'=> 'admin.supportCategories.edit', 'uses' => 'Admin\SupportCategoryController@edit']);


		Route::get('admin/supportPriorities', ['as'=> 'admin.supportPriorities.index', 'uses' => 'Admin\SupportPrioritiesController@index']);
		Route::post('admin/supportPriorities', ['as'=> 'admin.supportPriorities.store', 'uses' => 'Admin\SupportPrioritiesController@store']);
		Route::get('admin/supportPriorities/create', ['as'=> 'admin.supportPriorities.create', 'uses' => 'Admin\SupportPrioritiesController@create']);
		Route::put('admin/supportPriorities/{supportPriorities}', ['as'=> 'admin.supportPriorities.update', 'uses' => 'Admin\SupportPrioritiesController@update']);
		Route::patch('admin/supportPriorities/{supportPriorities}', ['as'=> 'admin.supportPriorities.update', 'uses' => 'Admin\SupportPrioritiesController@update']);
		Route::delete('admin/supportPriorities/{supportPriorities}', ['as'=> 'admin.supportPriorities.destroy', 'uses' => 'Admin\SupportPrioritiesController@destroy']);
		Route::get('admin/supportPriorities/{supportPriorities}', ['as'=> 'admin.supportPriorities.show', 'uses' => 'Admin\SupportPrioritiesController@show']);
		Route::get('admin/supportPriorities/{supportPriorities}/edit', ['as'=> 'admin.supportPriorities.edit', 'uses' => 'Admin\SupportPrioritiesController@edit']);


		Route::get('admin/supports/solved/{supports}', ['as'=> 'admin.supports.solved', 'uses' => 'Admin\SupportController@solved']);
		Route::get('admin/supports/completed', ['as'=> 'admin.supports.completed', 'uses' => 'Admin\SupportController@completedTicket']);

		Route::get('admin/supports/dashboard', ['as'=> 'admin.supports.dashboard', 'uses' => 'Admin\SupportController@dashboard']);

		Route::get('admin/supports', ['as'=> 'admin.supports.index', 'uses' => 'Admin\SupportController@index']);
		Route::post('admin/supports', ['as'=> 'admin.supports.store', 'uses' => 'Admin\SupportController@store']);
		Route::get('admin/supports/create', ['as'=> 'admin.supports.create', 'uses' => 'Admin\SupportController@create']);
		Route::put('admin/supports/{supports}', ['as'=> 'admin.supports.update', 'uses' => 'Admin\SupportController@update']);
		Route::patch('admin/supports/{supports}', ['as'=> 'admin.supports.update', 'uses' => 'Admin\SupportController@update']);
		Route::delete('admin/supports/{supports}', ['as'=> 'admin.supports.destroy', 'uses' => 'Admin\SupportController@destroy']);
		Route::get('admin/supports/{supportsID}', ['as'=> 'admin.supports.show', 'uses' => 'Admin\SupportController@show'])->where(['supportsID'=>'[0-9]+']);
		Route::get('admin/supports/{supports}/edit', ['as'=> 'admin.supports.edit', 'uses' => 'Admin\SupportController@edit']);

	});
	
	# Admin Settings Section ----> Discount Types routes
	Route::get('admin/discountTypes', ['as'=> 'admin.discountTypes.index', 'uses' => 'Admin\DiscountTypeController@index']);
	Route::post('admin/discountTypes', ['as'=> 'admin.discountTypes.store', 'uses' => 'Admin\DiscountTypeController@store']);
	Route::get('admin/discountTypes/create', ['as'=> 'admin.discountTypes.create', 'uses' => 'Admin\DiscountTypeController@create']);
	Route::put('admin/discountTypes/{discountTypes}', ['as'=> 'admin.discountTypes.update', 'uses' => 'Admin\DiscountTypeController@update']);
	Route::patch('admin/discountTypes/{discountTypes}', ['as'=> 'admin.discountTypes.update', 'uses' => 'Admin\DiscountTypeController@update']);
	Route::delete('admin/discountTypes/{discountTypes}', ['as'=> 'admin.discountTypes.destroy', 'uses' => 'Admin\DiscountTypeController@destroy']);
	Route::get('admin/discountTypes/{discountTypes}', ['as'=> 'admin.discountTypes.show', 'uses' => 'Admin\DiscountTypeController@show']);
	Route::get('admin/discountTypes/{discountTypes}/edit', ['as'=> 'admin.discountTypes.edit', 'uses' => 'Admin\DiscountTypeController@edit']);




	

















	# Admin AJAX requests routes
	Route::post('ajax/validate/admin_email', ['as'=> 'validate.siteAdmin.email', 'uses' => 'General\ValidationController@siteAdminEmail']);
	


});






# ---------------------------------------------------------------------------------------------








/*
|--------------------------------------------------------------------------
| Web Routes for Company Admin
|--------------------------------------------------------------------------
|
| These are the routes declared for Company Admin
|
*/



// main route
Route::get('/', function() {
    return redirect()->route('company.login');
});



/********** Company Admin accessible routes as a Guest User start **********/

Route::group(['middleware' => ['company.guest']], function () {

	Route::get('company', function() {
	    return redirect()->route('company.login');
	});
    Route::get("admin/settings/city/{id}",['uses' => 'Admin\UserController@getCityByStateId']);
    Route::get('company/login', ['as'=> 'company.login', 'uses' => 'Company\UserController@viewLogin']);
    Route::post('company/authenticate', ['as'=> 'company.users.authenticate', 'uses' => 'Company\UserController@authenticate']);

});

/********** Company Admin accessible routes as a Guest User end **********/




/********** Company Admin accessible routes as an Authenticated User start **********/

Route::group(['middleware' => ['company.auth']], function () {

	# Compand Admin account related routes
    Route::get('company/dashboard/{company?}', ['as' => 'company.dashboard', 'uses' => 'Company\DashboardController@index']);
    Route::get('company/dashboard/profile', ['as' => 'company.dashboard.profile', 'uses' => 'Company\DashboardController@profile']);
    Route::get('company/logout', ['as' => 'company.logout', 'uses' => 'Company\UserController@logout']);



    # Company Users Section routes
    Route::get('company/users', ['as' => 'company.users.index', 'uses' => 'Company\UserController@index']);
    Route::post('company/users', ['as' => 'company.users.store', 'uses' => 'Company\UserController@store']);
    Route::get('company/users/create', ['as' => 'company.users.create', 'uses' => 'Company\UserController@create']);
    Route::put('company/users/{users}', ['as' => 'company.users.update', 'uses' => 'Company\UserController@update']);
    Route::patch('company/users/{users}', ['as' => 'company.users.update', 'uses' => 'Company\UserController@update']);
    Route::delete('company/users/{users}', ['as' => 'company.users.destroy', 'uses' => 'Company\UserController@destroy']);
    Route::get('company/users/{users}', ['as' => 'company.users.show', 'uses' => 'Company\UserController@show']);
    Route::get('company/users/{users}/edit', ['as' => 'company.users.edit', 'uses' => 'Company\UserController@edit']);




     # Company Buildings Section routes
    Route::get('company/companyBuildings', ['as'=> 'company.companyBuildings.index', 'uses' => 'Company\CompanyBuildingController@index']);
    //Route::post('company/companyBuildings', ['as'=> 'company.companyBuildings.store', 'uses' => 'Company\CompanyBuildingController@store']);
    //Route::get('company/companyBuildings/create', ['as'=> 'company.companyBuildings.create', 'uses' => 'Company\CompanyBuildingController@create']);
    Route::put('company/companyBuildings/{companyBuildings}', ['as'=> 'company.companyBuildings.update', 'uses' => 'Company\CompanyBuildingController@update']);
    Route::patch('company/companyBuildings/{companyBuildings}', ['as'=> 'company.companyBuildings.update', 'uses' => 'Company\CompanyBuildingController@update']);
    Route::delete('company/companyBuildings/{companyBuildings}', ['as'=> 'company.companyBuildings.destroy', 'uses' => 'Company\CompanyBuildingController@destroy']);
    Route::get('company/companyBuildings/{companyBuildings}', ['as'=> 'company.companyBuildings.show', 'uses' => 'Company\CompanyBuildingController@show']);
    Route::get('company/companyBuildings/{companyBuildings}/edit', ['as'=> 'company.companyBuildings.edit', 'uses' => 'Company\CompanyBuildingController@edit']);




    # Company Floor Rooms routes
    Route::get('company/companyFloorRooms', ['as'=> 'company.companyFloorRooms.index', 'uses' => 'Company\CompanyFloorRoomController@index']);
    Route::post('company/companyFloorRooms', ['as'=> 'company.companyFloorRooms.store', 'uses' => 'Company\CompanyFloorRoomController@store']);
    Route::get('company/companyFloorRooms/create', ['as'=> 'company.companyFloorRooms.create', 'uses' => 'Company\CompanyFloorRoomController@create']);
    Route::put('company/companyFloorRooms/{companyFloorRooms}', ['as'=> 'company.companyFloorRooms.update', 'uses' => 'Company\CompanyFloorRoomController@update']);
    Route::patch('company/companyFloorRooms/{companyFloorRooms}', ['as'=> 'company.companyFloorRooms.update', 'uses' => 'Company\CompanyFloorRoomController@update']);
    Route::delete('company/companyFloorRooms/{companyFloorRooms}', ['as'=> 'company.companyFloorRooms.destroy', 'uses' => 'Company\CompanyFloorRoomController@destroy']);
    Route::get('company/companyFloorRooms/{companyFloorRooms}', ['as'=> 'company.companyFloorRooms.show', 'uses' => 'Company\CompanyFloorRoomController@show']);
    Route::get('company/companyFloorRooms/{companyFloorRooms}/edit', ['as'=> 'company.companyFloorRooms.edit', 'uses' => 'Company\CompanyFloorRoomController@edit']);
    Route::post('company/companyFloorRooms/lists', ['as'=> 'company.companyFloorRooms.lists', 'uses' => 'Company\CompanyFloorRoomController@getLists']);



    # Company Services section routes
    Route::get('company/services', ['as'=> 'company.services.index', 'uses' => 'Company\ServiceController@index']);
    Route::post('company/services', ['as'=> 'company.services.store', 'uses' => 'Company\ServiceController@store']);
    Route::get('company/services/create', ['as'=> 'company.services.create', 'uses' => 'Company\ServiceController@create']);
    Route::put('company/services/{services}', ['as'=> 'company.services.update', 'uses' => 'Company\ServiceController@update']);
    Route::patch('company/services/{services}', ['as'=> 'company.services.update', 'uses' => 'Company\ServiceController@update']);
    Route::delete('company/services/{services}', ['as'=> 'company.services.destroy', 'uses' => 'Company\ServiceController@destroy']);
    Route::get('company/services/{services}', ['as'=> 'company.services.show', 'uses' => 'Company\ServiceController@show']);
    Route::get('company/services/{services}/edit', ['as'=> 'company.services.edit', 'uses' => 'Company\ServiceController@edit']);



    # Company Rooms Section routes
    Route::get('company/floor/{building}', ['as'=> 'company.floors', 'uses' => 'Company\RoomController@getFloorsByBuildingId']);
	Route::get('company/room/equipments', ['as'=> 'company.room.equipments', 'uses' => 'Company\RoomController@getCompanyRoomEquipment']);

    Route::post('company/rooms/imageRemove', ['as'=> 'company.rooms.image_remove', 'uses' => 'Company\RoomController@imageRemove']);

    Route::get('company/rooms', ['as'=> 'company.rooms.index', 'uses' => 'Company\RoomController@index']);
    Route::post('company/rooms', ['as'=> 'company.rooms.store', 'uses' => 'Company\RoomController@store']);
    Route::get('company/rooms/create', ['as'=> 'company.rooms.create', 'uses' => 'Company\RoomController@create']);
    Route::put('company/rooms/{rooms}', ['as'=> 'company.rooms.update', 'uses' => 'Company\RoomController@update']);
    Route::patch('company/rooms/{rooms}', ['as'=> 'company.rooms.update', 'uses' => 'Company\RoomController@update']);
    Route::get('company/rooms/{rooms}', ['as'=> 'company.rooms.show', 'uses' => 'Company\RoomController@show']);
    Route::delete('company/rooms/{rooms}', ['as'=> 'company.rooms.destroy', 'uses' => 'Company\RoomController@destroy']);
    Route::get('company/rooms/{rooms}/edit', ['as'=> 'company.rooms.edit', 'uses' => 'Company\RoomController@edit']);
    Route::post('company/rooms/lists', ['as'=> 'company.rooms.lists', 'uses' => 'Company\RoomController@getLists']);

	Route::get('company/room/{building}', ['as'=> 'company.building.room', 'uses' => 'Company\RoomSettingArrangmentController@getRoomByBuildingId']);
	Route::get('company/roomSettingArrangments', ['as'=> 'company.roomSettingArrangments.index', 'uses' => 'Company\RoomSettingArrangmentController@index']);
	Route::post('company/roomSettingArrangments', ['as'=> 'company.roomSettingArrangments.store', 'uses' => 'Company\RoomSettingArrangmentController@store']);
	Route::get('company/roomSettingArrangments/create', ['as'=> 'company.roomSettingArrangments.create', 'uses' => 'Company\RoomSettingArrangmentController@create']);
	Route::put('company/roomSettingArrangments/{roomSettingArrangments}', ['as'=> 'company.roomSettingArrangments.update', 'uses' => 'Company\RoomSettingArrangmentController@update']);
	Route::patch('company/roomSettingArrangments/{roomSettingArrangments}', ['as'=> 'company.roomSettingArrangments.update', 'uses' => 'Company\RoomSettingArrangmentController@update']);
	Route::delete('company/roomSettingArrangments/{roomSettingArrangments}', ['as'=> 'company.roomSettingArrangments.destroy', 'uses' => 'Company\RoomSettingArrangmentController@destroy']);
	Route::get('company/roomSettingArrangments/{roomSettingArrangments}', ['as'=> 'company.roomSettingArrangments.show', 'uses' => 'Company\RoomSettingArrangmentController@show']);
	Route::get('company/roomSettingArrangments/{roomSettingArrangments}/edit', ['as'=> 'company.roomSettingArrangments.edit', 'uses' => 'Company\RoomSettingArrangmentController@edit']);


	Route::get('company/roomSittingArrangment/{room_id}', ['as'=> 'company.roomSittingArrangment', 'uses' => 'Company\RoomImagesController@getRoomSittingArrangmentByRoomId']);
	Route::get('company/roomImages', ['as'=> 'company.roomImages.index', 'uses' => 'Company\RoomImagesController@index']);
	Route::post('company/roomImages', ['as'=> 'company.roomImages.store', 'uses' => 'Company\RoomImagesController@store']);
	Route::get('company/roomImages/create', ['as'=> 'company.roomImages.create', 'uses' => 'Company\RoomImagesController@create']);
	Route::put('company/roomImages/{roomImages}', ['as'=> 'company.roomImages.update', 'uses' => 'Company\RoomImagesController@update']);
	Route::patch('company/roomImages/{roomImages}', ['as'=> 'company.roomImages.update', 'uses' => 'Company\RoomImagesController@update']);
	Route::delete('company/roomImages/{roomImages}', ['as'=> 'company.roomImages.destroy', 'uses' => 'Company\RoomImagesController@destroy']);
	Route::get('company/roomImages/{roomImages}', ['as'=> 'company.roomImages.show', 'uses' => 'Company\RoomImagesController@show']);
	Route::get('company/roomImages/{roomImages}/edit', ['as'=> 'company.roomImages.edit', 'uses' => 'Company\RoomImagesController@edit']);


	Route::get('company/roomEquipments', ['as'=> 'company.roomEquipments.index', 'uses' => 'Company\RoomEquipmentsController@index']);
	Route::post('company/roomEquipments', ['as'=> 'company.roomEquipments.store', 'uses' => 'Company\RoomEquipmentsController@store']);
	Route::get('company/roomEquipments/create', ['as'=> 'company.roomEquipments.create', 'uses' => 'Company\RoomEquipmentsController@create']);
	Route::put('company/roomEquipments/{roomEquipments}', ['as'=> 'company.roomEquipments.update', 'uses' => 'Company\RoomEquipmentsController@update']);
	Route::patch('company/roomEquipments/{roomEquipments}', ['as'=> 'company.roomEquipments.update', 'uses' => 'Company\RoomEquipmentsController@update']);
	Route::delete('company/roomEquipments/{roomEquipments}', ['as'=> 'company.roomEquipments.destroy', 'uses' => 'Company\RoomEquipmentsController@destroy']);
	Route::get('company/roomEquipments/{roomEquipments}', ['as'=> 'company.roomEquipments.show', 'uses' => 'Company\RoomEquipmentsController@show']);
	Route::get('company/roomEquipments/{roomEquipments}/edit', ['as'=> 'company.roomEquipments.edit', 'uses' => 'Company\RoomEquipmentsController@edit']);


	Route::get('company/roomNotes', ['as'=> 'company.roomNotes.index', 'uses' => 'Company\RoomNotesController@index']);
	Route::post('company/roomNotes', ['as'=> 'company.roomNotes.store', 'uses' => 'Company\RoomNotesController@store']);
	Route::get('company/roomNotes/create', ['as'=> 'company.roomNotes.create', 'uses' => 'Company\RoomNotesController@create']);
	Route::put('company/roomNotes/{roomNotes}', ['as'=> 'company.roomNotes.update', 'uses' => 'Company\RoomNotesController@update']);
	Route::patch('company/roomNotes/{roomNotes}', ['as'=> 'company.roomNotes.update', 'uses' => 'Company\RoomNotesController@update']);
	Route::delete('company/roomNotes/{roomNotes}', ['as'=> 'company.roomNotes.destroy', 'uses' => 'Company\RoomNotesController@destroy']);
	Route::get('company/roomNotes/{roomNotes}', ['as'=> 'company.roomNotes.show', 'uses' => 'Company\RoomNotesController@show']);
	Route::get('company/roomNotes/{roomNotes}/edit', ['as'=> 'company.roomNotes.edit', 'uses' => 'Company\RoomNotesController@edit']);




    # Company Contracts Section routes
    Route::get('company/contracts', ['as'=> 'company.contracts.index', 'uses' => 'Company\RoomContractController@index']);
    Route::post('company/contracts', ['as'=> 'company.contracts.store', 'uses' => 'Company\RoomContractController@store']);
    Route::get('company/contracts/create', ['as'=> 'company.contracts.create', 'uses' => 'Company\RoomContractController@create']);
    Route::put('company/contracts/{contracts}', ['as'=> 'company.contracts.update', 'uses' => 'Company\RoomContractController@update']);
    Route::patch('company/contracts/{contracts}', ['as'=> 'company.contracts.update', 'uses' => 'Company\RoomContractController@update']);
    Route::delete('company/contracts/{contracts}', ['as'=> 'company.contracts.destroy', 'uses' => 'Company\RoomContractController@destroy']);
    Route::get('company/contracts/{contracts}', ['as'=> 'company.contracts.show', 'uses' => 'Company\RoomContractController@show']);
    Route::get('company/contracts/{contracts}/edit', ['as'=> 'company.contracts.edit', 'uses' => 'Company\RoomContractController@edit']);
    Route::get('company/calendar', ['as'=> 'company.contracts.status', 'uses' => 'Company\RoomContractController@status']);
    Route::post('company/periods', ['as'=> 'company.contracts.period', 'uses' => 'Company\RoomContractController@getPeriod']);


    # Company Contract Persons Section routes
    Route::post('company/companies', ['as'=> 'company.companies.store', 'uses' => 'Company\CompanyController@store']);
    Route::put('company/companies/{companies}', ['as'=> 'company.companies.update', 'uses' => 'Company\CompanyController@update']);
    Route::patch('company/companies/{companies}', ['as'=> 'company.companies.update', 'uses' => 'Company\CompanyController@update']);
    Route::post('company/companyContactPeople', ['as'=> 'company.companyContactPeople.store', 'uses' => 'Company\CompanyContactPersonController@store']);
    Route::put('company/companyContactPeople', ['as'=> 'company.companyContactPeople.update', 'uses' => 'Company\CompanyContactPersonController@update']);
    Route::patch('company/companyContactPeople', ['as'=> 'company.companyContactPeople.update', 'uses' => 'Company\CompanyContactPersonController@update']);
    //company customer admin
    Route::post('company/customers/users', ['as'=> 'company.customerUsers.store', 'uses' => 'Company\CustomerUserController@store']);
    Route::put('company/customers/users/update', ['as'=> 'company.customerUsers.update', 'uses' => 'Company\CustomerUserController@update']);
    Route::patch('company/customers/users/update', ['as'=> 'company.customerUsers.update', 'uses' => 'Company\CustomerUserController@update']);
    Route::delete('company/customers/users/delete', ['as'=> 'company.customerUsers.destroy', 'uses' => 'Company\CustomerUserController@destroy']);



    // Invoice Generator
    // routes created by nazir
    Route::get('company/companyInvoices', ['as'=> 'company.companyInvoices.index', 'uses' => 'Company\CompanyInvoiceController@index']);
    Route::get('company/companyInvoices/generate/{company_id}',['as' => 'company.generateInvoice','uses' => 'Company\CompanyInvoiceController@createInvoiceByCompanyId'])->where(['company_id'=>'[0-9]+']);
    Route::get('company/companyInvoices/sendInvoice/{company_id}',['as' => 'company.sendInvoice','uses' => 'Company\CompanyInvoiceController@sendLatestInvoiceToCompanyContractPerson'])->where(['company_id'=>'[0-9]+']);

    Route::get('company/companies/companyservices', ['as'=> 'company.companyServices.index', 'uses' => 'Company\CompanyServiceController@index']);
    Route::post('company/companies/companyservices', ['as'=> 'company.companyServices.store', 'uses' => 'Company\CompanyServiceController@store']);
    Route::get('company/companies/companyservices/create', ['as'=> 'company.companyServices.create', 'uses' => 'Company\CompanyServiceController@create']);
    Route::put('company/companies/companyservices/update', ['as'=> 'company.companyServices.update', 'uses' => 'Company\CompanyServiceController@update']);
    Route::patch('company/companies/companyservices/update', ['as'=> 'company.companyServices.update', 'uses' => 'Company\CompanyServiceController@update']);
    Route::delete('company/companies/companyservices/delete', ['as'=> 'company.companyServices.destroy', 'uses' => 'Company\CompanyServiceController@destroy']);
    Route::get('company/companies/companyservices/{companyservices}', ['as'=> 'company.companyServices.show', 'uses' => 'Company\CompanyServiceController@show']);
    Route::get('company/companies/companyservices/{companyservices}/edit', ['as'=> 'company.companyServices.edit', 'uses' => 'Company\CompanyServiceController@edit']);


    /**
    ** Rental Tabs created by Heng.
    */
    // First Tab -  Customers
    Route::get('company/rcustomer', ['as'=> 'company.rcustomer.index', 'uses' => 'Company\Rental\CustomerController@index']);
    Route::post('company/rcustomer', ['as'=> 'company.rcustomer.store', 'uses' => 'Company\Rental\CustomerController@store']);
    Route::get('company/rcustomer/create', ['as'=> 'company.rcustomer.create', 'uses' => 'Company\Rental\CustomerController@create']);
    Route::put('company/rcustomer/{rcustomer}', ['as'=> 'company.rcustomer.update', 'uses' => 'Company\Rental\CustomerController@update']);
    Route::patch('company/rcustomer/{rcustomer}', ['as'=> 'company.rcustomer.update', 'uses' => 'Company\Rental\CustomerController@update']);
    Route::delete('company/rcustomer/{rcustomer}', ['as'=> 'company.rcustomer.destroy', 'uses' => 'Company\Rental\CustomerController@destroy']);
    Route::get('company/rcustomer/{rcustomer}', ['as'=> 'company.rcustomer.show', 'uses' => 'Company\Rental\CustomerController@show']);
    Route::get('company/rcustomer/{rcustomer}/edit', ['as'=> 'company.rcustomer.edit', 'uses' => 'Company\Rental\CustomerController@edit']);
    Route::post('company/rcustomer/search', ['as'=> 'company.rcustomer.search', 'uses' => 'Company\Rental\CustomerController@normal_search']);
    Route::post('company/rcustomer/advance_search', ['as'=> 'company.rcustomer.advance_search', 'uses' => 'Company\Rental\CustomerController@advance_search']);
    // Second Tab -  Contacts
    Route::get('company/rcontact', ['as'=> 'company.rcontact.index', 'uses' => 'Company\Rental\ContactController@index']);
    Route::post('company/rcontact', ['as'=> 'company.rcontact.store', 'uses' => 'Company\Rental\ContactController@store']);
    Route::get('company/rcontact/create', ['as'=> 'company.rcontact.create', 'uses' => 'Company\Rental\ContactController@create']);
    Route::put('company/rcontact/{rcontact}', ['as'=> 'company.rcontact.update', 'uses' => 'Company\Rental\ContactController@update']);
    Route::patch('company/rcontact/{rcontact}', ['as'=> 'company.rcontact.update', 'uses' => 'Company\Rental\ContactController@update']);
    Route::delete('company/rcontact/{rcontact}', ['as'=> 'company.rcontact.destroy', 'uses' => 'Company\Rental\ContactController@destroy']);
    Route::get('company/rcontact/{rcontact}', ['as'=> 'company.rcontact.show', 'uses' => 'Company\Rental\ContactController@show']);
    Route::get('company/rcontact/{rcontact}/edit', ['as'=> 'company.rcontact.edit', 'uses' => 'Company\Rental\ContactController@edit']);
    // Third Tab -  Signage
    Route::get('company/rsignage', ['as'=> 'company.rsignage.index', 'uses' => 'Company\Rental\SignageController@index']);
    Route::post('company/rsignage', ['as'=> 'company.rsignage.store', 'uses' => 'Company\Rental\SignageController@store']);
    Route::get('company/rsignage/create', ['as'=> 'company.rsignage.create', 'uses' => 'Company\Rental\SignageController@create']);
    Route::put('company/rsignage/{rsignage}', ['as'=> 'company.rsignage.update', 'uses' => 'Company\Rental\SignageController@update']);
    Route::patch('company/rsignage/{rsignage}', ['as'=> 'company.rsignage.update', 'uses' => 'Company\Rental\SignageController@update']);
    Route::delete('company/rsignage/{rsignage}', ['as'=> 'company.rsignage.destroy', 'uses' => 'Company\Rental\SignageController@destroy']);
    Route::get('company/rsignage/{rsignage}', ['as'=> 'company.rsignage.show', 'uses' => 'Company\Rental\SignageController@show']);
    Route::get('company/rsignage/{rsignage}/edit', ['as'=> 'company.rsignage.edit', 'uses' => 'Company\Rental\SignageController@edit']);
    // Fourth Tab -  Articles
    Route::get('company/rarticle', ['as'=> 'company.rarticle.index', 'uses' => 'Company\Rental\ArticleController@index']);
    Route::post('company/rarticle', ['as'=> 'company.rarticle.store', 'uses' => 'Company\Rental\ArticleController@store']);
    Route::get('company/rarticle/create', ['as'=> 'company.rarticle.create', 'uses' => 'Company\Rental\ArticleController@create']);
    Route::put('company/rarticle/{rarticle}', ['as'=> 'company.rarticle.update', 'uses' => 'Company\Rental\ArticleController@update']);
    Route::patch('company/rarticle/{rarticle}', ['as'=> 'company.rarticle.update', 'uses' => 'Company\Rental\ArticleController@update']);
    Route::delete('company/rarticle/{rarticle}', ['as'=> 'company.rarticle.destroy', 'uses' => 'Company\Rental\ArticleController@destroy']);
    Route::get('company/rarticle/{rarticle}', ['as'=> 'company.rarticle.show', 'uses' => 'Company\Rental\ArticleController@show']);
    Route::get('company/rarticle/{rarticle}/edit', ['as'=> 'company.rarticle.edit', 'uses' => 'Company\Rental\ArticleController@edit']);
    Route::post('company/rarticle/search', ['as'=> 'company.rarticle.search', 'uses' => 'Company\Rental\ArticleController@normal_search']);
    Route::post('company/rarticle/advance_search', ['as'=> 'company.rarticle.advance_search', 'uses' => 'Company\Rental\ArticleController@advance_search']);

    // Fifth Tab - Price
    Route::get('company/rprice', ['as'=> 'company.rprice.index', 'uses' => 'Company\Rental\PriceController@index']);
    Route::post('company/rprice', ['as'=> 'company.rprice.store', 'uses' => 'Company\Rental\PriceController@store']);
    Route::get('company/rprice/create', ['as'=> 'company.rprice.create', 'uses' => 'Company\Rental\PriceController@create']);
    Route::put('company/rprice/{rprice}', ['as'=> 'company.rprice.update', 'uses' => 'Company\Rental\PriceController@update']);
    Route::patch('company/rprice/{rprice}', ['as'=> 'company.rprice.update', 'uses' => 'Company\Rental\PriceController@update']);
    Route::delete('company/rprice/{rprice}', ['as'=> 'company.rprice.destroy', 'uses' => 'Company\Rental\PriceController@destroy']);
    Route::get('company/rprice/{rprice}', ['as'=> 'company.rprice.show', 'uses' => 'Company\Rental\PriceController@show']);
    Route::get('company/rprice/{rprice}/edit', ['as'=> 'company.rprice.edit', 'uses' => 'Company\Rental\PriceController@edit']);
    // Sixth Tab - Stock
    Route::get('company/rstock', ['as'=> 'company.rstock.index', 'uses' => 'Company\Rental\StockController@index']);
    Route::post('company/rstock', ['as'=> 'company.rstock.store', 'uses' => 'Company\Rental\StockController@store']);
    Route::get('company/rstock/create', ['as'=> 'company.rstock.create', 'uses' => 'Company\Rental\StockController@create']);
    Route::put('company/rstock/{rstock}', ['as'=> 'company.rstock.update', 'uses' => 'Company\Rental\StockController@update']);
    Route::patch('company/rstock/{rstock}', ['as'=> 'company.rstock.update', 'uses' => 'Company\Rental\StockController@update']);
    Route::delete('company/rstock/{rstock}', ['as'=> 'company.rstock.destroy', 'uses' => 'Company\Rental\StockController@destroy']);
    Route::get('company/rstock/{rstock}', ['as'=> 'company.rstock.show', 'uses' => 'Company\Rental\StockController@show']);
    Route::get('company/rstock/{rstock}/edit', ['as'=> 'company.rstock.edit', 'uses' => 'Company\Rental\StockController@edit']);
    // Seventh Tab - Financial
    Route::get('company/rfinancial', ['as'=> 'company.rfinancial.index', 'uses' => 'Company\Rental\FinancialController@index']);
    Route::post('company/rfinancial', ['as'=> 'company.rfinancial.store', 'uses' => 'Company\Rental\FinancialController@store']);
    Route::get('company/rfinancial/create', ['as'=> 'company.rfinancial.create', 'uses' => 'Company\Rental\FinancialController@create']);
    Route::put('company/rfinancial/{rfinancial}', ['as'=> 'company.rfinancial.update', 'uses' => 'Company\Rental\FinancialController@update']);
    Route::patch('company/rfinancial/{rfinancial}', ['as'=> 'company.rfinancial.update', 'uses' => 'Company\Rental\FinancialController@update']);
    Route::delete('company/rfinancial/{rfinancial}', ['as'=> 'company.rfinancial.destroy', 'uses' => 'Company\Rental\FinancialController@destroy']);
    Route::get('company/rfinancial/{rfinancial}', ['as'=> 'company.rfinancial.show', 'uses' => 'Company\Rental\FinancialController@show']);
    Route::get('company/rfinancial/{rfinancial}/edit', ['as'=> 'company.rfinancial.edit', 'uses' => 'Company\Rental\FinancialController@edit']);
    // Building Tab - Building
    Route::get('company/rbuilding', ['as'=> 'company.rbuilding.index', 'uses' => 'Company\Rental\BuildingController@index']);
    Route::post('company/rbuilding', ['as'=> 'company.rbuilding.store', 'uses' => 'Company\Rental\BuildingController@store']);
    Route::get('company/rbuilding/create', ['as'=> 'company.rbuilding.create', 'uses' => 'Company\Rental\BuildingController@create']);
    Route::put('company/rbuilding/{rbuilding}', ['as'=> 'company.rbuilding.update', 'uses' => 'Company\Rental\BuildingController@update']);
    Route::patch('company/rbuilding/{rbuilding}', ['as'=> 'company.rbuilding.update', 'uses' => 'Company\Rental\BuildingController@update']);
    Route::delete('company/rbuilding/{rbuilding}', ['as'=> 'company.rbuilding.destroy', 'uses' => 'Company\Rental\BuildingController@destroy']);
    Route::get('company/rbuilding/{rbuilding}', ['as'=> 'company.rbuilding.show', 'uses' => 'Company\Rental\BuildingController@show']);
    Route::get('company/rbuilding/{rbuilding}/edit', ['as'=> 'company.rbuilding.edit', 'uses' => 'Company\Rental\BuildingController@edit']);
    // Invoice Tab - Invoice
    Route::get('company/rinvoice', ['as'=> 'company.rinvoice.index', 'uses' => 'Company\Rental\InvoiceController@index']);
    Route::post('company/rinvoice', ['as'=> 'company.rinvoice.store', 'uses' => 'Company\Rental\InvoiceController@store']);
    Route::get('company/rinvoice/create', ['as'=> 'company.rinvoice.create', 'uses' => 'Company\Rental\InvoiceController@create']);
    Route::put('company/rinvoice/{rinvoice}', ['as'=> 'company.rinvoice.update', 'uses' => 'Company\Rental\InvoiceController@update']);
    Route::patch('company/rinvoice/{rinvoice}', ['as'=> 'company.rinvoice.update', 'uses' => 'Company\Rental\InvoiceController@update']);
    Route::delete('company/rinvoice/{rinvoice}', ['as'=> 'company.rinvoice.destroy', 'uses' => 'Company\Rental\InvoiceController@destroy']);
    Route::get('company/rinvoice/{rinvoice}', ['as'=> 'company.rinvoice.show', 'uses' => 'Company\Rental\InvoiceController@show']);
    Route::get('company/rinvoice/{rinvoice}/edit', ['as'=> 'company.rinvoice.edit', 'uses' => 'Company\Rental\InvoiceController@edit']);


    /**
     ** Routes for Survey System
     **/
    //Answer Type
    Route::get('company/answer_types', ['as'=> 'company.answer_types.index', 'uses' => 'Company\Survey\AnswerTypeController@index']);
    //Survey Category
    Route::get('company/survey/categories', ['as'=> 'company.survey_categories.index', 'uses' => 'Company\Survey\SurveyCategoryController@index']);
    //Company Survey
    Route::get('company/survey', ['as'=> 'company.survey.index', 'uses' => 'Company\Survey\CompanySurveyController@index']);
    Route::post('company/survey', ['as'=> 'company.survey.store', 'uses' => 'Company\Survey\CompanySurveyController@store']);
    Route::get('company/survey/create', ['as'=> 'company.survey.create', 'uses' => 'Company\Survey\CompanySurveyController@create']);
    Route::put('company/survey/{survey}', ['as'=> 'company.survey.update', 'uses' => 'Company\Survey\CompanySurveyController@update']);
    Route::patch('company/survey/{survey}', ['as'=> 'company.survey.update', 'uses' => 'Company\Survey\CompanySurveyController@update']);
    Route::delete('company/survey/{survey}', ['as'=> 'company.survey.destroy', 'uses' => 'Company\Survey\CompanySurveyController@destroy']);
    Route::get('company/survey/{survey}', ['as'=> 'company.survey.show', 'uses' => 'Company\Survey\CompanySurveyController@show']);
    Route::get('company/survey/{survey}/edit', ['as'=> 'company.survey.edit', 'uses' => 'Company\Survey\CompanySurveyController@edit']);
    Route::get('company/survey/{survey}/dashboard', ['as'=> 'company.survey.dashboard', 'uses' => 'Company\Survey\CompanySurveyController@dashboard']);
    //Company Survey Questions
    Route::get('company/survey_question', ['as'=> 'company.survey_question.index', 'uses' => 'Company\Survey\SurveyQuestionController@index']);
    Route::post('company/survey_question', ['as'=> 'company.survey_question.store', 'uses' => 'Company\Survey\SurveyQuestionController@store']);
    Route::get('company/survey_question/create', ['as'=> 'company.survey_question.create', 'uses' => 'Company\Survey\SurveyQuestionController@create']);
    Route::put('company/survey_question/{survey_question}', ['as'=> 'company.survey_question.update', 'uses' => 'Company\Survey\SurveyQuestionController@update']);
    Route::patch('company/survey_question/{survey_question}', ['as'=> 'company.survey_question.update', 'uses' => 'Company\Survey\SurveyQuestionController@update']);
    Route::delete('company/survey_question/{survey_question}', ['as'=> 'company.survey_question.destroy', 'uses' => 'Company\Survey\SurveyQuestionController@destroy']);
    Route::get('company/survey_question/{survey_question}', ['as'=> 'company.survey_question.show', 'uses' => 'Company\Survey\SurveyQuestionController@show']);
    Route::get('company/survey_question/{survey_question}/edit', ['as'=> 'company.survey_question.edit', 'uses' => 'Company\Survey\SurveyQuestionController@edit']);
    //Survey Answer Page
    Route::get('company/feedback', ['as'=> 'company.feedback.index', 'uses' => 'Company\Survey\SurveyAnswerController@index']);
    Route::get('company/survey_answers/list', ['as'=> 'company.survey_answers.list', 'uses' => 'Company\Survey\SurveyAnswerController@lists']);
    Route::get('company/answer/{answer}/show/{user}', ['as'=> 'company.survey_answers.show', 'uses' => 'Company\Survey\SurveyAnswerController@show']);
    Route::post('company/feedback', ['as'=> 'company.feedback.store', 'uses' => 'Company\Survey\SurveyAnswerController@store']);
    //Survey Question Option
    Route::delete('company/question_option/delete', ['as'=> 'company.question_option.destroy', 'uses' => 'Company\Survey\QuestionOptionController@destroy']);

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







/********** Conference module routes start here **********/

Route::group(['middleware' => ['company.auth']], function () {
	// Route::get('company/login', ['as'=> 'temp.company.login', 'uses' => 'Company\Conference\LoginController@index']);
	// Route::post('company/authenticate', ['as'=> 'temp.company.authenticate', 'uses' => 'Company\Conference\LoginController@authenticate']);
	// Route::get('company/dashboard', ['as'=> 'temp.company.dashboard', 'uses' => 'Company\Conference\LoginController@dashboard']);


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



	Route::get('company/conference/bookings', ['as'=> 'company.conference.conferenceBookings.index', 'uses' => 'Company\Conference\ConferenceBookingController@index']);
	Route::post('company/conference/bookings', ['as'=> 'company.conference.conferenceBookings.store', 'uses' => 'Company\Conference\ConferenceBookingController@store']);
	Route::get('company/conference/bookings/create/{id?}', ['as'=> 'company.conference.conferenceBookings.create', 'uses' => 'Company\Conference\ConferenceBookingController@create']);
	Route::put('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.update', 'uses' => 'Company\Conference\ConferenceBookingController@update']);
	Route::patch('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.update', 'uses' => 'Company\Conference\ConferenceBookingController@update']);
	Route::delete('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.destroy', 'uses' => 'Company\Conference\ConferenceBookingController@destroy']);
	Route::get('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.show', 'uses' => 'Company\Conference\ConferenceBookingController@show']);
	Route::get('company/conference/bookings/edit/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.edit', 'uses' => 'Company\Conference\ConferenceBookingController@edit']);


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


/*	
	Route::get('company/conference/bookings', ['as'=> 'company.conference.conferenceBookings.index', 'uses' => 'Company\Conference\ConferenceBookingController@index']);
	Route::post('company/conference/bookings', ['as'=> 'company.conference.conferenceBookings.store', 'uses' => 'Company\Conference\ConferenceBookingController@store']);
	Route::get('company/conference/bookings/create', ['as'=> 'company.conference.conferenceBookings.create', 'uses' => 'Company\Conference\ConferenceBookingController@create']);
	Route::put('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.update', 'uses' => 'Company\Conference\ConferenceBookingController@update']);
	Route::patch('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.update', 'uses' => 'Company\Conference\ConferenceBookingController@update']);
	Route::delete('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.destroy', 'uses' => 'Company\Conference\ConferenceBookingController@destroy']);
	Route::get('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.show', 'uses' => 'Company\Conference\ConferenceBookingController@show']);
	Route::get('company/conference/bookings/{conferenceBookings}/edit', ['as'=> 'company.conference.conferenceBookings.edit', 'uses' => 'Company\Conference\ConferenceBookingController@edit']);
*/

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
	


	Route::get('company/Conference/calender', ['as'=> 'company.conference.calender.view', 'uses' => 'Company\Conference\ConferenceBookingController@viewCalender']);


	# Company Support Ticketing Section routes
	Route::get('company/supports', ['as'=> 'company.supports.index', 'uses' => 'Admin\SupportController@companyIndex']);
	Route::get('company/supports/create', ['as'=> 'company.supports.create', 'uses' => 'Admin\SupportController@companyCreate']);
	Route::get('company/supports/{supports}', ['as'=> 'company.supports.show', 'uses' => 'Admin\SupportController@companyShow'])->where(['supports'=>'[0-9]+']);
	Route::post('company/supports', ['as'=> 'company.supports.store', 'uses' => 'Admin\SupportController@companyStore']);
	Route::get('company/supports/ticket/completed', ['as'=> 'company.supports.completed', 'uses' => 'Admin\SupportController@companyCompleteTicket']);


	# Company Customer Support Ticketing Section routes
	Route::get('company/company_Supports/completedTicket', ['as'=> 'company.companySupports.completedTicket', 'uses' => 'Company\CompanySupportController@completedTicket']);
	Route::get('company/company_Supports/{companySupports}/complete', ['as'=> 'company.companySupports.complete', 'uses' => 'Company\CompanySupportController@ticketComplete']);
	
	Route::get('company/companySupports/dashboard', ['as'=> 'company.companySupports.dashboard', 'uses' => 'Company\CompanySupportController@companyDashboard']);
	Route::get('company/companySupports', ['as'=> 'company.companySupports.index', 'uses' => 'Company\CompanySupportController@index']);
	Route::post('company/companySupports', ['as'=> 'company.companySupports.store', 'uses' => 'Company\CompanySupportController@store']);
	Route::get('company/companySupports/create', ['as'=> 'company.companySupports.create', 'uses' => 'Company\CompanySupportController@create']);
	Route::put('company/companySupports/{companySupports}', ['as'=> 'company.companySupports.update', 'uses' => 'Company\CompanySupportController@update'])->where(['companySupports'=>'[0-9]+']);
	Route::patch('company/companySupports/{companySupports}', ['as'=> 'company.companySupports.update', 'uses' => 'Company\CompanySupportController@update'])->where(['companySupports'=>'[0-9]+']);
	// Route::delete('company/companySupports/{companySupports}', ['as'=> 'company.companySupports.destroy', 'uses' => 'Company\CompanySupportController@destroy'])->where(['companySupports'=>'[0-9]+']);
	Route::get('company/companySupports/{companySupports}', ['as'=> 'company.companySupports.show', 'uses' => 'Company\CompanySupportController@show']);
	Route::get('company/companySupports/{companySupports}/edit', ['as'=> 'company.companySupports.edit', 'uses' => 'Company\CompanySupportController@edit']);
	
	

	# Company Customer Support Status Section routes
	Route::get('company/supportStatuses', ['as'=> 'company.supportStatuses.index', 'uses' => 'Company\CompanySupportStatusController@index']);
	Route::post('company/supportStatuses', ['as'=> 'company.supportStatuses.store', 'uses' => 'Company\CompanySupportStatusController@store']);
	Route::get('company/supportStatuses/create', ['as'=> 'company.supportStatuses.create', 'uses' => 'Company\CompanySupportStatusController@create']);
	Route::put('company/supportStatuses/{supportStatuses}', ['as'=> 'company.supportStatuses.update', 'uses' => 'Company\CompanySupportStatusController@update'])->where(['supportStatuses'=>'[0-9]+']);
	Route::patch('company/supportStatuses/{supportStatuses}', ['as'=> 'company.supportStatuses.update', 'uses' => 'Company\CompanySupportStatusController@update'])->where(['supportStatuses'=>'[0-9]+']);
	Route::delete('company/supportStatuses/{supportStatuses}', ['as'=> 'company.supportStatuses.destroy', 'uses' => 'Company\CompanySupportStatusController@destroy'])->where(['supportStatuses'=>'[0-9]+']);
	// Route::get('company/supportStatuses/{supportStatuses}', ['as'=> 'company.supportStatuses.show', 'uses' => 'Company\CompanySupportStatusController@show']);
	Route::get('company/supportStatuses/{supportStatuses}/edit', ['as'=> 'company.supportStatuses.edit', 'uses' => 'Company\CompanySupportStatusController@edit']);

	# Company Customer Support Categories Section routes
	Route::get('company/supportCategories', ['as'=> 'company.supportCategories.index', 'uses' => 'Company\CompanySupportCategoryController@index']);
	Route::post('company/supportCategories', ['as'=> 'company.supportCategories.store', 'uses' => 'Company\CompanySupportCategoryController@store']);
	Route::get('company/supportCategories/create', ['as'=> 'company.supportCategories.create', 'uses' => 'Company\CompanySupportCategoryController@create']);
	Route::put('company/supportCategories/{supportCategories}', ['as'=> 'company.supportCategories.update', 'uses' => 'Company\CompanySupportCategoryController@update'])->where(['supportCategories'=>'[0-9]+']);
	Route::patch('company/supportCategories/{supportCategories}', ['as'=> 'company.supportCategories.update', 'uses' => 'Company\CompanySupportCategoryController@update'])->where(['supportCategories'=>'[0-9]+']);
	Route::delete('company/supportCategories/{supportCategories}', ['as'=> 'company.supportCategories.destroy', 'uses' => 'Company\CompanySupportCategoryController@destroy'])->where(['supportCategories'=>'[0-9]+']);
	// Route::get('company/supportCategories/{supportCategories}', ['as'=> 'company.supportCategories.show', 'uses' => 'Company\CompanySupportCategoryController@show']);
	Route::get('company/supportCategories/{supportCategories}/edit', ['as'=> 'company.supportCategories.edit', 'uses' => 'Company\CompanySupportCategoryController@edit']);

	# Company Customer Support Priorities Section routes
	Route::get('company/supportPriorities', ['as'=> 'company.supportPriorities.index', 'uses' => 'Company\CompanySupportPrioritiesController@index']);
	Route::post('company/supportPriorities', ['as'=> 'company.supportPriorities.store', 'uses' => 'Company\CompanySupportPrioritiesController@store']);
	Route::get('company/supportPriorities/create', ['as'=> 'company.supportPriorities.create', 'uses' => 'Company\CompanySupportPrioritiesController@create']);
	Route::put('company/supportPriorities/{supportPriorities}', ['as'=> 'company.supportPriorities.update', 'uses' => 'Company\CompanySupportPrioritiesController@update'])->where(['supportPriorities'=>'[0-9]+']);
	Route::patch('company/supportPriorities/{supportPriorities}', ['as'=> 'company.supportPriorities.update', 'uses' => 'Company\CompanySupportPrioritiesController@update'])->where(['supportPriorities'=>'[0-9]+']);
	Route::delete('company/supportPriorities/{supportPriorities}', ['as'=> 'company.supportPriorities.destroy', 'uses' => 'Company\CompanySupportPrioritiesController@destroy'])->where(['supportPriorities'=>'[0-9]+']);
	// Route::get('company/supportPriorities/{supportPriorities}', ['as'=> 'company.supportPriorities.show', 'uses' => 'Company\CompanySupportPrioritiesController@show']);
	Route::get('company/supportPriorities/{supportPriorities}/edit', ['as'=> 'company.supportPriorities.edit', 'uses' => 'Company\CompanySupportPrioritiesController@edit']);


});


    Route::get('company_customer/login', ['as'=> 'companyCustomer.login', 'uses' => 'CompanyCustomer\UserController@viewLogin']);
    Route::post('company_customer/authenticate', ['as'=> 'companyCustomer.users.authenticate', 'uses' => 'CompanyCustomer\UserController@authenticate']);

Route::group(['middleware' => ['company.customer.auth']], function () {

    Route::get('company_customer/dashboard/{company?}', ['as' => 'companyCustomer.dashboard', 'uses' => 'CompanyCustomer\DashboardController@index']);
    Route::get('company_customer/profile', ['as' => 'companyCustomer.dashboard.profile', 'uses' => 'CompanyCustomer\DashboardController@profile']);
    Route::put('company_customer/profile/{users}', ['as' => 'companyCustomer.users.update', 'uses' => 'CompanyCustomer\UserController@update'])->where(['users'=>'[0-9]+']);
    Route::get('company_customer/logout', ['as' => 'companyCustomer.logout', 'uses' => 'CompanyCustomer\UserController@logout']);

    # support routes
    Route::get('company_customer/companySupports/completedTicket', ['as'=> 'companyCustomer.supports.completedTicket', 'uses' => 'Company\CompanySupportController@customerCompletedTicket']);

    Route::get('company_customer/companySupports', ['as'=> 'companyCustomer.supports.index', 'uses' => 'Company\CompanySupportController@customerSupportIndex']);
	Route::get('company_customer/companySupports/create', ['as'=> 'companyCustomer.supports.create', 'uses' => 'Company\CompanySupportController@customerSupportCreate']);
	Route::post('company_customer/companySupports', ['as'=> 'companyCustomer.supports.store', 'uses' => 'Company\CompanySupportController@customerSupportStore']);
	Route::get('company_customer/companySupports/{supports}', ['as'=> 'companyCustomer.supports.show', 'uses' => 'Company\CompanySupportController@customerSupportShow'])->where(['supports'=>'[0-9]+']);
	

});


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
Route::get('mail', ['as'=> 'mail.send', 'uses' => 'General\ValidationController@sendMail']);


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








/*
Route::get('company/conference/bookings', ['as'=> 'company.conference.conferenceBookings.index', 'uses' => 'Company\Conference\ConferenceBookingController@index']);
Route::post('company/conference/bookings', ['as'=> 'company.conference.conferenceBookings.store', 'uses' => 'Company\Conference\ConferenceBookingController@store']);
Route::get('company/conference/bookings/create', ['as'=> 'company.conference.conferenceBookings.create', 'uses' => 'Company\Conference\ConferenceBookingController@create']);
Route::put('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.update', 'uses' => 'Company\Conference\ConferenceBookingController@update']);
Route::patch('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.update', 'uses' => 'Company\Conference\ConferenceBookingController@update']);
Route::delete('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.destroy', 'uses' => 'Company\Conference\ConferenceBookingController@destroy']);
Route::get('company/conference/bookings/{conferenceBookings}', ['as'=> 'company.conference.conferenceBookings.show', 'uses' => 'Company\Conference\ConferenceBookingController@show']);
Route::get('company/conference/bookings/{conferenceBookings}/edit', ['as'=> 'company.conference.conferenceBookings.edit', 'uses' => 'Company\Conference\ConferenceBookingController@edit']);
*/


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







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('admin/supportStatuses', ['as'=> 'admin.supportStatuses.index', 'uses' => 'Admin\SupportStatusController@index']);
Route::post('admin/supportStatuses', ['as'=> 'admin.supportStatuses.store', 'uses' => 'Admin\SupportStatusController@store']);
Route::get('admin/supportStatuses/create', ['as'=> 'admin.supportStatuses.create', 'uses' => 'Admin\SupportStatusController@create']);
Route::put('admin/supportStatuses/{supportStatuses}', ['as'=> 'admin.supportStatuses.update', 'uses' => 'Admin\SupportStatusController@update']);
Route::patch('admin/supportStatuses/{supportStatuses}', ['as'=> 'admin.supportStatuses.update', 'uses' => 'Admin\SupportStatusController@update']);
Route::delete('admin/supportStatuses/{supportStatuses}', ['as'=> 'admin.supportStatuses.destroy', 'uses' => 'Admin\SupportStatusController@destroy']);
Route::get('admin/supportStatuses/{supportStatuses}', ['as'=> 'admin.supportStatuses.show', 'uses' => 'Admin\SupportStatusController@show']);
Route::get('admin/supportStatuses/{supportStatuses}/edit', ['as'=> 'admin.supportStatuses.edit', 'uses' => 'Admin\SupportStatusController@edit']);


Route::get('admin/supportCategories', ['as'=> 'admin.supportCategories.index', 'uses' => 'Admin\SupportCategoryController@index']);
Route::post('admin/supportCategories', ['as'=> 'admin.supportCategories.store', 'uses' => 'Admin\SupportCategoryController@store']);
Route::get('admin/supportCategories/create', ['as'=> 'admin.supportCategories.create', 'uses' => 'Admin\SupportCategoryController@create']);
Route::put('admin/supportCategories/{supportCategories}', ['as'=> 'admin.supportCategories.update', 'uses' => 'Admin\SupportCategoryController@update']);
Route::patch('admin/supportCategories/{supportCategories}', ['as'=> 'admin.supportCategories.update', 'uses' => 'Admin\SupportCategoryController@update']);
Route::delete('admin/supportCategories/{supportCategories}', ['as'=> 'admin.supportCategories.destroy', 'uses' => 'Admin\SupportCategoryController@destroy']);
Route::get('admin/supportCategories/{supportCategories}', ['as'=> 'admin.supportCategories.show', 'uses' => 'Admin\SupportCategoryController@show']);
Route::get('admin/supportCategories/{supportCategories}/edit', ['as'=> 'admin.supportCategories.edit', 'uses' => 'Admin\SupportCategoryController@edit']);


Route::get('admin/supportPriorities', ['as'=> 'admin.supportPriorities.index', 'uses' => 'Admin\SupportPrioritiesController@index']);
Route::post('admin/supportPriorities', ['as'=> 'admin.supportPriorities.store', 'uses' => 'Admin\SupportPrioritiesController@store']);
Route::get('admin/supportPriorities/create', ['as'=> 'admin.supportPriorities.create', 'uses' => 'Admin\SupportPrioritiesController@create']);
Route::put('admin/supportPriorities/{supportPriorities}', ['as'=> 'admin.supportPriorities.update', 'uses' => 'Admin\SupportPrioritiesController@update']);
Route::patch('admin/supportPriorities/{supportPriorities}', ['as'=> 'admin.supportPriorities.update', 'uses' => 'Admin\SupportPrioritiesController@update']);
Route::delete('admin/supportPriorities/{supportPriorities}', ['as'=> 'admin.supportPriorities.destroy', 'uses' => 'Admin\SupportPrioritiesController@destroy']);
Route::get('admin/supportPriorities/{supportPriorities}', ['as'=> 'admin.supportPriorities.show', 'uses' => 'Admin\SupportPrioritiesController@show']);
Route::get('admin/supportPriorities/{supportPriorities}/edit', ['as'=> 'admin.supportPriorities.edit', 'uses' => 'Admin\SupportPrioritiesController@edit']);

Route::get('company/supports', ['as'=> 'company.supports.index', 'uses' => 'Admin\SupportController@companyIndex']);
Route::get('company/supports/create', ['as'=> 'company.supports.create', 'uses' => 'Admin\SupportController@companyCreate']);
Route::get('company/supports/{supports}', ['as'=> 'company.supports.show', 'uses' => 'Admin\SupportController@companyShow']);
Route::get('company/supports/complete/{supports}', ['as'=> 'company.supports.completeTicket', 'uses' => 'Admin\SupportController@companyCompleteTicket']);
Route::post('company/supports', ['as'=> 'company.supports.store', 'uses' => 'Admin\SupportController@companyStore']);



Route::get('admin/supports', ['as'=> 'admin.supports.index', 'uses' => 'Admin\SupportController@index']);
Route::post('admin/supports', ['as'=> 'admin.supports.store', 'uses' => 'Admin\SupportController@store']);
Route::get('admin/supports/create', ['as'=> 'admin.supports.create', 'uses' => 'Admin\SupportController@create']);
Route::put('admin/supports/{supports}', ['as'=> 'admin.supports.update', 'uses' => 'Admin\SupportController@update']);
Route::patch('admin/supports/{supports}', ['as'=> 'admin.supports.update', 'uses' => 'Admin\SupportController@update']);
Route::delete('admin/supports/{supports}', ['as'=> 'admin.supports.destroy', 'uses' => 'Admin\SupportController@destroy']);
Route::get('admin/supports/{supports}', ['as'=> 'admin.supports.show', 'uses' => 'Admin\SupportController@show']);
Route::get('admin/supports/{supports}/edit', ['as'=> 'admin.supports.edit', 'uses' => 'Admin\SupportController@edit']);


Route::get('company/bookingAgencies', ['as'=> 'company.bookingAgencies.index', 'uses' => 'Company\BookingAgencyController@index']);
Route::post('company/bookingAgencies', ['as'=> 'company.bookingAgencies.store', 'uses' => 'Company\BookingAgencyController@store']);
Route::get('company/bookingAgencies/create', ['as'=> 'company.bookingAgencies.create', 'uses' => 'Company\BookingAgencyController@create']);
Route::put('company/bookingAgencies/{bookingAgencies}', ['as'=> 'company.bookingAgencies.update', 'uses' => 'Company\BookingAgencyController@update']);
Route::patch('company/bookingAgencies/{bookingAgencies}', ['as'=> 'company.bookingAgencies.update', 'uses' => 'Company\BookingAgencyController@update']);
Route::delete('company/bookingAgencies/{bookingAgencies}', ['as'=> 'company.bookingAgencies.destroy', 'uses' => 'Company\BookingAgencyController@destroy']);
Route::get('company/bookingAgencies/{bookingAgencies}', ['as'=> 'company.bookingAgencies.show', 'uses' => 'Company\BookingAgencyController@show']);
Route::get('company/bookingAgencies/{bookingAgencies}/edit', ['as'=> 'company.bookingAgencies.edit', 'uses' => 'Company\BookingAgencyController@edit']);




Route::get('company/currencies', ['as'=> 'company.currencies.index', 'uses' => 'Company\CurrencyController@index']);
Route::post('company/currencies', ['as'=> 'company.currencies.store', 'uses' => 'Company\CurrencyController@store']);
Route::get('company/currencies/create', ['as'=> 'company.currencies.create', 'uses' => 'Company\CurrencyController@create']);
Route::put('company/currencies/{currencies}', ['as'=> 'company.currencies.update', 'uses' => 'Company\CurrencyController@update']);
Route::patch('company/currencies/{currencies}', ['as'=> 'company.currencies.update', 'uses' => 'Company\CurrencyController@update']);
Route::delete('company/currencies/{currencies}', ['as'=> 'company.currencies.destroy', 'uses' => 'Company\CurrencyController@destroy']);
Route::get('company/currencies/{currencies}', ['as'=> 'company.currencies.show', 'uses' => 'Company\CurrencyController@show']);
Route::get('company/currencies/{currencies}/edit', ['as'=> 'company.currencies.edit', 'uses' => 'Company\CurrencyController@edit']);


Route::get('company/leaseAttachments', ['as'=> 'company.leaseAttachments.index', 'uses' => 'Company\LeaseAttachmentController@index']);
Route::post('company/leaseAttachments', ['as'=> 'company.leaseAttachments.store', 'uses' => 'Company\LeaseAttachmentController@store']);
Route::get('company/leaseAttachments/create', ['as'=> 'company.leaseAttachments.create', 'uses' => 'Company\LeaseAttachmentController@create']);
Route::put('company/leaseAttachments/{leaseAttachments}', ['as'=> 'company.leaseAttachments.update', 'uses' => 'Company\LeaseAttachmentController@update']);
Route::patch('company/leaseAttachments/{leaseAttachments}', ['as'=> 'company.leaseAttachments.update', 'uses' => 'Company\LeaseAttachmentController@update']);
Route::delete('company/leaseAttachments/{leaseAttachments}', ['as'=> 'company.leaseAttachments.destroy', 'uses' => 'Company\LeaseAttachmentController@destroy']);
Route::get('company/leaseAttachments/{leaseAttachments}', ['as'=> 'company.leaseAttachments.show', 'uses' => 'Company\LeaseAttachmentController@show']);
Route::get('company/leaseAttachments/{leaseAttachments}/edit', ['as'=> 'company.leaseAttachments.edit', 'uses' => 'Company\LeaseAttachmentController@edit']);


Route::get('company/leasePartners', ['as'=> 'company.leasePartners.index', 'uses' => 'Company\LeasePartnerController@index']);
Route::post('company/leasePartners', ['as'=> 'company.leasePartners.store', 'uses' => 'Company\LeasePartnerController@store']);
Route::get('company/leasePartners/create', ['as'=> 'company.leasePartners.create', 'uses' => 'Company\LeasePartnerController@create']);
Route::put('company/leasePartners/{leasePartners}', ['as'=> 'company.leasePartners.update', 'uses' => 'Company\LeasePartnerController@update']);
Route::patch('company/leasePartners/{leasePartners}', ['as'=> 'company.leasePartners.update', 'uses' => 'Company\LeasePartnerController@update']);
Route::delete('company/leasePartners/{leasePartners}', ['as'=> 'company.leasePartners.destroy', 'uses' => 'Company\LeasePartnerController@destroy']);
Route::get('company/leasePartners/{leasePartners}', ['as'=> 'company.leasePartners.show', 'uses' => 'Company\LeasePartnerController@show']);
Route::get('company/leasePartners/{leasePartners}/edit', ['as'=> 'company.leasePartners.edit', 'uses' => 'Company\LeasePartnerController@edit']);


Route::get('company/leaseCounterparts', ['as'=> 'company.leaseCounterparts.index', 'uses' => 'Company\LeaseCounterpartController@index']);
Route::post('company/leaseCounterparts', ['as'=> 'company.leaseCounterparts.store', 'uses' => 'Company\LeaseCounterpartController@store']);
Route::get('company/leaseCounterparts/create', ['as'=> 'company.leaseCounterparts.create', 'uses' => 'Company\LeaseCounterpartController@create']);
Route::put('company/leaseCounterparts/{leaseCounterparts}', ['as'=> 'company.leaseCounterparts.update', 'uses' => 'Company\LeaseCounterpartController@update']);
Route::patch('company/leaseCounterparts/{leaseCounterparts}', ['as'=> 'company.leaseCounterparts.update', 'uses' => 'Company\LeaseCounterpartController@update']);
Route::delete('company/leaseCounterparts/{leaseCounterparts}', ['as'=> 'company.leaseCounterparts.destroy', 'uses' => 'Company\LeaseCounterpartController@destroy']);
Route::get('company/leaseCounterparts/{leaseCounterparts}', ['as'=> 'company.leaseCounterparts.show', 'uses' => 'Company\LeaseCounterpartController@show']);
Route::get('company/leaseCounterparts/{leaseCounterparts}/edit', ['as'=> 'company.leaseCounterparts.edit', 'uses' => 'Company\LeaseCounterpartController@edit']);

Route::post('company/leaseContractInformations/imageRemove', ['as'=> 'company.leaseContractInformations.image_remove', 'uses' => 'Company\LeaseContractInformationController@imageRemove']);
Route::get('company/leaseContractInformations', ['as'=> 'company.leaseContractInformations.index', 'uses' => 'Company\LeaseContractInformationController@index']);
Route::post('company/leaseContractInformations', ['as'=> 'company.leaseContractInformations.store', 'uses' => 'Company\LeaseContractInformationController@store']);
Route::get('company/leaseContractInformations/create', ['as'=> 'company.leaseContractInformations.create', 'uses' => 'Company\LeaseContractInformationController@create']);
Route::put('company/leaseContractInformations/{leaseContractInformations}', ['as'=> 'company.leaseContractInformations.update', 'uses' => 'Company\LeaseContractInformationController@update']);
Route::patch('company/leaseContractInformations/{leaseContractInformations}', ['as'=> 'company.leaseContractInformations.update', 'uses' => 'Company\LeaseContractInformationController@update']);
Route::delete('company/leaseContractInformations/{leaseContractInformations}', ['as'=> 'company.leaseContractInformations.destroy', 'uses' => 'Company\LeaseContractInformationController@destroy']);
Route::get('company/leaseContractInformations/{leaseContractInformations}', ['as'=> 'company.leaseContractInformations.show', 'uses' => 'Company\LeaseContractInformationController@show']);
Route::get('company/leaseContractInformations/{leaseContractInformations}/edit', ['as'=> 'company.leaseContractInformations.edit', 'uses' => 'Company\LeaseContractInformationController@edit']);

Route::get('company/hrCivilStatuses', ['as'=> 'company.hrCivilStatuses.index', 'uses' => 'Company\hrCivilStatusController@index']);
Route::post('company/hrCivilStatuses', ['as'=> 'company.hrCivilStatuses.store', 'uses' => 'Company\hrCivilStatusController@store']);
Route::get('company/hrCivilStatuses/create', ['as'=> 'company.hrCivilStatuses.create', 'uses' => 'Company\hrCivilStatusController@create']);
Route::put('company/hrCivilStatuses/{hrCivilStatuses}', ['as'=> 'company.hrCivilStatuses.update', 'uses' => 'Company\hrCivilStatusController@update']);
Route::patch('company/hrCivilStatuses/{hrCivilStatuses}', ['as'=> 'company.hrCivilStatuses.update', 'uses' => 'Company\hrCivilStatusController@update']);
Route::delete('company/hrCivilStatuses/{hrCivilStatuses}', ['as'=> 'company.hrCivilStatuses.destroy', 'uses' => 'Company\hrCivilStatusController@destroy']);
Route::get('company/hrCivilStatuses/{hrCivilStatuses}', ['as'=> 'company.hrCivilStatuses.show', 'uses' => 'Company\hrCivilStatusController@show']);
Route::get('company/hrCivilStatuses/{hrCivilStatuses}/edit', ['as'=> 'company.hrCivilStatuses.edit', 'uses' => 'Company\hrCivilStatusController@edit']);

Route::post('company/companyHrs/hrOtherInformation', ['as'=> 'company.hrOtherInformation.store', 'uses' => 'Company\companyHrController@hrOtherInformation']);

Route::get('company/companyHrs', ['as'=> 'company.companyHrs.index', 'uses' => 'Company\companyHrController@index']);
Route::post('company/companyHrs', ['as'=> 'company.companyHrs.store', 'uses' => 'Company\companyHrController@store']);
Route::get('company/companyHrs/create', ['as'=> 'company.companyHrs.create', 'uses' => 'Company\companyHrController@create']);
Route::put('company/companyHrs/{companyHrs}', ['as'=> 'company.companyHrs.update', 'uses' => 'Company\companyHrController@update']);
Route::patch('company/companyHrs/{companyHrs}', ['as'=> 'company.companyHrs.update', 'uses' => 'Company\companyHrController@update']);
Route::delete('company/companyHrs/{companyHrs}', ['as'=> 'company.companyHrs.destroy', 'uses' => 'Company\companyHrController@destroy']);
Route::get('company/companyHrs/{companyHrs}', ['as'=> 'company.companyHrs.show', 'uses' => 'Company\companyHrController@show']);
Route::get('company/companyHrs/{companyHrs}/edit', ['as'=> 'company.companyHrs.edit', 'uses' => 'Company\companyHrController@edit']);


Route::get('company/hrPersonalCats', ['as'=> 'company.hrPersonalCats.index', 'uses' => 'Company\hrPersonalCatController@index']);
Route::post('company/hrPersonalCats', ['as'=> 'company.hrPersonalCats.store', 'uses' => 'Company\hrPersonalCatController@store']);
Route::get('company/hrPersonalCats/create', ['as'=> 'company.hrPersonalCats.create', 'uses' => 'Company\hrPersonalCatController@create']);
Route::put('company/hrPersonalCats/{hrPersonalCats}', ['as'=> 'company.hrPersonalCats.update', 'uses' => 'Company\hrPersonalCatController@update']);
Route::patch('company/hrPersonalCats/{hrPersonalCats}', ['as'=> 'company.hrPersonalCats.update', 'uses' => 'Company\hrPersonalCatController@update']);
Route::delete('company/hrPersonalCats/{hrPersonalCats}', ['as'=> 'company.hrPersonalCats.destroy', 'uses' => 'Company\hrPersonalCatController@destroy']);
Route::get('company/hrPersonalCats/{hrPersonalCats}', ['as'=> 'company.hrPersonalCats.show', 'uses' => 'Company\hrPersonalCatController@show']);
Route::get('company/hrPersonalCats/{hrPersonalCats}/edit', ['as'=> 'company.hrPersonalCats.edit', 'uses' => 'Company\hrPersonalCatController@edit']);


Route::get('company/hrCompanyCollectives', ['as'=> 'company.hrCompanyCollectives.index', 'uses' => 'Company\hrCompanyCollectiveController@index']);
Route::post('company/hrCompanyCollectives', ['as'=> 'company.hrCompanyCollectives.store', 'uses' => 'Company\hrCompanyCollectiveController@store']);
Route::get('company/hrCompanyCollectives/create', ['as'=> 'company.hrCompanyCollectives.create', 'uses' => 'Company\hrCompanyCollectiveController@create']);
Route::put('company/hrCompanyCollectives/{hrCompanyCollectives}', ['as'=> 'company.hrCompanyCollectives.update', 'uses' => 'Company\hrCompanyCollectiveController@update']);
Route::patch('company/hrCompanyCollectives/{hrCompanyCollectives}', ['as'=> 'company.hrCompanyCollectives.update', 'uses' => 'Company\hrCompanyCollectiveController@update']);
Route::delete('company/hrCompanyCollectives/{hrCompanyCollectives}', ['as'=> 'company.hrCompanyCollectives.destroy', 'uses' => 'Company\hrCompanyCollectiveController@destroy']);
Route::get('company/hrCompanyCollectives/{hrCompanyCollectives}', ['as'=> 'company.hrCompanyCollectives.show', 'uses' => 'Company\hrCompanyCollectiveController@show']);
Route::get('company/hrCompanyCollectives/{hrCompanyCollectives}/edit', ['as'=> 'company.hrCompanyCollectives.edit', 'uses' => 'Company\hrCompanyCollectiveController@edit']);


Route::get('company/hrCompanyemployments', ['as'=> 'company.hrCompanyemployments.index', 'uses' => 'Company\hrCompanyemploymentController@index']);
Route::post('company/hrCompanyemployments', ['as'=> 'company.hrCompanyemployments.store', 'uses' => 'Company\hrCompanyemploymentController@store']);
Route::get('company/hrCompanyemployments/create', ['as'=> 'company.hrCompanyemployments.create', 'uses' => 'Company\hrCompanyemploymentController@create']);
Route::put('company/hrCompanyemployments/{hrCompanyemployments}', ['as'=> 'company.hrCompanyemployments.update', 'uses' => 'Company\hrCompanyemploymentController@update']);
Route::patch('company/hrCompanyemployments/{hrCompanyemployments}', ['as'=> 'company.hrCompanyemployments.update', 'uses' => 'Company\hrCompanyemploymentController@update']);
Route::delete('company/hrCompanyemployments/{hrCompanyemployments}', ['as'=> 'company.hrCompanyemployments.destroy', 'uses' => 'Company\hrCompanyemploymentController@destroy']);
Route::get('company/hrCompanyemployments/{hrCompanyemployments}', ['as'=> 'company.hrCompanyemployments.show', 'uses' => 'Company\hrCompanyemploymentController@show']);
Route::get('company/hrCompanyemployments/{hrCompanyemployments}/edit', ['as'=> 'company.hrCompanyemployments.edit', 'uses' => 'Company\hrCompanyemploymentController@edit']);


Route::get('company/hrCompanyDesignations', ['as'=> 'company.hrCompanyDesignations.index', 'uses' => 'Company\hrCompanyDesignationController@index']);
Route::post('company/hrCompanyDesignations', ['as'=> 'company.hrCompanyDesignations.store', 'uses' => 'Company\hrCompanyDesignationController@store']);
Route::get('company/hrCompanyDesignations/create', ['as'=> 'company.hrCompanyDesignations.create', 'uses' => 'Company\hrCompanyDesignationController@create']);
Route::put('company/hrCompanyDesignations/{hrCompanyDesignations}', ['as'=> 'company.hrCompanyDesignations.update', 'uses' => 'Company\hrCompanyDesignationController@update']);
Route::patch('company/hrCompanyDesignations/{hrCompanyDesignations}', ['as'=> 'company.hrCompanyDesignations.update', 'uses' => 'Company\hrCompanyDesignationController@update']);
Route::delete('company/hrCompanyDesignations/{hrCompanyDesignations}', ['as'=> 'company.hrCompanyDesignations.destroy', 'uses' => 'Company\hrCompanyDesignationController@destroy']);
Route::get('company/hrCompanyDesignations/{hrCompanyDesignations}', ['as'=> 'company.hrCompanyDesignations.show', 'uses' => 'Company\hrCompanyDesignationController@show']);
Route::get('company/hrCompanyDesignations/{hrCompanyDesignations}/edit', ['as'=> 'company.hrCompanyDesignations.edit', 'uses' => 'Company\hrCompanyDesignationController@edit']);


Route::get('company/hrCompanyEmployments', ['as'=> 'company.hrCompanyEmployments.index', 'uses' => 'Company\hrCompanyEmploymentController@index']);
Route::post('company/hrCompanyEmployments', ['as'=> 'company.hrCompanyEmployments.store', 'uses' => 'Company\hrCompanyEmploymentController@store']);
Route::get('company/hrCompanyEmployments/create', ['as'=> 'company.hrCompanyEmployments.create', 'uses' => 'Company\hrCompanyEmploymentController@create']);
Route::put('company/hrCompanyEmployments/{hrCompanyEmployments}', ['as'=> 'company.hrCompanyEmployments.update', 'uses' => 'Company\hrCompanyEmploymentController@update']);
Route::patch('company/hrCompanyEmployments/{hrCompanyEmployments}', ['as'=> 'company.hrCompanyEmployments.update', 'uses' => 'Company\hrCompanyEmploymentController@update']);
Route::delete('company/hrCompanyEmployments/{hrCompanyEmployments}', ['as'=> 'company.hrCompanyEmployments.destroy', 'uses' => 'Company\hrCompanyEmploymentController@destroy']);
Route::get('company/hrCompanyEmployments/{hrCompanyEmployments}', ['as'=> 'company.hrCompanyEmployments.show', 'uses' => 'Company\hrCompanyEmploymentController@show']);
Route::get('company/hrCompanyEmployments/{hrCompanyEmployments}/edit', ['as'=> 'company.hrCompanyEmployments.edit', 'uses' => 'Company\hrCompanyEmploymentController@edit']);


Route::get('company/hrEmploymentForms', ['as'=> 'company.hrEmploymentForms.index', 'uses' => 'Company\hrEmploymentFormController@index']);
Route::post('company/hrEmploymentForms', ['as'=> 'company.hrEmploymentForms.store', 'uses' => 'Company\hrEmploymentFormController@store']);
Route::get('company/hrEmploymentForms/create', ['as'=> 'company.hrEmploymentForms.create', 'uses' => 'Company\hrEmploymentFormController@create']);
Route::put('company/hrEmploymentForms/{hrEmploymentForms}', ['as'=> 'company.hrEmploymentForms.update', 'uses' => 'Company\hrEmploymentFormController@update']);
Route::patch('company/hrEmploymentForms/{hrEmploymentForms}', ['as'=> 'company.hrEmploymentForms.update', 'uses' => 'Company\hrEmploymentFormController@update']);
Route::delete('company/hrEmploymentForms/{hrEmploymentForms}', ['as'=> 'company.hrEmploymentForms.destroy', 'uses' => 'Company\hrEmploymentFormController@destroy']);
Route::get('company/hrEmploymentForms/{hrEmploymentForms}', ['as'=> 'company.hrEmploymentForms.show', 'uses' => 'Company\hrEmploymentFormController@show']);
Route::get('company/hrEmploymentForms/{hrEmploymentForms}/edit', ['as'=> 'company.hrEmploymentForms.edit', 'uses' => 'Company\hrEmploymentFormController@edit']);


Route::get('company/hrSalaryTypes', ['as'=> 'company.hrSalaryTypes.index', 'uses' => 'Company\hrSalaryTypeController@index']);
Route::post('company/hrSalaryTypes', ['as'=> 'company.hrSalaryTypes.store', 'uses' => 'Company\hrSalaryTypeController@store']);
Route::get('company/hrSalaryTypes/create', ['as'=> 'company.hrSalaryTypes.create', 'uses' => 'Company\hrSalaryTypeController@create']);
Route::put('company/hrSalaryTypes/{hrSalaryTypes}', ['as'=> 'company.hrSalaryTypes.update', 'uses' => 'Company\hrSalaryTypeController@update']);
Route::patch('company/hrSalaryTypes/{hrSalaryTypes}', ['as'=> 'company.hrSalaryTypes.update', 'uses' => 'Company\hrSalaryTypeController@update']);
Route::delete('company/hrSalaryTypes/{hrSalaryTypes}', ['as'=> 'company.hrSalaryTypes.destroy', 'uses' => 'Company\hrSalaryTypeController@destroy']);
Route::get('company/hrSalaryTypes/{hrSalaryTypes}', ['as'=> 'company.hrSalaryTypes.show', 'uses' => 'Company\hrSalaryTypeController@show']);
Route::get('company/hrSalaryTypes/{hrSalaryTypes}/edit', ['as'=> 'company.hrSalaryTypes.edit', 'uses' => 'Company\hrSalaryTypeController@edit']);


Route::get('company/hrCompanyProjects', ['as'=> 'company.hrCompanyProjects.index', 'uses' => 'Company\hrCompanyProjectController@index']);
Route::post('company/hrCompanyProjects', ['as'=> 'company.hrCompanyProjects.store', 'uses' => 'Company\hrCompanyProjectController@store']);
Route::get('company/hrCompanyProjects/create', ['as'=> 'company.hrCompanyProjects.create', 'uses' => 'Company\hrCompanyProjectController@create']);
Route::put('company/hrCompanyProjects/{hrCompanyProjects}', ['as'=> 'company.hrCompanyProjects.update', 'uses' => 'Company\hrCompanyProjectController@update']);
Route::patch('company/hrCompanyProjects/{hrCompanyProjects}', ['as'=> 'company.hrCompanyProjects.update', 'uses' => 'Company\hrCompanyProjectController@update']);
Route::delete('company/hrCompanyProjects/{hrCompanyProjects}', ['as'=> 'company.hrCompanyProjects.destroy', 'uses' => 'Company\hrCompanyProjectController@destroy']);
Route::get('company/hrCompanyProjects/{hrCompanyProjects}', ['as'=> 'company.hrCompanyProjects.show', 'uses' => 'Company\hrCompanyProjectController@show']);
Route::get('company/hrCompanyProjects/{hrCompanyProjects}/edit', ['as'=> 'company.hrCompanyProjects.edit', 'uses' => 'Company\hrCompanyProjectController@edit']);


Route::get('company/hrVacationCategories', ['as'=> 'company.hrVacationCategories.index', 'uses' => 'Company\hrVacationCategoryController@index']);
Route::post('company/hrVacationCategories', ['as'=> 'company.hrVacationCategories.store', 'uses' => 'Company\hrVacationCategoryController@store']);
Route::get('company/hrVacationCategories/create', ['as'=> 'company.hrVacationCategories.create', 'uses' => 'Company\hrVacationCategoryController@create']);
Route::put('company/hrVacationCategories/{hrVacationCategories}', ['as'=> 'company.hrVacationCategories.update', 'uses' => 'Company\hrVacationCategoryController@update']);
Route::patch('company/hrVacationCategories/{hrVacationCategories}', ['as'=> 'company.hrVacationCategories.update', 'uses' => 'Company\hrVacationCategoryController@update']);
Route::delete('company/hrVacationCategories/{hrVacationCategories}', ['as'=> 'company.hrVacationCategories.destroy', 'uses' => 'Company\hrVacationCategoryController@destroy']);
Route::get('company/hrVacationCategories/{hrVacationCategories}', ['as'=> 'company.hrVacationCategories.show', 'uses' => 'Company\hrVacationCategoryController@show']);
Route::get('company/hrVacationCategories/{hrVacationCategories}/edit', ['as'=> 'company.hrVacationCategories.edit', 'uses' => 'Company\hrVacationCategoryController@edit']);



Route::get('company/hRCourses', ['as'=> 'company.hRCourses.index', 'uses' => 'Company\HRCoursesController@index']);
Route::post('company/hRCourses', ['as'=> 'company.hRCourses.store', 'uses' => 'Company\HRCoursesController@store']);
Route::get('company/hRCourses/create', ['as'=> 'company.hRCourses.create', 'uses' => 'Company\HRCoursesController@create']);
Route::put('company/hRCourses/{hRCourses}', ['as'=> 'company.hRCourses.update', 'uses' => 'Company\HRCoursesController@update']);
Route::patch('company/hRCourses/{hRCourses}', ['as'=> 'company.hRCourses.update', 'uses' => 'Company\HRCoursesController@update']);
Route::delete('company/hRCourses/{hRCourses}', ['as'=> 'company.hRCourses.destroy', 'uses' => 'Company\HRCoursesController@destroy']);
Route::get('company/hRCourses/{hRCourses}', ['as'=> 'company.hRCourses.show', 'uses' => 'Company\HRCoursesController@show']);
Route::get('company/hRCourses/{hRCourses}/edit', ['as'=> 'company.hRCourses.edit', 'uses' => 'Company\HRCoursesController@edit']);
