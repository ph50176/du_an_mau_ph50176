<?php require PATH_VIEW.'layouts/header.php'; ?>

<h2>Đổi mật khẩu</h2>

<form method="POST">

    <div class="mb-3">

        <label>Mật khẩu hiện tại</label>

        <input
            type="password"
            name="old_password"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Mật khẩu mới</label>

        <input
            type="password"
            name="new_password"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Nhập lại mật khẩu mới</label>

        <input
            type="password"
            name="confirm_password"
            class="form-control">

    </div>

    <button
        class="btn btn-primary">

        Đổi mật khẩu

    </button>

</form>

<?php require PATH_VIEW.'layouts/footer.php'; ?>