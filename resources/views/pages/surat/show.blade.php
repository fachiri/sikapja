@extends('layouts.dashboard')
@section('title', 'Detail Kartu')
{{-- @push('css')
	<link rel="stylesheet" href="{{ asset('css/extensions/choices.css') }}">
@endpush --}}
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="mb-3">
						<a href="{{ route('surat.edit', $surat->uuid) }}" class="badge bg-info me-2">
							<i class="bi bi-pencil-square"></i>
							Edit
						</a>
						<a class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" style="cursor: pointer;">
							<i class="bi bi-trash"></i>
							Hapus
						</a>
						<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<form action="{{ route('surat.destroy', $surat->uuid) }}" method="POST" class="modal-content">
									@csrf
									@method('DELETE')
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="deleteModalLabel">Hapus data {{ $surat->nama_lengkap }}</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										Apakah anda yakin ingin menghapus data?
										<div class="text-danger">Data yang telah dihapus tidak dapat dikembalikan</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-danger">Hapus</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Nomor Pendaftar</span>
							<span class="text-end">{{ $surat->no_pendaftar }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Nama Pengantar Kerja / Petugas Antar Kerja</span>
							<span class="text-end">{{ $surat->nama_pengantar_kerja }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Nomor Induk Kependudukan</span>
							<span class="text-end">{{ $surat->nik }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Nama Ibu Kandung</span>
							<span class="text-end">{{ $surat->nama_ibu }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Nama Lengkap</span>
							<span class="text-end">{{ $surat->nama_lengkap }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Tempat Tanggal Lahir</span>
							<span class="text-end">{{ $surat->tempat_lahir }}, {{ $surat->tanggal_lahir }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Jenis Kelamin</span>
							<span class="text-end">{{ $surat->jenis_kelamin }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Status</span>
							<span class="text-end">{{ $surat->status }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Agama</span>
							<span class="text-end">{{ $surat->agama }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Tinggi Badan</span>
							<span class="text-end">{{ $surat->tinggi_badan }} cm</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Berat Badan</span>
							<span class="text-end">{{ $surat->berat_badan }} kg</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Alamat</span>
							<span class="text-end">{{ $surat->jln }} {{ $surat->rtrw }} DESA {{ $surat->kel }} KEC. {{ $surat->kec }} KAB. {{ $surat->kab }} PROV. {{ $surat->provinsi }} {{ $surat->pos }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">No. TELP</span>
							<span class="text-end">{{ $surat->telp }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Email</span>
							<span class="text-end">{{ $surat->email }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Pendidikan Terakhir</span>
							<span class="text-end">{{ $surat->pendidikan }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Jurusan</span>
							<span class="text-end">{{ $surat->jurusan }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Tahun Lulus</span>
							<span class="text-end">{{ $surat->tahun_lulus }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Jurusan</span>
							<span class="text-end">{{ $surat->jurusan }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">SD Tahun</span>
							<span class="text-end">{{ $surat->sd_tahun }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">SMP Tahun</span>
							<span class="text-end">{{ $surat->smp_tahun }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">SMA Tahun</span>
							<span class="text-end">{{ $surat->sma_tahun }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Jurusan</span>
							<span class="text-end">{{ $surat->jurusan }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Bahasa Asing</span>
							<span class="text-end">{{ $surat->bahasa_asing }}</span>
						</li>
						<li class="list-group-item">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Jabatan</th>
										<th>Uraian Tugas</th>
										<th>Lama Kerja</th>
										<th>Pemberi / Pengguna</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="align-top">a.</td>
										<td class="align-top">{{ $surat->jabatan_1 }}</td>
										<td class="align-top">{{ $surat->uraian_tugas_1 }}</td>
										<td class="align-top">{{ $surat->lama_kerja_1 }}</td>
										<td class="align-top">{{ $surat->pemberi_kerja_1 }}</td>
									</tr>
									<tr>
										<td class="align-top">b.</td>
										<td class="align-top">{{ $surat->jabatan_2 }}</td>
										<td class="align-top">{{ $surat->uraian_tugas_2 }}</td>
										<td class="align-top">{{ $surat->lama_kerja_2 }}</td>
										<td class="align-top">{{ $surat->pemberi_kerja_2 }}</td>
									</tr>
								</tbody>
							</table>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Dalam Negeri</span>
							<span class="text-end">{{ $surat->jabatan_dalam_negeri }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Luar Negeri</span>
							<span class="text-end">{{ $surat->jabatan_luar_negeri }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="fw-bold">Besaran Upah yang Diinginkan</span>
							<span class="text-end format-rupiah" data-upah="{{ $surat->upah_yang_diinginkan }}"></span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
@endsection
@push('scripts')
	<script>
		var spanElement = document.querySelector('.format-rupiah');

		var upahYangDiinginkan = parseFloat(spanElement.getAttribute('data-upah'));

		function formatRupiah(angka) {
			var reverse = angka.toString().split('').reverse().join('');
			var ribuan = reverse.match(/\d{1,3}/g);
			var hasil = ribuan.join('.').split('').reverse().join('');
			return 'Rp ' + hasil;
		}

		var upahFormatRupiah = formatRupiah(upahYangDiinginkan);

		spanElement.textContent = upahFormatRupiah;
	</script>
@endpush
