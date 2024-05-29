<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="fas fa-film mr-2"></i>
            Catalog-Z
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1 <?php echo $current_page == 'index.php'? 'active' : '' ?>" aria-current="page" href="index.php">Photos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-2 <?php echo $current_page == 'videos.php'? 'active' : '' ?>" href="videos.php">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3 <?php echo $current_page == 'about.php'? 'active' : '' ?>" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-4 <?php echo $current_page == 'contact.php'? 'active' : '' ?>" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>