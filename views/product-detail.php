<?php require PATH_VIEW . 'layouts/header.php'; ?>

<div class="row bg-white p-4 rounded shadow-sm">

    <div class="col-md-5">

        <img
    src="<?= $product['thumbnail'] ?>"
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

            <?php if(auth()): ?>

<a
href="?action=add-cart&id=<?= $product['id'] ?>"
class="btn btn-danger">

Thêm vào giỏ hàng

</a>

<?php else: ?>

<a
href="?action=login"
class="btn btn-warning">

Đăng nhập để mua hàng

</a>

<?php endif; ?>

        </div>

    </div>
    <hr>

<h4>
    Bình luận sản phẩm
</h4>
<?php if($canComment): ?>

<form
method="POST"
action="?action=comment-store">

<input
type="hidden"
name="product_id"
value="<?= $product['id'] ?>">

<textarea
name="content"
class="form-control mb-3"
required></textarea>

<button
class="btn btn-primary">

Gửi bình luận

</button>

</form>
<hr>

<h5 class="mt-4">
    Danh sách bình luận
</h5>

<?php if(empty($comments)): ?>

<div class="alert alert-light">

    Chưa có bình luận nào

</div>

<?php else: ?>

<?php foreach($comments as $comment): ?>

<div class="card mb-3">

    <div class="card-body">

        <div class="d-flex align-items-center">

            <img
                src="<?= !empty($comment['avatar'])
                    ? $comment['avatar']
                    : BASE_URL . 'assets/images/default-user.png' ?>"
                width="40"
                height="40"
                style="
                    border-radius:50%;
                    object-fit:cover;
                ">

            <div class="ms-2">

                <strong>

                    <?= $comment['fullname'] ?>

                </strong>

                <br>

                <small class="text-muted">

                    <?= $comment['created_at'] ?>

                </small>

            </div>

        </div>

        <hr>

        <p class="mb-0">

            <?= nl2br(
                htmlspecialchars(
                    $comment['content']
                )
            ) ?>

        </p>

    </div>

</div>

<?php endforeach; ?>

<?php endif; ?>
<?php endif; ?>
    <h3 class="mt-5 mb-3">

    Sản phẩm liên quan

</h3>

<div class="row">

<?php foreach($relatedProducts as $item): ?>

    <div class="col-md-3">

        <div class="card">

            <img
src="<?= $item['thumbnail'] ?>"
class="img-fluid">

            <div class="card-body">

                <h6>

<a
href="?action=product-detail&id=<?= $item['id'] ?>"
class="text-decoration-none text-dark">

<?= $item['name'] ?>

</a>

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