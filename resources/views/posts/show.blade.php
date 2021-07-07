
    <h1>게시물 상세보기</h1>
    <hr>
    <br>
    <br>
    제목 : <input type="text" name="title" readonly value="{{$post->title}}">
    <br><br>
    <fieldset>
        <legend>내용
            <br>
        </legend>
            <textarea name="content" readonly>{{$post->content}}</textarea>
    </fieldset>
    <br>
    @if(isset($post->image))
    <div>
        <img src="{{$post->getImagePath()}}" alt="사진">
    </div>
    @endif
    <div>
        <p>작성일 : {{$post->created_at}}</p>
        <p>수정일 : {{$post->updated_at}}</p>
    </div>
    <div>
        <button onclick="location.href='{{route('posts.index')}}'">목록</button>

        <button onclick="location.href='{{route('posts.edit',['id'=>$post->id])}}'">수정</button>
        
        <form style="display:inline;" action="{{route('posts.delete',['id'=>$post->id])}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="삭제">
        </form>
    </div>
