<?php

class File {
	
	public static function has_extension($file, $extensions=array()) {
		return in_array(end(explode(".", strtolower($file['name']))), $extensions);
	}
	
	public static function get_extension($filename) {
		return end(explode(".", $filename));
	}
	
	public static function move_uploaded_file($file, $path, $name) {
		return move_uploaded_file($file['tmp_name'], rtrim($path, "/") . "/" . $name . "." . self::get_extension($file['name']));
	}
	
}

?>