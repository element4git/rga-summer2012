var submitForm = function(){
	var a = $('#serviceCall').serialize();
	a = toJ(unescape(a));
	a.options = toJ(a.options, ':');
	phoneListApi(a.call, a.options);
}

var toJ = function(text, splitOpt){
	splitOpt =  (splitOpt) ? splitOpt : '='; 
	var returnObj = {};
	var splitText = text.split('?')
	splitText = (typeof splitText[1] == 'undefined') ? splitText[0] : splitText[1];
	splitText = splitText.split('&');
	for(var i=0; i < splitText.length; i++){
		var kv = splitText[i].split(splitOpt);
		returnObj[kv[0]] = kv[1];
	}
	return returnObj;
}

var phoneListApi = function(ep,opts){
	debug.log(opts)
	if(typeof opts == 'object')
		opts.AccessKey = 'JShTsT2012';
	else
		opts = {AccessKey : 'JShTsT2012'};
	debug.log(opts)
	$.ajax({
		url:'service/phoneList.php',
		type:'POST',
		dataType:'json',
		data : {endpoint:ep,options:JSON.stringify(opts)},
		success:function(r){
			
			$('#results').html('<em>'+dump(r)+'</em>');
		}
	})
}



//fbdialog(pass)
var pass = ["http%3A%2F%2Fwww.facebook.com%2Florealparis%3Fsk%3Dapp_243358955702891%26sk%3Dapp_243358955702891%26app_data%3D54a2fae1-b108-47b1-a626-7f6e724b2a01.jpg%2C10", "http://speed.pointroll.com/PointRoll/Media/Panels/LOreal/754496/54a2fae1-b108-47b1-a626-7f6e724b2a01.jpg", "Check out my Sublime New Shade", "Check out my Sublime New Shade", "I'm modeling Sublime Mousse by Healthy Look® . Try on your own color by uploading a photo to our shade simulator. Brought to you by L'Oréal Paris."]
var a =  ['http://developers.facebook.com/docs/reference/dialogs/','http://fbrell.com/f8.jpg','Facebook Dialogs','Reference Documentation','Dialogs provide a simple, consistent interface for applications to interface with users.']
function fbdialog	(pass){
	FB.ui(
	  {
		method: 'feed',
		name: pass[2],
		link: unescape(pass[0]),
		picture: unescape(pass[1]),
		caption: pass[3],
		description: pass[4],
		actions:{name:'share',link:'http://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fgawker.com%2F5839881%2Fits-still-fashion-week-and-it-is-still-amazing%2Fgallery%2F'}
	  },
	  function(response) {
		if (response && response.post_id) {
		  //alert('Post was published.');
		} else {
		  //alert('Post was not published.');
		}
	  }
	);
}