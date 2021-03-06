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
$route['showNGO_reg'] = 'users/showNGO_reg';
$route['ngo_register'] = 'users/ngo_register';
$route['showEngg_reg'] = 'users/showEngg_reg';
$route['engg_register'] = 'users/engg_register';
$route['ngo_reg'] = 'users/ngo_reg';
$route['engg_reg'] = 'users/engg_reg';
$route['post-question'] = 'users/post_a_question';
$route['insert-question'] = 'users/insert_a_question';
$route['logout'] = 'users/logout';
$route['get_comments'] = 'users/get_comments';
$route['insert_answer'] = 'users/insert_answer';
$route['insert_comment'] = 'users/insert_comment';
$route['email'] = 'users/send_mail';





// route to form-question
$route['form-question'] = 'users/form_question';
// route to go to engineer profile
$route['profile-engineer'] = 'users/profile_engineer';
// route to go to ngo profile
$route['profile-ngo'] = 'users/profile_ngo';
// update profile details ngo
$route['update_ngoprofile'] = 'users/updateUserInfoNgo';
// update profile details engg
$route['update_engprofile'] = 'users/updateUserInfoEngg';
// route to go to admin view
$route['admin'] = 'users/admin_page';

$route['admin/approve_user'] = 'users/approveUser';

$route['admin/home'] = 'users/adminHome';

$route['admin/answers'] = 'users/adminAnswers';

$route['admin/delete_answer'] = 'users/deleteAnswerProcess';

$route['admin/comments'] = 'users/adminComments';

$route['admin/delete_comments'] = 'users/deleteCommentProcess';

$route['admin/questions'] = 'users/adminQuestions';

$route['admin/delete_question'] = 'users/deleteQuestionProcess';


?>