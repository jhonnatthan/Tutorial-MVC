<?php

	namespace App;

	class View {
		
		public static function make($viewName, array $customVars = array()) {
			extract($customVars);

			require_once VIEW_PATH . 'template.php';
		}
	}