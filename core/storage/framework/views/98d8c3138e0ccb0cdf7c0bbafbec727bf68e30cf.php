<?php

$content = content('breadcrumb.content');

?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('seo'); ?>
        <meta name='description' content="<?php echo e(@$general->seo_description); ?>">
    <?php $__env->stopPush(); ?>

    <section class="auth-section">
        <div class="auth-wrapper">
            <div class="auth-top-part">
                <a href="<?php echo e(route('home')); ?>" class="auth-logo w-100 text-center">
                    <img class="img-fluid rounded sm-device-img text-align" src="<?php echo e(getFile('logo', @$general->whitelogo)); ?>"
                        width="100%" alt="logo">
                </a>
            </div>

            <div class="auth-body-part">
                <div class="auth-form-wrapper">
                    <?php if($general->is_email_verification_on && !auth()->user()->ev): ?>
                        <h3 class="text-center mb-4"><?php echo e(__('Verify Email')); ?></h3>
                        <form class="reg-form" action="<?php echo e(route('user.authentication.verify.email')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="formGroupExampleInput"> <?php echo e(__('Verification Code')); ?></label>
                                <input type="text" name="code" class="form-control"
                                    placeholder="<?php echo e(__('Enter Verification Code')); ?>">
                            </div>
                            <?php if(@$general->allow_recaptcha): ?>
                                <div class="mb-3">
                                    <script src="https://www.google.com/recaptcha/api.js"></script>
                                    <div class="g-recaptcha" data-sitekey="<?php echo e(@$general->recaptcha_key); ?>"
                                        data-callback="verifyCaptcha"></div>
                                    <div id="g-recaptcha-error"></div>
                                </div>
                            <?php endif; ?>
                            <button class="btn main-btn w-100" type="submit"> <?php echo e(__('Verify Now')); ?> </button>
                        </form>
                    <?php elseif($general->is_sms_verification_on && !auth()->user()->sv): ?>


                        <form method="POST" action="<?php echo e(route('user.authentication.verify.sms')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label"><?php echo e(__('Sms Verify Code')); ?></label>
                                <input type="text" name="code" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>

                            <button type="submit"
                                class="btn main-btn w-100"><?php echo e(__('Verify Now')); ?></button>

                        </form>
                    <?php endif; ?>
                </div>
            </div>
            <div class="auth-footer-part">
                <p class="text-center mb-0">
                    <?php if(@$general->copyright): ?>
                        <?php echo e(__(@$general->copyright)); ?>

                    <?php endif; ?>
                </p>
            </div>
        </div>

        <div class="auth-thumb-area" style="background-image: url('<?php echo e(asset('asset/theme3/images/bg/plan.jpg')); ?>')">
            <div class="auth-thumb">
                <img src="<?php echo e(getFile('frontendlogin', @$general->frontend_login_image)); ?>" alt="image">
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(template().'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bitcointradinghub.org/public_html/core/resources/views/theme3/user/auth/email_sms_verify.blade.php ENDPATH**/ ?>