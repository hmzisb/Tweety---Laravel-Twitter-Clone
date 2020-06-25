<x-master>
    
<section class="px-8">
    <main>
            <div class="lg:flex lg:justify-between">
                
             {{--    //section 1 --}}
                <div class="lg:w-32">
                   @include('_sidebar-links')
                </div>

              {{--   section 2 --}}
                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px;">
                    @yield('content')
                    
                </div>

              {{--   //section 3 --}}
                <div class="lg:w-1/5 bg-blue-100 rounded-lg p-6 h-full ">
                    @include('_friends-list')
                </div>

            </div>
        
    </main>

</section>

</x-master>