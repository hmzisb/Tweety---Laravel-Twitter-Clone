<div class="mt-2 mb-12 mx-6">
    <a href="/tweets">
    <img 
        src="/images/logo.png"
        width="50" 
    >
    </a>
</div>

<ul class="ml-4">
	<li>
		<a class="font-bold text-lg mb-4 block" href="{{route('home')}} "	>
			Home
		</a>
	</li>
	<li>
		<a class="font-bold text-lg mb-4 block" href="{{route('explore')}}"	>
			Explore
		</a>
	</li>
	<li>
		<a class="font-bold text-lg mb-4 block" href="{{route('likes')}} "	>
			Liked
		</a>
	</li>
{{-- 	<li>
		<a class="font-bold text-lg mb-4 block" href=""	>
			Messages
		</a>
	</li>
	<li>
		<a class="font-bold text-lg mb-4 block" href=""	>
			Bookmark
		</a>
	</li>
	<li>
		<a class="font-bold text-lg mb-4 block" href=""	>
			List
		</a>
	</li> --}}

	@auth
	<li>
		<a class="font-bold text-lg mb-4 block" href="{{ route('profile', currentUser()->username )}}">
			My Profile
		</a>
	</li>

	<li>
		<form method="post" action="{{ route('logout') }}">
			@csrf
			<input type="submit" name="logout" value="Logout" class="font-bold text-lg mb-4 block bg-white hover:text-red-900">
		</form>

	</li>
	@endauth
	
</ul>