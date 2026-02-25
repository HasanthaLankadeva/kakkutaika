<div data-blockid="block-flex-list-row-0003" class="row strip-row clearfix r2g-flex-xlist-main-strip text-align-center simple-grid no-filter single-item one-col-xlist-768 two-col-xlist-1024 two-col-xlist-1366 two-col-xlist-1600 with-gap flex-align-top flex-justify-center">
    <div class="container">
        <div class="intro-content" data-aos="fade-up">
        </div>
        <div class="xList xlist-strip flex-xlist r2g-list" data-aos="fade-up">
            <ul class="xList-items list-style-none strip-xlist">
                <li class="xList-item item-1" data-cat="Label">
                    <div class='r2g-rotator-sub-component r2g-sub-component text-align-left pager-as-thumbs arrows-with-icon'  data-infinite='true' data-auto='false' data-autoplay-speed='4000' data-fade='true' data-vertical='false' data-center-mode='false' data-center-padding='50px' data-pager='true' data-arrows='false' data-speed='600' data-adaptive-height='false'  data-desktop='1' data-landscape='1' data-portrait='1' data-mobile='1'  data-scroll-desktop='1' data-scroll-landscape='1' data-scroll-portrait='1' data-scroll-mobile='1'  data-thumbs-desktop='6' data-thumbs-landscape='5' data-thumbs-portrait='4' data-thumbs-mobile='3'  data-desktop-rows='1' data-landscape-rows='1' data-portrait-rows='1' data-mobile-rows='1'  data-desktop-row-items='1' data-landscape-row-items='1' data-portrait-row-items='1' data-mobile-row-items='1' data-cse_blockid="block-654b79acbbab7___1699445164" data-cse_class_to_apply=".r2g-rotator-sub-component.pager-as-thumbs.arrows-with-icon" data-cse_name="Rotator Sub" data-active-arrow-class=".arrows-with-icon" data-active-pager-class=".pager-as-thumbs">
                        <div class="intro-content" data-cse_class_to_apply=".r2g-rotator-sub-component.pager-as-thumbs.arrows-with-icon > .container > .intro-content" data-cse_name="Intro Wrapper"></div>

                        <div class="xList rotatorElement">
                            <ul class="xList-items list-style-none rotator-wrapper" data-cse_class_to_apply=".r2g-rotator-sub-component.pager-as-thumbs.arrows-with-icon .rotator-wrapper|.r2g-rotator-sub-component.pager-as-thumbs.arrows-with-icon .rotator-wrapper .slick-slide|.r2g-rotator-sub-component.pager-as-thumbs.arrows-with-icon .rotator-wrapper .slick-slide.slick-current" data-cse_name="Rotator Wrapper | All Slides | Current Slide">
                                <li class="xList-item">
                                    <div class='xbox xbox-image r2g-xbox-image-only-sub r2g-sub-component' data-popup-image='true' data-large-image='' data-caption='' data-group='' data-cse_blockid='block-6538eaacd3019___1558933145' data-cse_class_to_apply='.r2g-xbox-image-only-sub' data-cse_name='xBox Image Only Sub'>
                                        <div class="image-wrapper image-wrapper-x-x image-wrapper-10-10" data-cse_class_to_apply=' .image-wrapper' data-cse_name='Image Wrapper'>
                                            <picture>
                                                <span class="icon-i-157-search-bold"></span>
                                                <img class="" src="<?= BASE_URL . '/admin/' . $product['itemImage'] ?>" title="<?= $product['itemTitle']; ?>" alt="<?= $product['itemTitle']; ?>" >
                                            </picture>
                                        </div>
                                    </div>
                                </li>
                                <?php foreach ($gallery as $item): ?>
                                    <li class="xList-item">
                                        <div class='xbox xbox-image r2g-xbox-image-only-sub r2g-sub-component' data-popup-image='true' data-large-image='' data-caption='' data-group='' data-cse_blockid='block-6538eaacd3019___1558933145' data-cse_class_to_apply='.r2g-xbox-image-only-sub' data-cse_name='xBox Image Only Sub'>
                                            <div class="image-wrapper image-wrapper-x-x image-wrapper-10-10" data-cse_class_to_apply=' .image-wrapper' data-cse_name='Image Wrapper'>
                                                <picture>
                                                    <span class="icon-i-157-search-bold"></span>
                                                    <img class="" src="<?= BASE_URL . '/admin/' . $item['attachment'] ?>" title="<?= $product['itemTitle']; ?>" alt="<?= $product['itemTitle']; ?>" >
                                                </picture>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                
                            </ul>
                            
                            <div class="pager-list pager-wrapper nav-pager-group">
                                <div class="pager-count"></div>
                            </div>
                            <div class="nav-arrow-group arrows-wrapper"></div>
                            <div class="nav-thumb-group thumb-wrapper">
                                <div class="thumb-inner-wrapper"></div>
                            </div>
                        </div>
                        <div class="content-wrapper bottom-content" data-cse_class_to_apply=".r2g-rotator-sub-component.pager-as-thumbs.arrows-with-icon .bottom-content" data-cse_name="Bottom Content"></div>
                    </div>

                </li>
                <li class="xList-item item-1" data-cat="Label">
                    <div class="r2g-content-sub sub-component text-align-left detail-content">
                        <div class="content-wrapper">
                            <h1><?= $product['itemTitle']; ?></h1>
                            <p class="price"><?= $product['lineOne']; ?></p>
                            <?= $product['content']; ?>

                            <?php
                                $prices = [];

                                // Collect prices dynamically
                                if (!empty($product['lineOne']))   $prices[] = str_replace('€', '', $product['lineOne']);
                                if (!empty($product['lineTwo']))   $prices[] = str_replace('€', '', $product['lineTwo']);
                                if (!empty($product['lineThree'])) $prices[] = str_replace('€', '', $product['lineThree']);
                                // If you add lineFourPrice, lineFivePrice later → just push them here
                            ?>

                            <div class="other-options cms-form-holder clearfix">
                                <p id="successMsg" style="color:green;"></p>
                                <form id="postForm" class="cms-form">
                                    <input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">
	                                <input type="hidden" name="id" value="<?= htmlspecialchars($product['itemID']) ?>">
                                    <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['itemTitle']) ?>">
                                    <!--input id="price" type="hidden" name="price" value="<?= htmlspecialchars($product['lineOne']) ?>"-->
                                    <div class="item-size">
                                        <div class="left">Size (kg)</div>
                                        <div class="right">
                                            <input class="size" type="number" value="1" min="1" max="<?= count($prices); ?>" name="size">
                                        </div>
                                    </div>
                                    <div class="item-quantity">
                                        <div class="left">Quantity</div>
                                        <div class="right">
                                            <input id="qty" class="qty" type="number" value="1" min="1" max="100" name="quantity">
                                        </div>
                                    </div>
                                    <div class="primary-button order-btn">Order Now</div>
                                    <div class="details-wrapper">
                                        <div class="item-price">
                                            <div class="left"><b>SubTotal</b></div>
                                            <div class="right">
                                                <input id="price" class="price" type="text" readonly value="<?= htmlspecialchars($product['lineOne']) ?>" name="price">
                                            </div>
                                        </div>
                                        <div class="fwrap">
                                            <label class="forms-field-label" for="name">Name <span class="required-label">*</span></label>
                                            <input class="forms-field name" type="text" name="name" id="name" required>
                                        </div>
                                        <div class="fwrap">
                                            <label class="forms-field-label" for="email">Email <span class="required-label">*</span></label>
                                            <input class="forms-field email" type="email" name="email" id="email" required>
                                        </div>
                                        <div class="fwrap">
                                            <label class="forms-field-label" for="phone">Phone <span class="required-label">*</span></label>
                                            <input class="forms-field phone" type="text" name="phone" id="phone" required>
                                        </div>
                                        <div class="fwrap">
                                            <label class="forms-field-label" for="date">Date <span class="required-label">*</span></label>
                                            <input class="forms-field phone" type="date" name="date" id="date" min="<?php echo date("Y-m-d"); ?>" max="<?php echo (new DateTime())->modify('+3 months')->format('Y-m-d'); ?>" required>
                                        </div>
                                        <div class="fb-privacyfield form-group field-privacyfield ">
                                            <div class="checkbox fb-cr">
                                                <label for="privacyfield">I consent to my personal data being stored and processed for the purposes of processing my inquiry. For more information view our <a href="#">Privacy Policy</a>. <span class="required-asterisk">*</span></label>
                                                <input id="privacyfield" name="privacyfield" type="checkbox" required >
                                                <span class="fb-helper fb-checkbox-helper fa"></span>
                                                
                                            </div>
                                        </div>
                                        <button type="submit" class="primary-button confirm-order-btn">Checkout</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div data-blockid="block-tabs-row-0003" class="row strip-row clearfix r2g-tabs-main-strip text-align-left horizontal-tabs show-as-tabs-on-768 show-as-tabs-on-1024 horizontal-tabs-without-rotator" large-desktop="6" desktop="5" landscape="4" portrait="3" mobile="1" second-level-large-desktop="5" second-level-desktop="4" second-level-landscape="3" second-level-portrait="2" second-level-mobile="1">
    <div class="xList tabs-wrapper">
        <div class="container clearfix">
            <div class="intro-content"></div>
            <div class="tabs-inner-wrapper">
            	<div class="tab-titles-wrapper"></div>
                <ul class="xList-items list-style-none first-level tab-content-wrapper">
                    <li class="xList-item active" data-title="Descripton" data-url="">
                        <div class="r2g-content-sub sub-component text-align-left">
                            <div class="content-wrapper">
                                <?= $product['contentTwo']; ?>
                            </div>
                        </div>
                    </li>
                
                    <li class="xList-item" data-title="Review (<?= (is_countable($relatedreviews)) ? count($relatedreviews) : ''; ?>)" data-url="">

                        <?php foreach ($relatedreviews as $reviews): ?>
                            <div class="r2g-content-sub sub-component text-align-left reviews-block">
                                <div class="content-wrapper">
                                    <article><?= $reviews['content']; ?></article>
                                    <div class="name">
                                        <p><?= $reviews['itemTitle']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </li>
                </ul>
            </div>
            <div class="bottom-content content-wrapper">
            </div>
        </div>
    </div>
</div>

<div data-blockid="block-rotator-row-004" class="row strip-row clearfix r2g-rotator-main-strip text-align-left pager-as-bullets arrows-with-icon" data-infinite='true' data-auto='false' data-autoplay-speed='4000' data-fade='false' data-vertical='false' data-center-mode='false' data-center-padding='50px' data-pager='true' data-arrows='true' data-speed='600' data-adaptive-height='false' data-desktop='3' data-landscape='3' data-portrait='2' data-mobile='1' data-scroll-desktop='1' data-scroll-landscape='1' data-scroll-portrait='1' data-scroll-mobile='1' data-thumbs-desktop='6' data-thumbs-landscape='5' data-thumbs-portrait='4' data-thumbs-mobile='3' data-desktop-rows='1' data-landscape-rows='1' data-portrait-rows='1' data-mobile-rows='1' data-desktop-row-items='1' data-landscape-row-items='1' data-portrait-row-items='1' data-mobile-row-items='1' data-active-arrow-class=".arrows-with-icon" data-active-pager-class=".pager-as-bullets">
    <div class="container">
        <div class="intro-content" data-aos="fade-up">
            <h2>Related products</h2>
        </div>
        <div class="xList rotatorElement" data-aos="fade-up">
            <ul class="xList-items list-style-none rotator-wrapper clearfix">

                <?php foreach ($relatedProducts as $product): 
                    $slug = seoUrl($product['itemTitle']);
                ?>
                    <li class="xList-item">
                        <div class="r2g-xbox-sub-component r2g-sub-component text-align-center">
                            <a class="parent-link" href="<?= BASE_URL . '/cakes/' . $slug . "-" . $product['id'] ?>">
                                <div class="image-wrapper">
                                    <picture>
                                        <img class="" src="<?= BASE_URL ?>/admin/<?= htmlspecialchars($product['itemImage']) ?>" title="<?= htmlspecialchars($product['itemTitle']) ?>" alt="<?= htmlspecialchars($product['itemTitle']) ?>" >
                                    </picture>
                                </div>
                                <div class="flex-container ">
                                    <div class="content-wrapper">
                                        <h3><?= htmlspecialchars($product['itemTitle']) ?></h3>
                                        <p><?= htmlspecialchars($product['lineOne']) ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                <?php endforeach; ?>
                
            </ul>
            <div class="pager-list pager-wrapper nav-pager-group">
                <div class="pager-count"></div>
            </div>
            <div class="nav-arrow-group arrows-wrapper"></div>
            <div class="nav-thumb-group thumb-wrapper">
                <div class="thumb-inner-wrapper"></div>
            </div>
        </div>
        <div class="content-wrapper bottom-content"></div>
    </div>
</div>

<?php
    // Function to create SEO-friendly slug
    function seoUrl($string) {
        $string = strtolower($string);                 // lowercase
        $string = preg_replace('/[^a-z0-9\s-]/', '', $string); // remove special chars
        $string = preg_replace('/[\s-]+/', '-', $string); // replace spaces with -
        return trim($string, '-');
    }

    
?>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        const prices = <?= json_encode(array_map('floatval', $prices)); ?>;

        const sizeInput  = document.querySelector(".size");
        const qtyInput   = document.querySelector(".qty");
        const priceInput = document.getElementById("price");

        function clamp(value, min, max) {
            return Math.min(Math.max(value, min), max);
        }

        function updatePrice() {
            let size = parseInt(sizeInput.value, 10);
            let qty  = parseInt(qtyInput.value, 10);

            // Auto-fix invalid values
            size = clamp(size || 1, 1, prices.length);
            qty  = clamp(qty  || 1, 1, 100);

            sizeInput.value = size;
            qtyInput.value  = qty;

            const unitPrice = prices[size - 1];
            const total = unitPrice * qty;

            priceInput.value = '€' + total.toFixed(2);
        }

        sizeInput.addEventListener("input", updatePrice);
        qtyInput.addEventListener("input", updatePrice);

        updatePrice(); // initial run
    });

	document.getElementById('postForm').addEventListener('submit', async function (e) {
		e.preventDefault();

		// Clear old messages
		document.querySelectorAll('.error').forEach(e => e.textContent = '');
		document.getElementById('successMsg').textContent = '';

        if(document.getElementById('privacyfield').checked && document.querySelectorAll('input.error').length == 0){
            const res = await fetch('<?= BASE_URL ?>/cakes/add', {
                method: 'POST',
                body: new FormData(this)
            });
        
            const data = await res.json();

            if (!data.success) {
                for (const field in data.errors) {
                    const el = document.querySelector(`[data-error="${field}"]`);
                    if (el) el.textContent = data.errors[field][0];
                }
                return;
            }

            // Get data directly from form data
            /*const csrfToken = formData.get('csrf_token');
            const product = '';//formData.get('email');
            const productSize = formData.get('size');
            const quantity = formData.get('quantity');
            const price = formData.get('price');
            const customerName = formData.get('name');
            const customerEmail = formData.get('email');
            const orderDate = formData.get('date');*/

            // Send email request to server
            await fetch('<?= BASE_URL ?>/cakes/send_email', {
                method: 'POST',
                body: new FormData(this)
            });

            document.getElementById('successMsg').textContent = data.message;
            this.reset();
        }
	});
</script>