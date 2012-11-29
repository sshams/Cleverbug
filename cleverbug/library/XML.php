<?php

class XML {
	
	public function to_xml($parent="parent", $object=NULL, $node="node") {
		return "<" . $parent . ">" . self::to_nodes($object, $node) . "</" . $parent . ">";
	}
	
	public static function to_nodes($object, $node) {
		$xml = "";
		if (is_object($object) || is_array($object)) {
			foreach ($object as $key => $value) {
				$key = is_numeric($key) ? $node : $key;
				$xml .= '<' . $key . '>' . "\n" . self::to_nodes($value, $node) . '</' . $key . '>' . "\n";
			}
			return $xml;
		} else {
			return htmlspecialchars($object, ENT_QUOTES) . "\n";
		}
	}
	
}

?>