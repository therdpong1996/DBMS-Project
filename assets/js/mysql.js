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

		setInterval(function(){
			$.ajax({
				url: 'https://rmutl-db1.us/mysqli.class.php',
				type: 'POST',
				dataType: 'json',
				data: {temp: true, humi: true},
			})
			.done(function(d) {
				$('h1#display-temp').html(d.d_temp + " °C");
				temp_meter.refresh(d.d_temp);
				$('h1#display-humi').html(d.d_humi + " %");
				humi_meter.refresh(d.d_humi);
			})
		}, 1000);
