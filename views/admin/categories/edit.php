<?php require PATH_VIEW . 'admin/layouts/header.php'; ?>

<h2>Sửa danh mục</h2>

<form method="POST">

    <input
        type="text"
        name="name"
        value="<?= $category['name'] ?>"
        class="form-control mb-3">

    <button class="btn btn-primary">

        Cập nhật

    </button>

</form>

<?php require PATH_VIEW . 'admin/layouts/footer.php'; ?>