<x-app-layout>
    <x-slot name="header">
        blog
    </x-slot>

       <h1>Blog Name</h1>
       <a href='/posts/create'>create</a>
       <div class= 'posts'>
           @foreach($posts as $post)
               <div class='post'>
                   <a href="/posts/{{ $post->id}}"><h2 class='title'>{{$post->title}}</h2></a>
                   <P class='body'>{{$post->body}}</P>

                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>

               </div>
           @endforeach
       </div>
      
       <div class='paginate'>{{ $posts->links()}}</div>
       <script>
           function deletePost(id) {
            'use strict'



                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
                }
            }
          </script>
          {{ Auth::user()->name }}
        <div>
        @foreach($questions as $question)
            <div>
                <a href="https://teratail.com/questions/{{ $question['id'] }}">
                    {{ $question['title'] }}
                </a>
            </div>
        @endforeach
        </div>
</x-app-layout>