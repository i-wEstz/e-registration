'use strict';



myApp.onPageInit('contact-us', function(page) {


    $$('#agenda').on('click', function() {
        console.log("agenda");
        mainView.router.load({
            url: 'agenda'
        });
    });

});


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
                    myApp.confirm('ยินดีต้อนรับ ' + name + ". Welcome " + name_eng + ".\n\n จำนวนผู้ติดตาม/Number of follower: " + follower, '\nเช็คอิน / Check In', function() {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': token
                            }
                        });
                        $.post(url_regis, { empno: id, follower: follower }, function(data) {
                            var ret = JSON.stringify(data);
                            console.log(data);
                            if (data == "1") {
                                myApp.alert('ขอบคุณที่เช็คอิน / Thank you for checked in', 'เช็คอิน / Check In');
                                myApp.addNotification({
                                    message: 'Check in successful. Welcome ' + name_eng,
                                    hold: 1500,
                                    button: {
                                        text: ''
                                    }
                                });

                                mainView.router.load({
                                    url: 'menu'
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