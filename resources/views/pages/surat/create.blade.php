@extends('layouts.dashboard')
@section('title', 'Buat Kartu')
@push('css')
	<link rel="stylesheet" href="{{ asset('css/extensions/choices.css') }}">
@endpush
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<form action="{{ route('surat.store') }}" method="POST">
						@csrf
						<div class="form-group mb-3">
							<label for="tanggal_pendaftaran">Tanggal Pendaftaran *</label>
							<input type="date" class="form-control" id="tanggal_pendaftaran" name="tanggal_pendaftaran" value="{{ old('tanggal_pendaftaran') }}">
							@error('tanggal_pendaftaran')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="tanggal_pendaftaran">Nomor Pendaftar *</label>
							<input type="text" class="form-control" id="no_pendaftar" name="no_pendaftar" maxlength="16" value="{{ old('no_pendaftar') }}">
							@error('no_pendaftar')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="nama_pengantar_kerja">Nama Pengantar Kerja / Petugas Antar Kerja *</label>
							<input type="text" class="form-control" id="nama_pengantar_kerja" name="nama_pengantar_kerja" value="{{ old('nama_pengantar_kerja') }}">
							@error('nama_pengantar_kerja')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<h5 class="mb-3">Keterangan Umum</h5>
						<div class="form-group mb-3">
							<label for="nik">Nomor Induk Kependudukan *</label>
							<input type="text" class="form-control" id="nik" name="nik" maxlength="16" value="{{ old('nik') }}">
							@error('nik')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="nama_ibu">Nama Ibu Kandung *</label>
							<input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}">
							@error('nama_ibu')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="name">Nama Lengkap *</label>
							<input type="text" class="form-control" id="name" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
							@error('nama_lengkap')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<div class="row">
								<div class="col-6">
									<label for="tempat_lahir">Tempat Lahir *</label>
									<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
									@error('tempat_lahir')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-6">
									<label for="tanggal_lahir">Tanggal Lahir *</label>
									<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
									@error('tanggal_lahir')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<label for="jenis_kelamin">Jenis Kelamin *</label>
							<select class="choices form-select" id="jenis_kelamin" name="jenis_kelamin">
								<option value="LAKI-LAKI">LAKI-LAKI</option>
								<option value="PEREMPUAN">PEREMPUAN</option>
							</select>
							@error('jenis_kelamin')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="status">Status *</label>
							<select class="choices form-select" id="status" name="status">
								<option value="BELUM KAWIN">BELUM KAWIN</option>
								<option value="KAWIN">KAWIN</option>
								<option value="DUDA">DUDA</option>
								<option value="JANDA">JANDA</option>
							</select>
							@error('status')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="agama">Agama *</label>
							<select class="choices form-select" id="agama" name="agama">
								<option value="ISLAM">ISLAM</option>
								<option value="KATOLIK">KATOLIK</option>
								<option value="PROTESTAN">PROTESTAN</option>
								<option value="HINDU">HINDU</option>
								<option value="BUDHA">BUDHA</option>
								<option value="LAIN-LAIN">LAIN-LAIN</option>
							</select>
							@error('agama')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<div class="row">
								<div class="col-6">
									<label for="tinggi_badan">Tinggi Badan</label>
									<input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" value="{{ old('tinggi_badan') }}">
									@error('tinggi_badan')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-6">
									<label for="berat_badan">Berat Badan</label>
									<input type="number" class="form-control" id="berat_badan" name="berat_badan" value="{{ old('berat_badan') }}">
									@error('berat_badan')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="jln">Jalan</label>
							<input type="text" class="form-control" id="jln" name="jln" value="{{ old('jln') }}">
							@error('jln')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group">
							<div class="row mb-3">
								<div class="col-4">
									<label for="rtrw">RT/RW</label>
									<input type="text" class="form-control" id="rtrw" name="rtrw" value="{{ old('rtrw') }}">
									@error('rtrw')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-4">
									<label for="kel">Desa/KEL *</label>
									<input type="text" class="form-control" id="kel" name="kel" value="{{ old('kel') }}">
									@error('kel')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-4">
									<label for="kec">KEC *</label>
									<input type="text" class="form-control" id="kec" name="kec" value="{{ old('kec') }}">
									@error('kec')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-4">
									<label for="kab">KAB *</label>
									<input type="text" class="form-control" id="kab" name="kab" value="{{ old('kab') }}">
									@error('kab')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-4">
									<label for="provinsi">Provinsi *</label>
									<input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ old('provinsi') }}">
									@error('provinsi')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-4">
									<label for="pos">Kode POS</label>
									<input type="text" class="form-control" id="pos" name="pos" value="{{ old('pos') }}">
									@error('pos')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<label for="telp">No. TELP *</label>
							<input type="text" class="form-control" id="telp" name="telp" value="{{ old('telp') }}">
							@error('telp')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
							@error('email')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<hr class="my-3">
						<h5 class="mb-3">Pendidikan Formal</h5>
						<div class="form-group mb-3">
							<label for="pendidikan">Pendidikan Terakhir *</label>
							<select class="choices form-select" id="pendidikan" name="pendidikan">
								<option value="">Pilih Pendidikan Terakhir</option>
								<option value="SD" {{ old('pendidikan') == "SD" ? 'selected' : '' }}>SD/SEDERAJAT</option>
								<option value="SMP" {{ old('pendidikan') == "SMP" ? 'selected' : '' }}>SMPT/SEDERAJAT</option>
								<option value="SMA" {{ old('pendidikan') == "SMA" ? 'selected' : '' }}>SMTA/SMK/SEDERAJAT</option>
								<option value="D1" {{ old('pendidikan') == "D1" ? 'selected' : '' }}>D.I/AKTA I/D.II</option>
								<option value="D3" {{ old('pendidikan') == "D3" ? 'selected' : '' }}>AKTA III/D.III</option>
								<option value="S1" {{ old('pendidikan') == "S1" ? 'selected' : '' }}>SARJANA/S.1/AKTA IV/D.IV</option>
								<option value="S2" {{ old('pendidikan') == "S2" ? 'selected' : '' }}>PASCA SARJANA/AKTA V</option>
							</select>
							@error('pendidikan')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="jurusan">Jurusan</label>
							<input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ old('jurusan') }}">
							@error('jurusan')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="keterampilan">Keterampilan</label>
							<input type="text" class="form-control" id="keterampilan" name="keterampilan" value="{{ old('keterampilan') }}">
							@error('keterampilan')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="tahun_lulus">Tahun Lulus *</label>
							<input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" maxlength="4" value="{{ old('tahun_lulus') }}">
							@error('tahun_lulus')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="lama_lulus_pendidikan">Lama Lulus Pendidikan *</label>
							<input type="text" class="form-control" id="lama_lulus_pendidikan" name="lama_lulus_pendidikan" value="{{ old('lama_lulus_pendidikan') }}">
							@error('lama_lulus_pendidikan')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group">
							<div class="row mb-3">
								<div class="col-4">
									<label for="sd_tahun">SD Tahun</label>
									<input type="text" class="form-control" id="sd_tahun" name="sd_tahun" maxlength="4" value="{{ old('sd_tahun') }}">
									@error('sd_tahun')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-4">
									<label for="smp_tahun">SMP Tahun</label>
									<input type="text" class="form-control" id="smp_tahun" name="smp_tahun" maxlength="4" value="{{ old('smp_tahun') }}">
									@error('smp_tahun')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-4">
									<label for="sma_tahun">SMA Tahun</label>
									<input type="text" class="form-control" id="sma_tahun" name="sma_tahun" maxlength="4" value="{{ old('sma_tahun') }}">
									@error('sma_tahun')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
							</div>
						</div>
						<hr class="my-3">
						<h5 class="mb-3">Bahasa Asing yang Dikuasai</h5>
						<div class="form-group mb-3">
							<label class="mb-2">Bahasa Asing</label>
							<div class="row">
								<div class="col-3 checkbox mb-2">
									<input type="checkbox" id="INGGRIS" name="bahasa_asing[]" class="form-check-input" value="INGGRIS">
									<label for="INGGRIS">INGGRIS</label>
								</div>
								<div class="col-3 checkbox">
									<input type="checkbox" id="JERMAN" name="bahasa_asing[]" class="form-check-input" value="JERMAN">
									<label for="JERMAN">JERMAN</label>
								</div>
								<div class="col-3 checkbox">
									<input type="checkbox" id="JEPANG" name="bahasa_asing[]" class="form-check-input" value="JEPANG">
									<label for="JEPANG">JEPANG</label>
								</div>
								<div class="col-3 checkbox">
									<input type="checkbox" id="MANDARIN" name="bahasa_asing[]" class="form-check-input" value="MANDARIN">
									<label for="MANDARIN">MANDARIN</label>
								</div>
								<div class="col-3 checkbox">
									<input type="checkbox" id="BELANDA" name="bahasa_asing[]" class="form-check-input" value="BELANDA">
									<label for="BELANDA">BELANDA</label>
								</div>
								<div class="col-3 checkbox">
									<input type="checkbox" id="PRANCIS" name="bahasa_asing[]" class="form-check-input" value="PRANCIS">
									<label for="PRANCIS">PRANCIS</label>
								</div>
								<div class="col-3 checkbox">
									<input type="checkbox" id="ARAB" name="bahasa_asing[]" class="form-check-input" value="ARAB">
									<label for="ARAB">ARAB</label>
								</div>
								<div class="col-3 checkbox">
									<input type="checkbox" id="LAINNYA" name="bahasa_asing[]" class="form-check-input" value="LAINNYA">
									<label for="LAINNYA">LAINNYA</label>
								</div>
							</div>
						</div>
						<hr class="my-3">
						<h5 class="mb-3">Pengalaman Kerja</h5>
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
									<td class="align-top"><input type="text" class="form-control" name="jabatan_1" value="{{ old('jabatan_1') }}"></td>
									<td class="align-top"><input type="text" class="form-control" name="uraian_tugas_1" value="{{ old('uraian_tugas_1') }}"></td>
									<td class="align-top"><input type="text" class="form-control" name="lama_kerja_1" value="{{ old('lama_kerja_1') }}"></td>
									<td class="align-top"><input type="text" class="form-control" name="pemberi_kerja_1" value="{{ old('pemberi_kerja_1') }}"></td>
								</tr>
								<tr>
									<td class="align-top">b.</td>
									<td class="align-top"><input type="text" class="form-control" name="jabatan_2" value="{{ old('jabatan_2') }}"></td>
									<td class="align-top"><input type="text" class="form-control" name="uraian_tugas_2" value="{{ old('uraian_tugas_2') }}"></td>
									<td class="align-top"><input type="text" class="form-control" name="lama_kerja_2" value="{{ old('lama_kerja_2') }}"></td>
									<td class="align-top"><input type="text" class="form-control" name="pemberi_kerja_2" value="{{ old('pemberi_kerja_2') }}"></td>
								</tr>
							</tbody>
						</table>
						<hr class="my-3">
						<h5 class="mb-3">Jabatan yang Diinginkan</h5>
						<div class="form-group mb-3">
							<label for="lowongan">Lowongan</label>
							<input type="text" class="form-control" id="lowongan" name="lowongan" value="{{ old('lowongan') }}">
						</div>
						<div class="form-group mb-3">
							<label for="jabatan_dalam_negeri">Dalam Negeri</label>
							<input type="text" class="form-control" id="jabatan_dalam_negeri" name="jabatan_dalam_negeri" value="{{ old('jabatan_dalam_negeri') }}">
						</div>
						<div class="form-group mb-3">
							<label for="jabatan_luar_negeri">Luar Negeri</label>
							<input type="text" class="form-control" id="jabatan_luar_negeri" name="jabatan_luar_negeri" value="{{ old('jabatan_luar_negeri') }}">
						</div>
						<div class="form-group mb-3">
							<label for="upah_yang_diinginkan">Besaran Upah yang Diinginkan *</label>
							<select class="choices form-select" id="upah_yang_diinginkan" name="upah_yang_diinginkan">
								<option value="1000000">Rp. 1.000.000</option>
								<option value="1000000-2500000">Rp. 1.000.000 - Rp. 2.500.000</option>
								<option value="2500000-5000000">Rp. 2.500.000 - Rp. 5.000.000</option>
								<option value="5000000">Rp. 5.000.000</option>
							</select>
						</div>
						<hr class="my-3">
						<button type="submit" class="btn btn-primary w-100">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection
@push('scripts')
	<script src="{{ asset('js/extensions/choices.js') }}"></script>
	<script src="{{ asset('js/static/form-element-select.js') }}"></script>
@endpush
