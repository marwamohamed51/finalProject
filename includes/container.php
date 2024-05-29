<?php
include_once('includes/conn.php');
try {
    $sql = 'SELECT `id`, `image`, `date`, `title`,`visitors` FROM `catalog` WHERE `active`= 1 ORDER BY `date` DESC';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $info = $stmt->fetchAll();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<div class="row tm-mb-90 tm-gallery">
    <?php
    foreach ($info as $photo) {
        $id = $photo['id'];
        $image = $photo['image'];
        $date = $photo['date'];
        $title = $photo['title'];
        $visitors = $photo['visitors'];
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
                <span>
                    <?php echo $visitors; ?> views
                </span>
            </div>
        </div>
        <?php
    }
    ?>
</div>