<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/Authentication/signIn';

//auth
$route['sign-out']      = 'auth/Authentication/signOut';

//userRegistration
$route['0/alumni'] = 'dashboard/Alumni';
$route['0/inputAlumni'] = 'dashboard/Alumni/create';
$route['0/update-alumni/(:any)'] = 'dashboard/Alumni/update/$1';
$route['0/delete-alumni/(:any)'] = 'dashboard/Alumni/deleteAlumni/$1';

//dashboard admin
$route['0/dashboard'] = 'dashboard/Dashboard';
$route['0/email/(:any)'] = 'dashboard/Email/index/$1';
$route['0/send-email'] = 'dashboard/Email/send';

//profile Admin
$route['0/profile'] = 'dashboard/Profile';
$route['0/update-profile'] = 'dashboard/Profile/update';

//settings admin
$route['0/pengaturan'] = 'dashboard/Settings';

//rekap admin
$route['0/rekap'] = 'dashboard/Rekap';

//berita admin
$route['0/berita'] = 'dashboard/Berita';


//dashboard alumni
$route['1/dashboard'] = 'alumni/Alumni';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
