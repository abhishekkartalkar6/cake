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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin'] = 'Welcome/admin';
$route['dashboard'] = 'welcome/dashboard';
$route['product'] = 'products/product';
$route['final_product/(:any)'] = 'products/final_product/$1';
$route['product_datatable'] = 'products/fetch_products';
$route['add_cat'] = 'products/add_category';
$route['edit_cat/(:any)'] = 'products/edit_cat/$1';
$route['update_cat'] = 'products/update_cat';
$route['delete_cat/(:any)'] = 'products/delete_cat/$1';
$route['edit_product/(:any)'] = 'products/edit_product/$1';
$route['suggetion'] = 'products/suggestion';
$route['categories'] = 'welcome/all_cats';
$route['products'] = 'welcome/all_products';
$route['abhi/(:any)'] = 'products/abhi/$1';
// $route['products/(:any)'] = 'welcome/all_products';
// $route['products/$1/(:any)'] = 'welcome/all_products';
$route['banner'] = 'products/banner';
$route['add_banner'] = 'products/add_banner';
$route['delete_banner/(:any)'] = 'products/delete_banner/$1';
$route['product_update'] = 'products/product_edit';
$route['csv'] = 'products/product_csv';
$route['add_csv'] = 'products/upload_csv';
$route["products/(:any)/(:num)"]="welcome/get_cat_sub_cat/$1/$2";
$route["products/(:any)"]="welcome/get_category/$1";
$route["all_cakes"]="welcome/all_cakes";
