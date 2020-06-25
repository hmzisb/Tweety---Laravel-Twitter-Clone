
@forelse($tweets as $tweet)
<div class="border border-grey-400 rounded-lg mb-4 px-2 py-2">
    <div class="flex pt-4 ">
        <div class="mr-4 flex-shrink-0">
            <a href="{{route('profile', $tweet->user->username)}}">
                 <img 
                    class="rounded-full mr-2 ml-2 mb-2 object-cover" 
                    style="width: 60px; height: 60px" 
                src={{$tweet->user->avatarLink()}}>
            </a>
        </div>    
   
         <div>
            <a href="{{route('profile', $tweet->user->username)}}">
                <h5 class="font-bold ">{{$tweet->user->name}}</h5>
                <p class="text-xs text-gray-500">{{$tweet->created_at->diffForHumans()}} </p>
            </a>
            <p class="text-sm mt-1 mb-1">
                {{$tweet->body}}
            </p> 

            <div class="flex mt-4 text-sm items-center">

{{--                 <a href="/tweets/{{$tweet->id}}/like">
                <i class="
                    far fa-thumbs-up
                    text-gray-600
                    p-2 pl-0
                    hover:text-gray-900
                    {{$tweet->isLikedBy(currentUser()) ? 'text-blue-500' : '' }} 
                    "> 
                    {{$tweet->countLikes() ? $tweet->countLikes().' likes' : "Like" }}
                </i>
                </a>

 --}}

                <form action="/tweets/{{$tweet->id}}/like" method="post">
                    @csrf
                    <button class="focus:outline-none">
                        <i class="w-full
                               far fa-thumbs-up
                                text-gray-600
                                p-2 pl-0
                                hover:text-gray-900
                            {{$tweet->isLikedBy(currentUser()) ? 'text-blue-500' : '' }} 
                        ">
                         {{$tweet->countLikes() ? $tweet->countLikes().' Likes' : "Like" }} 
                        </i>
                    </button>    
                </form>


                <form action="/tweets/{{$tweet->id}}/dislike" method="post">
                    @csrf
                    <button class="focus:outline-none" >
                        <i class="w-full
                            far fa-thumbs-down text-gray-600 p-2 hover:text-gray-900 
                            {{$tweet->isDisLikedBy(currentUser()) ? 'text-blue-500' : '' }} 
                        ">
                         {{$tweet->countDisLikes() ? $tweet->countDisLikes().' Dislikes' : "DisLike" }} 
                        </i>
                    </button>    
                </form>
               
              
                
            </div>

            


        </div>        
    </div>
</div>
@empty
 <p class="p-5 border border-grey-400 rounded-lg"> No tweets baby </p>
@endforelse

<div class="">
    {{ $tweets->links() }}
</div>

