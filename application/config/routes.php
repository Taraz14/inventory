<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['0/pengaturan/email'] = 'dashboard/Settings/email';
$route['0/pengaturan/password'] = 'dashboard/Settings/resetPassword';

//berita admin
$route['0/berita'] = 'dashboard/Berita';
$route['0/input-berita'] = 'dashboard/Berita/create';
$route['0/delete-berita/(:any)'] = 'dashboard/Berita/deleteBerita/$1';

//galeri admin
$route['0/galeri'] = 'dashboard/Galeri';
$route['0/upload'] = 'dashboard/Galeri/upload';

//rekap admin
$route['0/rekap'] = 'dashboard/Rekap';
$route['0/detail-rekap/(:any)'] = 'dashboard/Rekap/detailRekap/$1';

//dashboard alumni
$route['1/dashboard'] = 'alumni/Dashboard';

//data alumni
$route['1/alumni'] = 'alumni/Alumni';

//profile alumni
$route['1/profile'] = 'alumni/profile';
$route['1/update-profile'] = 'alumni/profile/update';

//berita alumni
$route['1/berita'] = 'alumni/Berita';
$route['1/berita-detail/(:any)'] = 'alumni/Berita/beritaDetail/$1';

//galeri alumni
$route['1/galeri'] = 'alumni/Galeri';

//settings Alumni
$route['1/pengaturan'] = 'alumni/Settings';
// $route['1/pengaturan/email'] = 'alumni/Settings/email';
$route['1/pengaturan/password'] = 'alumni/Settings/resetPassword';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
