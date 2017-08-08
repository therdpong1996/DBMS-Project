		// Initialize Firebase
		var config = {
		    databaseURL: "https://therdpong-dbms.firebaseio.com"
		};
		firebase.initializeApp(config);
		var fb = firebase.database();

		temp_meter = new JustGage({
		    id: "temp_meter",
		    value: 0,
		    min: 0,
		    max: 100,
		    title: 'Temperature',
		    label: "°C",
		    gaugeWidthScale: 0.6,
		    counter: true,
		    hideInnerShadow: true
		});

		humi_meter = new JustGage({
		    id: "humi_meter",
		    value: 0,
		    min: 0,
		    max: 100,
		    title: 'Humidity',
		    label: "%",
		    gaugeWidthScale: 0.6,
		    counter: true,
		    hideInnerShadow: true
		});

		$(() => {
		    $('#temp').html("Loading..")
		    $('#humi').html("Loading..")
		    fb.ref('data').on('value', (sn) => {
		        var temp = [],
		            humi = [],
		            label = []
		        var d = sn.val()
		        var e = 0;
		        for (var a in d) {
		            for (var i in d[a]) {
		                label.push(i + " " + a)
		                temp.push(parseFloat(d[a][i].temp))
		                humi.push(parseFloat(d[a][i].humi))
		            }
		        }

		        $('h1#display-temp').html(parseFloat(temp[temp.length - 1]).toFixed(2) + " &deg;C")
		        temp_meter.refresh(parseFloat(temp[temp.length - 1]).toFixed(2));
		        $('h1#display-humi').html(parseFloat(humi[humi.length - 1]).toFixed(2) + " %")
		        humi_meter.refresh(parseFloat(humi[humi.length - 1]).toFixed(2));
		    })
		});