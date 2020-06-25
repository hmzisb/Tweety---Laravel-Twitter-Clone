<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form action="/tweets" method="post">
        @csrf
        <textarea
            name="body"
            class="w-full outline-none border-0 "
            placeholder="Tweet something...!"
            required
        ></textarea>

        <hr class="mb-8 mt-4 border border-gray-200">

        <footer class="flex justify-between items-center">   

            <img 
                class="rounded-full mr-2 mb-2 w-10 h-10 object-cover " 
                src={{ auth()->user()->avatarLink()}}>

            <button
                type="submit" 
                class="outline-none bg-blue-400 rounded-lg shadow text-sm p-2 text-white">
                  Tweet
            </button>

        </footer>
    </form>
    @error('body')
        <p class="text-sm text-red-900 mt-2"> {{ $message }} </p>
    @enderror
</div>