@extends('administration.competitions.adm-competitions')

@section ('adm-competitions')

@parent

@section('competitions-add')

<div id="competitions-add">
	
	<form method="POST" enctype="multipart/form-data" action="{{ route('administration.leagues.store') }}">
		@csrf

		<div class="form-group row text-center">
			<label for="competition_id" class="col-md-2"> ID takmičenja </label>

			<input type="number" name="competition_id" class="form-control col-md-6" v-model="competition_id" :readonly="fetchCompleteSuccessfully" />
		</div>

		
		<div class="form-group row text-center">
			<label for="competition_name" class="col-md-2"> Naziv takmičenja </label>

			<input type="text" name="competition_name" class="form-control col-md-6" v-model="competition_name" readonly />
		</div>

		<div class="form-group row text-center">
			<label for="competition_country" class="col-md-2"> Država </label>

			<input type="text" name="competition_country" class="form-control col-md-6" v-model="competition_country" readonly />
			<input type="hidden" name="competition_country_id" v-model="competition_country_id" />
			<input type="hidden" name="competition_plan" v-model="competition_plan" />
		</div>


		<div class="form-group row text-center">
			<label for="competition_image" class="col-md-2"> Logo takmičenja </label>

			<input type="file" name="competition_image" class="form-control col-md-6" :disabled="!fetchCompleteSuccessfully" />
		</div>

		<div class="form-group row text-center">

			<input type="submit" name="submit" class="form-control col-md-6 offset-2 btn btn-primary" value="Dodaj" :disabled="!fetchCompleteSuccessfully" />
		</div>
		
		

	</form>

</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif	


<script>
	
new Vue({
	el: '#competitions-add',
	data: {
		competition_id: null,
		competition_name: null,
		competition_country: null,
		competition_country_id: null,
		competition_plan: null,
		fetchCompleteSuccessfully: false
	},
	watch: {
		competition_id: function(value) {
			if(value.length === 4)
				this.fetchCompetition(value);
		}
	},
	methods: {
		fetchCompetition: function(id) {
			fetch(`http://api.football-data.org/v2/competitions/${id}`, {
				headers: {
		            "X-Auth-Token": "e2f12665f0e743a0af8f158c513f57bf"
		        }
			})
			.then(response => {
				return response.json();
			})
			.then(competitionJson => {
				if(competitionJson.error != null && competitionJson.error === 404) {
					alert('Ne postoji competition sa tim ID-em. Pokušajte ponovo');
					this.competition_id = null;
				} else if(competitionJson.errorCode != null && competitionJson.errorCode === 403) {
					alert('Nemate pristup ovom takmicenju. Pokušajte ponovo');
					this.competition_id = null;
				} else if(competitionJson.errorCode != null && competitionJson.errorCode === 429) {
					alert('Pokušajte ponovo za 1 minut');
					this.competition_id = null;
				} else {
					console.log(competitionJson);
					this.competition_name = competitionJson.name;
					this.competition_country = competitionJson.area.name;
					this.competition_country_id = competitionJson.area.id;
					this.competition_plan = competitionJson.plan;
					this.fetchCompleteSuccessfully = true;

				}
			});
		}
	}
});

</script>

@stop

@stop