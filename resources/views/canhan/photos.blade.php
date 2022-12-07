
    <div class="central-meta">
        <ul class="photos">
            @foreach ($listPhotos as $photo)
                @foreach ($photo->media_file_uploads as $media_file)
                    <li>
                        <a class="strip" href="{{ URL('image_post') }}/{{ $media_file->media_file_name }}" title=""
                            data-strip-group="mygroup" data-strip-group-options="loop: false">
                            <img src="{{ URL('image_post') }}/{{ $media_file->media_file_name }}" alt=""></a>
                    </li>
                @endforeach
            @endforeach
        </ul>
    </div>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

