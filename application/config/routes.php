<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/Authentication/signIn';

//auth
$route['sign-out']      = 'auth/Authentication/signOut';

//userRegistration
$route['0/alumni/add'] = 'dashboard/Alumni/create';
$route['0/data-alumni'] = 'dashboard/Alumni/dataAlumni';

//dashboard admin
$route['0/dashboard'] = 'dashboard/Dashboard';
$route['0/alumni'] = 'dashboard/Alumni';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
