<?php
    $contact = content('contact.content');
    $footersociallink = element('footer.element');
?>  
  
  <!-- header-section start  -->
  <header class="header">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 header-top-left d-lg-block d-none">
            <ul class="hc-list justify-content-lg-start justify-content-center">
              <li><a href="mailto:<?php echo e(@$contact->data->email); ?>"><i class="fas fa-envelope"></i> <?php echo e(@$contact->data->email); ?></a></li>
              <li><a href="tel:<?php echo e(@$contact->data->phone); ?>"><i class="fas fa-mobile-alt"></i> <?php echo e(@$contact->data->phone); ?></a></li>
            </ul>
          </div>
          <div class="col-lg-6 header-top-right">
            <ul class="hc-list justify-content-lg-end justify-content-center">
              <li>
                <ul class="social-icons">
                  <?php $__empty_1 = true; $__currentLoopData = $footersociallink; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li>
                      <a href="<?php echo e(__(@$item->data->social_link)); ?>" target="_blank"><i class="<?php echo e(@$item->data->social_icon); ?>"></i></a>
                    </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <?php endif; ?>
                </ul>
              </li>
              <select class="changeLang" aria-label="Default select example">
                <?php $__currentLoopData = $language_top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($top->short_code); ?>"
                    <?php echo e(session('locale') == $top->short_code ? 'selected' : ''); ?>>
                    <?php echo e(__(ucwords($top->name))); ?>

                  </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </ul>
          </div>
        </div>
      </div>
    </div><!-- header-top end -->

    <div class="header-bottom"> 
      <div class="container">
        <nav class="navbar navbar-expand-xl p-0 align-items-center">

            <a class="site-logo site-title" href="<?php echo e(route('home')); ?>">
                <?php if(@$general->logo): ?>
                    <img class="img-fluid rounded sm-device-img text-align" src="<?php echo e(getFile('logo', @$general->logo)); ?>" width="100%" alt="pp">
                <?php else: ?>
                    <?php echo e(__('No Logo Found')); ?>

                <?php endif; ?>
            </a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="menu-toggle"></span>
            </button>
            <div class="collapse navbar-collapse mt-lg-0 mt-3" id="mainNavbar">
                <ul class="nav navbar-nav sp_main_menu me-auto">
                    <li class="nav-item <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>"><a class="nav-link" href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>

                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('investmentplan')); ?>"><?php echo e(__('Investment Plans')); ?></a>
                    </li>

                    <?php $__empty_1 = true; $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('pages', $page->slug)); ?>"><?php echo e(__($page->name)); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
                    <?php endif; ?> 

                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('allblog')); ?>"><?php echo e(__('Blog')); ?></a></li>
                    
                </ul>
                <div class="navbar-action">
                    <?php if(Auth::user()): ?>
                        <a class="btn main-btn btn-sm" href="<?php echo e(route('user.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    <?php else: ?>
                        <a class="text-white me-3" href="<?php echo e(route('user.login')); ?>"><?php echo e(__('Login')); ?></a>
                        <a href="<?php echo e(route('user.register')); ?>" class="btn main-btn btn-sm">Sign up <i class="las la-long-arrow-alt-right ms-2"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
      </div>
    </div><!-- header-bottom end --> 
  </header>
  <!-- header-section end  -->


<?php /**PATH /home/bitcointradinghub.org/public_html/core/resources/views/theme3/layout/header.blade.php ENDPATH**/ ?>