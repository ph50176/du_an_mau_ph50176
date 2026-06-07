<?php require PATH_VIEW.'admin/layouts/header.php'; ?>

<h2 class="mb-4">Sửa sản phẩm</h2>

<form method="POST" enctype="multipart/form-data">

    <label>Tên sản phẩm</label>

    <input
        type="text"
        name="name"
        value="<?= htmlspecialchars($product['name']) ?>"
        class="form-control mb-3"
        required>

    <label>Danh mục</label>

    <select
        name="category_id"
        class="form-select mb-3"
        required>

        <?php foreach($categories as $category): ?>

            <option
                value="<?= $category['id'] ?>"
                <?= $product['category_id'] == $category['id']
                    ? 'selected'
                    : '' ?>>

                <?= $category['name'] ?>

            </option>

        <?php endforeach; ?>

    </select>

    <label>Giá bán</label>

    <input
        type="number"
        name="price"
        value="<?= $product['price'] ?>"
        class="form-control mb-3"
        required>

    <label>Số lượng tồn kho</label>

    <input
        type="number"
        name="stock"
        value="<?= $product['stock'] ?>"
        class="form-control mb-3"
        required>

    <label>Ảnh hiện tại</label>

    <div class="mb-3">

        <img
            src="<?= $product['thumbnail'] ?>"
            width="150"
            class="img-thumbnail">

    </div>

    <label>Upload ảnh mới</label>

    <input
        type="file"
        name="thumbnail_file"
        class="form-control mb-3">

    <label>Mô tả sản phẩm</label>

    <textarea
        name="description"
        rows="5"
        class="form-control mb-3"><?= htmlspecialchars($product['description']) ?></textarea>

    <label>Trạng thái</label>

    <select
        name="status"
        class="form-select mb-3">

        <option
            value="1"
            <?= ($product['status'] ?? 1) == 1 ? 'selected' : '' ?>>

            Hiển thị

        </option>

        <option
            value="0"
            <?= ($product['status'] ?? 1) == 0 ? 'selected' : '' ?>>

            Ẩn

        </option>

    </select>

    <button
        type="submit"
        class="btn btn-primary">

        Cập nhật sản phẩm

    </button>

    <a
        href="?action=admin-products"
        class="btn btn-secondary">

        Quay lại

    </a>

</form>

<?php require PATH_VIEW.'admin/layouts/footer.php'; ?>