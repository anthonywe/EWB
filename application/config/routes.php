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

