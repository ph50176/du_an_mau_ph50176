<?php require PATH_VIEW.'admin/layouts/header.php'; ?>

<h2>Quản lý User</h2>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Họ tên</th>
<th>Email</th>
<th>Role</th>
<th></th>

</tr>

<?php foreach($users as $user): ?>

<tr>

<td><?= $user['id'] ?></td>

<td><?= $user['fullname'] ?></td>

<td><?= $user['email'] ?></td>

<td><?= $user['role'] ?></td>

<td>

<a
href="?action=admin-user-delete&id=<?= $user['id'] ?>"
class="btn btn-danger">

Xóa

</a>

</td>

</tr>

<?php endforeach; ?>

</table>

<?php require PATH_VIEW.'admin/layouts/footer.php'; ?>