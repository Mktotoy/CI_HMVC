<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'User/Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['(?i)Question'] = 'admin/Question';
$route['(?i)Question/(:any)'] = 'admin/Question/$1';
$route['(?i)Question/(:any)/(:num)'] = 'admin/Question/$1/$2';

$route['(?i)Question_line'] = 'admin/Question_line';
$route['(?i)Question_line/(:any)'] = 'admin/Question_line/$1';
$route['(?i)Question_line/(:any)/(:num)'] = 'admin/Question_line/$1/$2';

$route['(?i)Createur'] = 'admin/Createur';
$route['(?i)Createur/(:any)'] = 'admin/Createur/$1';
$route['(?i)Createur/(:any)/(:num)'] = 'admin/Createur/$1/$2';

$route['(?i)Moderation'] = 'admin/Moderation';
$route['(?i)Moderation/(:any)'] = 'admin/Moderation/$1';
$route['(?i)Moderation/(:any)/(:num)'] = 'admin/Moderation/$1/$2';

$route['(?i)Categorie'] = 'admin/Categorie';
$route['(?i)Categorie/(:any)'] = 'admin/Categorie/$1';
$route['(?i)Categorie/(:any)/(:any)'] = 'admin/Categorie/$1/$2';

$route['(?i)Badge'] = 'badges/Badge';
$route['(?i)Badge/(:any)'] = 'badges/Badge/$1';
$route['(?i)Badge/(:any)/(:num)'] = 'badges/Badge/$1/$2';

$route['(?i)Video_Categorie'] = 'admin/Video_Categorie';
$route['(?i)Video_Categorie/(:any)'] = 'admin/Video_Categorie/$1';
$route['(?i)Video_Categorie/(:any)/(:num)'] = 'admin/Video_Categorie/$1/$2';

$route['(?i)User_userrole'] = 'admin/User_userrole';
$route['(?i)User_userrole/(:any)'] = 'admin/User_userrole/$1';
$route['(?i)User_userrole/(:any)/(:num)'] = 'admin/User_userrole/$1/$2';

$route['(?i)Channel'] = 'admin/Channel';
$route['(?i)Channel/(:any)'] = 'admin/Channel/$1';
$route['(?i)Channel/(:any)/(:any)'] = 'admin/Channel/$1/$2';

$route['(?i)Videos'] = 'admin/Videos';
$route['(?i)Videos/(:any)'] = 'admin/Videos/$1';
$route['(?i)Videos/(:any)/(:any)'] = 'admin/Videos/$1/$2';
