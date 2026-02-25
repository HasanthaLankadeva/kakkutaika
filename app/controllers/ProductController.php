<?php
class ProductController
{
	private function admin_email($data)
	{
		$adminEmail = CONTACT_EMAIL; // change to your admin email

		$message = "
		New order received:

		Product ID: {$data['id']}
		Product Name: {$data['product_name']}
		Size: {$data['size']}
		Price: {$data['price']}
		Quantity: {$data['quantity']}

		Customer Details:
		Name: {$data['name']}
		Email: {$data['email']}
		Phone: {$data['phone']}
		Due Date: {$data['date']}
		";
		$attachments = '';

		$mailer = new Mailer();
		$mailer->send(
			$adminEmail,
			"New Product Order",
			$message,
			$attachments
		);
	}

	public function index()
	{
		$metaData = (new ProductListData())->meta('itemCategory', 'product');
		$data = (new ProductListData())->all();
		$products = (new Product())->all();

		require APP_PATH . '/views/layouts/header.php';
		require APP_PATH . '/views/product.php';
		require APP_PATH . '/views/layouts/footer.php';
	}

	public function show($slug)
	{
		// Split by hyphen
		$parts = explode('-', $slug);

		// ID is the last part
		$id = end($parts);
		
		$product = (new Product())->find((int)$id);
		$id = $product['itemID'];
		$gallery = (new Product())->attachments((int)$id);
		$relatedProducts = (new Product())->relproducts('itemCategory', $product['itemCategory']);
		$relatedreviews = (new Product())->relreviews('mapping', $id);

		if (!$product) {
			(new Router())->dispatch('404');
			return;
		}
		
		require APP_PATH . '/views/layouts/header.php';
		require APP_PATH . '/views/product-detail.php';
		require APP_PATH . '/views/layouts/footer.php';
	}
	
	public function add()
	{
		header('Content-Type: application/json');
		
		// CSRF
		if (!Csrf::verify($_POST['csrf_token'] ?? '')) {
			echo json_encode([
				'success' => false,
				'errors' => ['csrf' => ['Invalid CSRF token']]
			]);
			return;
		}

        $product_id = trim($_POST['id'] ?? '');
		$product_name = trim($_POST['product_name'] ?? '');
		$size = trim($_POST['size'] ?? '');
		$price = trim($_POST['price'] ?? '');
		$quantity = trim($_POST['quantity'] ?? '');
		$name = trim($_POST['name'] ?? '');
		$email = trim($_POST['email'] ?? '');
		$phone = trim($_POST['phone'] ?? '');
		$date = trim($_POST['date'] ?? '');

		// Validation
        $validator = new Validator();
        $validator
            ->required('product_id', $product_id)
			->min('product_id', $product_id, 3)
            ->required('product_name', $product_name, 3)
            ->required('size', $size)
			->required('price', $price)
			->required('name', $name)
			->required('email', $email)
			->required('phone', $phone)
			->required('date', $date);

        if ($validator->fails()) {
			echo json_encode([
				'success' => false,
				'errors' => $validator->errors()
			]);
			return;
		}

		// Insert
        $product = new Product();
        $product->create([
			'product_id' => $product_id,
            'product_name' => $product_name,
            'size' => $size,
			'price' => $price,
			'quantity' => $quantity,
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'duedate' => $date
        ]);
		
		// Update
		/*$product = new Product();
        $product->update([
            'product_name' => $title,
            'price' => $content
        ]);*/

        echo json_encode([
			'success' => true,
			'message' => 'Post created successfully'
		]);
	}
	
	public function update()
	{
		header('Content-Type: application/json');
		
		// CSRF
		if (!Csrf::verify($_POST['csrf_token'] ?? '')) {
			echo json_encode([
				'success' => false,
				'errors' => ['csrf' => ['Invalid CSRF token']]
			]);
			return;
		}
		
		$id = (int)($_POST['id'] ?? 0);
        $title = trim($_POST['product_name'] ?? '');
		$content = trim($_POST['price'] ?? '');

		if ($id <= 0) {
			echo json_encode(['success' => false, 'message' => 'Invalid ID']);
			return;
		}
		
		// Validation
        $validator = new Validator();
        $validator
            ->required('product_name', $title)
            ->min('product_name', $title, 3)
            ->required('price', $content);

        if ($validator->fails()) {
			echo json_encode([
				'success' => false,
				'errors' => $validator->errors()
			]);
			return;
		}
		
		// Update
		$updated = (new Product())->update($id, [
			'product_name' => $title,
			'price' => $content
		]);

        echo json_encode([
			'success' => true,
			'message' => 'Post created successfully'
		]);
	}

	public function user_email()
	{
		header('Content-Type: application/json');

		// CSRF
		if (!Csrf::verify($_POST['csrf_token'] ?? '')) {
			echo json_encode([
				'success' => false,
				'errors' => ['csrf' => ['Invalid CSRF token']]
			]);
			return;
		}

        $product_id = trim($_POST['id'] ?? '');
		$product_name = trim($_POST['product_name'] ?? '');
		$size = trim($_POST['size'] ?? '');
		$price = trim($_POST['price'] ?? '');
		$quantity = trim($_POST['quantity'] ?? '');
		$name = trim($_POST['name'] ?? '');
		$email = trim($_POST['email'] ?? '');
		$phone = trim($_POST['phone'] ?? '');
		$due_date = trim($_POST['date'] ?? '');
		$attachments = '';

		$mailer = new Mailer();

		// Send to user
        /*$mailer->send(
            $email,
        	'We received your enquiry',
        	"Hi $name,\n\n
			We’ll get back to you as soon as possible, usually within a few hours.\n\n",
			$attachments
        );*/

		$mailer->send(
            $email,
        	'We received your order',
        	'<!DOCTYPE html><html><head><title>Email</title><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"></head><body style="width:100% !important;margin:0;padding:0;background-color:#eee;"><table border="0" style="width:100% !important;margin:0;padding:0;background-color:#eee;" width="100%"><tbody><tr><td><table border="0" style="background-color: #ffffff;margin: 50px auto;width: 600px; border: 2px solid #dadada" align="center"><tbody style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;color:#875f34;font-family:Helvetica Neue, Arial;font-size:14px;line-height:130%;text-align:left;padding-top:9px;padding-bottom:9px;padding-left:18px;padding-right:18px;"><tr><td style="padding-bottom: 20px;padding-left: 20px;padding-right: 20px;padding-top: 20px; text-align: center;"><a href="" target="_blank" style="word-wrap:break-word;color:#15C;font-weight:normal;text-decoration:underline"><img align="center" alt="logo" src="images/logo.png" width="153" style="border:0;height:auto;line-height:100%;outline:none;text-decoration:none;padding-bottom:0;display:inline;vertical-align:bottom;margin-right:0;max-width:232px;float: none;" /></a></td></tr><tr><td style="padding-bottom: 20px;padding-left: 20px;padding-right: 20px;padding-top: 30px;color: #111111"><div class="kmParagraph" style="padding-bottom:9px"><p style="margin:0;padding-bottom:1em;margin-bottom: 1em;">Hi ' . $name . ',</p><p style="margin:0;padding-bottom:1em;margin-bottom: 1em;">We&#39;ll get back to you as soon as possible, usually within a few hours.</p></div></td></tr><tr><td style="padding-bottom: 20px;padding-left: 20px;padding-right: 20px;padding-top: 20px;text-align: center; color:#ffffff;background-color: #292929;"><div class="kmParagraph" style="padding-bottom:9px;padding-top: 9px;"><b>Kakku Taika</b><br />Juusintie 5, Kauniainen,<br />Finland<br /><a href="tel:+3580413137305" title="Call us" style="text-decoration: none; color:#ffffff;">041 313 7305</a><br /><a href="mailto:contact@kakkutaika.com" title="Send E-mail" style="color:#ffffff;">contact@kakkutaika.com</a></div></td></tr></tbody></table></td></tr></tbody></table></body></html>',
			$attachments
        );

		// Send to admin
    	$this->admin_email($_POST);

		echo json_encode([
			'success' => true,
			'message' => 'Emails sent successfully'
		]);
		
	}
}
?>