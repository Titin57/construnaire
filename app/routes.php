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
    // construct.dev/logout/
	['GET', '/logout/', 'Users#logout', 'user_logout'],

    // construnaire.dev/forgot_password/
    // construnaire.dev/reset_password/454857sgfd54ghd6gh7dh8dg7

    // construnaire.dev/construction/   -> page to add | update | modify
    // GET and POST ==> data is called from and added to the DB
    ['GET|POST', '/construction/', 'Construction#listconstruction', 'construction_listconstruction'],  
    
    // construaire.dev/construction
    // ['GET|POST', '/construction/', 'Construction#addconstruction', 'construction_addconstruction'], 
    ['GET', '/output/', 'Output#output', 'output_outputText'],
    ['GET', '/workers/', 'Workers#addWorker', 'worker_addWorker'],
 

);