<?php


class Util
{
	public static function isLetter(string $input) : bool
	{
		return preg_match("/^[a-z]$/", $input);
	}

	public static function isNumeric(string $input) : bool
	{
		return is_numeric($input);
	}
}