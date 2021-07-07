<h1>create</h1>
<br>

<form action="{{route('posts.store')}}" method='post' enctype="multipart/form-data">
    @csrf
    <div>
        <p>
        제목<input type="text" name="title">
        </p>
        @error('title')
                <div>
                    {{ $message }} 
                </div>
        @enderror
    </div>
    <div>
        <p>
        내용<textarea name="content"></textarea>
        </p>
        @error('content')
                <div>
                    {{ $message }} 
                </div>
        @enderror
    </div>

    <div>
        <input type="file" name="imageFile">
        @error('imageFile')
                <div>
                    {{ $message }} 
                </div>
        @enderror
    </div>
    
    <br>
    <br> 
    <div>
    <input type="submit" value="등록하기">
    </div>
</form>