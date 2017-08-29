			var humictx = document.getElementById("humi-graph");
			$.ajax({
				url: 'https://therdpong.rmutl-db1.us/mysqli.chart.php',
				type: 'POST',
				dataType: 'json',
				data: {temp: false, humi: true},
			})
			.done(function(d) {
				$("canvas#humi-graph").attr("humi-time", d.lasttime);
				var humiChart = new Chart(humictx, {
				    type: 'line',
				    data: {
				        labels: d.time,
				        datasets: [{
				            label: 'Humidity',
				            data: d.humi,
				            backgroundColor: 'rgba(92, 192, 222, 0)',
				            borderColor: 'rgba(92, 192, 222,1)',
				            borderWidth: 3
				        }],
				    fill: false
				    },
				    options: {
				    	responsive: true,
					}
				});

				setInterval(function(){
					var lasttime = $("canvas#humi-graph").attr("humi-time");
					$.ajax({
						url: 'https://therdpong.rmutl-db1.us/update.chart.php',
						type: 'POST',
						dataType: 'json',
						data: {temp: false, humi: true, lasttime: lasttime},
					})
					.done(function(u) {
						if (u.r == 1) {
							$("canvas#humi-graph").attr("humi-time", u.time);
							updateData(humiChart, u.strtime, u.humi);
						}
					})
				}, 5000);

			});

			function updateData(chart, label, data) {

				chart.data.labels.splice(0, 1);
			    chart.data.datasets.forEach((dataset) => {
			        dataset.data.splice(0, 1);
			    });
			    chart.update();
			    
			    chart.data.labels.push(label);
			    chart.data.datasets.forEach((dataset) => {
			        dataset.data.push(data);
			    });
			    chart.update();

			}