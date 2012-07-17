//The most overblown ticker countdown thingy you'll ever see in your life!

var Ticker = {
    days: "",
    hours: "",
    mins: "",
    secs: "",
    counterDate: null,
    container: $('.counter'),
    timer: null,
    
    init: function (initDate){
        Ticker.counterDate = initDate;
        Ticker.update();
    },

    calcUnit: function(secDiff, unitSeconds){
        var tmp = Math.abs((tmp = secDiff/unitSeconds)) < 1? 0 : tmp;
        return Math.abs(tmp < 0 ? Math.ceil(tmp) : Math.floor(tmp));
    },

    calculate: function(){
        var secDiff = Math.abs(Math.round(((new Date()) - Ticker.counterDate)/1000));
        Ticker.days = Ticker.calcUnit(secDiff,86400);
        Ticker.hours = Ticker.calcUnit((secDiff-(Ticker.days*86400)),3600);
        Ticker.dayHours = Ticker.calcUnit(secDiff,3600);
        Ticker.mins = Ticker.calcUnit((secDiff-(Ticker.days*86400)-(Ticker.hours*3600)),60);
        Ticker.secs = Ticker.calcUnit((secDiff-(Ticker.days*86400)-(Ticker.hours*3600)-(Ticker.mins*60)),1);
    },

    update: function(){
        Ticker.calculate();
        Ticker.container.html( 
            " <span>" + (Ticker.dayHours < 10 ? "0" + Ticker.dayHours : Ticker.dayHours) + "</span> " + "h : " +
            " <span>" + (Ticker.mins < 10 ? "0" + Ticker.mins : Ticker.mins) + "</span> " + "m : " +
            " <span>" + (Ticker.secs < 10 ? "0" + Ticker.secs : Ticker.secs) + "</span> " + "s");
        //check the time in case you need to switch the countdown from when truck arrive to counting down when trucks leave.
        if(new Date() < lunchStarts){
            Ticker.counterDate = lunchStarts;
            afterCounter.hide();
            beforeCounter.show();
        }
        else if (new Date() < lunchEnds){
            Ticker.counterDate = lunchEnds;
            beforeCounter.hide();
            afterCounter.show();
        }
        //once thr trucks are gone, the ticker disappears.
        else if (new Date() > lunchEnds){
            beforeCounter.hide();
            afterCounter.hide();
            clearTimeout(Ticker.timer);
        }
        Ticker.timer = setTimeout(function(){Ticker.update();}, (1000));
    }
};

//This is all janky throw-away...just wanted to start getting instagram pics in the page.
var LoadSocialStuff = {
    domReadyData: [],
    container: $('#socialFeed'),

    getPhotos: function(){
		var counter = 0;
        $.ajax({
            type: "POST",
            dataType: "json",
            url:'service/GetPhotos.php',
            success: function(data) {
				for(var itm in data){
					counter++;
					if(data.hasOwnProperty(itm))
						LoadSocialStuff.container.append('<img src="'+data[itm].photo.data.images.low_resolution.url+'" />')
				}
				console.log(counter)
            },
            error: function(x, o, e){
                console.log(e);
            }
        });
    },

    rotatePics: function(){
        //randomly load a pic from the array 
        var randNum = Math.floor((Math.random()*LoadSocialStuff.domReadyData.length));

        //totally unfinished attempt at starting to rotate through images.
        LoadSocialStuff.container.fadeOut('slow',function(){
            LoadSocialStuff.item.remove();
            LoadSocialStuff.container.append(LoadSocialStuff.domReadyData[randNum]).fadeIn('slow');  
        });

        setTimeout(function(){LoadSocialStuff.rotatePics();}, (4000));
    }

};

//don't change these dates...they're accurate
var lunchStarts = new Date('June 27, 2012 12:00:00'),
    lunchEnds = new Date('June 27, 2012 15:00:00'),
    beforeCounter = $('.beforeStart'),
    afterCounter = $('.afterStart'),
    beforeStartShowing = false,
    afterStartShowing = false;

if(new Date() < lunchStarts){
    Ticker.init(lunchStarts);
    afterCounter.hide();
    beforeCounter.show();
    beforeStartShowing = true;
}
else if (new Date > lunchStarts){
    Ticker.init(lunchEnds);
    beforeCounter.hide();
    afterCounter.show();
    afterStartShowing = true;
}
else{
    beforeCounter.hide();
    afterCounter.hide();
}

LoadSocialStuff.getPhotos();