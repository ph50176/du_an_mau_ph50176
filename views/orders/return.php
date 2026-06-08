<?php require PATH_VIEW.'layouts/header.php'; ?>

<div class="card">

<div class="card-body">

<h3>

Yêu cầu hoàn hàng

</h3>

<form method="POST">

<div class="mb-3">

<label>

Lý do hoàn hàng

</label>

<textarea
name="reason"
class="form-control"
rows="5"
required></textarea>

</div>

<button
class="btn btn-danger">

Gửi yêu cầu

</button>

</form>

</div>

</div>

<?php require PATH_VIEW.'layouts/footer.php'; ?>