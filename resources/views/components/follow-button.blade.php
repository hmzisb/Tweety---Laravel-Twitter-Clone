
@auth
@if(auth()->user()->isNot($user))
<form method="post" action="{{$user->path('follow')}}">
	@csrf
	<button
		type="submit"
		class="bg-blue-400 rounded-full shadow text-sm p-2 text-white text-xs hover:bg-blue-500 outline-none focus:outline-none">
		{{currentUser()->following($user) ? 'UnFollow' : 'Follow Me' }}
	</button>

</form>
@endif
@endauth