<?php require PATH_VIEW . 'admin/layouts/header.php'; ?>

<h2>Quản lý đơn hàng</h2>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>Mã đơn</th>
            <th>Khách hàng</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
        </tr>
    </thead>

    <tbody>

    <?php if (!empty($orders)): ?>

        <?php foreach ($orders as $order): ?>

        <tr>

            <td>#<?= $order['id'] ?></td>

            <td><?= $order['fullname'] ?></td>

            <td>
                <?= number_format($order['total_amount']) ?> đ
            </td>

            <td>
                <?= $order['status'] ?>
            </td>

            <td>
                <?= $order['created_at'] ?>
            </td>

        </tr>

        <?php endforeach; ?>

    <?php else: ?>

        <tr>
            <td colspan="5" class="text-center">
                Chưa có đơn hàng
            </td>
        </tr>

    <?php endif; ?>

    </tbody>

</table>

<?php require PATH_VIEW . 'admin/layouts/footer.php'; ?>