@extends('blade.master')
@section('vitri')
	Top
	@parent
	Bottom
@stop
@section('noidung')
	This is layout
	<br>
	<?php $val = '<h1>hehe<h1>'; $diem = 8; ?>
	{{$val}} {{-- dung cho import db de tranh sql injection --}}
	<br>
	{!!$val!!} {{-- dung cho nhung doan van ban thuong co the nhin thay --}}

	@if ($diem >= 8)
		HSG
	@elseif ($diem <=6)
		HSK
	@else HSTB
	@endif

	{{ isset($diem) ? $diem : 'khong ton tai'}}

	@for($i=1; $i<=10; $i+=1)
		<br>
		stt: {{ $i }}
	@endfor

	<?php $i=1 ?>
	@while($i<=10)
		<br>
		stt: {{ $i }}
		<?php $i++ ?>
	@endwhile

	<?php $val2 = ['A','B','C'] ?>
	@foreach($val2 as $value)
		{{ $value }}
	@endforeach
@stop
{{-- @section('noidung','This is layout') --}}
