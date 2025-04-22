<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="site-url" content="<?php echo e(url('/')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/bootstrap.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/owl.theme.default.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/price-range.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/jquery-ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/sweetalert-bootstrap-4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/font-awesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/flexslider.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/jquery-smartWizard.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/style.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{
            --main-color: <?php echo e(site_settings()->theme_color); ?>;
        }
    </style>
</head>
<body>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-mg-3 col-md-3 col-sm-12 align-self-center">
                    <div class="logo">
                        <a href="<?php echo e(url('/')); ?>">
                            <?php if(site_settings()->site_logo == ''): ?>
                            <h5 class="m-0 my-2"><?php echo e(site_settings()->site_name); ?></h5>
                            <?php else: ?>
                            <img src="<?php echo e(asset('public/site/'.site_settings()->site_logo)); ?>" alt="<?php echo e(site_settings()->site_name); ?>">
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-12">
                    <div class="searchbox position-relative">
                        <form action="<?php echo e(url('search')); ?>" method="GET" class="search-form rounded-0 d-flex">
                            <?php $search = '';  ?>    
                            <?php if(request()->get('keyword')): ?>
                            <?php $search = request()->get('keyword');  ?>    
                            <?php endif; ?>
                            <input type="text" class="form-control rounded-0" id="search" name="keyword" placeholder="Search Product Here..." value="<?php echo e($search); ?>">
                            <button type="submit" class="btn btn-primary rounded-0">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                        <div class="search-content position-absolute"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12">
                    <ul class="header-links ml-auto mr-0 text-center text-md-right">
                    <?php if(Session::has('user_name')): ?>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"><i class="fa fa-user"></i> Hello, <?php echo e(ucfirst(substr(session()->get('user_name'),0,10).'...')); ?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?php echo e(url('/my-profile')); ?>">My Profile</a>
                                <a class="dropdown-item" href="<?php echo e(url('/cart')); ?>">My Cart</a>
                                <a class="dropdown-item" href="<?php echo e(url('/my_orders')); ?>">My Orders</a>
                                <a class="dropdown-item" href="<?php echo e(url('/my-reviews')); ?>">My Reviews</a>
                                <a class="dropdown-item" href="<?php echo e(url('/changepassword')); ?>">Change Password</a>
                                <a class="dropdown-item logout user-logout" href="javascript:void(0)">Log Out</a>
                            </div>
                        </li>
                    <?php else: ?>
                        <li><a href="<?php echo e(url('/user_login')); ?>"><i class="fa fa-user"></i> Login</a></li>
                        <li><a href="<?php echo e(url('/signup')); ?>"><i class="fa fa-user-plus"></i> Signup</a></li>
                    <?php endif; ?>
                        <li><a href="<?php echo e(url('/wishlists')); ?>"><i class="far fa-heart"></i> Wishlist</a><span class="wishlist-count"><?php echo e(user_wishlist()); ?></span></li>
                        <li><a href="<?php echo e(url('/cart')); ?>"><i class="fas fa-shopping-cart"></i> Cart</a><span class="cartlist"><?php echo e(user_cart()); ?></span></li>
                    </ul>
                </div>
            </div>  
        </div>
    </header>
    <nav class="navbar navbar-expand-lg shadow-sm header-menu p-0">
        <!-- <a href="#" class="navbar-brand font-weight-bold d-block d-lg-none">MegaMenu</a> -->
        <button type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div id="navbarContent" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                <?php $__currentLoopData = all_category(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($cat_menu->parent_category == '0'): ?>
                <li class="nav-item dropdown megamenu"><a id="megamneu" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle font-weight-bold text-uppercase"><?php echo e($cat_menu->category_name); ?></a>
                    <div aria-labelledby="megamenu" class="dropdown-menu border-0 m-0">
                        <!-- <div class="container bg-white pt-4 pb-1 px-3 w-auto"> -->
                            <div class="card-columns">
                                <?php $__currentLoopData = all_category(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($sub_cat->level == '1' && $sub_cat->parent_category == $cat_menu->id): ?>
                                <div class="sub-list pl-0 pl-md-3">
                                    <h6><a href="<?php echo e(url('c/'.$sub_cat->category_slug)); ?>"><?php echo e($sub_cat->category_name); ?></a></h6>
                                    <ul class="list-unstyled">
                                        <?php $__currentLoopData = all_category(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($types->level == '2' && $types->parent_category == $sub_cat->id): ?>
                                        <li class="nav-item"><a href="<?php echo e(url('c/'.$types->category_slug)); ?>" class="nav-link text-small pb-0"><?php echo e($types->category_name); ?></a></li>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <!-- </div> -->
                    </div>
                </li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </nav>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/public/components/header.blade.php ENDPATH**/ ?>