<?php require PATH_VIEW . 'layouts/header.php'; ?>

<div class="row">

    <!-- Thông tin cá nhân -->
    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <img
                    src="<?= !empty($user['avatar'])
                        ? $user['avatar']
                        : BASE_URL . 'assets/images/default-user.png' ?>"
                    width="150"
                    height="150"
                    class="rounded-circle border mb-3">

                <h4><?= $user['fullname'] ?></h4>

                <p class="text-muted">
                    <?= $user['email'] ?>
                </p>

                <hr>

                <form
                    method="POST"
                    action="?action=update-avatar"
                    enctype="multipart/form-data">

                    <input
                        type="file"
                        name="avatar"
                        class="form-control mb-3">

                    <button
                        class="btn btn-primary w-100">

                        Cập nhật ảnh

                    </button>

                </form>

                <a
                    href="?action=change-password"
                    class="btn btn-warning w-100 mt-2">

                    Đổi mật khẩu

                </a>

            </div>

        </div>

    </div>

    <!-- Đơn hàng -->
    <div class="col-md-8">

        <div class="card">

            <div class="card-header">

                <h4>Đơn hàng của tôi</h4>

            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>

                    <tr>

                        <th>Mã đơn</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Ngày mua</th>
                        <th>Thao tác</th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php if(!empty($orders)): ?>

                        <?php foreach($orders as $order): ?>

                        <tr>

                            <td>
                                #<?= $order['id'] ?>
                            </td>

                            <td>
                                <?= number_format($order['total_amount']) ?> đ
                            </td>

                            <td>

                                <?=
                                match($order['status'])
                                {
                                    'pending' => 'Chờ xác nhận',
                                    'processing' => 'Đang xử lý',
                                    'shipping' => 'Đang giao hàng',
                                    'completed' => 'Hoàn thành',
                                    'returned' => 'Đã hoàn hàng',
                                    'cancelled' => 'Đã hủy',
                                    default => $order['status']
                                }
                                ?>

                            </td>

                            <td>
                                <?= $order['created_at'] ?>
                            </td>

                             <td>

    <a
        href="?action=order-detail&id=<?= $order['id'] ?>"
        class="btn btn-info btn-sm">

        Chi tiết

    </a>

    <?php
    $returnModel = new ReturnModel();

    $return = $returnModel->findByOrder(
        $order['id']
    );
    ?>

    <!-- Hủy đơn -->
    <?php if(
        $order['status'] == 'pending'
        || $order['status'] == 'processing'
    ): ?>

        <a
            href="?action=cancel-order&id=<?= $order['id'] ?>"
            class="btn btn-danger btn-sm"
            onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này?')">

            Hủy đơn

        </a>

    <?php endif; ?>

    <!-- Hoàn hàng -->
    <?php if(
        $order['status'] == 'completed'
        && !$return
    ): ?>

        <a
            href="?action=request-return&id=<?= $order['id'] ?>"
            class="btn btn-warning btn-sm">

            Hoàn hàng

        </a>

    <?php endif; ?>

    <!-- Đã gửi yêu cầu hoàn -->
    <?php if($return): ?>

        <span class="badge bg-secondary">

            <?= match($return['status'])
            {
                'pending'  => 'Đang chờ duyệt',
                'approved' => 'Đã hoàn hàng',
                'rejected' => 'Từ chối hoàn hàng',
                default    => $return['status']
            } ?>

        </span>

    <?php endif; ?>

</td>

                        </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="5" class="text-center">

                                Chưa có đơn hàng nào

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

        <!-- Lịch sử hoàn hàng -->

        <div class="card mt-4">

            <div class="card-header">

                <h4>Lịch sử hoàn hàng</h4>

            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>

                    <tr>

                        <th>Đơn hàng</th>
                        <th>Lý do</th>
                        <th>Trạng thái</th>
                        <th>Ngày gửi</th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php if(!empty($returns)): ?>

                        <?php foreach($returns as $item): ?>

                        <tr>

                            <td>
                                #<?= $item['order_id'] ?>
                            </td>

                            <td>
                                <?= $item['reason'] ?>
                            </td>

                            <td>

                                <?=
                                match($item['status'])
                                {
                                    'pending' => 'Chờ duyệt',
                                    'approved' => 'Đã chấp nhận',
                                    'rejected' => 'Từ chối',
                                    default => $item['status']
                                }
                                ?>

                            </td>

                            <td>
                                <?= $item['created_at'] ?>
                            </td>

                        </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="4" class="text-center">

                                Chưa có yêu cầu hoàn hàng nào

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?php require PATH_VIEW . 'layouts/footer.php'; ?>