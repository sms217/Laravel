<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<h1>index</h1>
<br>
<br>
@auth
    <a href="{{route('posts.create')}}" style="text-decoration:none; color : green;"><h1>작성하기</h1></a>
@endauth
<ul>
    <h2>제목</h2>
        @foreach($posts as $post)
        <li style="color : brown">
                <h3>
                    <a href="{{route('posts.show', ['id'=>$post->id])}}" style="text-decoration:none; color : orange;">{{$post->title}}</a>
            <p style="display:inline; font-size:70%;">
            {{$post->created_at->diffForHumans()}}
            </p>
                </h3>
        </li>
        @endforeach
</ul>

<div>
    {{$posts->links()}}
</div>