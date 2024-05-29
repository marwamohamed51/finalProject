<?php
include_once('includes/conn.php');
if (isset($_GET['id']) and $_GET['id'] > 0) {
    $id = $_GET['id'];

}
// select catalog data
try {
    $sql = 'SELECT * FROM `catalog` WHERE `id`=?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $photo_result = $stmt->fetch();

    $photo_title = $photo_result['title'];
    $image = $photo_result['image'];
    $dimension = $photo_result['dimension'];
    $license = $photo_result['license'];
    $format = $photo_result['format'];
} catch (PDOException $e) {
    echo $e->getMessage();
}

//When we click on any image, the photo detail page appears and load all image data.
try {
    $tag_sql = 'SELECT tags.tag_name FROM catalog INNER JOIN tags WHERE catalog.tag_id = tags.id  AND catalog.id=?';
    $tag_stsmt = $conn->prepare($tag_sql);
    $tag_stsmt->execute([$id]);
    $tag_result = $tag_stsmt->fetch();
    $tag_name = $tag_result['tag_name'];
} catch (PDOException $e) {
    echo $e->getMessage();
}

// related photo
try {
    $sql = 'SELECT `id`, `image`, `date`, `title` FROM `catalog` WHERE `active`= 1 ORDER BY `date` DESC';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $info = $stmt->fetchAll();
} catch (PDOException $e) {
    echo $e->getMessage();
}

// apears number of visitors
try {
    $sql = "UPDATE `catalog` SET visitors = visitors + 1 WHERE id =?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
} catch (PDOException $e) {
    echo $e->getMessage();
}



?>


<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-12 tm-text-primary">
            <?php echo $photo_title ?>
        </h2>
    </div>
    <div class="row tm-mb-90">
        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
            <img src="admin/images/<?php echo $image ?>" style="width: 100%;height: auto;" alt="Image"
                class="img-fluid">
        </div>
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
            <div class="tm-bg-gray tm-video-details">
                <p class="mb-4">
                    Please support us by making <a href="https://paypal.me/templatemo" target="_parent"
                        rel="sponsored">a PayPal donation</a>. Nam ex nibh, efficitur eget libero ut, placerat
                    aliquet justo. Cras nec varius leo.
                </p>
                <div class="text-center mb-5">
                    <a href="#" class="btn btn-primary tm-btn-big">Download</a>
                </div>
                <div class="mb-4 d-flex flex-wrap">
                    <div class="mr-4 mb-2">
                        <span class="tm-text-gray-dark">Dimension: </span><span class="tm-text-primary">
                            <?php echo $dimension ?>
                        </span>
                    </div>
                    <div class="mr-4 mb-2">
                        <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary">
                            <?php echo $format ?>
                        </span>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="tm-text-gray-dark mb-3">License</h3>
                    <p>
                        <?php echo $license ?>
                    </p>
                </div>
                <div>
                    <h3 class="tm-text-gray-dark mb-3">Tags</h3>
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">
                        <?php echo $tag_name; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <h2 class="col-12 tm-text-primary">
            Related Photos
        </h2>
    </div>

    <div class="row tm-mb-90 tm-gallery">

        <?php
        foreach ($info as $photo) {
            $id = $photo['id'];
            $image = $photo['image'];
            $date = $photo['date'];
            $title = $photo['title'];
            ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="admin/images/<?php echo $image ?>" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>
                            <?php echo $title ?>
                        </h2>
                        <a href="photo-detail.php?id=<?php echo $id ?>">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">
                        <?php echo $date ?>
                    </span>
                    <span>9,906 views</span>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
    <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/img-02.jpg" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>Perfumes</h2>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">12 Oct 2020</span>
                <span>11,402 views</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/img-03.jpg" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>Clocks</h2>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">8 Oct 2020</span>
                <span>9,906 views</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/img-04.jpg" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>Plants</h2>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">6 Oct 2020</span>
                <span>16,100 views</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/img-05.jpg" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>Morning</h2>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">26 Sep 2020</span>
                <span>16,008 views</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/img-06.jpg" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>Pinky</h2>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">22 Sep 2020</span>
                <span>12,860 views</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/img-07.jpg" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>Bus</h2>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">12 Sep 2020</span>
                <span>10,900 views</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/img-08.jpg" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>New York</h2>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">4 Sep 2020</span>
                <span>11,300 views</span>
            </div>
        </div> -->
</div> <!-- row -->
</div> <!-- container-fluid, tm-container-content -->