<?php require PATH_VIEW . 'layouts/header.php'; ?>

<h2 class="mb-4">
    Kết quả tìm kiếm
</h2>

<div class="row">

<?php if (!empty($products)): ?>

    <?php foreach($products as $item): ?>

        <div class="col-md-3 mb-4">

            <div class="card h-100">

                <a href="?action=product-detail&id=<?= $item['id'] ?>">

                    <img
                        src="<?= $item['thumbnail'] ?>"
                        class="card-img-top">

                </a>

                <div class="card-body">

                    <h6>

                        <a
                            href="?action=product-detail&id=<?= $item['id'] ?>"
                            class="text-decoration-none text-dark">

                            <?= $item['name'] ?>

                        </a>

                    </h6>

                    <h5 class="text-danger">

                        <?= number_format($item['price']) ?> đ

                    </h5>

                </div>

            </div>

        </div>

    <?php endforeach; ?>

<?php else: ?>

    <div class="alert alert-warning">

        Không tìm thấy sản phẩm phù hợp.

    </div>

<?php endif; ?>

</div>

<?php require PATH_VIEW . 'layouts/footer.php'; ?>