var colCount = 5;
var stopcount = 0;
var action = '';
var trigger = false;
var lucky;

function mappingValue(value) {


    var mapping = {


        "S": 12,
        "T": 11
    };

    var result = [];

    if (typeof (value) == "number") {

        value = value.toString();

    }


    // $.each(value, function (i, v) {
    //
    //     if (isNaN(parseInt(v))) {
    //
    //         result.push(mapping[v]);
    //
    //
    //     } else {
    //
    //         result.push(parseInt(v));
    //
    //     }
    //
    // });


    for (var i = 0; i <= value.length; i++) {

        if (isNaN(parseInt(value[i]))) {

            result.push(mapping[value[i]]);


        } else {

            result.push(parseInt(value[i]));

        }

    }


    if (result[4] == undefined) {

        result.unshift(10);

    }


    return result;

}

function clearName() {

    $('.name').fadeOut();

}

function getLuckyDraw() {

    disableAllButton();

    if ( !trigger ) {

        $.get('/getLuckyDraw', function (result) {


            //
            trigger = true;

            lucky = {

                "name": result[0].firstname_th + " " + result[0].lastname_th,
                "enpid": result[0].empno
            }

            startspin(lucky);

        });

    }
}


function startspin(lucky) {


    stopcount = 0;

    clearName();

    var rouletter = $('div.roulette');


    var p = {
        startCallback: function () {

            // disableAllButton();

            // appendLogMsg('start');
            // $('#speed, #duration').slider('disable');
            // $('#stopImageNumber').spinner('disable');
            // $('.start').attr('disabled', 'true');
            // $('.stop').removeAttr('disabled');
        },
        slowDownCallback: function () {
            // appendLogMsg('slowdown');
            // $('.stop').attr('disabled', 'true');
        },
        stopCallback: function ($stopElm) {


            if (stopcount == 4) {


                trigger = false;

                debugger;

                $('.name').html(lucky.name);

                $('.name').delay(1000).fadeIn(500,function(){

                    enableAllButton();

                    $(control.document).find('button[name="stop"]').prop('disabled', true);

                });


            } else {

                // $(control.document).find('button[name="stop"]').prop('disabled', false);

                stopcount++;

            }

            // appendLogMsg('stop');
            // $('#speed, #duration').slider('enable');
            // $('#stopImageNumber').spinner('enable');
            // $('.start').removeAttr('disabled');
            // $('.stop').attr('disabled', 'true');
        }

    }


    // set end timing
    // var time = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    var time = [1, 2, 3, 4, 5];
    // var time = [100,100,100];

    var result = [];

    result[0] = 1;
    result[1] = 2;
    result[2] = 3;
    result[3] = 3;
    result[4] = 4;

    var inputval = $("#input").val();


    result = mappingValue(lucky.enpid);


    $.each(rouletter, function (i, v) {


        // var rand = time[Math.floor(Math.random() * time.length)];
        var rand;


        if (action == "indy") {

            rand = 300;

        } else {
            rand = time[Math.floor(Math.random() * time.length)];

            rand = 0.1;


            time.splice(rand, 1);
        }

        // time = i + 1;
        p['speed'] = 8;
        // p['duration'] = i + rand;
        p['duration'] = rand;

        // p['stopImageNumber'] = 0;

        // p['stopImageNumber'] = parseInt(value[ i ]) ;
        p['stopImageNumber'] = result[i];

        $(v).roulette('option', p);


    });

    rouletter.roulette('start');

}

function disableAllButton() {

    if (action == "indy") {

        $(control.document).find('button[name!="stop"]').prop('disabled', true);
    }
    else {

        $(control.document).find('button').prop('disabled', true);
    }


}

function onIndyStop(e) {


    var rouletter = $('div.roulette');

    var slotNo = $(e).attr('data-slotNo');


    $(rouletter[slotNo]).roulette('stop');
    // $(rouletter[stopcount]).roulette('stop');

    // stopcount++;
}

function enableAllButton() {

    $(control.document).find('button').prop('disabled', false);
}

function onStartSpin(e) {

    action = $(e).attr('name');

    switch (action) {

        case "indy" :

            // $(control.document).find('button[name="stop"]').prop('disabled', false);

        case "normal" :

            $(control.document).find('button[name="stop"]').prop('disabled', false);

            if ($('.name').is(":visible")) {

                clearName();

                setTimeout(getLuckyDraw, 1000);

                // startspin();

            } else {

                getLuckyDraw();
            }


            break;

        case "stop" :


            // $(control.document).find('button[name="stop"]').prop('disabled', true);

            $(e).prop('disabled', true);

            onIndyStop(e);

            break;

    }


}

function appendLogMsg(msg) {


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


    // $('.start').click(function () {
    //
    //
    //     // $('.name').delay(1000).fadeIn();
    //     
    //
    //     if ($('.name').is(":visible")) {
    //
    //         clearName();
    //
    //         setTimeout(startspin, 1000);
    //
    //         // startspin();
    //
    //     } else {
    //
    //         startspin();
    //     }
    //
    //
    // });


});

