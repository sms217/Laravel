<h1>게시물 수정하기</h1>

    <hr>
    <br>
    <br>
    <form action="{{route('posts.update',['id'=>$post->id])}}" method = "post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        제목 :  <input type="text" name="title" value="{{$post->title}}">
        @error('title')
                <div>
                  {{ $message }} 
                </div>
        @enderror
        <br><br>
        <fieldset>
            <legend>내용
                <br>
            </legend>
                <textarea name="content">{{$post->content}}</textarea>
        </fieldset>
        @error('content')
                <div>
                  {{ $message }} 
                </div>
        @enderror
        <br>
        <input type="file" name="imageFile">
        
        @if(isset($post->image))
        <br>
        <br>
        <div>
            @error('imageFile')
                <div>
                    {{ $message }} 
                </div>
            @enderror
            <img src="{{$post->getImagePath()}}" alt="사진">
        </div>
        @endif

        <p>
          <input type="submit" value="수정하기">
        </p>


    </form>
    <br>
    <div>
        <p>작성일 : {{$post->created_at}}</p>
        <p>수정일 : {{$post->updated_at}}</p>
    </div>
    <div>
        <button onclick="location.href='{{route('posts.index')}}'">목록</button>
        <!-- <button onclick="location.href='{{route('posts.edit',['id'=>$post->id])}}'">수정</button> -->
        <button onclick="location.href='{{route('posts.delete',['id'=>$post->id])}}'">삭제</button>
    </div>
