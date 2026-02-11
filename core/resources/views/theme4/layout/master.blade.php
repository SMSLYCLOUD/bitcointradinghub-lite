<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/png" href="{{ getFile('icon', @$general->favicon) }}">

    <title>
        @if (@$general->sitename)
            {{ __(@$general->sitename) . '-' }}
        @endif
        {{ __(@$pageTitle) }}
    </title>
    <link rel="stylesheet" href="{{ asset('asset/theme4/frontend/css/cookie.css') }}">
    <link href="{{ asset('asset/theme4/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/theme4/frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/theme4/frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/theme4/frontend/css/font-awsome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/theme4/frontend/css/iziToast.min.css') }}">
    <link href="{{ asset('asset/theme4/frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/theme4/frontend/css/premium_overrides.css') }}" rel="stylesheet">

    @stack('style')
</head>


<body class="aurora-theme">
    <div class="aurora-blob-center"></div>

    @if (@$general->preloader_status)
    <div class="preloader-holder">
        <div class="preloader">
        <img src="{{ asset('asset/theme4/images/logo-icon.png') }}" alt="preloader icon">
        <div class="preloader-spiner"></div>
        </div>
    </div>
    @endif


    @if (@$general->allow_modal)
        @include('cookieConsent::index')
    @endif


    @if (@$general->analytics_status)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ @$general->analytics_key }}"></script>
        <script>
            'use strict'
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());
            gtag("config", "{{ @$general->analytics_key }}");
        </script>
    @endif

    @include(template().'layout.header')
    <main id="main" class="main-img">
        @yield('content')
    </main>
    @include(template().'layout.footer')

    {{-- back to to btn --}}

    <button type="button" class="cmn-btn btn-sm btn-floating" id="btn-back-to-top">
        <i class="fas fa-arrow-up text-light"></i>
    </button>

    <script src="{{ asset('asset/theme4/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/theme4/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/theme4/frontend/js/slick.min.js') }}"></script>

    <script src="{{ asset('asset/theme4/frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('asset/theme4/frontend/js/jquery.paroller.min.js') }}"></script>
    <script src="{{ asset('asset/theme4/frontend/js/TweenMax.min.js') }}"></script>

    <script src="{{ asset('asset/theme4/frontend/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('asset/theme4/frontend/js/main.js') }}"></script>
    <script src="{{ asset('asset/theme4/frontend/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('asset/theme4/frontend/js/jquery.uploadPreview.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            gsap.registerPlugin(ScrollTrigger);

            // Staggered fade-up for cards
            const fadeUpElements = gsap.utils.toArray(".aurora-card, .benefit-item, .plan-item, .work-item, .about-content, .blog-item, .contact-item, .accordion-item");

            ScrollTrigger.batch(fadeUpElements, {
                onEnter: batch => gsap.from(batch, {
                    y: 60,
                    opacity: 0,
                    duration: 0.8,
                    stagger: 0.15,
                    ease: "power2.out",
                    overwrite: true
                }),
                start: "top 85%"
            });

            // Counter Animation
            gsap.utils.toArray(".counter-title").forEach(counter => {
                let endValue = parseFloat(counter.innerText.replace(/,/g, ''));
                if (!isNaN(endValue)) {
                    let zero = { val: 0 };
                    gsap.to(zero, {
                        val: endValue,
                        duration: 2,
                        scrollTrigger: {
                            trigger: counter,
                            start: "top 85%"
                        },
                        ease: "power1.out",
                        onUpdate: function() {
                            counter.innerText = Math.floor(zero.val);
                        }
                    });
                }
            });

            // Hover Tilt Effect
            const tiltCards = document.querySelectorAll(".aurora-card");
            tiltCards.forEach(card => {
                card.style.transformStyle = "preserve-3d";
                card.style.perspective = "1000px";

                card.addEventListener("mousemove", (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;

                    const rotateX = ((y - centerY) / centerY) * -2;
                    const rotateY = ((x - centerX) / centerX) * 2;

                    gsap.to(card, {
                        rotationX: rotateX,
                        rotationY: rotateY,
                        duration: 0.5,
                        ease: "power1.out"
                    });
                });

                card.addEventListener("mouseleave", () => {
                    gsap.to(card, {
                        rotationX: 0,
                        rotationY: 0,
                        duration: 0.5,
                        ease: "power1.out"
                    });
                });
            });
        });
    </script>

    @stack('script')
    @if (@$general->twak_allow)
        <script type="text/javascript"> 
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = "{{ @$general->twak_key }}";
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            "use strict";
            iziToast.error({
                message: "{{ session('error') }}",
                position: 'topRight'
            });
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            "use strict";
            iziToast.success({
                message: "{{ session('success') }}",
                position: 'topRight'
            });
        </script>
    @endif

    @if (session()->has('notify'))
        @foreach (session('notify') as $msg)
            <script>
                "use strict";
                iziToast.{{ $msg[0] }}({
                    message: "{{ trans($msg[1]) }}",
                    position: "topRight"
                });
            </script>
        @endforeach
    @endif

    @if (@$errors->any())
        <script>
            "use strict";
            @foreach ($errors->all() as $error)
                iziToast.error({
                message: "{{ __($error) }}",
                position: "topRight"
                });
            @endforeach
        </script>
    @endif

    <script>
        'use strict'
        $(document).on('submit', '#subscribe', function(e) {
            e.preventDefault();
            const email = $('.subscribe-email').val();
            var url = "{{ route('subscribe') }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    email: email,
                },
                success: (data) => {
                    iziToast.success({
                        message: data.message,
                        position: 'topRight',
                    });
                    $('.subscribe-email').val('');

                },
                error: (error) => {
                    if (typeof(error.responseJSON.errors.email) !== "undefined") {
                        iziToast.error({
                            message: error.responseJSON.errors.email,
                            position: 'topRight',
                        });
                    }

                }
            })

        });

        var url = "{{ route('user.changeLang') }}";

        $(".changeLang").change(function() {
            if ($(this).val() == '') {
                return false;
            }
            window.location.href = url + "?lang=" + $(this).val();
        });
        //Get the button
        let mybutton = document.getElementById("btn-back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>
</html>