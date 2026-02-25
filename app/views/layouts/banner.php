
<div class='row strip-row r2g-main-visual clearfix default-banner-full-height default-slogan-center slogan-position-center'  data-autoplayVideo='false' data-loopVideo='false'  data-autoplay='true' data-autoplaySpeed='4000' data-fade='true' data-pager='true' data-arrows='true' data-speed='600' data-cse_blockid="block-640024e620a42___1677731046" data-cse_class_to_apply=".r2g-main-visual" data-cse_name="Main Visual Strip">
    <div class="main-visual-default">
        <div style="display: none" data-cse_class_to_apply=" .main-visual-slogan-wrapper" data-cse_name="All Slogan Wrappers"></div>
        <div style="display: none" data-cse_class_to_apply=".r2g-main-visual .container" data-cse_name="Container"></div>
        <ul class="slider-wrapper list-style-none">

            <?php foreach ($banner as $index=>$item): ?>
                <li class="slider-item item-<?= $index; ?>" data-video=''>
                    <div class="image-only image-wrapper" data-cse_class_to_apply=" .image-wrapper" data-cse_name="Image Wrapper">
                        <picture>
                            <img class="" src="<?= BASE_URL . '/admin/' . $item['attachment']; ?>" title="Aerial view of tea plantation land " alt="Aerial view of tea plantation land " >
                        </picture>
                    </div>
                    <div class="main-visual-slogan-wrapper" data-cse_class_to_apply=" .item-1 .main-visual-slogan-wrapper" data-cse_name="Item 1 Slogan Wrapper">
                        <div class="container">
                            <div class="slogan">
                                <p class="line-one"><?= $item['attTitle']; ?></p>
                                <p class="line-two"><?= $item['attDes']; ?></p>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
            
        </ul>
        <div class="main-visual-arrow-wrapper" data-cse_class_to_apply=" .main-visual-arrow-wrapper" data-cse_name="Arrows Wrapper"></div>
        <div class="main-visual-pager-wrapper" data-cse_class_to_apply=" .main-visual-pager-wrapper" data-cse_name="Pager Wrapper"></div>
        <div style="display: none" data-cse_class_to_apply=" .main-visual-pager-wrapper li" data-cse_name="All Pagers"></div>
        <div style="display: none" data-cse_class_to_apply=" .main-visual-pager-wrapper .slick-active" data-cse_name="Active Pager"></div>
    </div>
    <div class="bottom_wave"></div>
</div>