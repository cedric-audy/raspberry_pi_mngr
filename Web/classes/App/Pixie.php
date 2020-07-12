<?php

namespace App;

/**
 * Pixie dependency container
 *
 * @property-read \PHPixie\DB $db Database module
 * @property-read \PHPixie\ORM $orm ORM module
 */
class Pixie extends \PHPixie\Pixie {

	protected $modules = array(
		'db' => '\PHPixie\DB',
		'orm' => '\PHPixie\ORM'
	);

	protected function after_bootstrap() {
		if (apache_getenv("PHP_ENVIRONMENT") == "PRODUCTION") {
			$this->debug->display_errors = false;
		}
	}

}
