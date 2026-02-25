<div data-blockid="block-content-003" class="row strip-row clearfix r2g-content-main-strip text-align-center" data-aos="fade">
    <div class="container">
        <div class="content-wrapper">
            <h1><?= $data[0]['itemTitle']; ?></h1>
			<?= $data[0]['content']; ?>
        </div>
    </div>
</div>

<div data-blockid="block-form-main-row-001" class="row strip-row clearfix r2g-form-main-strip r2g-form text-align-center">
	<div class="container">
		<div class="intro-content">
		</div>
		<div class="form-wrapper">
			<div class="form-wrapper">
				<div class="cms-form-holder">
					<div id="contactSuccess"></div>
					<form id="contactForm" class="cms-form form-contactus" enctype="multipart/form-data">
						<input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">
						<div class="fb-text form-group field-from_fname ">
							<label class="fb-text-label">First Name <span class="required-asterisk">*</span></label>
							<input class="form-control"  type="text" name="name" placeholder="Type your first name here" required>
						</div>
						<div class="fb-text form-group field-from_lname ">
							<label class="fb-text-label">Last Name</label>
							<input class="form-control"  type="text" name="lname" placeholder="Type your last name here">
						</div>
						<div class="fb-text form-group field-from_email ">								
							<label class="fb-text-label">Email <span class="required-asterisk">*</span></label>
							<input class="form-control" type="email" name="email" placeholder="Type your email here" required>
						</div>
						<div class="fb-text form-group field-phone">
							<label class="fb-text-label">Contact Number <span class="required-asterisk">*</span></label>
							<input class="form-control" type="text" name="phone" placeholder="Type your Contact Number here" required>
						</div>
						<div class="fb-text form-group field-service">
							<label class="fb-text-label">Interested Service</label>
							<div class="fb-inner fb-select-inner">
								<select class="form-control" name="service">
									<option value="" selected="selected" disabled="disabled">Select service</option>
									<option value="Custom orders">Custom orders</option>
									<option value="Birthday and celebration cakes">Birthday & celebration cakes</option>
									<option value="Pre-orders and availability">Pre-orders & availability</option>
								</select>
							</div>
						</div>
						<div class="fb-text form-group field-from_date ">								
							<label class="fb-text-label">Due Date</label>
							<input class="form-control" type="date" name="date" min="<?php echo date("Y-m-d"); ?>" max="<?php echo (new DateTime())->modify('+3 months')->format('Y-m-d'); ?>">
						</div>
						<div class="fb-text form-group field-file">
							<label class="fb-text-label">Attachment</label>
							<div class="fb-inner fb-file-inner">
								<span id="fileName">Select file</span>
								<input id="imageInput" class="form-control" type="file" name="attachment" accept=".jpg,.jpeg,.png">
							</div>													
						</div>
						<div class="fb-textarea form-group field-textarea-message ">
							<label class="fb-text-label">Message <!--span class="required-asterisk">*</span--></label>
							<textarea class="form-control" name="message" maxlength="600" placeholder="Message"></textarea>
						</div>
						<div class="fb-privacyfield form-group field-privacyfield ">
							<div class="checkbox fb-cr">
								<input id="privacyfield" name="privacyfield" type="checkbox" required >
								<span class="fb-helper fb-checkbox-helper fa"></span>
								<label for="privacyfield"><span class="required-asterisk">*</span> I consent to my personal data being stored and processed for the purposes of processing my inquiry. For more information view our <a href="#">Privacy Policy</a>.</label>
							</div>
						</div>
						<div class="fb-button form-group field-button-1599106727520 ">
							<button type="submit" class="button primary-button" name="button-1599106727520">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>]

<div data-blockid="block-box-row-002" class="row strip-row clearfix r2g-xbox-main-strip text-align-center with-parallax shape_one" data-aos="fade">
    <div class="container">
        <div class="xbox-wrapper">
            <div class="image-wrapper parent">
				<picture>
                    <source media="(min-width: 768px)" srcset="<?= PUBLIC_URL ?>/assets/images/35.jpg" type="image/jpeg" />
                    <!-- Empty fallback prevents loading on small screens -->
                    <img alt="" aria-hidden="true">
                </picture>
            </div>
            <div class="flex-container parent-container">
                <div class="sub-xlist-wrapper">
                    <div class="intro-content">
						<h2>Reach out to us today</h2>
                    </div>
                    <div class="r2g-flex-xlist-sub-xlist simple-grid three-col-xlist-1024 three-col-xlist-1366 three-col-xlist-1600">
                        <div class="xList xlist-sub flex-xlist r2g-list">
                            <ul class="xList-items list-style-none sub-xlist">
                                <li class="xList-item item-1" data-cat="Label">
                                    <div class="r2g-footer-component contact-details">
										<div class="contact-detail-row address">
											<div class="contact-detail-row-inner">
												<address>
													<span class="icon icon-i-65-locate-place-fill"></span> Address<br/>
													Juusintie 5, Kauniainen,<br/> Finland
												</address>
											</div>
										</div>
									</div>
                                </li>
                                <li class="xList-item item-2" data-cat="Label">
                                    <div class="r2g-footer-component contact-details">
										
										<div class="contact-detail-row tel">
											<div class="contact-detail-row-inner">
												<span class="icon icon-i-84-phone-call-fill"></span> Phone<br/>
												<a class="check-empty" href="tel:<?= CONTACT_PHONE ?>" title="Telephone Number"><?= CONTACT_PHONE ?></a>
											</div>
										</div>
										
									</div>
                                </li>
                                <li class="xList-item item-2" data-cat="Label">
                                    <div class="r2g-footer-component contact-details">
										
										<div class="contact-detail-row email">
											<div class="contact-detail-row-inner">
												<span class="icon icon-i-39-e-mail-fill"></span> Email<br/>
												<a class="check-empty" href="mailto:<?= CONTACT_EMAIL ?>" title="Email Address"><?= CONTACT_EMAIL ?></span></a>
											</div>
										</div>
									</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>










<!--form id="contactForm" enctype="multipart/form-data">
<input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">


<input name="name" placeholder="Your Name">
<small data-error="name"></small><br><br>


<input name="email" placeholder="Your Email">
<small data-error="email"></small><br><br>


<textarea name="message" placeholder="Your Message"></textarea>
<small data-error="message"></small><br><br>


<input type="file" name="attachment">
<small data-error="attachment"></small><br><br>


<button>Send</button>
</form-->





<script>
	document.getElementById("imageInput").addEventListener("change", function () {
		const file = this.files[0];
		if (!file) return;

		const allowedTypes = ["image/jpeg", "image/png"];

		if (!allowedTypes.includes(file.type)) {
			alert("Only JPG, JPEG, and PNG files are allowed.");
			this.value = ""; // reset input
			document.getElementById("fileName").textContent = "Select file";
			return;
		}

		// Show file name
		document.getElementById("fileName").textContent = file.name;
	});
	document.getElementById('contactForm').onsubmit = async e => {
		e.preventDefault();

		//document.querySelectorAll('small').forEach(s => s.textContent = '');
		document.getElementById('contactSuccess').textContent = '';

		const res = await fetch('<?= BASE_URL ?>/contact/add', {
			method: 'POST',
			body: new FormData(e.target)
		});

		const data = await res.json();

		if (!data.success) {
			for (const field in data.errors) {
				const el = document.querySelector(`[data-error="${field}"]`);
				if (el) el.textContent = data.errors[field][0];
			}
			return;
		}

		document.getElementById('successMsg').textContent = data.message;
		e.target.reset();
	};
</script>