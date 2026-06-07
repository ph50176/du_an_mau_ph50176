<?php require PATH_VIEW.'admin/layouts/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h3 class="mb-0">Thêm sản phẩm mới</h3>
    </div>

    <div class="card-body">

        <form method="POST" enctype="multipart/form-data">

            <div class="row">

                <div class="col-md-8">

                    <label class="form-label">
                        Tên sản phẩm
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control mb-3"
                        required>

                    <label class="form-label">
                        Danh mục
                    </label>

                    <select
                        name="category_id"
                        class="form-select mb-3"
                        required>

                        <option value="">
                            -- Chọn danh mục --
                        </option>

                        <?php foreach($categories as $category): ?>

                            <option value="<?= $category['id'] ?>">

                                <?= $category['name'] ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                    <label class="form-label">
                        Mô tả sản phẩm
                    </label>

                    <textarea
                        name="description"
                        rows="8"
                        class="form-control mb-3"></textarea>

                </div>

                <div class="col-md-4">

                    <label class="form-label">
                        Giá bán
                    </label>

                    <input
                        type="number"
                        name="price"
                        min="0"
                        class="form-control mb-3"
                        required>

                    <label class="form-label">
                        Số lượng tồn kho
                    </label>

                    <input
                        type="number"
                        name="stock"
                        min="0"
                        value="0"
                        class="form-control mb-3">

                    <label class="form-label">
                        Ảnh sản phẩm
                    </label>

                    <input
                        type="file"
                        name="thumbnail_file"
                        accept="image/*"
                        class="form-control mb-3">

                    <label class="form-label">
                        Trạng thái
                    </label>

                    <select
                        name="status"
                        class="form-select mb-3">

                        <option value="1">
                            Hiển thị
                        </option>

                        <option value="0">
                            Ẩn
                        </option>

                    </select>

                </div>

            </div>

            <hr>

            <button
                type="submit"
                class="btn btn-success">

                Lưu sản phẩm

            </button>

            <a
                href="?action=admin-products"
                class="btn btn-secondary">

                Quay lại

            </a>

        </form>

    </div>
</div>

<?php require PATH_VIEW.'admin/layouts/footer.php'; ?>