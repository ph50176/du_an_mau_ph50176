<?php require PATH_VIEW.'admin/layouts/header.php'; ?>

<h2 class="mb-4">

    Quản lý đơn hàng

</h2>

<table class="table table-bordered table-hover">

    <thead>

    <tr>

        <th>Mã đơn</th>
        <th>Khách hàng</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
        <th>Ngày tạo</th>
        <th width="280">Thao tác</th>

    </tr>

    </thead>

    <tbody>

    <?php foreach($orders as $order): ?>

    <tr>

        <td>

            #<?= $order['id'] ?>

        </td>

        <td>

            <?= $order['fullname'] ?>

        </td>

        <td>

            <?= number_format($order['total_amount']) ?> đ

        </td>

        <td>

            <?php

            $statusText = match($order['status'])
            {
                'pending' => 'Chờ xác nhận',
                'processing' => 'Đang xử lý',
                'shipping' => 'Đang giao hàng',
                'completed' => 'Hoàn thành',
                'cancelled' => 'Đã hủy',
                default => 'Không xác định'
            };

            $color = match($order['status'])
            {
                'pending' => 'secondary',
                'processing' => 'warning',
                'shipping' => 'primary',
                'completed' => 'success',
                'cancelled' => 'danger',
                default => 'dark'
            };

            ?>

            <span class="badge bg-<?= $color ?>">

                <?= $statusText ?>

            </span>

        </td>

        <td>

            <?= $order['created_at'] ?>

        </td>

        <td>

            <a
                href="?action=admin-order-detail&id=<?= $order['id'] ?>"
                class="btn btn-info btn-sm">

                Chi tiết

            </a>

            <?php if($order['status'] == 'pending'): ?>

                <a
                    href="?action=admin-order-status&id=<?= $order['id'] ?>&status=processing"
                    class="btn btn-warning btn-sm">

                    Xác nhận

                </a>

                <a
                    href="?action=admin-order-status&id=<?= $order['id'] ?>&status=cancelled"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Hủy đơn hàng này?')">

                    Hủy

                </a>

            <?php endif; ?>

            <?php if($order['status'] == 'processing'): ?>

                <a
                    href="?action=admin-order-status&id=<?= $order['id'] ?>&status=shipping"
                    class="btn btn-primary btn-sm">

                    Giao hàng

                </a>

                <a
                    href="?action=admin-order-status&id=<?= $order['id'] ?>&status=cancelled"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Hủy đơn hàng này?')">

                    Hủy

                </a>

            <?php endif; ?>

            <?php if($order['status'] == 'shipping'): ?>

                <a
                    href="?action=admin-order-status&id=<?= $order['id'] ?>&status=completed"
                    class="btn btn-success btn-sm">

                    Hoàn thành

                </a>

            <?php endif; ?>

            <?php if($order['status'] == 'completed'): ?>

                <span class="badge bg-success">

                    Đã hoàn thành

                </span>

            <?php endif; ?>

            <?php if($order['status'] == 'cancelled'): ?>

                <span class="badge bg-danger">

                    Đã hủy

                </span>

            <?php endif; ?>

        </td>

    </tr>

    <?php endforeach; ?>

    </tbody>

</table>

<?php require PATH_VIEW.'admin/layouts/footer.php'; ?>