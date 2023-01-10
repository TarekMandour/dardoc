<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::post('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

// Admin routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {

    Route::get('/', 'HomeController@index')->name('admin.blank');
    // Route::get('/page', 'HomeController@page');

    Route::get('/admins', 'AdminController@index');
    Route::get('admins_datatable', 'AdminController@datatable')->name('admins.datatable.data');
    Route::get('delete-admin', 'AdminController@destroy');
    Route::get('show-admin/{id}', 'AdminController@show')->name('admins.show');
    Route::post('store-admin', 'AdminController@store');
    Route::get('edit-admin/{id}', 'AdminController@edit');
    Route::post('update-admin', 'AdminController@update');
    Route::get('add-admin-button', function () {
        return view('admin/admin/button');
    });

    Route::get('admin_vacation_datatable/{parent_id}', 'AdminVacationController@datatable')->name('admin.vacation.datatable.data');
    Route::get('delete-admin-vacation', 'AdminVacationController@destroy');
    Route::post('store-admin-vacation', 'AdminVacationController@store');
    Route::get('edit-admin-vacation/{id}', 'AdminVacationController@edit');
    Route::post('update-admin-vacation', 'AdminVacationController@update');
    Route::get('add-admin-vacation-button/{parent_id}', 'AdminVacationController@button');

    Route::get('admin_status_datatable/{parent_id}', 'AdminStatusController@datatable')->name('admin.status.datatable.data');
    Route::get('delete-admin-status', 'AdminStatusController@destroy');
    Route::post('store-admin-status', 'AdminStatusController@store');
    Route::get('add-admin-status-button/{parent_id}', 'AdminStatusController@button');

    Route::get('show-status-detail/{id}', 'AdminStatusController@show')->name('status.show.detail');
    Route::get('send-status-mail/{id}', 'AdminStatusController@SendMail')->name('status.send.mail');
    Route::post('store-detail-status', 'AdminStatusController@storeDetail');
    Route::get('delete-status-detail/{id}', 'AdminStatusController@deleteDetail')->name('status.delete.detail');

    Route::get('show-vacation-detail/{id}', 'AdminVacationController@show')->name('vacation.show.detail');
    Route::get('send-vacation-mail/{id}', 'AdminVacationController@SendMail')->name('vacation.send.mail');
    Route::post('store-detail-vacation', 'AdminVacationController@storeDetail');
    Route::get('delete-vacation-detail/{id}', 'AdminVacationController@deleteDetail')->name('vacation.delete.detail');

    Route::get('report-employee/', 'ReportController@employee');
    Route::get('employee_datatable', 'ReportController@employee_datatable')->name('employee.datatable.data');
    
    Route::get('report-status/', 'ReportController@status');
    Route::get('status_datatable_em', 'ReportController@status_datatable_em')->name('status_em.datatable.data');
    Route::get('status_datatable_ca', 'ReportController@status_datatable_ca')->name('status_ca.datatable.data');

    Route::get('report-vacation/', 'ReportController@vacation');
    Route::get('vacation_datatable_em', 'ReportController@vacation_datatable_em')->name('vacation_em.datatable.data');
    Route::get('vacation_datatable_ca', 'ReportController@vacation_datatable_ca')->name('vacation_ca.datatable.data');

    Route::get('report-medicine/', 'ReportController@medicine');
    Route::get('medicine_datatable_em', 'ReportController@medicine_datatable_em')->name('medicine_em.datatable.data');

    Route::get('edit-setting', 'SettingController@edit');
    Route::post('update-setting', 'SettingController@update');

    Route::get('/pages', 'PageController@index');
    Route::get('pages_datatable', 'PageController@datatable')->name('pages.datatable.data');
    Route::get('delete-page', 'PageController@destroy');
    Route::get('show-page/{id}', 'PageController@show');
    Route::get('create-page', 'PageController@create');
    Route::post('store-page', 'PageController@store');
    Route::get('edit-page/{id}', 'PageController@edit');
    Route::post('update-page', 'PageController@update');
    Route::get('add-page-button', function () {
        return view('admin/page/button');
    });

    Route::get('/slider', 'SliderController@index');
    Route::get('slider_datatable', 'SliderController@datatable')->name('slider.datatable.data');
    Route::get('delete-slider', 'SliderController@destroy');
    Route::get('create-slider', 'SliderController@create');
    Route::post('store-slider', 'SliderController@store');
    Route::get('edit-slider/{id}', 'SliderController@edit');
    Route::post('update-slider', 'SliderController@update');
    Route::get('add-slider-button', function () {
        return view('admin/slider/button');
    });

    Route::get('/partner', 'PartnerController@index');
    Route::get('partner_datatable', 'PartnerController@datatable')->name('partner.datatable.data');
    Route::get('delete-partner', 'PartnerController@destroy');
    Route::get('create-partner', 'PartnerController@create');
    Route::post('store-partner', 'PartnerController@store');
    Route::get('edit-partner/{id}', 'PartnerController@edit');
    Route::post('update-partner', 'PartnerController@update');
    Route::get('add-partner-button', function () {
        return view('admin/partner/button');
    });

    //start categories
    Route::get('/category', 'CategoryController@index');
    Route::get('category_datatable', 'CategoryController@datatable')->name('category.datatable.data');
    Route::get('delete-category', 'CategoryController@destroy');
    Route::get('show-category/{id}', 'CategoryController@show');
    Route::get('create-category', 'CategoryController@create');
    Route::post('store-category', 'CategoryController@store');
    Route::get('edit-category/{id}', 'CategoryController@edit');
    Route::post('update-category', 'CategoryController@update');
    Route::get('add-category-button', function () {
        return view('admin/category/button');
    });

    //start record
    Route::get('/record', 'RecordController@index');
    Route::get('record_datatable', 'RecordController@datatable')->name('record.datatable.data');
    Route::get('delete-record', 'RecordController@destroy');
    Route::get('show-record/{id}', 'RecordController@show');
    Route::get('create-record', 'RecordController@create');
    Route::post('store-record', 'RecordController@store');
    Route::get('edit-record/{id}', 'RecordController@edit');
    Route::post('update-record', 'RecordController@update');
    Route::get('add-record-button', function () {
        return view('admin/record/button');
    });
    
    //start categories
    Route::get('/log', 'LogController@index');
    Route::get('log_datatable', 'LogController@datatable')->name('log.datatable.data');

    //start categories
    Route::get('/vacation', 'VacationController@index')
    ->middleware('can:انواع الاجازات');
    Route::get('vacation_datatable', 'VacationController@datatable')->name('vacation.datatable.data');
    Route::get('delete-vacation', 'VacationController@destroy');
    Route::get('show-vacation/{id}', 'VacationController@show');
    Route::get('create-vacation', 'VacationController@create');
    Route::post('store-vacation', 'VacationController@store');
    Route::get('edit-vacation/{id}', 'VacationController@edit');
    Route::post('update-vacation', 'VacationController@update');
    Route::get('add-vacation-button', function () {
        return view('admin/vacation/button');
    });

    //start categories
    Route::get('/medicine', 'MedicineController@index');
    Route::get('medicine_datatable', 'MedicineController@datatable')->name('medicine.datatable.data');
    Route::get('delete-medicine', 'MedicineController@destroy');
    Route::get('show-medicine/{id}', 'MedicineController@show');
    Route::get('create-medicine', 'MedicineController@create');
    Route::post('store-medicine', 'MedicineController@store');
    Route::get('edit-medicine/{id}', 'MedicineController@edit');
    Route::post('update-medicine', 'MedicineController@update');
    Route::get('add-medicine-button', function () {
        return view('admin/medicine/button');
    });

    //start categories
    Route::get('/contact', 'ContactController@index');
    Route::get('contact_datatable', 'ContactController@datatable')->name('contact.datatable.data');
    Route::get('delete-contact', 'ContactController@destroy');
    Route::get('show-contact/{id}', 'ContactController@show');
    Route::get('create-contact', 'ContactController@create');
    Route::post('store-contact', 'ContactController@store');
    Route::get('edit-contact/{id}', 'ContactController@edit');
    Route::post('update-contact', 'ContactController@update');
    Route::get('add-contact-button', function () {
        return view('admin/contact/button');
    });

//start offers
    Route::get('/offer', 'OfferController@index');
    Route::get('offer_datatable', 'OfferController@datatable')->name('offer.datatable.data');
    Route::get('delete-offer', 'OfferController@destroy');
    Route::get('show-offer/{id}', 'OfferController@show');
    Route::get('create-offer', 'OfferController@create');
    Route::post('store-offer', 'OfferController@store');
    Route::get('edit-offer/{id}', 'OfferController@edit');
    Route::post('update-offer', 'OfferController@update');
    Route::get('add-offer-button', function () {
        return view('admin/offer/button');
    });


//    start posts
    Route::get('/post', 'PostController@index');
    Route::get('post_datatable', 'PostController@datatable')->name('post.datatable.data');
    Route::get('delete-post', 'PostController@destroy');
    Route::get('show-post/{id}', 'PostController@show');
    Route::get('create-post', 'PostController@create');
    Route::post('store-post', 'PostController@store');
    Route::get('edit-post/{id}', 'PostController@edit');
    Route::post('update-post', 'PostController@update');
    Route::get('add-post-button', function () {
        return view('admin/post/button');
    });

//    start posts images
    Route::get('/post-image/{post_id}', 'PostImagesController@index');
    Route::get('post_image_datatable/{post_id}', 'PostImagesController@datatable')->name('image.post.datatable.data');
    Route::get('delete-post-image', 'PostImagesController@destroy');
    Route::get('create-post-image/{post_id}', 'PostImagesController@create');
    Route::post('store-post-image', 'PostImagesController@store');
    Route::get('add-post-image-button/{id}', 'PostImagesController@button');


    Route::get('/client', 'ClientController@index');
    Route::get('client_datatable', 'ClientController@datatable')->name('client.datatable.data');
    Route::get('delete-client', 'ClientController@destroy');
    Route::get('show-client/{id}', 'ClientController@show');
    Route::get('create-client', 'ClientController@create');
    Route::post('store-client', 'ClientController@store');
    Route::get('edit-client/{id}', 'ClientController@edit');
    Route::post('update-client', 'ClientController@update');
    Route::get('add-client-button', function () {
        return view('admin/client/button');
    });

    Route::get('follower_datatable/{parent_id}', 'ClientController@datatable_followers')->name('follower.datatable.data');


    Route::get('client_card_datatable/{parent_id}', 'ClientCardsController@datatable')->name('client.cards.datatable.data');
    Route::get('delete-client-card', 'ClientCardsController@destroy');
    Route::post('store-client-card', 'ClientCardsController@store');
    Route::get('edit-client-card/{id}', 'ClientCardsController@edit');
    Route::post('update-client-card', 'ClientCardsController@update');
    Route::get('add-client-card-button/{parent_id}', 'ClientCardsController@button');


//debts
    Route::get('client_debts_datatable/{parent_id}', 'ClientDebtsController@datatable')->name('client.debts.datatable.data');
    Route::get('delete-client-debts', 'ClientDebtsController@destroy');
    Route::post('store-client-debts', 'ClientDebtsController@store');
    Route::get('edit-client-debts/{id}', 'ClientDebtsController@edit');
    Route::post('update-client-debts', 'ClientDebtsController@update');
    Route::get('add-client-debts-button/{parent_id}', 'ClientDebtsController@button');


//payment
    Route::get('client_payment_datatable/{parent_id}', 'ClientPaymentController@datatable')->name('client.payment.datatable.data');
    Route::get('delete-client-payment', 'ClientPaymentController@destroy');
    Route::post('store-client-payment', 'ClientPaymentController@store');
    Route::get('edit-client-payment/{id}', 'ClientPaymentController@edit');
    Route::post('update-client-payment', 'ClientPaymentController@update');
    Route::get('add-client-payment-button/{parent_id}', 'ClientPaymentController@button');



//notification
    Route::get('client_notification_datatable/{parent_id}', 'ClientNotificationController@datatable')->name('client.notification.datatable.data');
    Route::get('delete-client-notification', 'ClientNotificationController@destroy');
    Route::post('store-client-notification', 'ClientNotificationController@store');
    Route::get('edit-client-notification/{id}', 'ClientNotificationController@edit');
    Route::post('update-client-notification', 'ClientNotificationController@update');
    Route::get('add-client-notification-button/{parent_id}', 'ClientNotificationController@button');


    Route::resource('roles', 'RoleController');
    Route::get('/roles/edit/{id}', 'RoleController@edit')->name('roles.edit');
    Route::post('/roles/update_permission/{id}', 'RoleController@update')->name('roles.update_permission');
    Route::post('/roles/store', 'RoleController@store')->name('roles.store');
    Route::post('/role/delete', 'RoleController@destroy')->name('roles.delete_role');
});



