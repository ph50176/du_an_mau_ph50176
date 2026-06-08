<?php require PATH_VIEW.'admin/layouts/header.php'; ?>

<h2 class="mb-4">

Quản lý hoàn hàng

</h2>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Đơn hàng</th>
<th>Khách hàng</th>
<th>Lý do</th>
<th>Trạng thái</th>
<th></th>

</tr>

<?php foreach($returns as $item): ?>

<tr>

<td><?= $item['id'] ?></td>

<td>#<?= $item['order_id'] ?></td>

<td><?= $item['fullname'] ?></td>

<td><?= $item['reason'] ?></td>

<td><?= $item['status'] ?></td>

<td>

<?php if($item['status']=='pending'): ?>

<a
href="?action=admin-return-approve&id=<?= $item['id'] ?>"
class="btn btn-success btn-sm">

Duyệt

</a>

<a
href="?action=admin-return-reject&id=<?= $item['id'] ?>"
class="btn btn-danger btn-sm">

Từ chối

</a>

<?php endif; ?>

</td>

</tr>

<?php endforeach; ?>

</table>

<?php require PATH_VIEW.'admin/layouts/footer.php'; ?>