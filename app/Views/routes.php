<?php
	
$w_routes = array(
	['GET', '/', 'Default#home', 'default_home'],
    // nbateams.dev/signin/
	['GET', '/signin/', 'User#signin', 'user_signin'],
	['POST', '/signin/', 'User#signinPost', 'user_signinpost'],
    // nbateams.dev/signup/
	['GET|POST', '/signup/', 'User#signup', 'user_signup'],
    // nbateams.dev/forgot_password/
    // nbateams.dev/reset_password/454857sgfd54ghd6gh7dh8dg7
    // nbateams.dev/logout/
	['GET', '/logout/', 'User#logout', 'user_logout'],
);