<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');











$route['default_controller'] = "home";

$route["ajax"]	= "ajax";

$route['404_override'] 		 = 'erreur_404';
$route["timespend"]						= "home/timespend";

$route["en/privacy-policy"]				= "en/privacy";
$route["ar/privacy-policy"]				= "ar/privacy";

$route["unsubscribe"]					= "unsubscribe";
$route["ar/games"]						= "ar/home";

$route["ar/search"]						= "ar/home";
$route["ar/search/(:any)"]				= "ar/home/$1";
$route["en/search"]						= "en/home";
$route["en/search/(:any)"]				= "ar/home/$1";



$route["ar/games/(:any)"]				= "ar/home/$1";



$route["ar/games-category"]				= "ar/category";



$route['ar/games-category/(:any)']  	= 'ar/category/$1';

// $route["en/account/logout"]				= "en/account/logout";
$route["ar/account"]					= "ar/account";
$route["en/account"]					= "en/account";
$route["ar/account/logout"]					= "ar/account/logout";
$route["en/account/logout"]					= "en/account/logout";

 $route["ar/account/(:any)"]					= "ar/account/index/$1";
 $route["en/account/(:any)"]				= "en/account/index/$1";


$route["en/games"]						= "en/home";



$route["en/games/(:any)"]				= "en/home/$1";



$route["en/games-category"]				= "en/category";



$route['en/games-category/(:any)']  	= 'en/category/$1';

$route["en/gifts"]						= "en/gifts";
$route["ar/gifts"]						= "ar/gifts";
$route['en/gifts/(:any)']				= 'en/gifts/index/$1';
$route['ar/gifts/(:any)']				= 'ar/gifts/index/$1';

$route["en/card"]						= "en/card";
$route['en/card/(:any)']				= 'en/card/index/$1';

$route["ar/card"]						= "ar/card";
$route['ar/card/(:any)']				= 'ar/card/index/$1';

//$route['email']                         = 'Email_Controller';
