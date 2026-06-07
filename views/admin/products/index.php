<?php require PATH_VIEW.'admin/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">

    <h2>Quản lý sản phẩm</h2>

    <a
        href="?action=admin-product-create"
        class="btn btn-success">

        <i class="fa fa-plus"></i>
        Thêm sản phẩm

    </a>

</div>

<table class="table table-bordered table-hover align-middle">

    <thead class="table-dark">

        <tr>

            <th width="60">ID</th>

            <th width="120">Ảnh</th>

            <th>Tên sản phẩm</th>

            <th width="150">Giá</th>

            <th width="100">Kho</th>

            <th width="180">Danh mục</th>

            <th width="120">Trạng thái</th>

            <th width="180">Thao tác</th>

        </tr>

    </thead>

    <tbody>

    <?php if(!empty($products)): ?>

        <?php foreach($products as $item): ?>

        <tr>

            <td>
                <?= $item['id'] ?>
            </td>

            <td>

                <img
                    src="<?= $item['thumbnail'] ?>"
                    width="80"
                    class="img-fluid rounded border">

            </td>

            <td>

                <strong>
                    <?= htmlspecialchars($item['name']) ?>
                </strong>

            </td>

            <td class="text-danger fw-bold">

                <?= number_format($item['price']) ?> đ

            </td>

            <td>

                <?= $item['stock'] ?>

            </td>

            <td>

                <?= $item['category_name'] ?? 'Chưa có danh mục' ?>

            </td>

            <td>

                <?php if(($item['status'] ?? 1) == 1): ?>

                    <span class="badge bg-success">

                        Hiển thị

                    </span>

                <?php else: ?>

                    <span class="badge bg-secondary">

                        Ẩn

                    </span>

                <?php endif; ?>

            </td>

            <td>

                <a
                    href="?action=admin-product-edit&id=<?= $item['id'] ?>"
                    class="btn btn-warning btn-sm">

                    <i class="fa fa-pen"></i>
                    Sửa

                </a>

                <a
                    href="?action=admin-product-delete&id=<?= $item['id'] ?>"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">

                    <i class="fa fa-trash"></i>
                    Xóa

                </a>

            </td>

        </tr>

        <?php endforeach; ?>

    <?php else: ?>

        <tr>

            <td colspan="8" class="text-center">

                Chưa có sản phẩm nào

            </td>

        </tr>

    <?php endif; ?>

    </tbody>

</table>

<?php require PATH_VIEW.'admin/layouts/footer.php'; ?>