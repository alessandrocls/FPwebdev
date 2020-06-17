@extends('template/home')
@section('design')
<link rel="stylesheet" href=" /css/about.css">
@endsection


@section('container')
<div class="team">
		<h1>Our Team</h1>
		<span class="border"></span>
		<div class="member">
			<a href="#"><img src="img/bg-img/fariz.jpg"></a>
			<a href="#"><img src="img/bg-img/ales.jpg"></a>
			
		</div>
		<div class="section" id="p1">
			<b><span class="name">Muhammad Fariz Sutedy</span></b>
			<span class="border"></span>
			<p>
				Muhammad Fariz Sutedy adalah murid bina nusantara angkatan 2022 berjurusan sebagai computer science. Dia memiliki cita-cita menjadi pemain sepak bola
			</p>
			
		</div>
		<div class="section" id="p2">
			<b><span class="name">Alessandro Christopher</span></b>
			<span class="border"></span>
			<p>
				Alessandro christopher adalah murid bina nusantara angkatan 2022 berjurusan sebagai computer science. Dia memiliki cita-cita untuk mengencani semua cewek-cewek.
			</p>
			
		</div>
		
	</div>
@endsection