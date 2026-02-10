<?php
$content = content('contact.content');
$contentlink = content('footer.content');
$footersociallink = element('footer.element');
$serviceElements = element('service.element');

?>

<footer class="footer-section has-bg-img">
    <div class="footer-logo-portion">
        <div class="container">
            <div class="row gy-3 align-items-center">
                <div class="col-lg-5">
                    <ul class="footer-inline-list justify-content-lg-start justify-content-center">
                        <li>
                            <a href="#0"><i class="fas fa-envelope"></i> <?php echo e(__(@$content->data->email)); ?></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fas fa-phone"></i> <?php echo e(__(@$content->data->phone)); ?></a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-2 text-center">
                    <a href="<?php echo e(route('home')); ?>" class="footer-logo">
                        <?php if(@$general->logo): ?>
                            <img class="img-fluid rounded sm-device-img text-align"
                                src="<?php echo e(getFile('logo', @$general->whitelogo)); ?>" width="100%" alt="pp">
                        <?php else: ?>
                            <?php echo e(__('No Logo Found')); ?>

                        <?php endif; ?>
                    </a>
                </div>

                <div class="col-lg-5">
                    <ul class="social-links justify-content-lg-end justify-content-center">
                        <?php $__empty_1 = true; $__currentLoopData = $footersociallink; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li>
                                <a href="<?php echo e(__(@$item->data->social_link)); ?>" target="_blank"
                                    class="twitter"><i class="<?php echo e(@$item->data->social_icon); ?>"></i></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-menu-portion">
        <div class="container">
            <div class="row gy-2">
                <div class="col-lg-6">
                    <ul class="footer-inline-list justify-content-lg-start justify-content-center">
                        <li> <a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <?php $__empty_1 = true; $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li><a href="<?php echo e(route('pages', $page->slug)); ?>"><?php echo e(__($page->name)); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-lg-6 text-lg-end text-center">
                    <p class="mb-0 footer-text-clr">
                        <?php if(@$general->copyright): ?>
                            <?php echo e(__(@$general->copyright)); ?>

                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer><?php /**PATH /home/bitcointradinghub.org/public_html/core/resources/views/theme3/layout/footer.blade.php ENDPATH**/ ?>