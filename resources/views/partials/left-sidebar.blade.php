<div class="left-sidebar">
	

	<aside class="aside-left">
		<h2> Lige po zemljama </h2>

		<ul class="country-list">
			
			

			@foreach ($countries as $country)
				<li> 
					<a href="{{ route('league.country', ['country' => $country['countryCode']]) }}"> 
						{{ $country['name'] }} 
					</a> 

					<img width="32" src="{{ asset('images/countries/' . $country['image']) }}" alt="Not Found" onerror=this.src="{{ asset('images/countries/' . 'unknown.png') }}">
				</li>
			@endforeach


		</ul>

	</aside>
	

</div>