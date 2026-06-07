<?php $user = auth(); ?>

<!DOCTYPE html>
<html>
<head>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<style>

body{
    margin:0;
}

.admin-wrapper{
    display:flex;
}

.sidebar{
    width:250px;
    min-height:100vh;
    background:#212529;
    color:white;
    padding:20px;
}

.sidebar ul{
    list-style:none;
    padding:0;
}

.sidebar a{
    color:white;
    text-decoration:none;
    display:block;
    padding:10px 0;
}

.main{
    flex:1;
}

.admin-header{
    background:white;
    padding:15px;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
}

.content{
    padding:20px;
}

</style>

</head>

<body>

<div class="admin-wrapper">

<?php require 'sidebar.php'; ?>

<div class="main">

<div class="admin-header">

<div class="d-flex justify-content-between">

<form>

<input
type="text"
class="form-control"
placeholder="Tìm kiếm..."
style="width:300px">

</form>

<div>

<?= $user['fullname'] ?? 'Admin' ?>

</div>

</div>

</div>

<div class="content">