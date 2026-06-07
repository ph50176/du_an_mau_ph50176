<?php require PATH_VIEW . 'layouts/header.php'; ?>

<div class="row">

    <!-- Thông tin -->

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

                <h4>
                    <?= $user['fullname'] ?>
                </h4>

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

                <h4>

                    Đơn hàng của tôi

                </h4>

            </div>

            <div class="card-body">

                <table class="table">

                    <tr>

                        <th>Mã đơn</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Ngày mua</th>

                    </tr>

                    <?php if(!empty($orders)): ?>

                        <?php foreach($orders as $order): ?>

                        <tr>

                            <td>
                                #<?= $order['id'] ?>
                            </td>

                            <td>
                                <?= number_format(
                                    $order['total_amount']
                                ) ?> đ
                            </td>

                            <td>

                                <?=
                                match($order['status'])
                                {
                                    'pending' => 'Chờ xử lý',
                                    'processing' => 'Đang xử lý',
                                    'shipping' => 'Đang giao',
                                    'completed' => 'Hoàn thành',
                                    'cancelled' => 'Đã hủy',
                                    default => $order['status']
                                }
                                ?>

                            </td>

                            <td>
                                <?= $order['created_at'] ?>
                            </td>

                        </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="4">

                                Chưa có đơn hàng nào

                            </td>

                        </tr>

                    <?php endif; ?>

                </table>

            </div>

        </div>

    </div>

</div>

<?php require PATH_VIEW . 'layouts/footer.php'; ?>