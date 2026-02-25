	</main>
</div>
<footer class="r2g-footer">
	<div class="footer_wave"></div>
	<div class="container footer-inner-container">
		  <ul class="footer-items clearfix">
			<li class="footer-item item-1">
				<div class="r2g-footer-xbox r2g-footer-sub-component text-align-left">
					<div class="intro-content"></div>
					<div class="xbox-wrapper">
						<div class="image-wrapper">
							<picture>
								<img class="" src="<?= PUBLIC_URL ?>/assets/images/logo.jpg" title="Lorem ipsum dolor sit amet" alt="Lorem ipsum dolor sit amet" >
							</picture>
						</div>
						<div class="flex-container">
							<div class="content-wrapper">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus augue elit, malesuada venenatis rhoncus.</p>
							</div>
						</div>
					</div>
				</div>
			</li>
			
			<li class="footer-item item-2">
				<div class="r2g-footer-sub-component r2g-footer-menu text-align-left vertical single-col-320 two-col-768 single-col-1024 single-col-1366">
					<div class="intro-content">
                        <h3>Quick Links</h3>
					</div>
					<nav class="menu">
						<ul class="">
							<li class="home first"><a href="<?= BASE_URL ?>">Home</a></li>
							<li class="product"><a href="<?= BASE_URL ?>/product">Products</a></li>
							<li class="about"><a href="<?= BASE_URL ?>/about">About Us</a></li>
							<li class="contact"><a href="<?= BASE_URL ?>/contact">Contact Us</a></li>
						</ul>
					</nav>
				</div>
			</li>

            <li class="footer-item item-3">
				<div class="r2g-footer-social-media r2g-footer-sub-component horizontal with-label">
					<div class="intro-content">
                        <h3>Follow Us</h3>
					</div>				
                    <ul>
                        <li class="sm-item" data-name="icon-i-45-facebook-circle-fill">
                            <a class="" href="#" title="Facebook" >Facebook</a>
                        </li>
                        <li class="sm-item" data-name="icon-i-55-instagram-02-fill">
                            <a class="" href="#" title="Instagram" >Instagram</a>
                        </li>
                        </li>
                    </ul>
				</div>
			</li>
			
			<li class="footer-item item-4">
				<div class="r2g-footer-component contact-details">
                    <h3 class="check-empty-text">Contact Us</h3>
                    
                    <div class="contact-detail-row address">
                        <div class="contact-detail-row-inner">
                            <address>
                                <span class="icon icon-i-65-locate-place-fill"></span>
                                Juusintie 5, Kauniainen,<br/> Finland.
                            </address>
                        </div>
                    </div>
                    <div class="contact-detail-row tel">
                        <div class="contact-detail-row-inner">
                            <span class="icon icon-i-84-phone-call-fill"></span>
                            <a class="check-empty" href="tel:<?= CONTACT_PHONE ?>" title="Telephone Number"><?= CONTACT_PHONE ?></a>
                        </div>
                    </div>
                    <div class="contact-detail-row email">
                        <div class="contact-detail-row-inner">
                            <span class="icon icon-i-39-e-mail-fill"></span>
                            <a class="check-empty" href="mailto:<?= CONTACT_EMAIL ?>" title="Email Address"><?= CONTACT_EMAIL ?></span></a>
                        </div>
                    </div>
                </div>
			</li>
		</ul>
	</div>
    <div class="copyright-bar clearfix">
        <div class="container">
            <p class="copyright">Copyright  &copy; <span class="copyright-year"><?= date("Y") ?></span> kakkutaika. All rights reserved.</p>
            <p class="designed-by">Website Design and Development by WebPartner</p>
        </div>
    </div>
</footer>

<script src="<?= PUBLIC_URL ?>/assets/js/component.js" data-position="bottom"></script>
<script src="<?= PUBLIC_URL ?>/assets/js/libs/aos/aos.js" data-position="bottom"></script>
<script src="<?= PUBLIC_URL ?>/assets/js/theme.js" data-position="bottom"></script>
</body>
</html>