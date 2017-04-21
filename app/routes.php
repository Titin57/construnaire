<?php

$w_routes = array(
    // Start routes for users => signin, signup, logout, reset PW, forgot PW
    ['GET', '/', 'Default#home', 'default_home'],
    // construct.dev/signin/
    ['GET', '/signin/', 'Users#signin', 'user_signin'],
    ['POST', '/signin/', 'Users#signinPost', 'user_signinpost'],
    // construct.dev/signup/
    ['GET|POST', '/signup/', 'Users#signup', 'user_signup'],
    // construct.dev/forgot_password/
    ['GET|POST', '/forgot_password/', 'Users#forgot', 'user_forgot'],
    // construct.dev/reset_password/454857sgfd54ghd6gh7dh8dg7
    ['GET|POST', '/reset_password/[a:token]', 'Users#reset', 'user_reset'],
    // construct.dev/logout
    ['GET', '/logout/', 'Users#logout', 'user_logout'],
    // End routes for users
    // routes for construnaire.dev/city
    ['GET|POST', '/city/', 'City#addCity', 'city_addcity'],
    
    // end routes for city
    // routes for construnaire.dev/country
    ['GET|POST', '/country/', 'Country#addCountry', 'country_addcountry'],

    
    // end routes for country
    // start routes for construction
    ['GET|POST', '/construction/', 'Construction#listconstruction', 'construction_listconstruction'],
    ['GET|POST', '/construction/add/', 'Construction#addconstruction', 'construction_addconstruction'],
    
    // end routes for construction

    
    ['GET', '/workers/', 'Workers#addWorker', 'worker_addWorker'],
 

    // ['GET', '/output/', 'Output#output', 'output_outputText'],
    ['GET', '/output/text/', 'Output#outputText', 'output_outputText'],
    ['GET', '/output/visuals/', 'Output#output', 'output_output'],
    ['GET|POST', '/workers/add/', 'Workers#addworker', 'worker_addworker'],
    ['GET|POST', '/workers/mod/', 'Workers#modworker', 'worker_modworker'],
    ['GET|POST', '/workers/all/', 'Workers#allworker', 'worker_allworker'],

    ['GET|POST', '/task/add/', 'Tasks#addtask', 'task_addtask'],
    
    
);


