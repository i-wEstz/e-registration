'use strict';



/*
|------------------------------------------------------------------------------
| Contact Us
|------------------------------------------------------------------------------
*/

myApp.onPageInit('contact-us', function(page) {


    $$('#agenda').on('click', function() {
        console.log("agenda");
        mainView.router.load({
            url: 'agenda'
        });
    });

});

/*
|------------------------------------------------------------------------------
| Home
|------------------------------------------------------------------------------
*/

myApp.onPageInit('home', function(page) {

    /* Hero Slider */
    myApp.swiper('.page[data-page=home] .slider-hero .swiper-container', {
        autoplay: 10000,
        loop: true,
        pagination: '.swiper-pagination',
        paginationClickable: true
    });

    /* Theme Color */
    if (sessionStorage.getItem('nectarMaterialThemeColor')) {
        $$('input[name=theme-color][value=' + sessionStorage.getItem('nectarMaterialThemeColor') + ']').prop('checked', true);
    }

    $$('input[name=theme-color]').on('change', function() {
        if (this.checked) {
            $$('body').removeClass('theme-red theme-pink theme-purple theme-deeppurple theme-indigo theme-blue theme-lightblue theme-cyan theme-teal theme-green theme-lightgreen theme-lime theme-yellow theme-amber theme-orange theme-deeporange theme-brown theme-gray theme-bluegray theme-white theme-black');
            $$('body').addClass('theme-' + $$(this).val());
            sessionStorage.setItem('nectarMaterialThemeColor', $$(this).val());
        }
    });

    /* Theme Mode */
    if (sessionStorage.getItem('nectarMaterialThemeLayout')) {
        $$('input[name=theme-layout][value=' + sessionStorage.getItem('nectarMaterialThemeLayout') + ']').prop('checked', true);
    }

    $$('input[name=theme-layout]').on('change', function() {
        if (this.checked) {
            switch ($$(this).val()) {
                case 'dark':
                    $$('body').removeClass('layout-dark');
                    $$('body').addClass('layout-' + $$(this).val());
                    break;
                default:
                    $$('body').removeClass('layout-dark');
                    break;
            }
            sessionStorage.setItem('nectarMaterialThemeLayout', $$(this).val());
        }
    });

    /* Share App */
    $$('[data-action=share-app]').on('click', function(e) {
        e.preventDefault();
        var buttons = [{
                text: 'Share Nectar',
                label: true
            },
            {
                text: '<i class="fa fa-fw fa-lg fa-envelope-o color-red"></i>&emsp;<span>Email</span>'
            },
            {
                text: '<i class="fa fa-fw fa-lg fa-facebook color-facebook"></i>&emsp;<span>Facebook</span>'
            },
            {
                text: '<i class="fa fa-fw fa-lg fa-google-plus color-googleplus"></i>&emsp;<span>Google+</span>'
            },
            {
                text: '<i class="fa fa-fw fa-lg fa-linkedin color-linkedin"></i>&emsp;<span>LinkedIn</span>'
            },
            {
                text: '<i class="fa fa-fw fa-lg fa-twitter color-twitter"></i>&emsp;<span>Twitter</span>'
            },
            {
                text: '<i class="fa fa-fw fa-lg fa-whatsapp color-whatsapp"></i>&emsp;<span>WhatsApp</span>'
            }
        ];
        myApp.actions(buttons);
    });

});

/*
|------------------------------------------------------------------------------
| Log In
|------------------------------------------------------------------------------
*/
myApp.onPageInit('login', function(page) {
    /*Get Number of Guest*/
    if(document.getElementById('myChart')){
    var url_guest = "/checkinstatus";
    $.getJSON( url_guest, function(json) {
        var guest = JSON.parse(JSON.stringify(json));
        var registered = guest['registered'];
        var follower = guest['follower'];
        var ctx = document.getElementById('myChart').getContext('2d');
          // For a pie chart
          var myPieChart = new Chart(ctx, {
              type: 'pie',
              data: {
                  datasets: [{
                      data: [registered, follower],
                      backgroundColor: [
                          'red', '#d6d6c2'
                      ]
                  }],
                  // These labels appear in the legend and in the tooltips when hovering different arcs
                  labels: [
                      'Attendees',
                      'Guests'
                  ]
              },
              options: {},
          });

      });
    }


    /*Modal*/
    /*Count Down*/
    var countDownDate = new Date("Feb 11, 2018 00:00:00").getTime();
    // Get todays date and time
    var now = new Date().getTime();
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    if (document.getElementById("countdown")) {
        document.getElementById("countdown").innerHTML = days;
    }
    /* Show|Hide Password */
    $$('.page[data-page=login] [data-action=show-hide-password]').on('click', function() {
        if ($$('.page[data-page=login] input[data-toggle=show-hide-password]').attr('type') === 'password') {
            $$('.page[data-page=login] input[data-toggle=show-hide-password]').attr('type', 'text');
            $$(this).attr('title', 'Hide');
            $$(this).children('i').text('visibility_off');
        } else {
            $$('.page[data-page=login] input[data-toggle=show-hide-password]').attr('type', 'password');
            $$(this).attr('title', 'Show');
            $$(this).children('i').text('visibility');
        }
    });
    /*Open Line*/
    $$('#checkin').on('click', function() {
        window.location.href = 'line://nv/addFriends';
    });
    $$('#checkin_home').on('click', function() {
        window.location.href = 'line://nv/addFriends';
    });
    /* Validate & Submit Form */
    $('.page[data-page=login] form[name=login]').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: 'Please enter email address.',
                email: 'Please enter a valid email address.'
            },
            password: {
                required: 'Please enter password.'
            }
        },
        onkeyup: false,
        debug: true,
        errorElement: 'div',
        errorPlacement: function(error, element) {
            error.appendTo(element.parent().siblings('.input-error'));
        },
        submitHandler: function(form) {
            var queryString = $('#login').serializeArray();
            var token = $('meta[name="csrf-token"]').attr('content');
            var json = JSON.parse(JSON.stringify(queryString));
            var id = json[0]['value'];
            var follower = json[1]['value'];
            var url = "/employees/" + id;
            var url_regis = "/employees/" + id + "/register"
            $.getJSON(url, function(json) {
                json = JSON.stringify(json);
                if (json == "-1") {
                    myApp.alert('ไม่พบข้อมูลการลงทะเบียน / Registration not found.', 'เช็คอิน / Check In');
                } else {
                    var data = JSON.parse(json);
                    var name = data[0]['prefix_th'] + data[0]['firstname_th'] + " " + data[0]['lastname_th'];
                    var name_eng = data[0]['prefix_en'] + data[0]['firstname_en'] + " " + data[0]['lastname_en'];
                    myApp.confirm('ยินดีต้อนรับ ' + name + ". Welcome " + name_eng + ".\n จำนวนผู้ติดตาม/Number of Guest: " + follower, '\nเช็คอิน / Check In', function() {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': token
                            }
                        });
                        $.post(url_regis, { empno: id, follower: follower }, function(data) {
                            var ret = JSON.stringify(data);
                            console.log(data);
                            if (data == "1") {
                                myApp.alert('ขอบคุณที่เช็คอิน / Thank you for checking in', 'เช็คอิน / Check In');
                                myApp.addNotification({
                                    message: 'Check in successful. Welcome ' + name_eng,
                                    hold: 1500,
                                    button: {
                                        text: ''
                                    }
                                });

                                mainView.router.load({
                                    url: 'menu',
                                    reload: true
                                });

                            } else if (data == "-1") {
                                myApp.alert('คุณเคยเช็คอินแล้ว / You already checked in', '');
                            } else {

                                myApp.addNotification({
                                    message: 'Check in Failed. Please contact administration.',
                                    hold: 1500,
                                    button: {
                                        text: ''
                                    }
                                });

                            }
                        });
                    });
                }
            });
            /*mainView.router.load({
            	url: 'menu'
            });*/
        }
    });

    /* if (document.getElementById('myChart')) {
         $(document).ready(function() {
             CallChart();
         });
     };*/

});

/*
|------------------------------------------------------------------------------
| News Article
|------------------------------------------------------------------------------
*/

myApp.onPageInit('news-article', function(page) {

    $('.popup-article-comment form[name=article-comment]').validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            comment: {
                required: true
            }
        },
        messages: {
            name: {
                required: 'Please enter name.'
            },
            email: {
                required: 'Please enter email address.',
                email: 'Please enter a valid email address.'
            },
            comment: {
                required: 'Please enter comment.'
            }
        },
        ignore: '',
        onkeyup: false,
        errorElement: 'div',
        errorPlacement: function(error, element) {
            error.appendTo(element.parent().siblings('.input-error'));
        },
        submitHandler: function(form) {
            myApp.addNotification({
                message: 'Thank You',
                hold: 1500,
                button: {
                    text: ''
                }
            });
            myApp.closeModal('.popup-article-comment');
        }
    });

    $$('.page[data-page=news-article] [data-action=share-article]').on('click', function(e) {
        e.preventDefault();
        var buttons = [{
                text: 'Share Article',
                label: true
            },
            {
                text: '<i class="fa fa-fw fa-lg fa-envelope-o color-red"></i>&emsp;<span>Email</span>'
            },
            {
                text: '<i class="fa fa-fw fa-lg fa-facebook color-facebook"></i>&emsp;<span>Facebook</span>'
            },
            {
                text: '<i class="fa fa-fw fa-lg fa-google-plus color-googleplus"></i>&emsp;<span>Google+</span>'
            },
            {
                text: '<i class="fa fa-fw fa-lg fa-linkedin color-linkedin"></i>&emsp;<span>LinkedIn</span>'
            },
            {
                text: '<i class="fa fa-fw fa-lg fa-twitter color-twitter"></i>&emsp;<span>Twitter</span>'
            },
            {
                text: '<i class="fa fa-fw fa-lg fa-whatsapp color-whatsapp"></i>&emsp;<span>WhatsApp</span>'
            }
        ];
        myApp.actions(buttons);
    });

});

/*
|------------------------------------------------------------------------------
| Notifications
|------------------------------------------------------------------------------
*/

myApp.onPageInit('notifications', function(page) {

    setTimeout(function() {
        var toast = myApp.toast('Swipe over the notifications to perform actions on them.', '', { duration: 3000 });
        toast.show();
    }, 2000);

    setTimeout(function() {
        var toast = myApp.toast('Pull the page down to refresh notifications list.', '', { duration: 3000 });
        toast.show();
    }, 6000);

    /* Search Bar */
    var mySearchbar = myApp.searchbar('.page[data-page=notifications] .searchbar', {
        searchList: '.page[data-page=notifications] .list-block-search',
        searchIn: '.page[data-page=notifications] .item-title, .page[data-page=notifications] .item-after, .page[data-page=notifications] .item-subtitle, .page[data-page=notifications] .item-text'
    });

    /* Pull to Refresh */
    var ptrContent = $$('.page[data-page=notifications] .pull-to-refresh-content');
    ptrContent.on('ptr:refresh', function(e) {
        setTimeout(function() {
            myApp.addNotification({
                message: 'You have 3 new notifications.',
                hold: 2000,
                button: {
                    text: ''
                }
            });
            myApp.pullToRefreshDone();
        }, 2000);
    });

});

/*
|------------------------------------------------------------------------------
| OTP Verification
|------------------------------------------------------------------------------
*/

myApp.onPageInit('otp-verification', function(page) {

    var numpad = myApp.keypad({
        input: '.page[data-page=otp-verification] #input-otp',
        container: '.page[data-page=otp-verification] #numpad',
        toolbar: false,
        valueMaxLength: 4,
        dotButton: false,
        onChange: function(p, value) {
            value = value.toString();
            length = value.length;
            $$('.page[data-page=otp-verification] .otp-digit').text('');
            $$('.page[data-page=otp-verification] .otp-digit').removeClass('filled');

            if (length >= 1 && length <= 4) {
                for (var i = 1; i <= length; i++) {
                    $$('.page[data-page=otp-verification] .otp-digit:nth-child(' + i + ')').text(value.charAt(i - 1));
                    $$('.page[data-page=otp-verification] .otp-digit:nth-child(' + i + ')').addClass('filled');
                }
            }

            if (length === 4) {
                myApp.addNotification({
                    message: 'OTP has been verified.',
                    hold: 1500,
                    button: {
                        text: ''
                    }
                });
                mainView.router.load({
                    url: 'home.html'
                });
            }
        }
    });

});

/*
|------------------------------------------------------------------------------
| Pattern Lock
|------------------------------------------------------------------------------
*/

myApp.onPageInit('pattern-lock', function(page) {

    /* Initialize Date & Time */
    function setDateTime() {
        var t = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        var e = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        var n = new Date();
        var i = n.getYear();
        1e3 > i && (i += 1900);
        var a = n.getDay();
        var o = n.getMonth();
        var s = n.getDate();
        10 > s && (s = '0' + s);
        var h = n.getHours();
        var c = n.getMinutes();
        var u = n.getSeconds();
        var l = 'AM';
        h >= 12 && (l = 'PM');
        h > 12 && (h -= 12);
        0 == h && (h = 12);
        9 >= c && (c = '0' + c);
        9 >= u && (u = '0' + u);
        $('.page[data-page=pattern-lock] .date-time .day').text(t[a]);
        $('.page[data-page=pattern-lock] .date-time .date').text(e[o] + ' ' + s + ', ' + i);
        $('.page[data-page=pattern-lock] .date-time .time').text(h + ':' + c + ' ' + l);
    }

    setDateTime();

    setInterval(function() {
        setDateTime();
    }, 60000);

    /* Initialize Pattern Lock */
    var lock = new PatternLock('.page[data-page=pattern-lock] .pattern-container');

    lock.checkForPattern('7415963', function() {
            myApp.addNotification({
                message: 'Welcome to Nectar',
                hold: 1500,
                button: {
                    text: ''
                }
            });
            mainView.router.load({
                url: 'home.html'
            });
        },
        function() {
            myApp.addNotification({
                message: 'Oops! Try Again',
                button: {
                    text: ''
                },
                hold: 2000,
                onClose: function() {
                    lock.reset();
                }
            });
        });

});

/*
|------------------------------------------------------------------------------
| Products List
|------------------------------------------------------------------------------
*/

myApp.onPageInit('products-list', function(page) {

    $$('body').on('click', '.page[data-page=products-list] [data-action=cart-add]', function() {
        var toast = myApp.toast('Added to Cart');
        toast.show();
    });

});

/*
|------------------------------------------------------------------------------
| Product Details
|------------------------------------------------------------------------------
*/

myApp.onPageInit('product-details', function(page) {

    /* Initialize Slider */
    myApp.swiper('.page[data-page=product-details] .slider-product .swiper-container', {
        loop: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev'
    });

    /* Product Images Browser */
    $$('body').on('click', '.page[data-page=product-details] .slider-product .slide-image-wrapper', function() {
        var photos = [];

        $('.page[data-page=product-details] .slider-product .slide-image-wrapper img').each(function() {
            photos.push({
                url: $(this).attr('src'),
                caption: $(this).attr('alt')
            });
        });

        var myPhotoBrowser = myApp.photoBrowser({
            photos: photos,
            exposition: false,
            lazyLoading: true,
            lazyLoadingInPrevNext: true,
            lazyLoadingOnTransitionStart: true,
            loop: true
        });
        myPhotoBrowser.open();
    });

    /* Add to Wishlist */
    $$('.page[data-page=product-details] .add-wishlist').on('click', function(e) {
        e.preventDefault();
        myApp.addNotification({
            message: 'Added to wishlist successfully.',
            hold: 1500,
            button: {
                text: ''
            }
        });
    });

    /* Add to Cart */
    $$('.page[data-page=product-details] .add-cart').on('click', function(e) {
        e.preventDefault();
        myApp.addNotification({
            message: 'Added to cart successfully.',
            hold: 1500,
            button: {
                text: ''
            }
        });
    });

    /* Rate & Review */
    $('.popup-product-rate-review .rating').rateYo({
            halfStar: true,
            normalFill: '#9E9E9E',
            ratedFill: '#FFC107',
            spacing: '4px'
        })
        .on('rateyo.set', function(e, data) {
            $('.popup-product-rate-review form[name=product-rate-review] input[name=rating]').val(data.rating);
        });

    $('.popup-product-rate-review form[name=product-rate-review]').validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            rating: {
                required: true,
                range: [0.5, 5],
                step: 0.5
            },
            comment: {
                required: true
            }
        },
        messages: {
            name: {
                required: 'Please enter name.'
            },
            email: {
                required: 'Please enter email address.',
                email: 'Please enter a valid email address.'
            },
            rating: {
                required: 'Please select rating.',
                range: 'Please select a valid rating.',
                step: 'Please select a valid rating.'
            },
            comment: {
                required: 'Please enter comment.'
            }
        },
        ignore: '',
        onkeyup: false,
        errorElement: 'div',
        errorPlacement: function(error, element) {
            error.appendTo(element.parent().siblings('.input-error'));
        },
        submitHandler: function(form) {
            myApp.addNotification({
                message: 'Thank you for your valuable feedback.',
                hold: 1500,
                button: {
                    text: ''
                }
            });
            myApp.closeModal('.popup-product-rate-review');
        }
    });

});