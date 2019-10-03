// <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js" type="text/javascript"></script>


function countdownstart(gettime='', slector) {
		var today = new Date();
		var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
		var time = (today.getHours()+6) + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = date+' '+time;
		gettime = (gettime) ? gettime : dateTime;
		var $clock = jQuery(slector),
		eventTime = moment(gettime, 'DD-MM-YYYY HH:mm:ss').unix(),
		currentTime = moment().unix(),
		diffTime = eventTime - currentTime,
		duration = moment.duration(diffTime * 1000, 'milliseconds'),
		interval = 1000;
		// console.log($clock);
		var $d = jQuery('<div class="days" ></div>').appendTo($clock),
		$h = jQuery('<div class="hours" ></div>').appendTo($clock),
		$m = jQuery('<div class="minutes" ></div>').appendTo($clock),
		$s = jQuery('<div class="seconds" ></div>').appendTo($clock);
		var intervaly;
		// if time to countdown
		if(diffTime > 0) {
		// Show clock
		// $clock.show();
		intervaly = setInterval(function(){
			duration = moment.duration(duration.asMilliseconds() - interval, 'milliseconds');
			var d = moment.duration(duration).days(),
			h = moment.duration(duration).hours(),
			m = moment.duration(duration).minutes(),
			s = moment.duration(duration).seconds();
			d = jQuery.trim(d).length === 1 ? '0' + d : d;
			h = jQuery.trim(h).length === 1 ? '0' + h : h;
			m = jQuery.trim(m).length === 1 ? '0' + m : m;
			s = jQuery.trim(s).length === 1 ? '0' + s : s;
			if (s >= 0) {
				$d.text(d+'d');
				$h.text(h+'h');
				$m.text(m+'m');
				$s.text(s+'s');
			}else{
				clearInterval(intervaly);
				// jQuery('button.btn-redeem-accept').trigger('click');
			}
		}, interval);
	}else{
		// jQuery('button.btn-redeem-accept').trigger('click');
		$m.text('00');
		$s.text('00');
		$h.text('00');
		console.log('stop');
	}
}

countdownstart('9-8-2019 15:20:41',  '#countdownin-single-page');