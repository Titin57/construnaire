<?php
	
$w_routes = array(

    // construnaire.dev => chantier
    ['GET', '/', 'Default#home', 'default_home'],

    // construnaire.dev/signin/
	['GET', '/signin/', 'User#signin', 'user_signin'],
	['POST', '/signin/', 'User#signinPost', 'user_signinpost'],

    // construnaire.dev/signup/
	['GET|POST', '/signup/', 'User#signup', 'user_signup'],

    // construnaire.dev/forgot_password/
    // construnaire.dev/reset_password/454857sgfd54ghd6gh7dh8dg7
 
    // construnaire.dev/logout/
	['GET', '/logout/', 'User#logout', 'user_logout'],
    
    // construnaire.dev/construction/   -> page to add | update | modify
    // GET and POST ==> data is called from and added to the DB
    ['GET|POST', '/construction/', 'Construction#construction', 'construction_construction'],    
);