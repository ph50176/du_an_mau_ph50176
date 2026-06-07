<?php require PATH_VIEW . 'admin/layouts/header.php'; ?>

<div class="d-flex justify-content-between mb-3">

    <h2>Quản lý danh mục</h2>

    <a
        href="?action=admin-category-create"
        class="btn btn-success">

        Thêm danh mục

    </a>

</div>

<table class="table table-bordered">

    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Thao tác</th>
    </tr>

    <?php foreach($categories as $item): ?>

    <tr>

        <td><?= $item['id'] ?></td>

        <td><?= $item['name'] ?></td>

        <td>

            <a
                href="?action=admin-category-edit&id=<?= $item['id'] ?>"
                class="btn btn-warning">

                Sửa

            </a>

            <a
                href="?action=admin-category-delete&id=<?= $item['id'] ?>"
                class="btn btn-danger">

                Xóa

            </a>

        </td>

    </tr>

    <?php endforeach; ?>

</table>

<?php require PATH_VIEW . 'admin/layouts/footer.php'; ?>