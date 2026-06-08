<?php require PATH_VIEW.'admin/layouts/header.php'; ?>

<h2>

Chi tiết đơn hàng #<?= $order['id'] ?>

</h2>

<div class="card mb-4">

<div class="card-body">

<p>

<b>Khách hàng:</b>

<?= $order['fullname'] ?>

</p>

<p>

<b>Số điện thoại:</b>

<?= $order['phone'] ?>

</p>

<p>

<b>Địa chỉ:</b>

<?= $order['address'] ?>

</p>

<p>

<b>Trạng thái:</b>

<?= $order['status'] ?>

</p>

</div>

</div>

<table class="table table-bordered">

<tr>

<th>Sản phẩm</th>
<th>Giá</th>
<th>Số lượng</th>
<th>Thành tiền</th>

</tr>

<?php foreach($items as $item): ?>

<tr>

<td>

<?= $item['product_name'] ?>

</td>

<td>

<?= number_format($item['price']) ?> đ

</td>

<td>

<?= $item['quantity'] ?>

</td>

<td>

<?= number_format($item['subtotal']) ?> đ

</td>

</tr>

<?php endforeach; ?>

</table>

<div class="text-end">

<h4>

Tổng tiền:

<?= number_format($order['total_amount']) ?> đ

</h4>

</div>

<?php require PATH_VIEW.'admin/layouts/footer.php'; ?>