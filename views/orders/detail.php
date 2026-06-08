<?php require PATH_VIEW.'layouts/header.php'; ?>

<h3 class="mb-4">

Chi tiết đơn hàng #<?= $order['id'] ?>

</h3>

<table class="table table-bordered">

<tr>
    <th>Sản phẩm</th>
    <th>Giá</th>
    <th>SL</th>
    <th>Tạm tính</th>
</tr>

<?php foreach($items as $item): ?>

<tr>

    <td><?= $item['product_name'] ?></td>

    <td><?= number_format($item['price']) ?> đ</td>

    <td><?= $item['quantity'] ?></td>

    <td><?= number_format($item['subtotal']) ?> đ</td>

</tr>

<?php endforeach; ?>

</table>

<a
href="?action=profile"
class="btn btn-secondary">

Quay lại

</a>

<?php require PATH_VIEW.'layouts/footer.php'; ?>