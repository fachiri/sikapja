@extends('layouts.dashboard')
@section('title', 'Edit Kartu')
@push('css')
	<link rel="stylesheet" href="{{ asset('css/extensions/choices.css') }}">
@endpush
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<form action="{{ route('surat.update', $surat->uuid) }}" method="POST">
						@csrf
						@method('PUT')
						<div class="form-group mb-3">
							<label for="tanggal_pendaftaran">Tanggal Pendaftaran *</label>
							<input type="date" class="form-control" id="tanggal_pendaftaran" name="tanggal_pendaftaran" value="{{ $surat->tanggal_pendaftaran }}">
							@error('tanggal_pendaftaran')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="no_pendaftar">Nomor Pendaftar *</label>
							<input type="text" class="form-control" id="no_pendaftar" name="no_pendaftar" maxlength="16" value="{{ $surat->no_pendaftar }}">
							@error('no_pendaftar')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="nama_pengantar_kerja">Nama Pengantar Kerja / Petugas Antar Kerja *</label>
							<input type="text" class="form-control" id="nama_pengantar_kerja" name="nama_pengantar_kerja" value="{{ $surat->nama_pengantar_kerja }}">
							@error('nama_pengantar_kerja')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<h5 class="mb-3">Keterangan Umum</h5>
						<div class="form-group mb-3">
							<label for="nik">Nomor Induk Kependudukan *</label>
							<input type="text" class="form-control" id="nik" name="nik" value="{{ $surat->nik }}">
							@error('nik')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="nama_ibu">Nama Ibu Kandung *</label>
							<input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ $surat->nama_ibu }}">
							@error('nama_ibu')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="name">Nama Lengkap *</label>
							<input type="text" class="form-control" id="name" name="nama_lengkap" value="{{ $surat->nama_lengkap }}">
							@error('nama_lengkap')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<div class="row">
								<div class="col-6">
									<label for="tempat_lahir">Tempat Lahir *</label>
									<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $surat->tempat_lahir }}">
									@error('tempat_lahir')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-6">
									<label for="tanggal_lahir">Tanggal Lahir *</label>
									<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $surat->tanggal_lahir }}">
									@error('tanggal_lahir')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<label for="jenis_kelamin">Jenis Kelamin *</label>
							<select class="choices form-select" id="jenis_kelamin" name="jenis_kelamin">
								<option value="LAKI-LAKI" {{ $surat->jenis_kelamin == "LAKI-LAKI" ? 'selected' : '' }}>LAKI-LAKI</option>
								<option value="PEREMPUAN" {{ $surat->jenis_kelamin == "PEREMPUAN" ? 'selected' : '' }}>PEREMPUAN</option>
							</select>
							@error('jenis_kelamin')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="status">Status *</label>
							<select class="choices form-select" id="status" name="status">
								<option value="BELUM KAWIN" {{ $surat->status == "BELUM KAWIN" ? 'selected' : '' }}>BELUM KAWIN</option>
								<option value="KAWIN" {{ $surat->status == "KAWIN" ? 'selected' : '' }}>KAWIN</option>
								<option value="DUDA" {{ $surat->status == "DUDA" ? 'selected' : '' }}>DUDA</option>
								<option value="JANDA" {{ $surat->status == "JANDA" ? 'selected' : '' }}>JANDA</option>
							</select>
							@error('status')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="agama">Agama *</label>
							<select class="choices form-select" id="agama" name="agama">
								<option value="ISLAM" {{ $surat->agama == "ISLAM" ? 'selected' : '' }}>ISLAM</option>
								<option value="KATOLIK" {{ $surat->agama == "KATOLIK" ? 'selected' : '' }}>KATOLIK</option>
								<option value="PROTESTAN" {{ $surat->agama == "PROTESTAN" ? 'selected' : '' }}>PROTESTAN</option>
								<option value="HINDU" {{ $surat->agama == "HINDU" ? 'selected' : '' }}>HINDU</option>
								<option value="BUDHA" {{ $surat->agama == "BUDHA" ? 'selected' : '' }}>BUDHA</option>
								<option value="LAIN-LAIN" {{ $surat->agama == "LAIN-LAIN" ? 'selected' : '' }}>LAIN-LAIN</option>
							</select>
							@error('agama')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<div class="row">
								<div class="col-6">
									<label for="tinggi_badan">Tinggi Badan</label>
									<input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" value="{{ $surat->tinggi_badan }}">
									@error('tinggi_badan')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-6">
									<label for="berat_badan">Berat Badan</label>
									<input type="number" class="form-control" id="berat_badan" name="berat_badan" value="{{ $surat->berat_badan }}">
									@error('berat_badan')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="jln">Jalan</label>
							<input type="text" class="form-control" id="jln" name="jln" value="{{ $surat->jln }}">
							@error('jln')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group">
							<div class="row mb-3">
								<div class="col-4">
									<label for="rtrw">RT/RW</label>
									<input type="text" class="form-control" id="rtrw" name="rtrw" value="{{ $surat->rtrw }}">
									@error('rtrw')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-4">
									<label for="kel">Desa/KEL *</label>
									<input type="text" class="form-control" id="kel" name="kel" value="{{ $surat->kel }}">
									@error('kel')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-4">
									<label for="kec">KEC *</label>
									<input type="text" class="form-control" id="kec" name="kec" value="{{ $surat->kec }}">
									@error('kec')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-4">
									<label for="kab">KAB *</label>
									<input type="text" class="form-control" id="kab" name="kab" value="{{ $surat->kab }}">
									@error('kab')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-4">
									<label for="provinsi">Provinsi *</label>
									<input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $surat->provinsi }}">
									@error('provinsi')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-4">
									<label for="pos">Kode POS</label>
									<input type="text" class="form-control" id="pos" name="pos" value="{{ $surat->pos }}">
									@error('pos')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<label for="telp">No. TELP *</label>
							<input type="text" class="form-control" id="telp" name="telp" value="{{ $surat->telp }}">
							@error('telp')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" value="{{ $surat->email }}">
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
								<option value="SD" {{ $surat->pendidikan == "SD" ? 'selected' : '' }}>SD/SEDERAJAT</option>
								<option value="SMP" {{ $surat->pendidikan == "SMP" ? 'selected' : '' }}>SMPT/SEDERAJAT</option>
								<option value="SMA" {{ $surat->pendidikan == "SMA" ? 'selected' : '' }}>SMTA/SMK/SEDERAJAT</option>
								<option value="D1" {{ $surat->pendidikan == "D1" ? 'selected' : '' }}>D.I/AKTA I/D.II</option>
								<option value="D3" {{ $surat->pendidikan == "D3" ? 'selected' : '' }}>AKTA III/D.III</option>
								<option value="S1" {{ $surat->pendidikan == "S1" ? 'selected' : '' }}>SARJANA/S.1/AKTA IV/D.IV</option>
								<option value="S2" {{ $surat->pendidikan == "S2" ? 'selected' : '' }}>PASCA SARJANA/AKTA V</option>
							</select>
							@error('pendidikan')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="jurusan">Jurusan</label>
							<input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $surat->jurusan }}">
							@error('jurusan')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="keterampilan">Keterampilan</label>
							<input type="text" class="form-control" id="keterampilan" name="keterampilan" value="{{ $surat->keterampilan }}">
							@error('keterampilan')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="tahun_lulus">Tahun Lulus *</label>
							<input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" value="{{ $surat->tahun_lulus }}">
							@error('tahun_lulus')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="lama_lulus_pendidikan">Lama Lulus Pendidikan*</label>
							<input type="text" class="form-control" id="lama_lulus_pendidikan" name="lama_lulus_pendidikan" maxlength="4" value="{{ $surat->lama_lulus_pendidikan }}">
							@error('lama_lulus_pendidikan')
								<small class="text-danger mt-2">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group">
							<div class="row mb-3">
								<div class="col-4">
									<label for="sd_tahun">SD Tahun</label>
									<input type="text" class="form-control" id="sd_tahun" name="sd_tahun" maxlength="4" value="{{ $surat->sd_tahun }}">
									@error('sd_tahun')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-4">
									<label for="smp_tahun">SMP Tahun</label>
									<input type="text" class="form-control" id="smp_tahun" name="smp_tahun" maxlength="4" value="{{ $surat->smp_tahun }}">
									@error('smp_tahun')
										<small class="text-danger mt-2">{{ $message }}</small>
									@enderror
								</div>
								<div class="col-4">
									<label for="sma_tahun">SMA Tahun</label>
									<input type="text" class="form-control" id="sma_tahun" name="sma_tahun" maxlength="4" value="{{ $surat->sma_tahun }}">
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
									<input type="checkbox" id="INGGRIS" name="bahasa_asing[]" class="form-check-input" value="INGGRIS" {{ strstr($surat->bahasa_asing, 'INGGRIS') ? 'checked' : '' }}>
									<label for="INGGRIS">INGGRIS</label>
								</div>
								<div class="col-3 checkbox">
									<input type="checkbox" id="JERMAN" name="bahasa_asing[]" class="form-check-input" value="JERMAN" {{ strstr($surat->bahasa_asing, 'JERMAN') ? 'checked' : '' }}>
									<label for="JERMAN">JERMAN</label>
								</div>
								<div class="col-3 checkbox">
									<input type="checkbox" id="JEPANG" name="bahasa_asing[]" class="form-check-input" value="JEPANG" {{ strstr($surat->bahasa_asing, 'JEPANG') ? 'checked' : '' }}>
									<label for="JEPANG">JEPANG</label>
								</div>
								<div class="col-3 checkbox">
									<input type="checkbox" id="MANDARIN" name="bahasa_asing[]" class="form-check-input" value="MANDARIN" {{ strstr($surat->bahasa_asing, 'MANDARIN') ? 'checked' : '' }}>
									<label for="MANDARIN">MANDARIN</label>
								</div>
								<div class="col-3 checkbox">
									<input type="checkbox" id="BELANDA" name="bahasa_asing[]" class="form-check-input" value="BELANDA" {{ strstr($surat->bahasa_asing, 'BELANDA') ? 'checked' : '' }}>
									<label for="BELANDA">BELANDA</label>
								</div>
								<div class="col-3 checkbox">
									<input type="checkbox" id="PRANCIS" name="bahasa_asing[]" class="form-check-input" value="PRANCIS" {{ strstr($surat->bahasa_asing, 'PRANCIS') ? 'checked' : '' }}>
									<label for="PRANCIS">PRANCIS</label>
								</div>
								<div class="col-3 checkbox">
									<input type="checkbox" id="ARAB" name="bahasa_asing[]" class="form-check-input" value="ARAB" {{ strstr($surat->bahasa_asing, 'ARAB') ? 'checked' : '' }}>
									<label for="ARAB">ARAB</label>
								</div>
								<div class="col-3 checkbox">
									<input type="checkbox" id="LAINNYA" name="bahasa_asing[]" class="form-check-input" value="LAINNYA" {{ strstr($surat->bahasa_asing, 'LAINNYA') ? 'checked' : '' }}>
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
									<td class="align-top"><input type="text" class="form-control" name="jabatan_1" value="{{ $surat->jabatan_1 }}"></td>
									<td class="align-top"><input type="text" class="form-control" name="uraian_tugas_1" value="{{ $surat->uraian_tugas_1 }}"></td>
									<td class="align-top"><input type="text" class="form-control" name="lama_kerja_1" value="{{ $surat->lama_kerja_1 }}"></td>
									<td class="align-top"><input type="text" class="form-control" name="pemberi_kerja_1" value="{{ $surat->pemberi_kerja_1 }}"></td>
								</tr>
								<tr>
									<td class="align-top">b.</td>
									<td class="align-top"><input type="text" class="form-control" name="jabatan_2" value="{{ $surat->jabatan_2 }}"></td>
									<td class="align-top"><input type="text" class="form-control" name="uraian_tugas_2" value="{{ $surat->uraian_tugas_2 }}"></td>
									<td class="align-top"><input type="text" class="form-control" name="lama_kerja_2" value="{{ $surat->lama_kerja_2 }}"></td>
									<td class="align-top"><input type="text" class="form-control" name="pemberi_kerja_2" value="{{ $surat->pemberi_kerja_2 }}"></td>
								</tr>
							</tbody>
						</table>
						<hr class="my-3">
						<h5 class="mb-3">Jabatan yang Diinginkan</h5>
						<div class="form-group mb-3">
							<label for="lowongan">Lowongan</label>
							<input type="text" class="form-control" id="lowongan" name="lowongan" value="{{ $surat->lowongan }}">
						</div>
						<div class="form-group mb-3">
							<label for="jabatan_dalam_negeri">Dalam Negeri</label>
							<input type="text" class="form-control" id="jabatan_dalam_negeri" name="jabatan_dalam_negeri" value="{{ $surat->jabatan_dalam_negeri }}">
						</div>
						<div class="form-group mb-3">
							<label for="jabatan_luar_negeri">Luar Negeri</label>
							<input type="text" class="form-control" id="jabatan_luar_negeri" name="jabatan_luar_negeri" value="{{ $surat->jabatan_luar_negeri }}">
						</div>
						<div class="form-group mb-3">
							<label for="upah_yang_diinginkan">Besaran Upah yang Diinginkan *</label>
							<select class="choices form-select" id="upah_yang_diinginkan" name="upah_yang_diinginkan">
								<option value="1000000" {{ $surat->upah_yang_diinginkan == "1000000" ? 'selected' : '' }}>Rp. 1.000.000</option>
								<option value="1000000-2500000" {{ $surat->upah_yang_diinginkan == "1000000-2500000" ? 'selected' : '' }}>Rp. 1.000.000 - Rp. 2.500.000</option>
								<option value="2500000-5000000" {{ $surat->upah_yang_diinginkan == "2500000-5000000" ? 'selected' : '' }}>Rp. 2.500.000 - Rp. 5.000.000</option>
								<option value="5000000" {{ $surat->upah_yang_diinginkan == "5000000" ? 'selected' : '' }}>Rp. 5.000.000</option>
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
