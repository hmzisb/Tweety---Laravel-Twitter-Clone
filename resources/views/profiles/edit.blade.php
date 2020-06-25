<x-app>

	@section('content')

	<form method="POST" action="{{$user->path('edit')}}" enctype="multipart/form-data">
		@csrf
		@method('PATCH')

		<div class="mb-6">
			<label class="block mb-2 uppercase font-bold text-xs text-gray-700" >Name</label>
			<input class="border border-gray-400 p-2 w-full rounded-lg" type="text" name="name" value="{{$user->name }}" required>

			@error('name')
				{{ $message }}
			@enderror
		</div>

		<div class="mb-6">
			<label class="block mb-2 uppercase font-bold text-xs text-gray-700" >email</label>
			<input class="border border-gray-400 p-2 w-full rounded-lg" type="email" name="email" value="{{$user->email}}" required>

			@error('email')
				{{ $message }}
			@enderror
		</div>

		<div class="mb-6">
			<label class="block mb-2 uppercase font-bold text-xs text-gray-700">username</label>
			<input class="border border-gray-400 p-2 w-full rounded-lg" type="text" name="username" value="{{$user->username}}" required>

			@error('username')
				{{ $message }}
			@enderror
		</div>


		<div class="mb-6">
			<label class="block mb-2 uppercase font-bold text-xs text-gray-700">Avatar</label>
			<input class="border border-gray-400 p-2 w-full rounded-lg" type="file" name="avatar" value="" >

			@error('username')
				{{ $message }}
			@enderror
		</div>


		<div class="mb-6">
			<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">password</label>
			<input class="border border-gray-400 p-2 w-full rounded-lg" type="text" name="password" >

			@error('password')
				{{ $message }}
			@enderror
		</div>

		<div class="mb-6">
			<label class="block mb-2 uppercase font-bold text-xs text-gray-700">password confirmation</label>
			<input class="border border-gray-400 p-2 w-full rounded-lg" type="text" name="password_confirmation" >

			@error('password_confirmation')
				{{ $message }}
			@enderror

		</div>


		<div class="mb-6">

			<input class="bg-blue-400 px-4 py-2 rounded-full text-white hover:bg-blue-500 outline-none" type="submit" name="update" value="Update">
			
		</div>

	</form>

	@endsection
</x-app>