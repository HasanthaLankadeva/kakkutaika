<div data-blockid="block-content-002" class="row strip-row clearfix r2g-content-main-strip text-align-center" data-aos="fade">
    <div class="container">
        <div class="content-wrapper">
            <h1>Services</h1>
        </div>
    </div>
</div>

<div data-blockid="block-flex-list-row-0003" class="row strip-row clearfix r2g-flex-xlist-main-strip text-align-left simple-grid no-filter single-item single-col-xlist-768 single-col-xlist-1024 single-col-xlist-1366 single-col-xlist-1600 with-gap flex-align-top flex-justify-center">
    <div class="container">
        <div class="intro-content" data-aos="fade-up">
        </div>
        <div class="xList xlist-strip flex-xlist r2g-list" data-aos="fade-up">
            <ul class="xList-items list-style-none strip-xlist">

                <?php foreach ($data as $key => $item): 
                    $class = ($key % 2 == 0) ? 'style-1' : 'style-2';
                ?>
                <li class="xList-item item-1" data-cat="Label">
                    <div data-blockid="block-xbox-sub-component-0002" class="r2g-xbox-sub-component r2g-sub-component text-align-left <?= $class ?>">
                        <div class="intro-content">
                        </div>
                        <div class="xbox-wrapper">
                            <div class="image-wrapper">
                                <picture>
                                    <img class="" src="<?= BASE_URL ?>/admin/<?= htmlspecialchars($item['itemImage']) ?>" title="About Us" alt="About Us">
                                </picture>
                            </div>
                            <div class="flex-container">
                                <div class="content-wrapper">
                                    <h3><?= $item['itemTitle'] ?></h3>
                                    <?= $item['content'] ?>
                                    <div class="link-wrapper">
                                        <a href="<?= BASE_URL . $item['lineOne'] ?>" class="link link-option-1">Read More <span class="icon icon-i-324-right-arrow-fill"></span></a>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
</div>