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

Class Io {

	private $_enable_csrf = FALSE;
	private $security;
	private $status_code;
    private $headers = [];
    private $content;

	public function __construct()
	{
		$this->security =& load_class('Security', 'kernel');
		$this->_enable_csrf	= (config_item('csrf_protection') === TRUE);

		if ($this->_enable_csrf === TRUE) {
			$this->security->csrf_validate();
		}
	}

  	/**
  	 * POST Variable
  	 */
	public function post($index = NULL)
	{
		if ($index === NULL && !empty($_POST)) {
			$post = array();
			foreach($_POST as $key => $value) {
				$post[$key] = $value;
			}
			return $post;
		}
		return isset($_POST[$index]) ? $_POST[$index] : null;
	}

	/**
  	 * GET Variable
  	 */
	public function get($index = NULL)
	{
		if ($index === NULL && !empty($_GET)) {
			$get = array();
			foreach($_GET as $key => $value) {
				$get[$key] = $value;
			}
			return $get;
		}
		return isset($_GET[$index]) ? $_GET[$index] : null;
	}

	/**
	 * POST and GET
	 */
	public function post_get($index = NULL)
	{
		$output = $this->post($index);
		return isset($output) ? $output : $this->get($index);
	}

	/**
	 * GET and POST
	 */
	public function get_post($index = NULL)
	{
		$output = $this->get($index);
		return isset($output) ? $output : $this->post($index);
	}

	/**
	 * Cookie Variable
	 */
	public function cookie($index = NULL)
	{
		if ($index === NULL && !empty($_COOKIE)) {
			$cookie = array();
			foreach($_COOKIE as $key => $value) {
				$cookie[$key] = $value;
			}
			return $cookie;
		}
		return isset($_COOKIE[$index]) ? $_COOKIE[$index] : null;
	}

	/**
	 * Set cookie in your application
	 */
	public function set_cookie($name, $value = '', $expiration = 0, $options = array())
	{
		$lists = array('prefix', 'path', 'domain', 'secure', 'httponly', 'samesite');
		$arr = array();

		if (is_array($options) && count($options) > 0) {
			foreach($options as $key => $val) {
				if (isset($options[$key]) && $options[$key] != 'expiration') {
					$arr[$key] = $val;
				} else {
					$arr[$key] = config_item('cookie_' . $key);
				}
				$pos = array_search($key, $lists);
				unset($lists[$pos]);
			}
		}

		if (!is_numeric($expiration) || $expiration < 0) {
			$arr['expiration'] = 1;
		} else {
			$arr['expiration'] = ($expiration > 0) ? time() + $expiration : 0;
		}

		foreach($lists as $key) {
			$arr[$key] = config_item('cookie_' . $key);
		}

		setcookie($arr['prefix'].$name, $value,
			array(
				'expires' => $arr['expiration'],
				'path' => $arr['path'],
				'domain' => $arr['domain'],
				'secure' => (bool) $arr['secure'],
				'httponly' => (bool) $arr['httponly'],
				'samesite' => $arr['samesite']
			));
	}

	/**
	 * Server
	 */
	public function server($index = NULL)
	{
		if ($index === NULL && !empty($_SERVER)) {
			$server = array();
			foreach($_SERVER as $key => $value) {
				$server[$key] = $value;
			}
			return $server;
		}
		return isset($_SERVER[$index]) ? $_SERVER[$index] : null;
	}

	/**
	 * Method
	 */
	public function method($upper = FALSE)
	{
		return ($upper)
			? strtoupper($this->server('REQUEST_METHOD'))
			: strtolower($this->server('REQUEST_METHOD'));
	}

	/**
	 * Get IP Address
	 */
	public function ip_address() {
		$trustedHeaders = ['HTTP_X_FORWARDED_FOR', 'HTTP_CLIENT_IP', 'HTTP_X_REAL_IP'];

		foreach ($trustedHeaders as $header) {
			if (isset($_SERVER[$header]) && filter_var($_SERVER[$header], FILTER_VALIDATE_IP)) {
				return $_SERVER[$header];
			}
		}

		return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
	}

	/**
	 * Validate IP Address
	 */
	public function valid_ip($ip, $which = '')
	{
		switch (strtolower($which)) {
			case 'ipv4':
				$which = FILTER_FLAG_IPV4;
				break;
			case 'ipv6':
				$which = FILTER_FLAG_IPV6;
				break;
			default:
				$which = 0;
				break;
		}

		return (bool) filter_var($ip, FILTER_VALIDATE_IP, $which);
	}

	/**
	 * Is Ajax
	 */
	public function is_ajax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
	}

	/**
	 * Set Status Code
	 */
	public function set_status_code($status_code) {
        $this->status_code = $status_code;
    }

	/**
	 * Add header
	 */
	public function add_header($name, $value) {
		if (is_array($name)) {
			foreach($name as $key => $value) {
				$this->headers[$key] = $value;
			}
		} else {
			$this->headers[$name] = $value;
		}
    }

	/**
	 * Set Content
	 */
    public function set_content($content) {
        $this->content = $content;
    }

	/**
	 * HTML Content
	 */
	public function set_html_content($content) {
        $this->add_header('Content-Type', 'text/html');
        return $this->set_content($content);
    }

	/**
	 * Send Response
	 */
    public function send() {
        http_response_code($this->status_code);

        foreach ($this->headers as $name => $value) {
            header("$name: $value");
        }

        echo $this->content;
    }

	/**
	 * Json Encode
	 */
    public function send_json($data) {
        $this->add_header('Content-Type', 'application/json');
        $this->set_content(json_encode($data));
        $this->send();
    }
}
?>
