<x-app>

@section('content')

	<header class="mb-6" style="position: relative;">
		
		
		<img class="mb-4 rounded-lg" src="/images/bn.jpg">


		 <img 
            style="
            	position: absolute;
			    top: 86px;
			    margin-left: 25px;
			    width: 110px;
			    height: 110px;
			    background: white;
			    padding: 5px;
			    box-shadow: 0 0px 10px #e8e8e8;"

            class="rounded-full mr-2 mb-2 object-cover" 
            src= {{ $user->avatarLink() }}
            >
	
		<div class="flex justify-between items-center">
			<div>
				<h5 class="font-bold text-2xl mb-0 capitalize">{{$user->name}}</h5>
				<p class="text-sm">Joined {{$user->created_at->diffForHumans()}} </p>
			</div>

			
			<div class="flex">

			@can('edit', $user)
				<form method="get" action="{{$user->path('edit')}} ">
					
					<button
						type="submit"
						class="rounded-full border border-gray-300 text-sm p-2 text-xs hover:bg-blue-500 hover:text-white mr-2"
						style="outline: none" >
						Edit Profile
					</button>

				</form>
				@endcan

				<x-follow-button :user="$user"></x-follow-button>
			
			</div>
		</div>


            <p class="text-sm mt-4">
            	Hi, Welcome to my profile.
            	I know this is the best profile you could
            	ever find on Internet. Believe me? hmm, Not?
            	Your choice!!!
            </p>
	</header>


		
 
    @include('_tweet', [
    	
    		'tweets' => $tweets
    	])

    	@endsection
  
</x-app>
