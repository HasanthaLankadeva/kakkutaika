<div data-blockid="block-content-002" class="row strip-row clearfix r2g-content-main-strip text-align-center" data-aos="fade">
    <div class="container">
        <div class="content-wrapper">
            <h1><?= $data[0]['itemTitle']; ?></h1>
        </div>
    </div>
</div>

<div data-blockid="" class="row strip-row clearfix r2g-xbox-main-strip text-align-left" data-aos="fadefade-up">
    <div class="container">
        <div class="intro-content"></div>
        <div class="xbox-wrapper">
            <div class="image-wrapper">
                <picture>
                    <img class="" src="<?= BASE_URL ?>/admin/<?= htmlspecialchars($data[0]['itemImage']) ?>" title="About Us" alt="About Us">
                </picture>
            </div>
            <div class="flex-container">
                <div class="content-wrapper">
                    <?= $data[0]['content']; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div data-blockid="block-rotator-row-001" class="row strip-row clearfix r2g-rotator-main-strip text-align-center pager-as-bullets arrows-with-icon shape_one" data-infinite='true' data-auto='true' data-autoplay-speed='4000' data-fade='false' data-vertical='false' data-center-mode='false' data-center-padding='50px' data-pager='true' data-arrows='false' data-speed='600' data-adaptive-height='false' data-desktop='1' data-landscape='1' data-portrait='1' data-mobile='1' data-scroll-desktop='1' data-scroll-landscape='1' data-scroll-portrait='1' data-scroll-mobile='1' data-thumbs-desktop='6' data-thumbs-landscape='5' data-thumbs-portrait='4' data-thumbs-mobile='3' data-desktop-rows='1' data-landscape-rows='1' data-portrait-rows='1' data-mobile-rows='1' data-desktop-row-items='1' data-landscape-row-items='1' data-portrait-row-items='1' data-mobile-row-items='1' data-active-arrow-class=".arrows-with-icon" data-active-pager-class=".pager-as-bullets">
    <div class="container">
        <div class="intro-content" data-aos="fade-up">
            <h2>Clients Say</h2>
        </div>
        <div class="xList rotatorElement" data-aos="fade-up">
            <ul class="xList-items list-style-none rotator-wrapper clearfix">
            
                <?php foreach ($reviews as $review): ?>
                    <li class="xList-item">
                        <div data-blockid="block-box-sub" class="r2g-xbox-sub-component r2g-sub-component text-align-center">
                            <div class="intro-content"></div>
                            <div class="xbox-wrapper">
                                <div class="flex-container">
                                    <div class="content-wrapper">
                                        <article><?= $review['content']; ?></article>
                                        <div class="name">
                                            <p><?= $review['itemTitle']; ?></p>
                                        </div>
                                    </div>
                                </div>
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
        <div class="content-wrapper bottom-content"></div>
    </div>
</div>