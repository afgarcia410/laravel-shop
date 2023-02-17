<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>StockX</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="shortcut icon" href="assets/logo/StockXAuthor.jpg" type="image/x-icon"/>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="<?php echo e(url('')); ?>">StockX</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php echo e($activeHome ?? ''); ?>">
                       
                    </li>
                    <?php echo $__env->yieldContent('navItems'); ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li><a href="<?php echo e(url('product')); ?>" class="nav-link">Shop</a></li>
            <?php if(auth()->guard()->check()): ?>
              <li><a href="<?php echo e(url('user')); ?>"  class="nav-link">Profile</a></li>
              <li><a href="<?php echo e(url('logout')); ?>"  class="nav-link">Log out</a></li>
            <?php endif; ?>
            <li><a href="<?php echo e(url('login')); ?>"  class="nav-link">Log in</a></li>
            <li><a href="<?php echo e(url('register')); ?>"  class="nav-link">Register</a></li>
                </ul>
            </div>
        </nav>
        <?php echo $__env->yieldContent('modalContent'); ?>
        <main>
            <div class="jumbotron">
                <div class="container">
                    <h4 class="display-4"><?php echo e($title ?? 'Shop'); ?></h4>
                </div>
            </div>
            <div class="container">
                <!-- para mostrar mensajes de error -->
                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <!-- para mostrar mensajes de operaciones -->
                <?php if(session('message')): ?>
                    <div class="alert alert-success"><?php echo e(session('message')); ?></div>
                <?php endif; ?>
                <?php echo $__env->yieldContent('content'); ?>
                <hr>
            </div>
        </main>
        <footer class="container">
            <p>
                &copy; SHOP 2023
                <small style="color: whitesmoke;"></small>
            </p>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <?php echo $__env->yieldContent('scripts'); ?>
    </body>
</html><?php /**PATH /var/www/html/laravel/shop/resources/views/layouts/app.blade.php ENDPATH**/ ?>