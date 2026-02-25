<div data-blockid="block-content-002" class="row strip-row clearfix r2g-content-main-strip text-align-center" data-aos="fade">
    <div class="container">
        <div class="content-wrapper">
            <h1><?= $data[0]['itemTitle'] ?></h1>
            <?= $data[0]['content'] ?>
        </div>
    </div>
</div>

<div data-blockid="block-flex-list-row-0002" class="row strip-row clearfix r2g-flex-xlist-main-strip text-align-center masonry-grid has-filter single-item two-col-xlist-768 three-col-xlist-1024 four-col-xlist-1366 four-col-xlist-1600 with-gap flex-align-top flex-justify-center">
    <div class="container">
        <div class="intro-content" data-aos="fade-up"> 
        </div>
        <div class="xList xlist-strip flex-xlist r2g-list" data-aos="fade-up">
            <ul class="xList-items list-style-none strip-xlist">

                <?php foreach ($products as $product): 
                    $slug = seoUrl($product['itemTitle']);

                    // Split string
                    $items = array_map('trim', explode(',', $product['itemCategory']));

                    // Remove "featured"
                    $items = array_filter($items, fn($item) => $item !== 'featured');

                    // Build result with both versions
                    $catResult = [];
                    foreach ($items as $item) {
                        $formatted = ucwords(str_replace('_', ' ', $item));
                        $category = str_replace('_', '', $item);
                        $catResult[] = [
                            'category' => $category,
                            'label' => $formatted
                        ];
                    }
                ?>
                    <li class="xList-item item-1" data-cat="<?= $catResult[0]['label'] ?>||<?= $catResult[0]['category'] ?>">
                        <div class="r2g-xbox-sub-component r2g-sub-component text-align-center">
                            <a class="parent-link" href="<?= BASE_URL . '/cakes/' . $slug . "-" . $product['id'] ?>">
                                <div class="image-wrapper">
                                    <picture>
                                        <img class="" src="<?= BASE_URL ?>/admin/<?= htmlspecialchars($product['itemImage']) ?>" title="<?= htmlspecialchars($product['itemTitle']) ?>" alt="<?= htmlspecialchars($product['itemTitle']) ?>" >
                                    </picture>
                                </div>
                                <div class="flex-container ">
                                    <div class="content-wrapper">
                                        <h2><?= htmlspecialchars($product['itemTitle']) ?></h2>
                                        <p><?= htmlspecialchars($product['lineOne']) ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                <?php endforeach; ?>
                
            </ul>
        </div>
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