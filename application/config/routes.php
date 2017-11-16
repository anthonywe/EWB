<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// if the URL of home page of
// your project is not "http://localhost/"
// you should change Base_Url in config.php
//_________________________________________
// BaseURL = http://localhost/ci/

// http://localhost/ci/
// BaseURL + null
$route['default_controller'] = 'users/home';
$route['login'] = 'users/login';
$route['register'] = 'users/register';
$route['ngo_register'] = 'users/ngo_register';
$route['engg_register'] = 'users/engg_register';
$route['ngo_reg'] = 'users/ngo_reg';
$route['post-question'] = 'users/post_a_question';
$route['insert-question'] = 'users/insert_a_question';




// route to form-question
$route['form-question'] = 'users/form_question';
// route to go to engineer profile
$route['profile-engineer'] = 'users/profile_engineer';
// route to go to ngo profile
$route['profile-ngo'] = 'users/profile_ngo';
?>