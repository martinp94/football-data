class Fixture {

	constructor(id, status = 'SCHEDULED', scoreHome = null, scoreAway = null) {
		this.id = id;
	    this.status = status;
		this.scoreHome = scoreHome;
		this.scoreAway = scoreAway;
		this.displayScore = "- : -";
	}

	updateScoreHome(score) {
		this.scoreHome = score;
	}

	updateScoreAway(score) {
		this.scoreAway = score;
	}

	updateStatus(status) {
		this.status = status;
	}

	updateDOM() {
		const fixtureNode = document.getElementById(this.id)

		fixtureNode.querySelector('.fixture-result').textContent = this.displayScore;
		fixtureNode.querySelector('.fixture-description').textContent = this.status;
		if(this.status == 'IN_PLAY') {
			fixtureNode.querySelector('.minute').textContent = "0'";
			fixtureNode.classList.add('live');
		}

		if(this.status == 'PAUSED') {
			fixtureNode.querySelector('.minute').textContent = "Pauza";
			fixtureNode.classList.add('live');
		}
	}

	updateFixtureData() {
		console.log(this.id);
		fetch(`http://api.football-data.org/v2/matches/${this.id}`, {
			headers: {
		        "X-Auth-Token": "e2f12665f0e743a0af8f158c513f57bf"
		    }
		})
		.then(response => response.json())
		.then(fixtureJson => {
			console.log(fixtureJson);

			if(fixtureJson.status == 'IN_PLAY' || fixtureJson.status == 'PAUSED') {
				this.status = fixtureJson.status;
				this.scoreHome = fixtureJson.score.fullTime.homeTeam;
				this.scoreAway = fixtureJson.score.fullTime.awayTeam;
				this.displayScore = `${this.scoreHome} : ${this.scoreAway}`;
			}


			this.updateDOM();
		});
	}
}

function getFixtureIDs() {
	const fixturesNodes = document.querySelectorAll('.competition-fixture');

	const fixtureIDs = Array.prototype.slice.call(fixturesNodes).map(function(fixture) {
		return fixture.id;
	});

	return fixtureIDs;
}

const fixtureIDs = getFixtureIDs();


let allFixtures = [];


function loadFixtures() {
	for(let id of fixtureIDs) {
		allFixtures.push(new Fixture(id));
	}
}


function init() {

	loadFixtures();

	let i = 0;

	setInterval(function() { 
		let fixtureTemp = allFixtures[i++ % allFixtures.length];
		fixtureTemp.updateFixtureData();
	}, 6000);
}


init();

	

