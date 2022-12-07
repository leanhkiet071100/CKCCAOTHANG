@extends('layouts.appnguoidung')
@section('title', 'CKC Social Network')
@section('sidebar')
    @parent
    @include('layouts.formthembaipost')
    @include('layouts.taibaiviet')
@endsection

<script type="text/javascript">
    function ImagesFileAsURL() {
        var fileSelected = document.getElementById('uploadanhpost').files;
        document.getElementById('anhpost').innerHTML = "";
        if (fileSelected.length > 0) {
            for (var i = 0; i < fileSelected.length; i++) {
                var fileToLoad = fileSelected[i];
                var fileReader = new FileReader();
                fileReader.onload = function(fileLoaderEvent) {
                    var srcData = fileLoaderEvent.target.result;
                    var newImage = document.createElement('img');
                    newImage.src = srcData;
                    document.getElementById('anhpost').innerHTML += newImage.outerHTML;
                }
                fileReader.readAsDataURL(fileToLoad);
            }
        }
    }
</script>
