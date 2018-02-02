var colCount = 5;
var stopcount = 0;
function mappingValue(value) {


    var mapping = {


        "S": 12,
        "T": 11
    };

    var result = [];


    $.each(value, function (i, v) {

        if (isNaN(parseInt(v))) {

            result.push(mapping[v]);
            debugger;

        } else {

            result.push(parseInt(v));
            debugger;
        }

    });

    if (result.length < 5) {

        result.unshift(10);

    }


    return result;

}

function startspin() {

    stopcount=0;

    var rouletter = $('div.roulette');


    var p = {
        startCallback: function () {
            appendLogMsg('start');
            $('#speed, #duration').slider('disable');
            $('#stopImageNumber').spinner('disable');
            $('.start').attr('disabled', 'true');
            $('.stop').removeAttr('disabled');
        },
        slowDownCallback: function () {
            appendLogMsg('slowdown');
            $('.stop').attr('disabled', 'true');
        },
        stopCallback: function ($stopElm) {
            appendLogMsg('stop');
            $('#speed, #duration').slider('enable');
            $('#stopImageNumber').spinner('enable');
            $('.start').removeAttr('disabled');
            $('.stop').attr('disabled', 'true');
        }

    }


    // set end timing
    // var time = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    var time = [1, 2, 3];
    // var time = [100,100,100];

    var result = [];

    result[0] = 10;
    result[1] = 12;
    result[2] = 3;
    result[3] = 7;
    result[4] = 6;

    var inputval = $("#input").val();

    result = mappingValue(inputval);


    $.each(rouletter, function (i, v) {


        var rand = time[ Math.floor(Math.random() * time.length) ];

        rand = 100;

        debugger;
        time = i + 1;
        p['speed'] = 8;
        p['duration'] = i + rand;

        // p['stopImageNumber'] = 0;

        // p['stopImageNumber'] = parseInt(value[ i ]) ;
        p['stopImageNumber'] = result[i];

        $(v).roulette('option', p);


    });

    rouletter.roulette('start');

}

function appendLogMsg(msg){


    $('#msg')
        .append('<p class="muted">' + msg + '</p>')
        .scrollTop(100000000);
}

$(function () {



    $('.roulette').find('img').hover(function () {
        console.log($(this).height());
    });
    var appendLogMsg = function (msg) {
        $('#msg')
            .append('<p class="muted">' + msg + '</p>')
            .scrollTop(100000000);

    }
    var p = {
        startCallback: function () {
            appendLogMsg('start');
            $('#speed, #duration').slider('disable');
            $('#stopImageNumber').spinner('disable');
            $('.start').attr('disabled', 'true');
            $('.stop').removeAttr('disabled');
        },
        slowDownCallback: function () {
            appendLogMsg('slowdown');
            $('.stop').attr('disabled', 'true');
        },
        stopCallback: function ($stopElm) {
            appendLogMsg('stop');
            $('#speed, #duration').slider('enable');
            $('#stopImageNumber').spinner('enable');
            $('.start').removeAttr('disabled');
            $('.stop').attr('disabled', 'true');
        }

    }
    var rouletter = $('div.roulette');
    rouletter.roulette(p);

    $('.stop').click(function () {


        var stopImageNumber = $('.stopImageNumber').val();

        if (stopImageNumber == "") {
            stopImageNumber = null;
        }
        rouletter.roulette('stop');
    });


    $('.stop2').click(function () {



        var stopImageNumber = $('.stopImageNumber').val();

        if (stopImageNumber == "") {
            stopImageNumber = null;
        }


        // rouletter.roulette('stop');

        $(rouletter[stopcount]).roulette('stop');
        stopcount++;
    });


    $('.stop').attr('disabled', 'true');


    $('.start').click(function () {

        startspin();



    });

    var updateParamater = function () {
        p['speed'] = Number($('.speed_param').eq(0).text());
        p['duration'] = Number($('.duration_param').eq(0).text());
        p['stopImageNumber'] = Number($('.stop_image_number_param').eq(0).text());
        rouletter.roulette('option', p);
    }
    var updateSpeed = function (speed) {
        $('.speed_param').text(speed);
    }
    $('#speed').slider({
        min: 1,
        max: 30,
        value: 10,
        slide: function (event, ui) {
            updateSpeed(ui.value);
            updateParamater();
        }
    });
    updateSpeed($('#speed').slider('value'));

    var updateDuration = function (duration) {
        $('.duration_param').text(duration);
    }
    $('#duration').slider({
        min: 2,
        max: 10,
        value: 3,
        slide: function (event, ui) {
            updateDuration(ui.value);
            updateParamater();
        }
    });
    updateDuration($('#duration').slider('value'));

    var updateStopImageNumber = function (stopImageNumber) {
        $('.image_sample').children().css('opacity', 0.2);
        $('.image_sample').children().filter('[data-value="' + stopImageNumber + '"]').css('opacity', 1);
        $('.stop_image_number_param').text(stopImageNumber);
        updateParamater();
    }

    $('#stopImageNumber').spinner({
        spin: function (event, ui) {
            var imageNumber = ui.value;
            if (ui.value > 4) {
                $(this).spinner("value", -1);
                imageNumber = 0;
                updateStopImageNumber(-1);
                return false;
            } else if (ui.value < -1) {
                $(this).spinner("value", 4);
                imageNumber = 4;
                updateStopImageNumber(4);
                return false;
            }
            updateStopImageNumber(imageNumber);
        }
    });
    $('#stopImageNumber').spinner('value', 0);
    updateStopImageNumber($('#stopImageNumber').spinner('value'));

    $('.image_sample').children().click(function () {
        var stopImageNumber = $(this).attr('data-value');
        $('#stopImageNumber').spinner('value', stopImageNumber);
        updateStopImageNumber(stopImageNumber);
    });
});

