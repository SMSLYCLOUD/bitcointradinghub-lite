<?php $__env->startSection('content'); ?>

    <section class="page-banner">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h2 class="title text-white"><?php echo e(__($pageTitle)); ?></h2>
                <ul class="page-breadcrumb justify-content-center mt-2">
                    <li><a href="index.html"><?php echo e(__('Home')); ?></a></li>
                    <li><?php echo e(__($pageTitle)); ?></li>
                </ul>
            </div>
            </div>
        </div>
    </section>

    <section class="plan-section sp_pt_100 sp_pb_100 sp_separator_bg" style="background-image: url('<?php echo e(asset('asset/theme3/images/bg/plan.jpg')); ?>')">
        <div class="container">
            <div class="row gy-4 items-wrapper justify-content-center">
                <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $plan_exist = App\Models\Payment::where('plan_id', $plan->id)
                            ->where('user_id', Auth::id())
                            ->where('next_payment_date', '!=', null)
                            ->where('payment_status', 1)
                            ->count();
                    ?>
                    <div class="col-xl-12 col-md-6"> 
                        <div class="plan-item"> 
                            <div class="plan-el">
                                <img src="<?php echo e(asset('asset/theme3/images/bg/plan3.png')); ?>" alt="image">
                            </div>
                            <div class="plan-name-area">
                                <h3 class="plan-name mb-2"><?php echo e($plan->plan_name); ?></h3> 
                                <span class="plan-status"><?php echo e(__('Every')); ?> <?php echo e($plan->time->name); ?></span>
                            </div>
                            <div class="plan-fatures">
                                <ul class="plan-list">
                                    <?php if($plan->amount_type == 0): ?> 
                                        <li>
                                            <span class="caption"><?php echo e(__('Minimum')); ?> </span>
                                            <span class="details"> <?php echo e(number_format($plan->minimum_amount, 2) . ' ' . @$general->site_currency); ?></span>
                                        </li>
                                        <li>
                                            <span class="caption"><?php echo e(__('Maximum')); ?> </span>
                                            <span class="details"> <?php echo e(number_format($plan->maximum_amount, 2) . ' ' . @$general->site_currency); ?></span>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <span class="caption"><?php echo e(__('Amount')); ?> </span>
                                            <span class="details"> <?php echo e(number_format($plan->amount, 2) . ' ' . @$general->site_currency); ?></span>
                                        </li>
                                    <?php endif; ?>  

                                    <?php if($plan->return_for == 1): ?>
                                        <li>
                                            <span class="caption"><?php echo e(__('For')); ?> </span>
                                            <span class="details"> <?php echo e($plan->how_many_time); ?> <?php echo e(__('Times')); ?></span>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <span class="caption"><?php echo e(__('For')); ?> </span>
                                            <span class="details"> <?php echo e(__('Lifetime')); ?></span>
                                        </li>
                                    <?php endif; ?>

                                    <?php if($plan->capital_back == 1): ?>
                                        <li>
                                            <span class="caption"><?php echo e(__('Capital Back')); ?> </span>
                                            <span class="details"> <?php echo e(__('YES')); ?></span>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <span class="caption"><?php echo e(__('Capital Back')); ?> </span>
                                            <span class="details"> <?php echo e(__('NO')); ?></span>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="plan-rio">
                                <h5><?php echo e(__('Investment RIO')); ?></h5>
                                <p class="plan-amount mb-2"> 
                                    <?php echo e(number_format($plan->return_interest, 2)); ?> <?php if($plan->interest_status == 'percentage'): ?>
                                        <?php echo e('%'); ?>

                                    <?php else: ?>
                                        <?php echo e(@$general->site_currency); ?>

                                    <?php endif; ?>
                                </p>
                            </div>
                            <div class="plan-action">
                                <h6 class="mb-3"><?php echo e(__('Affiliate Bonus')); ?></h6>
                                <ul class="plan-referral justify-content-center mb-2">
                                    <?php if($plan->referrals): ?>
                                        <?php $__currentLoopData = $plan->referrals->level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="single-referral">
                                                <span><?php echo e($plan->referrals->commision[$key]); ?> %</span>
                                                <p><?php echo e($value); ?></p>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            
                                <?php if($plan_exist >= $plan->invest_limit): ?>
                                    <a class="btn main-btn plan-btn w-100 disabled" href="#"><?php echo e(__('Max Limit exceeded')); ?></a>
                                <?php else: ?>
                                    <a class="btn main-btn plan-btn w-100" href="<?php echo e(route('user.gateways', $plan->id)); ?>"><?php echo e(__('Invest Now')); ?></a>
                                    <?php if(auth()->guard()->check()): ?> 
                                    <button class="btn bg-transparent plan-btn balance w-100 mt-2" data-plan="<?php echo e($plan); ?>"
                                        data-url=""><?php echo e(__('Invest Using Balance')); ?></button>
                                    <?php endif; ?> 
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <div class="modal fade" id="invest" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?php echo e(route('user.investmentplan.submit')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Invest Now')); ?></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group">
                                <label for=""><?php echo e(__('Invest Amount')); ?></label>
                                <input type="text" name="amount" class="form-control">
                                <input type="hidden" name="plan_id" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn main-btn"><?php echo e(__('Invest Now')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'

            $('.balance').on('click', function() {
                const modal = $('#invest');
                modal.find('input[name=plan_id]').val($(this).data('plan').id);
                modal.modal('show')
            })
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make(template().'layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bitcointradinghub.org/public_html/core/resources/views/theme3/pages/investmentplan.blade.php ENDPATH**/ ?>