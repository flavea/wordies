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
$route['default_controller'] = 'master/index';
$route['types'] = 'master/types';
$route['ratings'] = 'master/ratings';
$route['genres'] = 'master/genres';
$route['authors'] = 'master/authors';
$route['author/(:any)'] = 'profile/index/$1';
$route['author/(:any)/followers'] = 'profile/followers/$1';
$route['author/(:any)/following'] = 'profile/following/$1';
$route['author/(:any)/recommendations'] = 'profile/recommendations/$1';
$route['author/(:any)/subscriptions'] = 'profile/subscriptions/$1';
$route['author/(:any)/comments'] = 'profile/comments/$1';
$route['story/(:any)'] = 'stories/story/$1';
$route['story/(:any)/(:any)'] = 'stories/story/$1/$2';
$route['comment/(:any)'] = 'comment/$1';
$route['comment/(:any)'] = 'comment/$1';
$route['manage/(:any)'] = 'dashboard/story/$1';
$route['manage/(:any)/edit'] = 'dashboard/edit_story/$1';
$route['chapter/(:any)'] = 'dashboard/chapter/$1';
$route['character/(:any)'] = 'dashboard/character/$1';
$route['relationship/(:any)'] = 'dashboard/relation/$1';
$route['resource/(:any)'] = 'dashboard/update_resource/$1';
$route['section/(:any)'] = 'dashboard/section/$1';
$route['message/(:any)'] = 'messages/message/$1';
$route['new_message/(:any)'] = 'messages/new_message/$1';