@auth
<h3 class="font-bold text-xl mb-4">Following</h3>
<ul>
	@foreach(auth()->user()->follows as $user)

	<li>
		<div>
			<a href="{{route('profile', $user->username)}}" class="flex items-center text-sm">
				<img 
					width="30"
					class="rounded-full mr-2 mb-2" 
				 	src="{{$user->avatarLink()}}">
				{{$user->name}} 
			</a>
		</div>
	</li>
	@endforeach

</ul>
@endauth