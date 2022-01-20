<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Authentication Routing ---- Removed


// -------------------- Frontpage -------------------- //
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('portofolio', 'Home::portofolio');
$routes->get('portofolio-details', 'Home::portofolio_details');
$routes->get('service', 'Home::service');
$routes->get('service-details', 'Home::service_details');
$routes->get('contact', 'Home::contact');
$routes->get('about', 'Home::about');

// // -------------------- Pengelola -------------------- //
// $routes->get('pengelola', 'Pengelola::index');

// $routes->get('pengelola-profile', 'Pengelola::profile');

// // User
// $routes->get('pengelola-user-pengelola', 'Pengelola::user_pengelola');
// $routes->get('pengelola-user-customerservice', 'Pengelola::user_customerservice');
// $routes->get('pengelola-user-designer', 'Pengelola::user_designer');
// $routes->get('pengelola-user-umkm', 'Pengelola::user_umkm');

// // Transaction
// $routes->get('pengelola-transaction', 'Pengelola::transaction');
// $routes->get('pengelola-transaction-details', 'Pengelola::transaction_details');

// // Portofolio Designer
// $routes->get('pengelola-portofolio-designer', 'Pengelola::portofolio_designer');
// $routes->get('pengelola-portofolio-designer-details', 'Pengelola::portofolio_designer_details');

// // Withdrawal
// $routes->get('pengelola-withdrawal', 'Pengelola::withdrawal');
// $routes->get('pengelola-withdrawal-details', 'Pengelola::withdrawal_details');

// // Kelola Frontpage
// $routes->get('pengelola-frontpage-home', 'Pengelola::frontpage_home');
// $routes->get('pengelola-frontpage-about', 'Pengelola::frontpage_about');
// $routes->get('pengelola-frontpage-contact', 'Pengelola::frontpage_contact');



// // -------------------- Designer -------------------- //
// $routes->get('designer', 'Designer::index');

// // Withdrawal
// $routes->get('designer-withdrawal', 'Designer::withdrawal');
// $routes->get('designer-withdrawal-details', 'Designer::withdrawal_details');


// // Testimonials
// $routes->get('designer-testimonials', 'Designer::testimonials');

// // Profile
// $routes->get('designer-profile', 'Designer::profile');

// // Job
// $routes->get('designer-job-list', 'Designer::job_list');
// $routes->get('designer-chat', 'Designer::chat_cs');


// // -------------------- Customer Service -------------------- //
// $routes->get('cs', 'Cs::index');
// $routes->get('cs-chat', 'Cs::chat');
// $routes->get('cs-designer-list', 'Cs::designer_list');
// $routes->get('cs-profile', 'Cs::profile');



/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
