{{--@if(count($errors)>0)--}}
{{--    <ul>--}}
{{--        @foreach($errors->all() as $error)--}}
{{--        <li>--}}
{{--            {!! $error !!}--}}
{{--        </li>--}}
{{--            @endforeach--}}
{{--    </ul>--}}
{{--@endif--}}
<form action="{!! route('postDangKy') !!}" method="post" name="frmThem" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <table>
        <tr>
            <td>Mon Hoc</td>
            <td><input type="text" name="txtMonHoc">{!! $errors->First('txtMonHoc') !!}</td>

        </tr>
        <tr>
            <td>Gia Tien</td>
            <td><input type="text" name="txtGiaTien">{!! $errors->First('txtGiaTien') !!}</td>

        </tr>
        <tr>
            <td>Giang Vien</td>
            <td><input type="text" name="txtGiangVien">{!! $errors->First('txtGiangVien') !!}</td>

        </tr>
        <tr>
            <td>Upload</td>
            <td><input type="file" name="txtFile">{!! $errors->First('txtFile') !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btnGui" value="OK"></td>
        </tr>
    </table>
</form>
