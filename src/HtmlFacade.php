<?php
namespace zongphp\facade;

use zongphp\framework\build\Facade;

class HtmlFacade extends Facade {
	public static function getFacadeAccessor() {
		return 'Html';
	}
}