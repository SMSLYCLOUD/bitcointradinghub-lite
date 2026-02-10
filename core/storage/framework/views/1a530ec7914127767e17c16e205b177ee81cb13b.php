<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">

        <div class="mobile-page-header">
            <h5 class="title"><?php echo e(__('Payment Informations')); ?></h5>
            <a href="<?php echo e(route('user.deposit')); ?>" class="back-btn"><i class="bi bi-arrow-left"></i> <?php echo e(__('Back')); ?></a>
        </div>
    
        <div class="row gy-4">
            <div class="col-xxl-8 col-xl-6">
                <div class="site-card">
                    <div class="card-header text-center">
                        <h5 class="mb-0"><?php echo e(__('Payment Preview')); ?></h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php if(!(session('type') == 'deposit')): ?>
                            <li class="list-group-item  d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Plan Name')); ?>:</span>
                                <span><?php echo e($deposit->plan->plan_name); ?></span>
                            </li>
                            <?php endif; ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Gateway Name')); ?>:</span>
                                <span><?php echo e($deposit->gateway->gateway_name); ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Amount')); ?>:</span>
                                <span><?php echo e(number_format($deposit->amount, 2)); ?></span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Charge')); ?>:</span>
                                <span><?php echo e(number_format($deposit->charge, 2)); ?></span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Conversion Rate')); ?>:</span>
                                <span><?php echo e('1 ' . @$general->site_currency . ' = ' . number_format($deposit->rate, 2)); ?></span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Total Payable Amount')); ?>:</span>
                                <span><?php echo e(number_format($deposit->final_amount, 2)); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-6">
                <div class="site-card">
                    <div class="card-body">
                        <form role="form" action="" method="post">
                            <?php echo csrf_field(); ?>
                            <div class='mb-3 required'>
                                <label class='control-label'><?php echo e(__('Email')); ?></label>
                                <input class='form-control' type='text' name="email">
                            </div>
                            <button class="btn main-btn w-100" type="submit"><?php echo e(__('Pay Now')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(template().'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bitcointradinghub.org/public_html/core/resources/views/theme3/user/gateway/nowpayments.blade.php ENDPATH**/ ?>