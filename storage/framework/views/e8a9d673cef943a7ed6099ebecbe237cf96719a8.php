<?php $__env->startSection('content'); ?>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="item-entry">
                    <!--<div style="width: 100%; height: 280px; background-image: url('assets/products/<?php echo e($products->image); ?>'); 
                        background-size: cover; background-position: center center;;"></div>-->
                        <img src="<?php echo e(asset('/storage/products/'.$products->image)); ?>" width="100%" height="450px" alt=""/>
                </div>
            </div>
            <div class="col-md-6">
                <h2><?php echo e($products->name); ?></h2>
                <p><?php echo e($products->description); ?></p>
                <p style="font-size: 30px"><strong><?php echo e($products->price); ?>€</strong></p>
            </div>
            <input type="submit" value="Add to cart" class="btn btn-success" style="margin-bottom: 30px; margin-left: 575px;"/>
        </div>
        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/shop/resources/views/products/viewProduct.blade.php ENDPATH**/ ?>