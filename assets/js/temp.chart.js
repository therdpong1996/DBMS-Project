			var tempctx = document.getElementById("temp-graph");
			$.ajax({
				url: 'https://therdpong.rmutl-db1.us/mysqli.chart.php',
				type: 'POST',
				dataType: 'json',
				data: {temp: true, humi: false},
			})
			.done(function(d) {
				$("canvas#temp-graph").attr("temp-time", d.lasttime);
				var tempChart = new Chart(tempctx, {
				    type: 'line',
				    data: {
				        labels: d.time,
				        datasets: [{
				            label: 'Temperature',
				            data: d.temp,
				            backgroundColor: 'rgba(93, 184, 93, 0)',
				            borderColor: 'rgba(93, 184, 93,1)',
				            borderWidth: 3
				        }],
				    fill: false
				    },
				    options: {
				    	responsive: true,
					}
				});

				setInterval(function(){
					var lasttime = $("canvas#temp-graph").attr("temp-time");
					$.ajax({
						url: 'https://therdpong.rmutl-db1.us/update.chart.php',
						type: 'POST',
						dataType: 'json',
						data: {temp: true, humi: false, lasttime: lasttime},
					})
					.done(function(u) {
						if (u.r == 1) {
							$("canvas#temp-graph").attr("temp-time", u.time);
							updateData(tempChart, u.strtime, u.temp);
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