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
				<div class="card-header">
					<a href="{{ route('surat.create') }}" class="btn btn-primary">
						<i class="bi bi-plus-square"></i>
						<span class="ms-1">Buat Kartu</span>
					</a>
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
											<a href="#" class="badge bg-primary"><i class="bi bi-list-ul"></i></a>
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
