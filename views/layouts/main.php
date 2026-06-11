<?php

$isAdminPage = str_contains($_GET['action'] ?? '', 'admin');

?>
<?php if(!$isAdminPage): ?>

    <?php require_once PATH_VIEW . 'layouts/header.php'; ?>

<?php endif; ?>
<?php

$action = $_GET['action'] ?? '/';

/*
|--------------------------------------------------------------------------
| CHỈ HIỂN THỊ BANNER Ở TRANG CHỦ
|--------------------------------------------------------------------------
*/

if($action == '/'){
    
    require_once PATH_VIEW . 'layouts/banner.php';

}

?>

<main>

    <?php require_once PATH_VIEW . $view; ?>

</main>

<?php

/*
|--------------------------------------------------------------------------
| CHỈ HIỂN THỊ BANNER 2 + PRODUCTS Ở TRANG CHỦ
|--------------------------------------------------------------------------
*/

if($action == '/'){

    require_once PATH_VIEW . 'layouts/banner2.php';

    require_once PATH_VIEW . 'products/index.php';

}

?>

<?php if(!$isAdminPage): ?>

    <?php require_once PATH_VIEW . 'layouts/footer.php'; ?>

<?php endif; ?>
