<?php
class ContactController
{
	private function json($data)
	{
		header('Content-Type: application/json');
		echo json_encode($data);
		exit;
	}

	private function admin_email($data, $attachmentPath)
	{
		$adminEmail = CONTACT_EMAIL; // change to your admin email

		$message = "
		New enquiry received,

		Customer Details:
		First Name: {$data['name']}
		Last Name: {$data['lname']}
		Email: {$data['email']}
		Phone: {$data['phone']}
		Service: {$data['service']}
		Due Date: {$data['date']}
		Message: {$data['message']}
		";

		$mailer = new Mailer();
		$mailer->send(
			$adminEmail,
			"New Product Enquiry",
			$message,
			$attachmentPath
		);
	}

	public function index()
	{
		$metaData = (new ContactData())->meta('itemCategory', 'contact');
		$data = (new ContactData())->all();
		
		require APP_PATH . '/views/layouts/header.php';
		require APP_PATH . '/views/contact.php';
		require APP_PATH . '/views/layouts/footer.php';
	}

	public function add()
	{
		if (!Csrf::verify($_POST['csrf_token'] ?? '')) {
			$this->json(['success' => false]);
		}

		$fname = trim($_POST['name'] ?? '');
		$lname = trim($_POST['lname'] ?? '');
		$email = trim($_POST['email'] ?? '');
		$phone = trim($_POST['phone'] ?? '');
		$service = trim($_POST['service'] ?? '');
		$duedate = trim($_POST['date'] ?? '');
		$message = trim($_POST['message'] ?? '');

		$v = new Validator();
		$v->required('name', $fname)
		->required('email', $email)
		->required('phone', $phone);

		if ($v->fails()) {
			$this->json(['success' => false, 'errors' => $v->errors()]);
		}
		
		$attachmentPath = null;

		if (!empty($_FILES['attachment']['name'])) {

			if ($_FILES['attachment']['error'] !== UPLOAD_ERR_OK) {
				$this->json([
					'success' => false,
					'errors' => ['attachment' => ['Upload error code: ' . $_FILES['attachment']['error']]]
				]);
			}

			$file = $_FILES['attachment'];

			$allowed = ['pdf','jpg','jpeg','png'];
			$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

			if (!in_array($ext, $allowed)) {
				$this->json([
					'success' => false,
					'errors' => ['attachment' => ['Invalid file type']]
				]);
			}

			if ($file['size'] > 2 * 1024 * 1024) {
				$this->json([
					'success' => false,
					'errors' => ['attachment' => ['Max file size is 2MB']]
				]);
			}

			$uploadDir = PUBLIC_PATH . '/uploads/enquiries/';

			if (!is_dir($uploadDir)) {
				mkdir($uploadDir, 0755, true);
			}

			$filename = uniqid('att_') . '.' . $ext;
			$fullPath = $uploadDir . $filename;

			if (!move_uploaded_file($file['tmp_name'], $fullPath)) {
				$this->json([
					'success' => false,
					'errors' => ['attachment' => ['Could not save file']]
				]);
			}

			$attachmentPath = 'uploads/enquiries/' . $filename;
		}

		$attachments = '';
		$name = $fname . ' ' . $lname;

		// Save enquiry
		(new Enquiry())->create([
			'duedate' => $duedate,
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'service' => $service,
			'message' => $message,
			'attachment' => $attachmentPath
		]);

		$mailer = new Mailer();
		$mailer->send(
            $email,
        	'We received your enquiry',
        	'<!DOCTYPE html><html><head><title>Email</title><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"></head><body style="width:100% !important;margin:0;padding:0;background-color:#eee;"><table border="0" style="width:100% !important;margin:0;padding:0;background-color:#eee;" width="100%"><tbody><tr><td><table border="0" style="background-color: #ffffff;margin: 50px auto;width: 600px; border: 2px solid #dadada" align="center"><tbody style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;color:#875f34;font-family:Helvetica Neue, Arial;font-size:14px;line-height:130%;text-align:left;padding-top:9px;padding-bottom:9px;padding-left:18px;padding-right:18px;"><tr><td style="padding-bottom: 20px;padding-left: 20px;padding-right: 20px;padding-top: 20px; text-align: center;"><a href="" target="_blank" style="word-wrap:break-word;color:#15C;font-weight:normal;text-decoration:underline"><img align="center" alt="logo" src="images/logo.png" width="153" style="border:0;height:auto;line-height:100%;outline:none;text-decoration:none;padding-bottom:0;display:inline;vertical-align:bottom;margin-right:0;max-width:232px;float: none;" /></a></td></tr><tr><td style="padding-bottom: 20px;padding-left: 20px;padding-right: 20px;padding-top: 30px;color: #111111"><div class="kmParagraph" style="padding-bottom:9px"><p style="margin:0;padding-bottom:1em;margin-bottom: 1em;">Hi ' . $name . ',</p><p style="margin:0;padding-bottom:1em;margin-bottom: 1em;">We&#39;ll get back to you as soon as possible, usually within a few hours.</p></div></td></tr><tr><td style="padding-bottom: 20px;padding-left: 20px;padding-right: 20px;padding-top: 20px;text-align: center; color:#ffffff;background-color: #292929;"><div class="kmParagraph" style="padding-bottom:9px;padding-top: 9px;"><b>Kakku Taika</b><br />Juusintie 5, Kauniainen,<br />Finland<br /><a href="tel:+3580413137305" title="Call us" style="text-decoration: none; color:#ffffff;">041 313 7305</a><br /><a href="mailto:contact@kakkutaika.com" title="Send E-mail" style="color:#ffffff;">contact@kakkutaika.com</a></div></td></tr></tbody></table></td></tr></tbody></table></body></html>',
			$attachments
        );

		// Send to admin
    	$this->admin_email($_POST, $attachmentPath);

		echo json_encode([
			'success' => true,
			'message' => 'Emails sent successfully'
		]);
	}

}
?>