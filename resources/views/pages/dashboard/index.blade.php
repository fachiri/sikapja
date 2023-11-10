@extends('layouts.dashboard')
@section('title', 'Dasbor')
@push('css')
	<link rel="stylesheet" href="{{ asset('css/iconly.css') }}">
@endpush
@section('content')
	<section class="row">
		<div class="col-12 col-lg-6">
			<div class="card" style="height: 10.5rem">
				<div class="card-body py-4.5 px-4">
					<h5 class="mb-4">Anda login sebagai</h5>
					<div class="d-flex align-items-center">
						<div class="avatar avatar-xl">
							<img src="{{ asset('images/default.jpg') }}">
						</div>
						<div class="name ms-3">
							<h5 class="font-bold">{{ auth()->user()->name }}</h5>
							<h6 class="text-muted mb-0">{{ auth()->user()->email }}</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-6 col-lg-3 col-md-6">
			<div class="card">
				<div class="card-body py-4-5 px-4">
					<div class="row">
						<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
							<div class="stats-icon green mb-2">
								<i class="iconly-boldAdd-User"></i>
							</div>
						</div>
						<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
							<h6 class="text-muted font-semibold">Pencari Kerja</h6>
							<h6 class="mb-0 font-extrabold">{{ $data->jumlahPencariKerja }}</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-6 col-lg-3 col-md-6">
			<div class="card">
				<div class="card-body py-4-5 px-4">
					<div class="row">
						<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
							<div class="stats-icon red mb-2">
								<i class="iconly-boldProfile"></i>
							</div>
						</div>
						<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
							<h6 class="text-muted font-semibold">Pengguna</h6>
							<h6 class="mb-0 font-extrabold">{{ $data->jumlahPengguna }}</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="row">
		<div class="col-12 col-lg-9">
			<div class="card">
				<div class="card-header">
					<h4>Grafik Pencari Kerja Tahun {{ $data->tahunSekarang }}</h4>
				</div>
				<div class="card-body">
					<div id="chart-profile-visit"></div>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-3">
			<div class="card">
				<div class="card-header">
					<h4>Jumlah Pencari Kerja Menurut Jenis Kelamin</h4>
				</div>
				<div class="card-body">
					<div id="chart-visitors-profile"></div>
				</div>
			</div>
		</div>
	</section>
@endsection
@push('scripts')
	<script src="{{ asset('js/extensions/apexcharts.min.js') }}"></script>
	<script>
		var optionsProfileVisit = {
			annotations: {
				position: "back",
			},
			dataLabels: {
				enabled: false,
			},
			chart: {
				type: "bar",
				height: 300,
			},
			fill: {
				opacity: 1,
			},
			plotOptions: {},
			series: [{
				name: "Pencari Kerja",
				data: @json($data->suratPerBulan),
			}, ],
			colors: "#435ebe",
			xaxis: {
				categories: [
					"Jan",
					"Feb",
					"Mar",
					"Apr",
					"May",
					"Jun",
					"Jul",
					"Aug",
					"Sep",
					"Oct",
					"Nov",
					"Dec",
				],
			},
		}
		let optionsVisitorsProfile = {
			series: @json($data->dataBerdasarkanJenisKelamin),
			labels: ["Laki-Laki", "Perempuan"],
			colors: ["#435ebe", "#55c6e8"],
			chart: {
				type: "donut",
				width: "100%",
				height: "350px",
			},
			legend: {
				position: "bottom",
			},
			plotOptions: {
				pie: {
					donut: {
						size: "30%",
					},
				},
			},
		}

		var chartProfileVisit = new ApexCharts(
			document.querySelector("#chart-profile-visit"),
			optionsProfileVisit
		)
		var chartVisitorsProfile = new ApexCharts(
			document.getElementById("chart-visitors-profile"),
			optionsVisitorsProfile
		)

		chartProfileVisit.render()
		chartVisitorsProfile.render()
	</script>
@endpush
