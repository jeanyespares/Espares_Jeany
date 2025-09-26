<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| LavaLust Version
|--------------------------------------------------------------------------
*/
$config['VERSION'] = '4.2.4';

/*
|--------------------------------------------------------------------------
| Default Environment
|--------------------------------------------------------------------------
| Values: development and production
*/
$config['ENVIRONMENT'] = 'development';

/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
| Ginawa kong dynamic para gumana sa localhost at deployed (Render).
| Halimbawa:
|   - http://localhost/EsPares_Jeany/
|   - https://espares-jeany.onrender.com/
*/
$host = $_SERVER['HTTP_HOST'];
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";

if (strpos($host, 'localhost') !== false) {
    // local setup (XAMPP, WAMP, Laragon, etc.)
    $config['base_url'] = $protocol . '://' . $host . '/EsPares_Jeany/';
} else {
    // deployed setup (Render or live server)
    $config['base_url'] = $protocol . '://' . $host . '/';
}

/*
|--------------------------------------------------------------------------
| Index File
|--------------------------------------------------------------------------
| Kung gusto mong tanggalin yung index.php sa URL, dapat may .htaccess ka.
| Pero sa ngayon naka-default pa:
*/
$config['index_page'] = 'index.php';

/*
|--------------------------------------------------------------------------
| Error Logging Threshold
|--------------------------------------------------------------------------
*/
$config['log_threshold'] = 0;
$config['log_dir'] = 'runtime/logs/';

/*
|--------------------------------------------------------------------------
| Composer auto-loading
|--------------------------------------------------------------------------
*/
$config['composer_autoload'] = FALSE;

/*
|--------------------------------------------------------------------------
| Allowed URL Characters
|--------------------------------------------------------------------------
*/
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';

/*
|--------------------------------------------------------------------------
| Default Character Set
|--------------------------------------------------------------------------
*/
$config['charset'] = 'UTF-8';

/*
|--------------------------------------------------------------------------
| Error Views Directory Path
|--------------------------------------------------------------------------
*/
$config['error_view_path'] = '';

/*
|--------------------------------------------------------------------------
| 404 Error Override
|--------------------------------------------------------------------------
*/
$config['404_override'] = '';

/*
|--------------------------------------------------------------------------
| Default Language
|--------------------------------------------------------------------------
*/
$config['language'] = 'en-US';

/*
|--------------------------------------------------------------------------
| Session
|--------------------------------------------------------------------------
*/
$config['sess_driver']             = 'file';
$config['sess_cookie_name']        = 'LLSession';
$config['sess_expiration']         = 7200;
$config['sess_save_path']          = '/tmp';
$config['sess_match_ip']           = TRUE;
$config['sess_match_fingerprint']  = TRUE;
$config['sess_time_to_update']     = 300;
$config['sess_regenerate_destroy'] = TRUE;
$config['sess_expire_on_close']    = FALSE;

/*
|--------------------------------------------------------------------------
| Cookies
|--------------------------------------------------------------------------
*/
$config['cookie_prefix']     = '';
$config['cookie_domain']     = '';
$config['cookie_path']       = '/';
$config['cookie_secure']     = FALSE;
$config['cookie_expiration'] = 86400;
$config['cookie_httponly']   = FALSE;
$config['cookie_samesite']   = 'Lax';

/*
|--------------------------------------------------------------------------
| Cache
|--------------------------------------------------------------------------
*/
$config['cache_dir']             = 'runtime/cache/';
$config['cache_default_expires'] = 0;

/*
|--------------------------------------------------------------------------
| Encryption Key
|--------------------------------------------------------------------------
*/
$config['encryption_key'] = '';

/*
|--------------------------------------------------------------------------
| Soft Delete
|--------------------------------------------------------------------------
*/
$config['soft_delete']        = FALSE;
$config['soft_delete_column'] = 'deleted_at';

/*
|--------------------------------------------------------------------------
| Cross Site Request Forgery
|--------------------------------------------------------------------------
*/
$config['csrf_protection']   = FALSE;
$config['csrf_exclude_uris'] = array();
$config['csrf_token_name']   = 'csrf_test_name';
$config['csrf_cookie_name']  = 'csrf_cookie_name';
$config['csrf_expire']       = 7200;
$config['csrf_regenerate']   = FALSE;
