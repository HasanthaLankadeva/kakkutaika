<?php

class HomeController
{
	public function index()
	{
		$metaData = (new HomeData())->meta('itemCategory', 'home');
		$data = (new HomeData())->all();
		$id = $data[0]['itemID'];
		$banner = (new HomeData())->attachments('itemID', (int)$id);
		$featured = (new HomeData())->featured('itemCategory', 'featured');
		$reviews = (new HomeData())->reviews();

		require_once APP_PATH . '/views/layouts/header.php';
		require_once APP_PATH . '/views/layouts/banner.php';
		require_once APP_PATH . '/views/home.php';
		require_once APP_PATH . '/views/layouts/footer.php';
	}
}

?>