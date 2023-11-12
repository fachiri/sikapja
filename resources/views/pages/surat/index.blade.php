@php
	$currentMonth = date('m');
	$currentYear = date('Y');

	$months = [
	    '01' => 'Januari',
	    '02' => 'Februari',
	    '03' => 'Maret',
	    '04' => 'April',
	    '05' => 'Mei',
	    '06' => 'Juni',
	    '07' => 'Juli',
	    '08' => 'Agustus',
	    '09' => 'September',
	    '10' => 'Oktober',
	    '11' => 'November',
	    '12' => 'Desember',
	];
	$years = ['2023', '2024', '2025', '2026', '2027', '2028'];
@endphp

@extends('layouts.dashboard')
@section('title', 'Kartu')
@push('css')
	<link rel="stylesheet" href="{{ asset('css/extensions/simple-datatable-style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/extensions/table-datatable.css') }}">
@endpush
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between">
					<a href="{{ route('surat.create') }}" class="btn btn-primary">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6">
							<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
						</svg>
						<span class="ms-1">Buat Kartu</span>
					</a>
					<form action="{{ route('laporan.registrasi.preview') }}" method="GET">
						<div class="input-group ms-2">
							<select name="month" id="month" class="form-select">
								@foreach ($months as $value => $label)
									<option value="{{ $value }}" {{ $currentMonth == $value ? 'selected' : '' }}>
										{{ $label }}
									</option>
								@endforeach
							</select>
							<select name="year" id="year" class="form-select">
								@foreach ($years as $year)
									<option value="{{ $year }}" {{ $currentYear == $year ? 'selected' : '' }}>
										{{ $year }}
									</option>
								@endforeach
							</select>
							<button type="submit" class="btn btn-success">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
								</svg>
								<span class="ms-1">Cetak</span>
							</button>
						</div>
					</form>
				</div>
				<div class="card-body">
					<div class="table-responsive datatable-minimal">
						<table class="table-striped table" id="tabel-surat">
							<thead>
								<tr>
									<th>No. Pendaftar</th>
									<th>Nama Lengkap</th>
									<th>No. HP</th>
									<th>Berlaku Sampai</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($surat as $item)
									<tr>
										<td>{{ $item->no_pendaftar }}</td>
										<td>{{ $item->nama_lengkap }}</td>
										<td>{{ $item->telp }}</td>
										<td>{{ \Carbon\Carbon::parse($item->created_at)->addYears(2)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY') }}</td>
										<td>
											<a href="{{ route('surat.show', $item->uuid) }}" class="badge bg-primary"><i class="bi bi-list-ul"></i></a>
											<a href="{{ route('surat.edit', $item->uuid) }}" class="badge bg-info"><i class="bi bi-pencil-square"></i></a>
											<a href="{{ route('laporan.kartu.preview', $item->uuid) }}" class="badge bg-success"><i class="bi bi-printer"></i></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@push('scripts')
	<script src="{{ asset('js/extensions/simple-datatables.js') }}"></script>
	<script>
		let dataTable = new simpleDatatables.DataTable(
			document.getElementById("tabel-surat")
		)
		// Move "per page dropdown" selector element out of label
		// to make it work with bootstrap 5. Add bs5 classes.
		function adaptPageDropdown() {
			const selector = dataTable.wrapper.querySelector(".dataTable-selector")
			selector.parentNode.parentNode.insertBefore(selector, selector.parentNode)
			selector.classList.add("form-select")
		}

		// Add bs5 classes to pagination elements
		function adaptPagination() {
			const paginations = dataTable.wrapper.querySelectorAll(
				"ul.dataTable-pagination-list"
			)

			for (const pagination of paginations) {
				pagination.classList.add(...["pagination", "pagination-primary"])
			}

			const paginationLis = dataTable.wrapper.querySelectorAll(
				"ul.dataTable-pagination-list li"
			)

			for (const paginationLi of paginationLis) {
				paginationLi.classList.add("page-item")
			}

			const paginationLinks = dataTable.wrapper.querySelectorAll(
				"ul.dataTable-pagination-list li a"
			)

			for (const paginationLink of paginationLinks) {
				paginationLink.classList.add("page-link")
			}
		}

		const refreshPagination = () => {
			adaptPagination()
		}

		// Patch "per page dropdown" and pagination after table rendered
		dataTable.on("datatable.init", () => {
			adaptPageDropdown()
			refreshPagination()
		})
		dataTable.on("datatable.update", refreshPagination)
		dataTable.on("datatable.sort", refreshPagination)

		// Re-patch pagination after the page was changed
		dataTable.on("datatable.page", adaptPagination)
	</script>
@endpush
