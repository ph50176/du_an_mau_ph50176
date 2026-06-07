<div class="row">

<?php foreach($products as $item): ?>

<div class="col-md-3 mb-4">

<div class="card h-100">

<a
href="?action=product-detail&id=<?= $item['id'] ?>">

<img
src="<?= $item['thumbnail'] ?>"
class="card-img-top">

</a>

<div class="card-body">

<h6>

<?= $item['name'] ?>

</h6>

<h5 class="text-danger">

<?= number_format($item['price']) ?> đ

</h5>

</div>

</div>

</div>

<?php endforeach; ?>

</div>