<x-master>

@section('content')
<div class="container mt-20 mx-auto bg-gray-200 p-5 w-4/5 ">
    <div class="row justify-content-center">
       
                <div class="card-header font-bold text-lg mb-4">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf


        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >Email</label>
            <input class="border border-gray-400 p-2 w-full rounded-lg" type="email" name="email" value="{{old('email')}} " required autocomplete="email" autofocus>

            @error('email')
                {{ $message }}
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >password</label>
            <input class="border border-gray-400 p-2 w-full rounded-lg" type="password" name="password" value="" required autocomplete="current-password">

            @error('password')
                {{ $message }}
            @enderror
        </div>

        <div class="mb-6">
        
 

              <input class="border border-gray-800 p-8 rounded-lg" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class=" mb-2 uppercase font-bold text-xs text-gray-700" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
        </div>



                 <div class="mb-2">

                    <button class="bg-blue-400 px-8 py-3 rounded-full text-white font-bold hover:bg-blue-500 outline-none" type="submit">
                         {{ __('Login') }}
                    </button>
                    
                </div>

       

                                <br><br>

                                @if (Route::has('password.request'))
                                    <a class="text-sm text-gray-700" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</x-master>
