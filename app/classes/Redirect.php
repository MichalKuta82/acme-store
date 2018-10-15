<?php

namespace App\Classes;


class Redirect
{
	/**
	 * Redirect to a specyfic page
	 * @param $page
	 */
	public static function to($page)
	{
		header("Location: $page");
	}

	/**
	 * Redirect to the same page
	 */
	public static function back()
	{
		$uri = $_SERVER['REQUEST_URI'];
		header("Location: $uri");
	}
}