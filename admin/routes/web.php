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


Route::get('admin/', 									'Admin\AuthController@login');
Route::get('/', 									'Admin\AuthController@login');
Route::get('admin/test_url', 									'Admin\AuthController@test_url');

Route::get('admin/login', 								'Admin\AuthController@login');

Route::post('admin/login_process', 						'Admin\AuthController@login_process');

Route::get('admin/forget_password', 					'Admin\AuthController@forget_password');

Route::post('admin/forget_password_process', 			'Admin\AuthController@forget_password_process');

Route::get('admin/logout',		 						'Admin\AuthController@logout');


Route::post('admin/capture_payment',		 			'Admin\MobileapiController@capture_payment');
Route::post('admin/offer_capture_payment',		 			'Admin\MobileapiController@offer_capture_payment');

Route::get('admin/hardcoded_receipt',		 			'Admin\MobileapiController@hardcoded_receipt');

Route::post('/admin/getvarient',		 				'Admin\BookingController@getvarient');
Route::post('/admin/getvarientnexa',		 				'Admin\BookingController@getvarientnexa');
Route::post('/admin/getvarientcomm',		 				'Admin\BookingController@getvarientcomm');

Route::post('/admin/getcolor',		 					'Admin\BookingController@getcolor');
Route::post('/admin/getcolornexa',		 					'Admin\BookingController@getcolornexa');
Route::post('/admin/getcolorcomm',		 					'Admin\BookingController@getcolorcomm');

Route::post('/admin/getprice',		 					'Admin\BookingController@getprice');

Route::get('/admin/change_password',		 					'Admin\AuthController@change_password');
Route::post('/admin/change_password_process',		 					'Admin\AuthController@change_password_process');


Route::post('/admin/getcity',		 					'Admin\BookingController@getcity');
Route::post('/admin/getarea',		 					'Admin\BookingController@getarea');
	Route::post('/admin/getpincode',		 				'Admin\BookingController@getpincode');

Route::group(['prefix' => 'admin','middleware' => 'admin'], function () 
{
	Route::get('/dashbord',		 					'Admin\AuthController@dashbord');

	Route::get('/manage_booking',		 				'Admin\BookingController@index');
	Route::get('/book_you_service',		 				'Admin\BookingController@book_you_service');
	Route::get('/booked_value_added_services',		 				'Admin\BookingController@booked_value_added_services');
	Route::get('/nexa_booked_value_added_services',		 				'Admin\BookingController@nexa_booked_value_added_services');

	Route::get('/test_drive',		 				'Admin\BookingController@test_drive');

	Route::get('/quotations',		 				'Admin\BookingController@quotations');
	Route::get('/finance',		 				'Admin\BookingController@finance');

	Route::get('/insurance',		 				'Admin\BookingController@insurance');
	Route::get('/manage_nexa_booking',		 		'Admin\BookingController@manage_nexa_booking');
	Route::get('/nexa_book_you_service',		 		'Admin\BookingController@nexa_book_you_service');
	Route::get('/nexa_showroom_visits',		 		'Admin\BookingController@nexa_showroom_visits');
	Route::get('/nexa_test_drive',		 		'Admin\BookingController@nexa_test_drive');
	Route::get('/nexa_quotations',		 		'Admin\BookingController@nexa_quotations');
	Route::get('/nexa_insurance',		 		'Admin\BookingController@nexa_insurance');
	Route::get('/nexa_finance',		 			'Admin\BookingController@nexa_finance');
	Route::get('/nexa_feedback',		 		'Admin\BookingController@nexa_feedback');
	Route::get('/manage_commercial_booking',		 				'Admin\BookingController@manage_commercial_booking');
	Route::get('/commercial_book_you_service',		 				'Admin\BookingController@commercial_book_you_service');
	Route::get('/commercial_showroom_visits',		 				'Admin\BookingController@commercial_showroom_visits');
	Route::get('/commercial_feedback',		 				'Admin\BookingController@commercial_feedback');
	Route::get('/enquiry',		 				'Admin\BookingController@enquiry');
	Route::get('/nexa_enquiry',		 				'Admin\BookingController@nexa_enquiry');
	Route::get('/commercial_enquiry',		 				'Admin\BookingController@commercial_enquiry');
	Route::get('/value_add_services',		 				'Admin\BookingController@value_add_services');
	Route::get('/add_value_add_services',		 				'Admin\BookingController@add_value_add_services');
	Route::post('/store_value_add_services',		 				'Admin\BookingController@store_value_add_services');
	Route::get('/edit_value_add_services/{id}',		 				'Admin\BookingController@edit_value_add_services');
	Route::post('/update_value_add_services/{id}',		 				'Admin\BookingController@update_value_add_services');
	Route::get('/view_value_add_services/{id}',		 				'Admin\BookingController@view_value_add_services');
	Route::get('/delete_value_add_services/{id}',		 				'Admin\BookingController@delete_value_add_services');

	Route::get('/nexa_value_add_services',		 				'Admin\BookingController@nexa_value_add_services');
	Route::get('/nexa_add_value_add_services',		 				'Admin\BookingController@nexa_add_value_add_services');
	Route::post('/nexa_store_value_add_services',		 				'Admin\BookingController@nexa_store_value_add_services');
	Route::get('/nexa_edit_value_add_services/{id}',		 				'Admin\BookingController@nexa_edit_value_add_services');
	Route::post('/nexa_update_value_add_services/{id}',		 				'Admin\BookingController@nexa_update_value_add_services');
	Route::get('/nexa_view_value_add_services/{id}',		 				'Admin\BookingController@nexa_view_value_add_services');
	Route::get('/nexa_delete_value_add_services/{id}',		 				'Admin\BookingController@nexa_delete_value_add_services');







	Route::get('/download_bookings',		 			'Admin\BookingController@download_bookings');
	Route::get('/nexa_download_bookings',		 			'Admin\BookingController@nexa_download_bookings');
	Route::get('/download_nexa_showroom_visits',		 			'Admin\BookingController@download_nexa_showroom_visits');
	Route::get('/commercial_download_bookings',		 			'Admin\BookingController@commercial_download_bookings');
	Route::get('/download_commercial_showroom_visits',		 			'Admin\BookingController@download_commercial_showroom_visits');


	Route::get('/manage_delivery_boy',		 		'Admin\BookingController@delivery_index');
	Route::get('/add_booking',		 					'Admin\BookingController@add');
	Route::post('/store_booking',		 				'Admin\BookingController@store');
	Route::get('/view_booking/{id}',	 				'Admin\BookingController@view');
	Route::get('/edit_booking/{id}',		 			'Admin\BookingController@edit');
	Route::post('/update_booking/{id}',		 		'Admin\BookingController@update');
	Route::get('/delete_booking/{id}',		 			'Admin\BookingController@delete');
	Route::get('/add_deliverty_boy',		 		'Admin\BookingController@deliverty_boy_add');
	Route::post('/store_deliverty_boy',		 		'Admin\BookingController@deliverty_boy_store');
	Route::get('/active_store/{id}',		 			'Admin\BookingController@active_store');
	Route::get('/view_deliverty_boy/{id}',	 		'Admin\BookingController@deliverty_boy_view');
	Route::get('/edit_deliverty_boy/{id}',		 	'Admin\BookingController@deliverty_boy_edit');
	Route::post('/update_deliverty_boy/{id}',		'Admin\BookingController@deliverty_boy_update');
	Route::get('/delete_deliverty_boy/{id}',		'Admin\BookingController@deliverty_boy_delete');

	Route::get('/manage_store',		 				'Admin\BookingController@store_index');
	Route::get('/add_store',		 				'Admin\BookingController@store_add');
	Route::post('/store_store',		 				'Admin\BookingController@store_store');
	Route::get('/view_store/{id}',	 				'Admin\BookingController@store_view');
	Route::get('/edit_store/{id}',		 			'Admin\BookingController@store_edit');
	Route::post('/update_store/{id}',				'Admin\BookingController@store_update');
	Route::get('/delete_store/{id}',				'Admin\BookingController@store_delete');

	Route::post('/approve_user/{id}',		 		'Admin\BookingController@approve_user');
	
	Route::get('/edit_address/{id}',		 		'Admin\BookingController@edit_address');
	Route::post('/update_address/{id}',		 		'Admin\BookingController@update_address');
	Route::post('/assign_credit_user/{id}',		 	'Admin\BookingController@assign_credit_user');
	Route::get('/get_user_suggestion',		 	    'Admin\BookingController@get_user_suggestion');
	Route::get('/view_nexa_booking/{id}',		 	    'Admin\BookingController@view_nexa_booking');
	Route::get('/view_commercial_booking/{id}',		 	    'Admin\BookingController@view_commercial_booking');
	Route::get('/locations',		 		'Admin\BookingController@locations');
	Route::get('/offers',		 			'Admin\BookingController@offers');
	Route::get('/nexa_offers',		 		'Admin\BookingController@nexa_offers');
	Route::get('/nexa_home_banner',		 	'Admin\BookingController@nexa_home_banner');
	Route::get('/add_nexa_home_banner',		'Admin\BookingController@add_nexa_home_banner');
	Route::post('/store_nexa_home_banner',	'Admin\BookingController@store_nexa_home_banner');
	Route::get('/edit_home_banner/{id}',	'Admin\BookingController@edit_home_banner');
	Route::get('/view_nexa_home_banner/{id}','Admin\BookingController@view_nexa_home_banner');
	Route::get('/delete_nexa_home_banner/{id}','Admin\BookingController@delete_nexa_home_banner');
	
	Route::post('/update_nexa_home_banner/{id}',	'Admin\BookingController@update_nexa_home_banner');

	Route::get('/comm_home_banner',		 	'Admin\BookingController@comm_home_banner');
	Route::get('/add_comm_home_banner',		'Admin\BookingController@add_comm_home_banner');
	Route::post('/store_comm_home_banner',	'Admin\BookingController@store_comm_home_banner');
	Route::get('/edit_comm_home_banner/{id}',	'Admin\BookingController@edit_comm_home_banner');
	Route::get('/view_comm_home_banner/{id}','Admin\BookingController@view_comm_home_banner');
	Route::get('/delete_comm_home_banner/{id}','Admin\BookingController@delete_comm_home_banner');
	
	Route::post('/update_comm_home_banner/{id}',	'Admin\BookingController@update_comm_home_banner');
	
	
	Route::get('/commercial_offers',		 			'Admin\BookingController@commercial_offers');

	
	Route::get('/offer_enquiry',		 			'Admin\BookingController@offer_enquiry');
	Route::get('/nexa_offer_enquiry',		 			'Admin\BookingController@nexa_offer_enquiry');
	Route::get('/commercial_offer_enquiry',		 			'Admin\BookingController@commercial_offer_enquiry');
	Route::get('/edit_offer/{id}',		 		'Admin\BookingController@edit_offer');
	Route::get('/edit_nexa_offer/{id}',		 		'Admin\BookingController@edit_nexa_offer');
	Route::get('/edit_commercial_offer/{id}',		 		'Admin\BookingController@edit_commercial_offer');

	
	Route::post('/update_offer/{id}',		 		'Admin\BookingController@update_offer');
	Route::post('/update_nexa_offer/{id}',		 		'Admin\BookingController@update_nexa_offer');
	Route::post('/update_commercial_offer/{id}',		 		'Admin\BookingController@update_commercial_offer');

	
	Route::get('/view_offer/{id}',		 	    'Admin\BookingController@view_offer');
	Route::get('/view_nexa_offer/{id}',		 	    'Admin\BookingController@view_nexa_offer');
	Route::get('/view_commercial_offer/{id}',		 	    'Admin\BookingController@view_commercial_offer');

	
	Route::get('/delete_offer/{id}',		 	    'Admin\BookingController@delete_offer');
	Route::get('/delete_nexa_offer/{id}',		 	    'Admin\BookingController@delete_nexa_offer');
	Route::get('/delete_commercial_offer/{id}',		 	    'Admin\BookingController@delete_commercial_offer');
	
	Route::get('/add_offer',		 		'Admin\BookingController@add_offer');
	Route::get('/add_nexa_offer',		 	'Admin\BookingController@add_nexa_offer');
	Route::get('/add_commercial_offer',		 	'Admin\BookingController@add_commercial_offer');

	Route::post('/store_offer',		 	'Admin\BookingController@store_offer');
	Route::post('/store_nexa_offer',		 	'Admin\BookingController@store_nexa_offer');
	Route::post('/store_commercial_offer',		 	'Admin\BookingController@store_commercial_offer');


	
	Route::get('/add_location',		 		'Admin\BookingController@add_location');
	Route::post('/store_location',		 	'Admin\BookingController@store_location');
	Route::get('/change_location_status/{id}', 		'Admin\BookingController@change_location_status');
	Route::get('/edit_location/{id}',		 		'Admin\BookingController@edit_location');
	Route::post('/update_location/{id}',		 		'Admin\BookingController@update_location');
	Route::get('/view_location/{id}',		 		'Admin\BookingController@view_location');
	Route::get('/delete_location/{id}',		 		'Admin\BookingController@delete_location');
	
	Route::get('/nexa_locations',		 		'Admin\BookingController@nexa_locations');
	Route::get('/add_nexa_location',		 	'Admin\BookingController@add_nexa_location');
	Route::post('/store_nexa_location',		 	'Admin\BookingController@store_nexa_location');
	Route::get('/change_nexa_location_status/{id}', 		'Admin\BookingController@change_nexa_location_status');
	Route::get('/edit_nexa_location/{id}',		 		'Admin\BookingController@edit_nexa_location');
	Route::post('/update_nexa_location/{id}',		 		'Admin\BookingController@update_nexa_location');
	Route::get('/view_nexa_location/{id}',		 		'Admin\BookingController@view_nexa_location');
	Route::get('/delete_nexa_location/{id}',		 		'Admin\BookingController@delete_nexa_location');
	Route::get('/commercial_locations',		 		'Admin\BookingController@commercial_locations');
	Route::get('/add_commercial_location',		 	'Admin\BookingController@add_commercial_location');
	Route::post('/store_commercial_location',		 	'Admin\BookingController@store_commercial_location');
	Route::get('/change_commercial_location_status/{id}', 		'Admin\BookingController@change_commercial_location_status');
	Route::get('/edit_commercial_location/{id}',		 		'Admin\BookingController@edit_commercial_location');
	Route::post('/update_commercial_location/{id}',		 		'Admin\BookingController@update_commercial_location');
	Route::get('/view_commercial_location/{id}',		 		'Admin\BookingController@view_commercial_location');
	Route::get('/delete_commercial_location/{id}',		 		'Admin\BookingController@delete_commercial_location');
	
});