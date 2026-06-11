<?php require PATH_VIEW . 'layouts/header.php'; ?>

<h2 class="mb-4">
    Giỏ hàng của bạn
</h2>

 <form method="POST" action="?action=checkout">

<table class="table table-bordered bg-white">

<thead>

<tr>

    <th width="50">
        <input
            type="checkbox"
            id="checkAll">
    </th>

    <th>Ảnh</th>
    <th>Tên</th>
    <th>Giá</th>
    <th>SL</th>
    <th>Tổng</th>
    <th></th>

</tr>

</thead>

<tbody>

<?php $grandTotal = 0; ?>

<?php foreach($carts as $item): ?>

<?php
$total =
    $item['price'] *
    $item['quantity'];

$grandTotal += $total;
?>

<tr>

<td>

<input
    type="checkbox"
    name="cart_ids[]"
    value="<?= $item['id'] ?>"
    class="cart-item">

</td>

<td width="120">

<img
src="<?= $item['thumbnail'] ?>"
width="80">

</td>

<td>

<?= $item['name'] ?>

</td>

<td>

<?= number_format($item['price']) ?> đ

</td>

<td>

<a
href="?action=decrease-cart&id=<?= $item['id'] ?>"
class="btn btn-sm btn-secondary">

-

</a>

<?= $item['quantity'] ?>

<a
href="?action=increase-cart&id=<?= $item['id'] ?>"
class="btn btn-sm btn-secondary">

+

</a>

</td>

<td>

<?= number_format($total) ?> đ

</td>

<td>

<a
href="?action=delete-cart&id=<?= $item['id'] ?>"
class="btn btn-danger btn-sm">

Xóa

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

<div class="text-end">

<h3>

Tổng tiền:

<?= number_format($grandTotal) ?> đ

</h3>

<button
type="submit"
class="btn btn-success">

Thanh toán sản phẩm đã chọn

</button>

</div>

</form>


<script>

document
.getElementById('checkAll')
.addEventListener('change',function(){

    document
    .querySelectorAll('.cart-item')
    .forEach(item => {

        item.checked =
            this.checked;

    });

});

</script>
<?php require PATH_VIEW . 'layouts/footer.php'; ?>