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
    // this part under construction - todo
    // ['GET|POST', '/city/mod/', 'City#modCity', 'city_modcity'],
    
    // end routes for city
    // routes for construnaire.dev/country
    ['GET|POST', '/country/', 'Country#addCountry', 'country_addcountry'],

    // end routes for country
    // start routes for construction  
    // ['GET|POST', '/construction/', 'Construction#construction', 'construction_construction'],
    ['GET|POST', '/construction/', 'Construction#listconstruction', 'construction_listconstruction'],
    ['GET|POST', '/construction/add/', 'Construction#addconstruction', 'construction_addconstruction'],
    // this part under construction - todo
    // ['GET|POST', '/construction/mod/', 'Construction#modconstruction', 'construction_modconstruction'],
    
    // end routes for construction


    //['GET', '/workers/', 'Workers#addWorker', 'worker_addWorker'],


    ['GET|POST', '/output/', 'Output#output', 'output_output'],
    ['GET|POST', '/output/process/text/[i:id]/', 'Output#outputText', 'output_outputText'],
    ['GET|POST', '/output/process/visuals/[i:id]/', 'Output#outputVisuals', 'output_outputVisuals'],


    
    ['GET|POST', '/workers/add', 'Workers#addworker', 'worker_addworker'],
    ['GET|POST', '/workers/mod/', 'Workers#modworker', 'worker_modworker'],
    ['GET|POST', '/workers/all/', 'Workers#allworker', 'worker_allworker'],

    ['GET|POST', '/task/view/', 'tasks#viewtasks', 'tasks_viewtasks'],
    ['GET|POST', '/task/add', 'Tasks#addtask', 'task_addtask'],
//    ['GET|POST', '/task/add/', 'Tasks#addtask', 'task_addtask'],  change the route above or uncomment this one
//    ['GET|POST', '/task/mod/[i:id]/', 'Tasks#modtask', 'task_modtask'],
    ['GET|POST', '/task/mod/', 'Tasks#modtask', 'task_modtask'],
    
    ['GET|POST', '/process/', 'Process#process', 'process_process'],

    ['GET|POST', '/team/add', 'Teams#addteam', 'team_addteam'],
    //['GET|POST', '/team/', 'Teams#addteam', 'team_addteam'],
    //['GET|POST', '/team/mod', 'Teams#modteam', 'team_modteam'],


);


