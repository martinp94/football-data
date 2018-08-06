$(() => {

	const matches = document.querySelector(".matches-today");


	
	if(matches) {

		const liveMatches = matches.querySelectorAll(".competition-fixture.live");

		initMatches(liveMatches);
	

		function initMatches(liveMatches) {
			for(const match of liveMatches) {
				matchTime = $(match).find(".fixture-time"); 
				matchResult = $(match).find(".fixture-result");

				$(matchTime).html("<span style='color: darkred;'> 0' </span>");
				$(matchResult).html("<span style='color: darkred;'> 0 : 0 </span>");
			}

			updateTime(matches);
		}

		function displayMinutesAndResults(minute, results = []) {
			for(const match of liveMatches) {
				matchTime = $(match).find(".fixture-time"); 
				matchResult = $(match).find(".fixture-result");
				
				if(minute !== 45 && minute !== 90)
					$(matchTime).html("<span style='color: darkred;'> " + minute + "' </span>");
				if(minute === 45)
					$(matchTime).html("<span style='color: darkred;'> Poluvrijeme </span>");
				if(minute === 90)
					$(matchTime).html("<span style='color: black;'> Kraj </span>");

				$(matchResult).html("<span style='color: darkred;'> 0 : 0 </span>");
			}

			

		}

		function beginHalf(half, minute = 1) {

			let currentMinute = minute;

			while(currentMinute <= half) {

				((minute) => {

					setTimeout(() => {

						displayMinutesAndResults(minute);
						
					}, 100 * minute);


					
				})(currentMinute);

				currentMinute++;
			}
		}

		function updateTime(matches) {


			const HALF_TIME = 45;
			const FULL_TIME = 90;

			beginHalf(HALF_TIME);

			setTimeout(() => {
				beginHalf(FULL_TIME, HALF_TIME);
			}, 2000);

			
			

			

		}

	}
});