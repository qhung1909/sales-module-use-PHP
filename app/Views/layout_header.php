<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=APPURL?>css/bootstrap.min.css">
    <title>Document</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Module Bán Hàng </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto  mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?=APPURL?>">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?=APPURL?>product/cart">Giỏ hàng</a>
                    </li>
                    <!-- Example single danger button -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"> Danh mục
                        </a>
                        <ul class="dropdown-menu">    
                            <?php foreach($categories as $chude): ?>
                            <li><a class="dropdown-item" href="<?=APPURL?>product/categories/<?=$chude['iddm']?>"><?=$chude['tendm']?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php if(isset($_SESSION['user'])){
                                echo 'Xin chào, '.$_SESSION['user']['hoten'];
                            } else{
                                echo 'Tài Khoản';
                            }
                                ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php if(isset($_SESSION['user'])): ?>
                            <li><a class="dropdown-item" href="<?=APPURL?>user/logout">Đăng xuất</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?=APPURL?>user/tracking">Theo dõi đơn hàng</a></li>
                            <?php else: ?>
                            <li><a class="dropdown-item" href="<?=APPURL?>user/login">Đăng Nhập</a></li>
                            <li><a class="dropdown-item" href="<?=APPURL?>user/register">Đăng Kí</a></li>

                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="<?=APPURL?>product/search" method="post">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>



    <div class="container mt-4">