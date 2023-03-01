<?php

if (!function_exists('url')) {
	function url($path)
	{
		$root_url = isset($GLOBALS['ROOTURL']) ? $GLOBALS['ROOTURL'] : '/';
		if ('/' === $path) {
			return $root_url;
		}
		return $root_url . $path;
	}
}

if (!function_exists('redirect')) {
	// Chuyển hướng đến một trang khác
	function redirect($location)
	{
		header('Location: ' . url($location));
		exit();
	}
}
