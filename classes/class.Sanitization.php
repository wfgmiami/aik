<?php

	class TSanitization{
		function __contruct() {
		}

		function alphaNumeric($value) {
			$value = preg_replace('![^a-z0-9]!ismx','', $value);
			return $value;
		
		}

		function alphaNumericSpace($value) {
			$value = preg_replace('![^a-z0-9 ]!ismx','',$value);
			return $value;
		}
	}


