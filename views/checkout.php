<?php require PATH_VIEW.'layouts/header.php'; ?>

<h2>Thanh toán</h2>

<form method="POST" action="?action=checkout-store">

    <input
        type="hidden"
        name="cart_ids"
        value="<?= implode(',', $_POST['cart_ids']) ?>">

    <div class="mb-3">
        <label>Họ tên</label>
        <input
            type="text"
            name="fullname"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Số điện thoại</label>
        <input
            type="text"
            name="phone"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Địa chỉ nhận hàng</label>
        <textarea
            name="address"
            class="form-control"
            required></textarea>
    </div>

    <button class="btn btn-success">

        Đặt hàng

    </button>

</form>
<?php require PATH_VIEW.'layouts/footer.php'; ?>