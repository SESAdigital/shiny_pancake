<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Estate\AccessController;
use App\Http\Controllers\Estate\AdvertController;
use App\Http\Controllers\Estate\ArtisanCategoryController;
use App\Http\Controllers\Estate\ArtisanController;
use App\Http\Controllers\Estate\ArtisanGroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Estate\EstateController;
use App\Http\Controllers\Estate\EstateStaffController;
use App\Http\Controllers\Estate\HouseHoldController;
use App\Http\Controllers\Estate\PropertyCategoryController;
use App\Http\Controllers\Estate\PropertyController;
use App\Http\Controllers\Estate\PropertyTypeController;
use App\Http\Controllers\Estate\RFIDController;
use App\Http\Controllers\User\ManagerController;
// use App\Http\Controllers\User\ResidentController;
use App\Http\Controllers\Estate\SecurityController;
use App\Http\Controllers\Estate\SecurityGuardController;
use App\Http\Controllers\Estate\SiteWorkerController;
use App\Http\Controllers\Estate\PaymentController;
use App\Http\Controllers\User\UserController;
// use App\Http\Controllers\User\VerificationController;
use App\Http\Controllers\User\VerifyANDLoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });









/* 
|Below is the route for residents user login,
| 
| resident user creation, removing a resident,
| 
| and creating and updating an estates as well
|
| middlewares are put on some of the route to ensure
|
| that only auhtenticated and authorize users are permited to perform the actions
*/



//login route for resident user
// Route::post('/loginResident', [ResidentController::class, 'loginResident']);

Route::get('/date/{id}', [PaymentController::class, 'date']);


// Route::get('/otp/login', [VerificationController::class, 'login']);
Route::post('/generateOTP', [VerifyANDLoginController::class, 'sendOtp']);
Route::post('/loginUser', [VerifyANDLoginController::class, 'loginUser']);




//this route the resident user has to login to access this route
Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/personalInfo', [VerifyANDLoginController::class, 'personalInfo']);
    Route::post('/userLogout', [VerifyANDLoginController::class, 'userLogout']);
});





//this route is for the admin and manager to perform the actions

Route::group(['middleware' => 'admin_manager'], function () {

    Route::post('/createUser', [UserController::class, 'registerUser']);
    Route::get('/user/{id}', [UserController::class, 'user']);
    Route::get('/users', [UserController::class, 'users']);
    Route::put('/upDateUser/{id}', [UserController::class, 'upDateUser']);
    Route::delete('/removeUser/{id}', [UserController::class, 'removeUser']);




    Route::post('/createEstate', [EstateController::class, 'createEstates']);
    Route::get('/estates', [EstateController::class, 'estates']);
    Route::get('/estate/{id}', [EstateController::class, 'estate']);
    Route::put('/upDateEstate/{id}', [EstateController::class, 'upDateEstate']);
    Route::delete('/removeEstate/{id}', [EstateController::class, 'removeEstate']);
    Route::get('/searchEstate', [EstateController::class, 'search']);
    Route::post('/attachSecurityComp/{id}', [EstateController::class, 'attachSecurityComp']);
    Route::post('/attachSecurityGuard/{id}', [EstateController::class, 'attachSecurityGuard']);




    Route::get('/securityComps', [SecurityController::class, 'securityComps']);
    Route::get('/securityComp/{id}', [SecurityController::class, 'securityComp']);
    Route::post('/makeSecurityComp', [SecurityController::class, 'makeSecurityComp']);
    Route::put('/upDateSecurityComp/{id}', [SecurityController::class, 'upDateSecurityComp']);
    Route::delete('/removeSecurityComp/{id}', [SecurityController::class, 'removeSecurityComp']);



    Route::get('/properties', [PropertyController::class, 'properties']);
    Route::get('/property/{id}', [PropertyController::class, 'property']);
    Route::post('/makeProperty', [PropertyController::class, 'makeProperty']);
    Route::put('/upDateProperty/{id}', [PropertyController::class, 'upDateProperty']);
    Route::delete('/deleteProperty/{id}', [PropertyController::class, 'deleteProperty']);
    Route::get('/searchProperty', [PropertyController::class, 'search']);


    Route::get('/houseHolds', [HouseHoldController::class, 'houseHolds']);
    Route::get('/houseHold/{id}', [HouseHoldController::class, 'houseHold']);
    Route::post('/makeHouseHold', [HouseHoldController::class, 'makeHouseHold']);
    Route::put('/upDateHouseHold/{id}', [HouseHoldController::class, 'upDateHouseHold']);
    Route::delete('/deleteHouseHold/{id}', [HouseHoldController::class, 'deleteHouseHold']);



    Route::get('/accessCards', [AccessController::class, 'accessCards']);
    Route::get('/accessCard/{id}', [AccessController::class, 'accessCard']);
    Route::post('/makeAccessCard', [AccessController::class, 'makeAccessCard']);
    Route::put('/upDateAccesCard/{id}', [AccessController::class, 'upDateHouseHold']);
    Route::delete('/deleteAccessCard/{id}', [AccessController::class, 'deleteHouseHold']);



    Route::get('/RFIDs', [RFIDController::class, 'RFIDs']);
    Route::get('/RFID/{id}', [RFIDController::class, 'RFID']);
    Route::post('/makeRFID', [RFIDController::class, 'makeRFID']);
    Route::put('/upDateRFID/{id}', [RFIDController::class, 'upDateRFID']);
    Route::delete('/deleteRFID/{id}', [RFIDController::class, 'deleteRFID']);



    Route::get('/artisanCats', [ArtisanCategoryController::class, 'artisanCats']);
    Route::get('/artisanCat/{id}', [ArtisanCategoryController::class, 'ArtisanCat']);
    Route::post('/makeArtisanCat', [ArtisanCategoryController::class, 'makeArtisanCat']);
    Route::put('/upDateArtisanCat/{id}', [ArtisanCategoryController::class, 'upDateArtisanCat']);
    Route::delete('/removeArtisanCat/{id}', [ArtisanCategoryController::class, 'removeArtisanCat']);



    Route::get('/artisans', [ArtisanController::class, 'artisans']);
    Route::get('/artisan/{id}', [ArtisanController::class, 'artisan']);
    Route::post('/makeArtisan', [ArtisanController::class, 'makeArtisan']);
    Route::put('/upDateArtisan/{id}', [ArtisanController::class, 'upDateArtisan']);
    Route::delete('/removeArtisan/{id}', [ArtisanController::class, 'removeArtisan']);



    Route::get('/artisanGroups', [ArtisanGroupController::class, 'artisanGroups']);
    Route::get('/artisanGroup/{id}', [ArtisanGroupController::class, 'artisanGroup']);
    Route::post('/makeArtisanGroup', [ArtisanGroupController::class, 'makeArtisanGroup']);
    Route::put('/upDateArtisanGroup/{id}', [ArtisanGroupController::class, 'upDateArtisanGroup']);
    Route::delete('/removeArtisanGroup/{id}', [ArtisanGroupController::class, 'removeArtisanGroup']);


    Route::get('/adverts', [AdvertController::class, 'adverts']);
    Route::get('/advert/{id}', [AdvertController::class, 'advert']);
    Route::post('/makeAdvert', [AdvertController::class, 'makeAdvert']);
    Route::put('/upDateAdvert/{id}', [AdvertController::class, 'upDateAdvert']);
    Route::delete('/removeAdvert/{id}', [AdvertController::class, 'removeAdvert']);


    Route::get('/estateStaffs', [EstateStaffController::class, 'estateStaffs']);
    Route::get('/estateStaff/{id}', [EstateStaffController::class, 'estateStaff']);
    Route::post('/makeEstateStaffs', [EstateStaffController::class, 'makeEstateStaffs']);
    Route::put('/upDateEstateStaff/{id}', [EstateStaffController::class, 'upDateEstateStaff']);
    Route::delete('/removeEstateStaff/{id}', [EstateStaffController::class, 'removeEstateStaff']);


    Route::get('/siteWorkers', [SiteWorkerController::class, 'siteWorkers']);
    Route::get('/siteWorker/{id}', [SiteWorkerController::class, 'siteWorker']);
    Route::post('/makeSiteWorker', [SiteWorkerController::class, 'makeSiteWorkers']);
    Route::put('/upDateSiteWorker/{id}', [SiteWorkerController::class, 'upDateSiteWorker']);
    Route::delete('/removeSiteWorker/{id}', [SiteWorkerController::class, 'removeSiteWorker']);


    Route::get('/securityGuards', [SecurityGuardController::class, 'securityGuards']);
    Route::get('/securityGuard/{id}', [SecurityGuardController::class, 'securityGuard']);
    Route::post('/makeSecurityGuard', [SecurityGuardController::class, 'makeSecurityGuard']);
    Route::put('/upDateSecurityGuard/{id}', [SecurityGuardController::class, 'upDateSecurityGuard']);
    Route::delete('/removeSecurityGuard/{id}', [SecurityGuardController::class, 'removeSecurityGuard']);


    Route::get('/payments', [PaymentController::class, 'Payments']);
    Route::get('/payment/{id}', [PaymentController::class, 'Payment']);
    // Route::post('/makePayment', [PaymentController::class, 'makePayment']);
    Route::put('/upDatePayment/{id}', [PaymentController::class, 'upDatePayment']);
    Route::delete('/removePayment/{id}', [PaymentController::class, 'removePayment']);


});


Route::post('/makePayment', [PaymentController::class, 'makePayment']);


/**
 *
 *
 *This routes below are for the managers, the admin creating, deleting, updating the managers,
 *
 *The manager login in, and login out, checking his profile
 *
 *
 */

//login route for manager user
Route::post('/loginManager', [ManagerController::class, 'loginManagers']);


/***
 *
 *this route the manager has to use token, that the manager must have

  logged in and gotten the token to access this route
 *

 */

Route::group(['middleware' => 'auth:manager'], function () {

    Route::post('/managerLogout', [ManagerController::class, 'managerlogout']);
    Route::get('/personalManagerInfo', [ManagerController::class, 'personalManagerInfo']);
});











//login route for admin user
Route::post('/adminLogin', [AuthController::class, 'adminlogin']);



//this route is for the admin  to perform the actions
Route::group(['middleware' => 'auth:admin'], function () {

    Route::post('/createManager', [ManagerController::class, 'registerManagers']);
    Route::get('/managers', [ManagerController::class, 'managers']);
    Route::get('/manager/{id}', [ManagerController::class, 'manager']);
    Route::put('/upDateManager/{id}', [ManagerController::class, 'upDateManager']);
    Route::delete('removeManager/{id}', [ManagerController::class, 'removeManager']);
    Route::get('/searchManager', [ManagerController::class, 'search']);




    Route::get('/propertyTypes', [PropertyTypeController::class, 'propertyTypes']);
    Route::get('/propertyType/{id}', [PropertyTypeController::class, 'propertyType']);
    Route::post('/makePropertyType', [PropertyTypeController::class, 'makePropertyType']);
    Route::put('/upDatePropertyType/{id}', [PropertyTypeController::class, 'upDatePropertyType']);
    Route::delete('/deletePropertyType/{id}', [PropertyTypeController::class, 'deletePropertyType']);



    Route::get('/propertyCategories', [PropertyCategoryController::class, 'propertyCategories']);
    Route::get('/propertyCategory/{id}', [PropertyCategoryController::class, 'propertyCategory']);
    Route::post('/makePropertyCategory', [PropertyCategoryController::class, 'makePropertyCategory']);
    Route::put('/upDatePropertyCategory/{id}', [PropertyCategoryController::class, 'upDatePropertyCategory']);
    Route::delete('/deletePropertyCategory/{id}', [PropertyCategoryController::class, 'deletePropertyCategory']);
});



Route::post('/stripePayment', [Stripe::class, 'handlePost']);



Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact SesaDigital'], 404);
});