<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">

        <div class="mobile-page-header">
            <h5 class="title"><?php echo e(__('Payment Informations')); ?></h5>
            <a href="<?php echo e(route('user.deposit')); ?>" class="back-btn"><i class="bi bi-arrow-left"></i> <?php echo e(__('Back')); ?></a>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
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
                            <li class="list-group-item  d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Gateway Name')); ?>:</span>
                                <span><?php echo e($deposit->gateway->gateway_name); ?></span>
                            </li>
                            <li class="list-group-item  d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Amount')); ?>:</span>
                                <span><?php echo e(number_format($deposit->amount, 2)); ?></span>
                            </li>

                            <li class="list-group-item  d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Charge')); ?>:</span>
                                <span><?php echo e(number_format($deposit->charge, 2)); ?></span>
                            </li>

                            <li class="list-group-item  d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Conversion Rate')); ?>:</span>
                                <span><?php echo e('1 ' . @$general->site_currency . ' = ' . number_format($deposit->rate, 2)); ?></span>
                            </li>

                            <li class="list-group-item  d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Total Payable Amount')); ?>:</span>
                                <span><?php echo e(number_format($deposit->final_amount, 2)); ?></span>
                            </li>
                        </ul>
                        <div class="text-end mt-4">
                            <form role="form" action="" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="amount" class="form-control amount"
                                        placeholder="Enter Amount"
                                        value="<?php echo e(number_format($deposit->final_amount, 2,'.', '')); ?>">
                                <button id="rzp-button1"
                                    data-href="<?php echo e(route('user.razor.success', $gateway->id)); ?>"
                                    class="btn main-btn w-100"><?php echo e(__('Pay Now')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        session()->forget('transaction_id');
        session()->put('transaction_id' , $deposit->transaction_id)
    ?>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('script'); ?>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        'use strict'
        $('body').on('click', '#rzp-button1', function(e) {
            e.preventDefault();
            var amount = $('.amount').val();
            var total_amount = amount * 100;
            let url = $(this).data('href');
            var options = {
                "key": "<?php echo e($gateway->gateway_parameters->razor_key); ?>",
                "amount": total_amount,
                "currency": "<?php echo e($gateway->gateway_parameters->gateway_currency); ?>",
                "name": "<?php echo e(@$general->site_name); ?>",
                "description": "Transaction",
                "image": "https://www.nicesnippets.com/image/imgpsh_fullsize.png",
                "order_id": "",
                "callback_url": "<?php echo e(route('user.razor.success')); ?>",
                "prefill": {
                    "name": "<?php echo e(auth()->user()->username); ?>",
                    "email": "<?php echo e(auth()->user()->email); ?>",
                    "contact": "<?php echo e(auth()->user()->phone); ?>"
                },
                "notes": {
                    "address": "test test"
                },
                "theme": {
                    "color": "#F7931A"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(template().'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bitcointradinghub.org/public_html/core/resources/views/theme3/user/gateway/razorpay.blade.php ENDPATH**/ ?>