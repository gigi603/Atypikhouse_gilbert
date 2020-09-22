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

use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

Route::get('/robots.txt', function() {
    $robots = new \Robots\Robots;
    // If on the live server, serve a nice, welcoming robots.txt.
    if (App::environment() == 'local' || App::environment() == 'production') {
        $robots->addUserAgent('*');
        $robots->addAllow('/');
        $robots->addAllow('/houses');
        $robots->addAllow('/register');
        $robots->addAllow('/login');
        $robots->addAllow('/apropos');
        $robots->addAllow('/mentions_legales');
        $robots->addAllow('/faq');
        $robots->addAllow('/politique_de_confidentialite');
        $robots->addAllow('/cgu');
        $robots->addAllow('/rgpd');
        $robots->addAllow('/faq');
        //$robots->addDisallow('/admin');
        $robots->addDisallow('/user');
        $robots->addSitemap('sitemap.xml');
    }
    else {
        // If you're on any other server, tell everyone to go away.
        $robots->addDisallow('*');
    }
    return response($robots->generate(), 200)->header('Content-Type', 'text/plain');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('sitemap', function () {
    SitemapGenerator::create('http://127.0.0.1:8000/')
    ->getSitemap()
    ->add(Url::create('http://127.0.0.1:8000/register')->setPriority(0.5))
    ->add(Url::create('http://127.0.0.1:8000/login')->setPriority(0.5))
    ->add(Url::create('http://127.0.0.1:8000/faq')->setPriority(0.5))
    ->add(Url::create('http://127.0.0.1:8000/houses')->setPriority(0.5))
    ->add(Url::create('http://127.0.0.1:8000/apropos')->setPriority(0.5))
    ->add(Url::create('http://127.0.0.1:8000/mentions_legales')->setPriority(0.5))
    ->add(Url::create('http://127.0.0.1:8000/politique_de_confidentialite')->setPriority(0.5))
    ->add(Url::create('http://127.0.0.1:8000/cgu')->setPriority(0.5))
    ->writeToFile('public/sitemap.xml');
    return 'sitemap created';
});
Route::get('/houses', 'HousesController@index')->name('houses');
Route::get('/register', 'RegistersController@create');
Route::post('/register', 'RegistersController@register');
Route::get('/users/confirmation{email_token}', 'Auth\RegisterController@confirmation');
Route::post('/login', 'Auth/LoginController@login');
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

Route::get('/user/showHouse/{id}', 'UsersController@showHouse')->name('user.showHouse');
Route::get('/user/showhebergement/{id}', 'UsersController@showhebergements')->name('user.showhebergements');

Route::get('/apropos', 'HomeController@apropos')->name('apropos');
Route::get('/mentions_legales', 'HomeController@mentions_legales')->name('mentions_legales');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/politique_de_confidentialite', 'HomeController@politique_de_confidentialite')->name('politique_de_confidentialite');
Route::get('/cgu', 'HomeController@cgu')->name('cgu');
Route::get('/cgv', 'HomeController@cgv')->name('cgv');
Route::get('/sendmail', 'Auth\RegisterController@sendmail')->name('user.sendmail');

// admin route for our multi-auth system
Route::get('/search', 'QueryController@index');

//Gestion de l'admin
Route::prefix('admin')->group(function () {
    Route::get('/home', 'HomeController@index')->name('admin.home');
    //Liste des utilisateurs 
    Route::get('/index', 'AdminController@listusers')->name('admin.listusers');

    //Liste des annonces
    Route::get('/allannonces', 'AdminController@allannonces')->name('admin.allannonces');

    //Liste des reservations
    Route::get('/allreservations', 'AdminController@allreservations')->name('admin.allreservations');

    //Liste des historiques de reservations passées
    Route::get('/allhistoriques', 'AdminController@allhistoriques')->name('admin.allhistoriques');

    //Liste des reservations annulées
    Route::get('/allreservationscancel', 'AdminController@allreservationscancel')->name('admin.allreservationscancel');

    //Détails de la réservation annulée
    Route::get('/showreservationscancel/{id}', 'AdminController@showreservationscancel')->name('admin.showreservationscancel');

    //Commentaires de l'utilisateur
    Route::get('/listcomments/{id}', 'AdminController@listcomments')->name('admin.listcomments');
    Route::get('/comments/deleteComment/{id}', 'AdminController@deleteComment')->name('admin.deleteComment');
    
    //Commentaire admin
    Route::post('/addComment', 'AdminController@addComment')->name('admin.addComment');

    //Liste des réservations de l'utilisateur
    Route::get('/listreservations/{id}', 'AdminController@listreservations')->name('admin.listreservations');

    //Vue de détails de la reservation de l'utilisateur
    Route::get('/showreservations/{id}', 'AdminController@showreservations')->name('admin.showreservations');

    //Liste des réservations passées de l'utilisateur
    Route::get('/listhistoriques/{id}', 'AdminController@listhistoriques')->name('admin.listhistoriques');

    //Vue de détails de l'historique de l'utilisateur
    Route::get('/showhistoriques/{id}', 'AdminController@showhistoriques')->name('admin.showhistoriques');

    //Liste des réservations passées de l'utilisateur
    Route::get('/listreservationscancel/{id}', 'AdminController@listreservationscancel')->name('admin.listreservationscancel');

    //Vue de détails de l'historique de l'utilisateur
    Route::get('/showreservationscancel/{id}', 'AdminController@showreservationscancel')->name('admin.showreservationscancel');

    //Liste des annonces de l'utilisateur
    Route::get('/listannonces/{id}', 'AdminController@listannonces')->name('admin.listannonces');
    //Route::get('/delete/annonce/{id}', 'AdminController@disableAnnonce')->name('admin.disableAnnonce');

    //Vue de détails de l'annonce de l'utilisateur
    Route::get('/showannonces/{id}', 'AdminController@showannonces')->name('admin.showannonces');

    //Liste des messages des clients
    Route::get('/messages', 'AdminController@listposts')->name('admin.messages');
    Route::get('/showmessages/{id}', 'AdminController@showposts')->name('admin.showmessages');

    //Liste des notifications lors d'une inscription d'un utilisateur
    Route::get('/messages_user', 'AdminController@listpostsuser')->name('admin.messages_user');
    Route::get('/showmessages_user/{id}', 'AdminController@showpostsuser')->name('admin.showmessages_user');

    //Liste des notifications lors d'une nouvelle annonce
    Route::get('/messages_annonce', 'AdminController@listpostsannonce')->name('admin.listpostsannonce');
    Route::get('/showmessages_annonce/{id}', 'AdminController@showpostsannonce')->name('admin.showmessages_annonce');

    //Liste des notifications lors d'une nouvelle annonce
    Route::get('/messages_reservation', 'AdminController@listpostsreservation')->name('admin.listpostsreservation');
    Route::get('/showmessages_reservation/{id}', 'AdminController@showpostsreservation')->name('admin.showmessages_reservation');
    
    //Liste des messages de l'admin à l'utilisateur
    Route::get('/user_messages/{id}', 'AdminController@messages')->name('admin.user_messages');

    // Mettre les notifications comme lues
    // Route::get('markAsRead', function(){
    //     auth()->user()->unreadNotifications->markAsRead();
    // });
    //Message de l'admin à l'utilisateur
    Route::post('/addMessage/{id}', 'AdminController@addMessage')->name('admin.addMessage');

    //Connexion et déconnexion
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

    //Profil de l'utilisateur
    Route::get('/profile/{id}', 'AdminController@profilUser')->name('admin.user');
    Route::post('/profile/{id}', 'UsersController@edit')->name('user.edit');
    Route::get('/delete/user/{id}', 'AdminController@deleteUser')->name('admin.deleteUser');

    //Gestion des hébergement
    Route::get('/house/editHouse/{id}', 'AdminController@editHouse')->name('admin.editHouse');
    Route::post('/house/updateHouse/{id}', 'AdminController@updateHouse')->name('admin.updateHouse');
    //Route::post('/house/statutHouse/{id}', 'AdminController@statutHouse')->name('admin.statutHouse');
    Route::get('/house/valideHouse/{id}', 'AdminController@valideHouse')->name('admin.valideHouse');
    Route::get('/house/refuseHouse/{id}', 'AdminController@refuseHouse')->name('admin.refuseHouse');
    Route::get('/houses/deleteHouse/{id}', 'AdminController@disableHouse')->name('admin.disableHouse');
    
    //Liste des catégories
    Route::get('/categories', 'AdminController@listcategories')->name('admin.categories');
    Route::get('/create/categorie', 'AdminController@createcategory')->name('admin.create_category');
    Route::post('/register/categorie', 'AdminController@registercategory')->name('admin.register_category');
    Route::get('/enable/categorie/{id}', 'AdminController@enableCategory')->name('admin.enable_category');
    Route::get('/disable/categorie/{id}', 'AdminController@disableCategory')->name('admin.disable_category');

    //Activer Désactiver compte utilisateur
    Route::get('/disable/user/{id}', 'AdminController@disableUser')->name('admin.disable_user');
    Route::get('/activate/user/{id}', 'AdminController@activateUser')->name('admin.activate_user');

    //Propriétés de la catégorie
    Route::get('/proprietes/{id}', 'AdminController@proprietescategory')->name('admin.proprietes_category');
    Route::get('/create/propriete/{id}', 'AdminController@createpropriete')->name('admin.create_propriete');
    Route::post('/register/propriete', 'AdminController@registerpropriete')->name('admin.register_propriete');
    Route::get('/delete/propriete/{id}', 'AdminController@deletepropriete')->name('admin.delete_propriete');

    //admin password reset routes
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset'); 
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    //Admin proprietes
    Route::post('/proprietes/store','AdminController@createproprietes');

    Route::get('/json_propriete/{id}/{category}', 'AdminController@json_propriete')->name('admin.json.proprietes');
 });

Route::middleware(['auth'])->group( function () {
    Route::get('/profile/{id}', 'UsersController@profile');
    Route::get('/messages', 'MessagesController@messages')->name('user.messages');

    //Create a house, publish an offer
    Route::get('/house/create_step1', 'HousesController@create_step1')->name('house.create_step1');
    Route::post('/house/postcreate_step1', 'HousesController@postcreate_step1')->name('house.postcreate_step1');
    Route::get('/house/create_step2', 'HousesController@create_step2')->name('house.create_step2');
    Route::post('/house/postcreate_step2', 'HousesController@postcreate_step2')->name('house.postcreate_step2');
    Route::get('/house/create_step3', 'HousesController@create_step3')->name('house.create_step3');
    Route::post('/house/postcreate_step3', 'HousesController@postcreate_step3')->name('house.postcreate_step3');
    Route::get('/house/create_step4', 'HousesController@create_step4')->name('house.create_step4');
    Route::post('/house/postcreate_step4', 'HousesController@postcreate_step4')->name('house.postcreate_step4');
    Route::get('/house/create_step5', 'HousesController@create_step5')->name('house.create_step5');
    Route::post('/house/postcreate_step5', 'HousesController@postcreate_step5')->name('house.postcreate_step5');
    Route::get('/house/confirmation_create_house', 'HousesController@confirmation_create_house')->name('house.confirmation_create_house');

    
    //User houses
    Route::get('/user/houses', 'UsersController@houses')->name('user.houses');
    Route::get('/user/editHouse/{id}', 'UsersController@editHouse')->name('user.editHouse');
    Route::post('/users/updateHouse/{id}', 'UsersController@updateHouse')->name('user.updateHouse');
    Route::get('/users/deleteHouse/{id}', 'UsersController@deleteHouse')->name('user.deleteHouse');
    Route::post('/houses/store/{id}', 'HousesController@store');
    Route::get('/json_propriete/{id}/{category}', 'HousesController@json_propriete')->name('json.proprietes');
    Route::post('/reservations', 'ReservationsController@store');
    Route::get('/user/cancelreservation/{id}', 'UsersController@cancelreservation')->name('user.cancelreservation');
    Route::post('/comments', 'CommentsController@index');
    Route::post('note', 'HousesController@note');
    //Route::get('/houses/update/{id}', 'HousesController@update');
    Route::get('/list-users', 'UsersController@list');

    //User reservations
    Route::get('/user/reservations', 'UsersController@reservations')->name('user.reservations');

    //Vue de détails de la reservation de l'utilisateur
    Route::get('/showreservations/{id}', 'UsersController@showreservations')->name('user.showreservations');

    //User historiques
    Route::get('/user/historiques', 'UsersController@historiques')->name('user.historiques');

    //Vue de détails de l'historique de l'utilisateur
    Route::get('/showhistoriques/{id}', 'UsersController@showhistoriques')->name('user.showhistoriques');

    //User reservations annulées
    Route::get('/user/reservationsannulees', 'UsersController@reservationsannulees')->name('user.reservationsannulees');

    //Vue de détails de la reservation annulée de l'utilisateur
    Route::get('/showreservationsannulees/{id}', 'UsersController@showreservationsannulees')->name('user.showreservationsannulees');

    //Vue formulaire de contact
    // Route::resource('posts', 'PostsController' , ['only' => ['contact', 'sendMessage']]);
    Route::get('/contact', 'PostsController@contact')->name('user.contact');
    Route::post('/sendMessage', 'PostsController@sendMessage')->name('user.sendMessage');

});

Route::post('/create',    'UserController@create');
Route::get('/user/{id}',  'UserController@get');
Route::get('/users/confirmation{email_token}', 'Auth\RegisterController@confirmation');
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
Auth::routes();

// Paiement Stripe
Route::get('addmoney/stripe', array('as' => 'addmoney.paywithstripe','uses' => 'ReservationsController@payWithStripe'));
Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'ReservationsController@postPaymentWithStripe'));
Route::get('/confirmpaymentStripe', array('as' => 'addmoney.confirmpayment','uses' => 'ReservationsController@confirmpaymentStripe'));

