<?php

$w_routes = array(
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

    ['GET', '/logout/', 'Users#logout', 'user_logout'],


    // construnaire.dev/forgot_password/
    // construnaire.dev/reset_password/454857sgfd54ghd6gh7dh8dg7
    // construnaire.dev/construction/   -> page to add | update | modify
    // GET and POST ==> data is called from and added to the DB

    // construnaire.dev/add city
    ['GET|POST', '/city/', 'City#city', 'city_addcity'],
    // construnaire.dev/add country
    ['GET|POST', '/country/', 'Country#country', 'country_addcountry'],
    // show all construction

    ['GET|POST', '/construction/', 'Construction#listconstruction', 'construction_listconstruction'],


    // construaire.dev/construction
    // ['GET|POST', '/construction/', 'Construction#addconstruction', 'construction_addconstruction'],
    //['GET', '/output/', 'Output#output', 'output_outputText'],
    ['GET', '/workers/', 'Workers#addWorker', 'worker_addWorker'],



    ['GET|POST', '/construction/', 'Construction#construction', 'construction_construction'],


    //['GET|POST', '/output/text/[a:process]/[a:id]', 'Output#outputText', 'output_outputText'],
    ['GET|POST', '/output/text/', 'Output#outputText', 'output_outputText'],
    ['GET|POST', '/output/visuals/', 'Output#output', 'output_output'],


    ['GET|POST', '/workers/add/', 'Workers#addworker', 'worker_addworker'],
    ['GET|POST', '/workers/mod/', 'Workers#modworker', 'worker_modworker'],
    ['GET|POST', '/workers/all/', 'Workers#allworker', 'worker_allworker'],

    ['GET|POST', '/task/add/', 'Tasks#addtask', 'task_addtask'],
    ['GET|POST', '/process/', 'Process#process', 'process_process'],

    ['GET|POST', '/team/', 'Teams#addteam', 'team_addteam'],


);


