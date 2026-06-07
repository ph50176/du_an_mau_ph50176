<?php require PATH_VIEW . 'layouts/header.php'; ?>

<div class="row bg-white p-4 rounded shadow-sm">

    <div class="col-md-5">

        <img
            src="<?= BASE_ASSETS_UPLOADS . $product['thumbnail'] ?>"
            class="img-fluid rounded">

    </div>

    <div class="col-md-7">

        <h2>
            <?= $product['name'] ?>
        </h2>

        <p class="text-muted">

            Danh mục:
            <?= $product['category_name'] ?>

        </p>

        <h3 class="text-danger">

            <?= number_format($product['price']) ?> đ

        </h3>

        <p>

            Tồn kho:
            <?= $product['stock'] ?>

        </p>

        <hr>

        <h5>Mô tả sản phẩm</h5>

        <p>

            <?= nl2br($product['description']) ?>

        </p>

        <div class="mt-4">

            <a
                href="?action=add-cart&id=<?= $product['id'] ?>"
                class="btn btn-danger">

                Thêm vào giỏ hàng

            </a>

        </div>

    </div>
    <h3 class="mt-5 mb-3">

    Sản phẩm liên quan

</h3>

<div class="row">

<?php foreach($relatedProducts as $item): ?>

    <div class="col-md-3">

        <div class="card">

            <img
src="<?= $product['thumbnail'] ?>"
class="img-fluid">

            <div class="card-body">

                <h6>

                    <?= $item['name'] ?>

                </h6>

                <p class="text-danger">

                    <?= number_format($item['price']) ?> đ

                </p>

            </div>

        </div>

    </div>

<?php endforeach; ?>

</div>

</div>

<?php require PATH_VIEW . 'layouts/footer.php'; ?>