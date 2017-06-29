<?php
namespace zongphp\html\build;

class Base {
	/**
	 * 生成静态
	 *
	 * @param string $action
	 * @param array $args
	 * @param $file
	 *
	 * @return bool
	 */
	public function make( $action, array $args, $file ) {
		ob_start();
		$_GET   = array_merge( $_GET, $args );
		$info   = explode( '@', $action );
		$method = $info[1];
		( new $info[0] )->$method();
		$data = ob_get_clean();
		//目录检测
		if ( ! is_dir( dirname( $file ) ) ) {
			mkdir( dirname( $file ), 0755, true );
		}

		//创建静态文件
		return file_put_contents( $file, $data ) !== false;
	}
}