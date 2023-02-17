<?php $__env->startSection('content'); ?>
<div id="home">
        <div class="container text-center">
            <nav id="menu" data-toggle="offcanvas" data-target=".navmenu">
                <span class="fa fa-bars"></span>
            </nav>
            <div class="content">
                <h4>Welcome.Take a look of our products</h4>
                <hr>
                <div class="header-text btn">
                    <h1><span id="head-title"></span></h1>
                </div>
            </div>
            <div class="col-md-3">
                
                
                <div class="card">
                    <div class="card-header"><h4>Brands</h4></div>
                    <div class="card-body">
                        <label class="d-block">
                            <input type="checkbox" name="categorySort" value=""/>Adidas
                        </label>
                        <label class="d-block">
                            <input type="checkbox" name="categorySort" value=""/>Nike
                        </label>
                        <label class="d-block">
                            <input type="checkbox" name="categorySort" value=""/>Jordan
                        </label>
                    </div>
                </div>
                
                <form action="<?php echo e(url('/prices')); ?>" method="get">
                    
                     <div class="card">
                    <div class="card-header"><h4>Prices</h4></div>
                    <div class="card-body">
                        <label class="d-block">
                            <input type="radio" name="priceSort" value="high-to-low" />High to Low
                        </label>
                        <label class="d-block">
                            <input type="radio" name="priceSort" value="low-to-high"/>Low to High
                        </label>
                    </div>
                </div>
                
                </form>
               
                
                
                
                
            </div>
            
            <form action="<?php echo e(url('search')); ?>" method="get" class="form-inline" style="float: right">
                <input class="form-control" type="search" name="search" placeholder="search"/>
                <input type="submit" value="Search" class="btn btn-success"/>
            </form>
<div style="width: 100%; height: auto; margin: 50px 0; display: flex; flex-wrap: wrap; justify-content: center;">
   <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="width: 300px; height: auto; border: 1px solid black; margin: 20px;">
            <div style="width: 100%; height: 280px; background-image: url('assets/products/<?php echo e($product->image); ?>'); 
                        background-size: cover; background-position: center center;"></div>
            <div style="width: 100%; height: auto;">
                <a href="product/<?php echo e($product->id); ?>" style="text-align: center; font-weight: bold; font-style: normal; color: inherit;"><h3 ><?php echo e($product->name); ?></h3></a>
                <h4 style="display: flex; justify-content: flex-start; padding: 10px; padding-top: 30px;"> <?php echo e($product->price); ?>€</h4>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
    <?php if(method_exists($products,'links')): ?>
    <div class="d-flex justify-content-center">
        <?php echo $products->links(); ?>

    </div>
    <?php endif; ?>
    <?php if(session('message')): ?>
        <div class="alert alert-success myalert"><?php echo e(session('message')); ?></div>
    <?php endif; ?>
    <!-- Services Section -->
    <div id="services">
        <div class="container text-center">

            <div class="space"></div>

            
            <?php if(auth()->guard()->check()): ?>
                <div class="text-center" style="margin: 30px 0;">
                   
                </div>
            <?php endif; ?>
            <a href="#works" class="down-btn page-scroll">
                <span class="fa fa-angle-down"></span>
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/shop/resources/views/products/index.blade.php ENDPATH**/ ?>