<x-app>
	@section('content')
	
	<h1  class="my-4 block text-center font-bold text-gray-700 text-2xl ">
			Explore Users
		</h1>

		<div class="flex  flex-wrap  content-start justify-center ">

		

		<br>

		@foreach( $users as $user )


		<div class="flex flex-wrap justify-center w-1/4 p-2 border border-gray-400 m-4 rounded-lg">
			<a href="/profiles/{{$user->username}}">
			<img src="{{$user->avatarLink()}}" class="w-24 h-24 rounded-full p-5 block object object-cover">
			<p class="text-center text-bold text-gray-800"> {{$user->name}} </p>
			</a>
		</div>
		
		



		@endforeach
		</div>

		<div class="block flex justify-center">
			{{	$users->links()}}
		</div>
	

	@endsection
</x-app>