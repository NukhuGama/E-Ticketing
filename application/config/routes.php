<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'login';
$route['404_override'] = '';
// $route['edit/:id']

// Request Role Accessibility
// =======================
$route['add_request_role'] = 'request_role/addRequest_role';
$route['edit_role_access'] = 'request_role/updateRequest_role';
$route['delete_request_role'] = 'request_role/deleteRequest_role';
$route['submit_request_role'] = 'request_role/submmitRequest_role';
$route['dApproval_reqRole'] =  'approval_r_role/detail_approval';

// Request Tools
// ========================
$route['add_request_tools'] = 'request_tools/addRequest_tools';
// Approval
$route['detail_approval'] = 'approval_r_tool/detail_approval';
$route['print_approval'] = 'print_approval';

// Edit Profile Employee
$route['edit_profile'] = 'employee/update_profile';


$route['history_role'] = 'history/add_role';
$route['history_tools'] = 'history/add_tools';


$route['translate_uri_dashes'] = FALSE;
