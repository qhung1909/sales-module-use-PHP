<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=APPURL?>css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-0 bg-primary collapse collapse-horizontal show" style="min-height:100vh" id="openmenu">
                <strong class="text-center d-block p-3 text-white">Trang quản lí</strong>
                <div class="list-group list-group-item-success m-3">
                    <a href="#" class="list-group-item list-group-item-action  active" aria-current="true">
                        Tổng quan
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Tài khoản</a>
                    <a href="#" class="list-group-item list-group-item-action">Chủ đề</a>
                    <a href="#" class="list-group-item list-group-item-action">Sản phẩm</a>
                    <a href="#" class="list-group-item list-group-item-action">Đơn hàng</a>
                </div>
            </div>
            <div class="col-md p-0">
                <nav class="navbar navbar-expand-lg bg-primary-tertiary" style="background-color: #e3f2fd;">
                    <div class="container-fluid" i>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#openmenu" aria-expanded="false" aria-controls="openmenu">
                            =
                        </button>
                        <a class="navbar-brand" href="#"> Module Bán Hàng</a>
                        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Xin chào, QH
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Trang chủ</a></li>
                                        <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>