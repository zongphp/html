<?php
namespace zongphp\html;

use zongphp\framework\build\Provider;

class HtmlProvider extends Provider {

	//延迟加载
	public $defer = true;

	public function boot() {
	}

	public function register() {
		$this->app->single( 'Html', function () {
			return new Html();
		} );
	}
}