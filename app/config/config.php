<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 *
 * Copyright (c) 2020 Ronald M. Marasigan
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package LavaLust
 * @author Ronald M. Marasigan
 * @since Version 1
 * @link https://github.com/ronmarasigan/LavaLust
 * @license https://opensource.org/licenses/MIT MIT License
 */

/*
| -------------------------------------------------------------------
|  Config Files
| -------------------------------------------------------------------
| This file is for setting-up default settings.
|
*/

/*
| -------------------------------------------------------------------
| LavaLust Version
| -------------------------------------------------------------------
*/
$config['VERSION']                 = '4.2.4';

/*
| -------------------------------------------------------------------
| Default Environment
| -------------------------------------------------------------------
| Values: development and production
*/
$config['ENVIRONMENT']             = 'development';

/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
|
| URL to your LavaLust root. Typically this will be your base URL,
| WITH a trailing slash:
|
|   http://example.com/
|
| WARNING: You MUST set this value!
|
*/
$config['base_url']                = 'https://espares-jeany.onrender.com/';

/*
|--------------------------------------------------------------------------
| Index File
|--------------------------------------------------------------------------
|
| If you are using mod_rewrite to remove index.php in the URL set this
| variable to blank.
|
*/
$config['index_page']              = '';

/*
|--------------------------------------------------------------------------
| Error Logging Threshold
|--------------------------------------------------------------------------
|
|   0 = Disables logging
|   1 = Exception and Error Messages
|   2 = Debug
|   3 = All
|
*/
$config['log_threshold']           = 0;
$config['log_dir']                 = 'runtime/logs/';

/*
|--------------------------------------------------------------------------
| Composer auto-loading
|--------------------------------------------------------------------------
*/
$config['composer_autoload']       = FALSE;

/*
|--------------------------------------------------------------------------
| Allowed URL Characters
|--------------------------------------------------------------------------
*/
$config['permitted_uri_chars']     = 'a-z 0-9~%.:_\-';

/*
|--------------------------------------------------------------------------
| Default Character Set
|--------------------------------------------------------------------------
*/
$config['charset']                 = 'UTF-8';

/*
|--------------------------------------------------------------------------
| Error Views Directory Path
|--------------------------------------------------------------------------
*/
$config['error_view_path']         = 'views/errors/';

/*
|--------------------------------------------------------------------------
| 404 Error Override
|--------------------------------------------------------------------------
*/
$config['404_override']            = '';

/*
|--------------------------------------------------------------------------
| Default Language
|--------------------------------------------------------------------------
*/
$config['language']                = 'en-US';

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
$config['cookie_prefix']           = '';
$config['cookie_domain']           = '';
$config['cookie_path']             = '/';
$config['cookie_secure']           = FALSE;
$config['cookie_expiration']       = 86400;
$config['cookie_httponly']         = FALSE;
$config['cookie_samesite']         = 'Lax';

/*
|--------------------------------------------------------------------------
| Cache
|--------------------------------------------------------------------------
*/
$config['cache_dir']               = 'runtime/cache/';
$config['cache_default_expires']   = 0;

/*
|--------------------------------------------------------------------------
| Encryption Key
|--------------------------------------------------------------------------
*/
$config['encryption_key']          = '';

/*
|--------------------------------------------------------------------------
| Soft Delete
|--------------------------------------------------------------------------
*/
$config['soft_delete']             = FALSE;
$config['soft_delete_column']      = 'deleted_at';

/*
|--------------------------------------------------------------------------
| Cross Site Request Forgery
|--------------------------------------------------------------------------
*/
$config['csrf_protection']         = FALSE;
$config['csrf_exclude_uris']       = array();
$config['csrf_token_name']         = 'csrf_test_name';
$config['csrf_cookie_name']        = 'csrf_cookie_name';
$config['csrf_expire']             = 7200;
$config['csrf_regenerate']         = FALSE;
