$(document).ready(function(){
    var machine1 = $("#machine1").slotMachine({
        active	: 0,
        delay	: 300,
        stopHidden: true,
        randomize : function(activeElementIndex){
            return 0;
        }
    });
    var machine2 = $("#machine2").slotMachine({
        active	: 0,
        delay	: 600,
        stopHidden: true,
        randomize : function(activeElementIndex){
            return 1;
        }
    });
    var machine3 = $("#machine3").slotMachine({
        active	: 0,
        delay	: 900,
        stopHidden: true,
        randomize : function(activeElementIndex){
            return 2;
        }
    });
    var machine4 = $("#machine4").slotMachine({
        active	: 0,
        delay	: 1200,
        stopHidden: true,
        randomize : function(activeElementIndex){
            return 3;
        }
    });
    var machine5 = $("#machine5").slotMachine({
        active	: 0,
        delay	: 1500,
        stopHidden: true,
        randomize : function(activeElementIndex){
            return 4;
        }
    });

    machine1.shuffle(5);
    machine2.shuffle(5);
    machine3.shuffle(5);
    machine4.shuffle(5);
    machine5.shuffle(5);


});