@extends('layouts.dashboard')
@section('title', 'Dasbor')
@push('css')
	<link rel="stylesheet" href="{{ asset('css/iconly.css') }}">
@endpush
@section('content')
	{{-- <section class="row">
		<div class="card">
			<div class="card-body px-4 py-4">
				<div class="d-flex align-items-center">
					<div class="avatar avatar-xl">
						<img src="{{ asset('images/default.jpg') }}">
					</div>
					<div class="name ms-3">
						<h5 class="font-bold">John Duck</h5>
						<h6 class="text-muted mb-0">@johnducky</h6>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<section class="row">
		<div class="col-6 col-lg-3 col-md-6">
			<div class="card">
				<div class="card-body py-4-5 px-4">
					<div class="row">
						<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
							<div class="stats-icon purple mb-2">
								<i class="iconly-boldShow"></i>
							</div>
						</div>
						<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
							<h6 class="text-muted font-semibold">Surat</h6>
							<h6 class="mb-0 font-extrabold">112</h6>
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
							<div class="stats-icon blue mb-2">
								<i class="iconly-boldProfile"></i>
							</div>
						</div>
						<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
							<h6 class="text-muted font-semibold">Pengguna</h6>
							<h6 class="mb-0 font-extrabold">3</h6>
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
							<h6 class="mb-0 font-extrabold">80</h6>
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
								<i class="iconly-boldBookmark"></i>
							</div>
						</div>
						<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
							<h6 class="text-muted font-semibold">Lowongan</h6>
							<h6 class="mb-0 font-extrabold">112</h6>
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
					<h4>Registrasi</h4>
				</div>
				<div class="card-body">
					<div id="chart-profile-visit"></div>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-3">
			<div class="card">
				<div class="card-header">
					<h4>Pencari Kerja</h4>
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
	<script src="{{ asset('js/static/dashboard.js') }}"></script>
@endpush
