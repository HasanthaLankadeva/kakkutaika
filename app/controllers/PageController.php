<?php
class PageController
{
	public function about()
	{
		$metaData = (new AboutData())->meta('itemCategory', 'about');
		$data = (new AboutData())->all();
		$reviews = (new AboutData())->reviews();

		require_once APP_PATH . '/views/layouts/header.php';
		require_once APP_PATH . '/views/about.php';
		require_once APP_PATH . '/views/layouts/footer.php';
	}

	public function services()
	{
		$metaData = (new ServicesData())->meta('itemCategory', 'services');
		$data = (new ServicesData())->all();
		require_once APP_PATH . '/views/layouts/header.php';
		require_once APP_PATH . '/views/services.php';
		require_once APP_PATH . '/views/layouts/footer.php';
	}
}
?>