<!DOCTYPE html>
<html>

<body>
<h1>Create Post View</h1>
<form>
    <textarea name="content" id="editor" rows="10" cols="80">
        This is my textarea to be replaced with CKEditor.
    </textarea>
</form>
<script src="{{asset('public/js/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/js/ckfinder/ckfinder.js')}}"></script>
<script>
    CKEDITOR.replace('editor', {
        filebrowserBrowseUrl: "{{asset('public/js/ckfinder/ckfinder.html')}}",
        filebrowserUploadUrl: "{{asset('public/js/ckfinder/core/connector/php/connector.php?
command=QuickUpload&amp;type=Files')}}"});
</script>
</body>

</html>
