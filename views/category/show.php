<?php require PATH_VIEW.'layouts/header.php'; ?>

<div class="bg-white p-3 rounded shadow-sm mb-4">

    <h3 class="mb-0">

        Danh mục:
        <?= htmlspecialchars($category['name']) ?>

    </h3>

</div>

<div class="row">

<?php foreach($products as $item): ?>

    <div class="col-md-3 mb-4">

        <div class="card">

            <img
                src="<?= $item['thumbnail'] ?>"
                class="card-img-top">

            <div class="card-body">

                <h6>

                    <?= $item['name'] ?>

                </h6>

                <h5 class="text-danger">

                    <?= number_format(
                        $item['price']
                    ) ?>

                    đ

                </h5>

            </div>

        </div>

    </div>

<?php endforeach; ?>

</div>

<?php require PATH_VIEW.'layouts/footer.php'; ?>