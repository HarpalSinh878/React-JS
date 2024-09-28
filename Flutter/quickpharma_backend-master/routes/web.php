<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RouteNamesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\FeedbacksController;
use App\Http\Controllers\HubsController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\OrderTypeController;
use App\Http\Controllers\QaqcController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\RouteTimeLineController;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TechSupportController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DriversApplyController;
use App\Http\Controllers\AddressTesterController;
use App\Http\Controllers\DispatcherController;
use App\Http\Controllers\DriverController;

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

Route::get('/clear_cache', function () {
    Artisan::call('optimize:clear');
    return redirect()->back();
});
// Route::get('/', [HomeController::class, 'index']);

Route::get('/migrate-refresh', function () {
    Artisan::call('migrate:refresh --path=/database/migrations/2023_01_13_070155_add_order_sequence_to_orders.php');
    Artisan::call('migrate:refresh --path=/database/migrations/2023_01_20_053354_add_regions_id_to_orders.php');
    Artisan::call('migrate:refresh --path=/database/migrations/2023_02_01_050231_add_payout_to_orders.php');
    // Artisan::call('migrate:refresh --path=/database/migrations/2022_12_14_051831_create_orders_activity.php');
    // Artisan::call('migrate:refresh --path=/database/migrations/2022_12_06_111106_create_orders_document.php');
    // Artisan::call('migrate:refresh --path=/database/migrations/2022_12_14_051831_create_orders_activity.php');
    // Artisan::call('migrate:refresh --path=/database/migrations/2022_12_23_084538_create_regions.php');
    // Artisan::call('migrate:refresh --path=/database/migrations/2022_12_03_044307_create_prescriptions_no.php');
    return redirect()->back();
});

Route::get('/migrate', function () {
    Artisan::call('migrate');
    return redirect()->back();
});

Route::get('/migrate-fresh', function () {
    Artisan::call('migrate:fresh');
    return redirect()->back();
});
Auth::routes();


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});
Route::post('register/store', [RegisterController::class, 'register']);

Route::get('privacypolicy', [HomeController::class, 'privacy_policy']);
Route::get('contactus', [HomeController::class, 'contact_us']);

Route::middleware(['auth', 'checklogin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    ///// START ROUTE :: SETTING ///////
    // Route::get('about-us', [SettingController::class, 'index']);
    Route::get('privacy-policy', [SettingController::class, 'index']);
    Route::get('terms-conditions', [SettingController::class, 'index']);
    Route::get('system-settings', [SettingController::class, 'index']);
    Route::post('settings', [SettingController::class, 'settings']);
    Route::post('set_settings', [SettingController::class, 'system_settings']);
    ///// END ROUTE :: SETTING ///////


    ///// START ROUTE :: USER ///////
    Route::resource('user', UserController::class); //('user', [UserController::class, 'index']);
    Route::get('userList', [UserController::class, 'userList']);
    Route::post('users-update', [UserController::class, 'update'])->name('update.users');
    Route::post('users-reset-password', [UserController::class, 'resetpassword'])->name('reset-user-password');
    Route::post('user-status', [UserController::class, 'updateStatus'])->name('user.status');
    Route::get('user-statistics', [UserController::class, 'userstatistics'])->name('user.statistics');
    Route::post('multi-user-status', [UserController::class, 'updateMultipleStatus'])->name('user.multistatus');
    ///// END ROUTE :: USER ///////


    ///// START ROUTE :: Client ///////
    Route::resource('client', ClientController::class); //('user', [ClientController::class, 'index']);
    Route::get('clientList', [ClientController::class, 'clientList']);
    Route::post('client-update', [ClientController::class, 'update'])->name('update.client');
    Route::post('client-reset-password', [ClientController::class, 'resetpassword'])->name('reset-client-password');
    Route::post('client-status', [ClientController::class, 'updateStatus'])->name('client.status');
    Route::get('client-statistics', [ClientController::class, 'clientstatistics'])->name('client.statistics');
    Route::post('multi-client-status', [ClientController::class, 'updateMultipleStatus'])->name('client.multistatus');
    Route::get('editclient/{client_id}', [ClientController::class, 'editclient']);
    ///// END ROUTE :: Client ///////


    ///// START ROUTE :: DRIVER ///////
    Route::resource('driver', DriverController::class); //('user', [UserController::class, 'index']);
    Route::get('driverList', [DriverController::class, 'driverList']);
    Route::post('drivers-update', [DriverController::class, 'update'])->name('update.drivers');
    Route::post('drivers-reset-password', [DriverController::class, 'resetpassword'])->name('reset-driver-password');
    Route::post('driver-status', [DriverController::class, 'updateStatus'])->name('driver.status');
    Route::get('driver-statistics', [DriverController::class, 'driverstatistics'])->name('driver.statistics');
    Route::post('multi-driver-status', [DriverController::class, 'updateMultipleStatus'])->name('driver.multistatus');
    Route::get('getAllDriver', [DriverController::class, 'getAllDriver'])->name('driver.getalldriver');
    ///// END ROUTE :: Driver ///////

    ///// START ROUTE :: Driver-Apply ///////
    Route::resource('driversapply', DriversApplyController::class); //('user', [UserController::class, 'index']);
    Route::get('drivers-apply-list', [DriversApplyController::class, 'driverapplylist']);
    Route::post('drivers-apply-status', [DriversApplyController::class, 'updateStatus'])->name('drivers-apply.status');
    ///// END ROUTE :: Driver-Apply ///////


    // START :: OrdersController
    Route::resource('orders', OrdersController::class); //('orders', [OrdersController::class, 'index']);
    Route::get('orderList', [OrdersController::class, 'getAllOrderList']);
    Route::get('Order-Document', [OrdersController::class, 'getOrderDocument'])->name('getordersdocument');
    Route::post('SaveStatus', [OrdersController::class, 'saveStatus'])->name('SaveStatus');
    Route::post('saveMultipleStatus', [OrdersController::class, 'saveMultipleStatus'])->name('orders.multistatus');
    Route::post('DriverNote', [OrdersController::class, 'driverNote'])->name('DriverNote');
    Route::get('QRCode', [OrdersController::class, 'orderQRcode'])->name('QRCode');
    Route::get('DeliverySlip', [OrdersController::class, 'deliveryslip'])->name('DeliverySlip');
    Route::get('Confirmation', [OrdersController::class, 'confirmation'])->name('Confirmation');
    Route::get('DeliverySlipAndConfirmation', [OrdersController::class, 'deliveryslipandconfirmation'])->name('deliveryslipandconfirmation');
    Route::get('getOrderStatusHistoryList', [OrdersController::class, 'getOrderStatusHistoryList']);
    Route::get('getOrderActivityHistoryList', [OrdersController::class, 'getOrderActivityHistoryList']);
    Route::get('getRecipientOrdersHistoryList', [OrdersController::class, 'getRecipientOrdersHistoryList']);
    Route::get('geteditdata', [OrdersController::class, 'geteditdata'])->name('orders.get-edit-data');
    Route::post('updateorderdetails', [OrdersController::class, 'updateorderdetails'])->name('orders.update');
    // END :: OrdersController
    
    
    Route::get('address-tester', [AddressTesterController::class, 'index'])->name('address-tester.index');
    Route::get('get-recipient', [AddressTesterController::class, 'recipientinfo'])->name('address-tester.recipient-info');



    ///// START ROUTE :: Tickets ///////
    Route::resource('tickets', TicketsController::class);
    Route::get('GetTicketsList', [TicketsController::class, 'getTicketList']);
    Route::post('save-tickets', [TicketsController::class, 'savetickets'])->name('savetickets');
    Route::post('saveTicketMultipleStatus', [TicketsController::class, 'saveMultipleStatus'])->name('tickets.multistatus');
    Route::get('tickets-statistics', [TicketsController::class, 'ticketsstatistics'])->name('tickets.statistics');
    ///// END ROUTE :: Tickets ///////


    // User


    //My account
    Route::resource('my-account', MyAccountController::class);

    // Feedbacks
    Route::get('feedbacks', [FeedbacksController::class, 'index']);

    //TechSupport
    Route::get('tech-support', [TechSupportController::class, 'index']);

    //Support
    Route::get('support', [SupportController::class, 'index']);

    //Scaner
    Route::resource('scanner', ScannerController::class);

    //Scan
    Route::get('scan', [ScanController::class, 'scan'])->name('index');

    //
    Route::post('checkLogin', [HomeController::class, 'checkLogin'])->name('checkLogin');

    Route::post('save-new-order-with-barcode', [HomeController::class, 'saveneworderwithbarcode'])->name('saveneworderwithbarcode');



    //// START :: Route Name
    Route::resource('route-names', RouteNamesController::class);

    Route::get('GetRouteNamesList', [RouteNamesController::class, 'getRouteNamesList']);
    Route::get('Route-QRCode-Code', [RouteNamesController::class, 'routeQRCode'])->name('routename.routeQRCode');
    Route::get('routeNames/{id}', [RouteNamesController::class, 'destroy'])->name('routenames.destroy');
    Route::post('routeNamesUpdate', [RouteNamesController::class, 'update'])->name('update.routenames');
    Route::post('removeAutoCreateSchedule', [RouteNamesController::class, 'removeAutoCreateSchedule'])->name('removeautocreateschedule');
    Route::post('pull-routes', [RouteNamesController::class, 'pullRoutes'])->name('pull_routes');
    //// END :: Route Name

    //// START :: Order Types
    Route::resource('order-type', OrderTypeController::class);
    Route::get('orderTypeList', [OrderTypeController::class, 'getOrderTypeList']);
    Route::get('orderType/{id}', [OrderTypeController::class, 'destroy'])->name('ordertype.destroy');
    Route::post('order-type-update', [OrderTypeController::class, 'update'])->name('update.ordertype');
    Route::post('pull-orders', [OrdersController::class, 'pullOrders'])->name('order.pull_orders');
    //// END :: Order Types


    //// START :: MAP
    Route::resource('map', MapController::class);
    Route::post('save-regions', [MapController::class, 'saveRegions'])->name('map.saveregions');
    Route::get('pull-regions', [MapController::class, 'pullRegions'])->name('map.pullregions');
    Route::get('get-regions', [MapController::class, 'getRegions'])->name('map.get_regions');
    Route::get('destroy-regions/{id}', [MapController::class, 'destroy'])->name('regions.destroy');
    Route::post('regions-update', [MapController::class, 'update'])->name('update.regions');

    Route::post('optimize-route', [MapController::class, 'saveOptimizeRoute'])->name('save.optimize-route');
    //// END :: MAP


    //// START :: QAQC Dashboard
    Route::resource('qaqc-dashboard', QaqcController::class);
    Route::get('getQaqcDashboardList', [QaqcController::class, 'getQaqcDashboardList']);
    //// START :: QAQC Dashboard


    //// START :: RouteTimeLine
    Route::resource('route-timeline', RouteTimeLineController::class);
    Route::get('get-route-timeline', [RouteTimeLineController::class, 'getRouteTimeline'])->name('route-timeline.fetch');;
    //// END :: RouteTimeLine

    //// START :: Routes
    Route::resource('routes', RouteController::class);
    Route::post('update-route-dispatcher', [RouteController::class, 'updateroute'])->name('update-route-dispatcher');
    Route::post('delete-region', [RouteController::class, 'deleteregion'])->name('region.delete');
    Route::get('get-region-orders', [RouteController::class, 'getregionorders'])->name('region.get-orders');
    Route::get('show-masked-photo', [RouteController::class, 'showmaskedphoto'])->name('show-masked-photo');
    Route::post('manage-masked-photo', [RouteController::class, 'managemaskedphoto'])->name('manage-masked-photo');
    Route::get('show-pickup-orders', [RouteController::class, 'showpickuporders'])->name('routes.show-pickup-orders');
    Route::post('create-pickup-order', [RouteController::class, 'createpickuporder'])->name('routes.create-pickup-order');
    //// END :: Routes


    //// START :: Hubs
    // Route::resource('hubs', HubsController::class);
    // Route::get('getHubList', [HubsController::class, 'getHubList']);
    // Route::get('destroy-hubs/{id}', [HubsController::class, 'destroy'])->name('destroy.hubs');
    // Route::post('hubs-update', [HubsController::class, 'update'])->name('update.hubs');
    // Route::post('hubs-coverage', [HubsController::class, 'coverage'])->name('create.coverage');
    // Route::get('get-hubs-coverage', [HubsController::class, 'pullCoverage'])->name('get.coverage');
    //// END :: Hubs


    ///// START ROUTE :: dispatcher ///////
    Route::resource('dispatcher', DispatcherController::class); //('user', [DispatcherController::class, 'index']);
    Route::get('dispatcherList', [DispatcherController::class, 'dispatcherList']);
    Route::post('dispatcher-update', [DispatcherController::class, 'update'])->name('update.dispatcher');
    Route::post('dispatcher-reset-password', [DispatcherController::class, 'resetpassword'])->name('reset-dispatcher-password');
    Route::post('dispatcher-status', [DispatcherController::class, 'updateStatus'])->name('dispatcher.status');
    Route::get('dispatcher-statistics', [DispatcherController::class, 'dispatcherstatistics'])->name('dispatcher.statistics');
    Route::post('multi-dispatcher-status', [DispatcherController::class, 'updateMultipleStatus'])->name('dispatcher.multistatus');
    ///// END ROUTE :: dispatcher ///////
});
