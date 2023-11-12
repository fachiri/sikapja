<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Kartu Tanda Bukti Pendaftaran Pencari Kerja</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<style>
			* {
				font-size: 11px;
			}

			@page {
				size: 330mm 210mm;
				margin: 8px 20px;
			}

			.border {
				border: 1px solid black;
			}

			.table-separate {
				border-collapse: separate;
				border-spacing: 0 5px;
			}

			.page-break {
				page-break-after: always;
			}

			.table-bordered th,
			.table-bordered td {
				border: 1px solid black;
				padding: 20px 10px;
				text-align: center;
			}

			.table-borderless th,
			.table-borderless td {
				border: none;
				padding: 10px 10px;
				text-align: left;
			}

			.table-pendidikan-formal th,
			.table-pendidikan-formal td {
				border: 1px solid black;
				padding: 3px;
				text-align: center;
			}

			.text-left {
				text-align: left !important;
			}
		</style>
	</head>

	<body>
		<table>
			<tr>
				<td class="align-top" style="width: 40%; padding-top: 30px;">
					<div class="border p-3">
						<p class="mb-3" style="font-size: 14px;">Ketentuan</p>
						<ol>
							<li class="mb-5" style="font-size: 14px;">Berlaku Nasional</li>
							<li class="mb-5" style="font-size: 14px;">Bila ada perubahan data/keterangan lainnya atau telah mendapat pekerjaan harap segera melapor</li>
							<li class="mb-5" style="font-size: 14px;">Apabila pencari kerja yang bersangkutan telah diterima bekerja maka instansi/perusahaa yang menerima agar mengembalikan AK/I kepada Dinas Tenaga Kerja</li>
							<li class="mb-5" style="font-size: 14px;">Kartu ini berlaku selama 2 tahun dengan keharusan melapor setiap 6 bulan sekali bagi pencari kerja yang belum mendapat pekerjaan</li>
						</ol>
					</div>
				</td>
				<td class="ps-3 align-top" style="width: 60%;">
					<p class="mb-0 text-end">AK/I</p>
					<table style="border-spacing: 0 5px !important;">
						<tr>
							<td>
								<img src="{{ public_path('bone-bolango.jpg') }}" alt="Logo" width="50">
							</td>
							<td class="fw-bold text-center">
								<div>PEMERINTAH KABUPATEN BONE BOLANGO</div>
								<div>DINAS TENAGA KERJA, KOPERASI DAN UMKM</div>
								<div style="font-size: 12px !important;">JL. PROF DR. ING B. J. HABIBIE DESA ULANTHA KECAMATAN SUWAWA KABUPATEN BONE BOLANGO</div>
								<div>PROVINSI GORONTALO</div>
								<div>KARTU TANDA PENDAFTARAN KARTU PENCARI KERJA</div>
							</td>
						</tr>
					</table>
					<table class="w-100 table-separate fs-small">
						<tr>
							<td colspan="2">NO. PENDAFTAR PENCARI KERJA</td>
							<td class="pe-2">:</td>
							@foreach (str_split($surat->no_pendaftar) as $key => $letter)
								<td class="border text-center">{{ $letter }}</td>
								@if ($key == 3 || $key == 9)
									<td></td>
								@endif
							@endforeach
						</tr>
						<tr>
							<td colspan="2">NOMOR INDUK KEPENDUDUKAN</td>
							<td class="pe-2">:</td>
							@foreach (str_split($surat->nik) as $key => $letter)
								<td class="border text-center">{{ $letter }}</td>
								@if ($key == 3 || $key == 9)
									<td></td>
								@endif
							@endforeach
						</tr>
						<tr>
							<td colspan="2">NAMA LENGKAP</td>
							<td class="pe-2">:</td>
							@for ($i = 0; $i < 18; $i++)
								@if (isset($surat->nama_lengkap[$i]))
									<td class="text-uppercase border text-center" style="width: 20px;">{{ $surat->nama_lengkap[$i] }}</td>
								@else
									<td class="border text-center" style="width: 20px; height: 15px;"></td>
								@endif
							@endfor
						</tr>
						<tr>
							<td colspan="3"></td>
							@for ($i = 0; $i < 18; $i++)
								@if (isset($surat->nama_lengkap[$i + 18]))
									<td class="text-uppercase border text-center" style="width: 20px;">{{ $surat->nama_lengkap[$i + 18] }}</td>
								@else
									<td class="border text-center" style="width: 20px; height: 15px;"></td>
								@endif
							@endfor
						</tr>
						<tr>
							<td rowspan="9" class="pe-3 align-top" style="width: 120px;">
								<img src="{{ public_path('3x4-placeholder.png') }}" alt="Pas Foto" class="w-100">
							</td>
							<td>TEMPAT/TGL LAHIR</td>
							<td class="pe-2">:</td>
							<td colspan="12" class="fw-medium text-uppercase">{{ $surat->tempat_lahir }}</td>
							@php
								[$tahun, $bulan, $tanggal] = explode('-', $surat->tanggal_lahir);
							@endphp

							<!-- Tanggal -->
							<td class="border text-center">{{ substr($tanggal, 0, 1) }}</td>
							<td class="border text-center">{{ substr($tanggal, 1, 1) }}</td>
							<!-- Bulan -->
							<td class="border text-center">{{ substr($bulan, 0, 1) }}</td>
							<td class="border text-center">{{ substr($bulan, 1, 1) }}</td>
							<!-- Tahun -->
							<td class="border text-center">{{ substr($tahun, 0, 1) }}</td>
							<td class="border text-center">{{ substr($tahun, 1, 1) }}</td>
						</tr>
						<tr>
							<td>JENIS KELAMIN</td>
							<td class="pe-2">:</td>
							<td></td>
							<td colspan="5">1. Pria</td>
							<td colspan="5">2. Wanita</td>
							<td colspan="6"></td>
							<td class="border text-center">{{ $surat->jenis_kelamin == 'LAKI-LAKI' ? '1' : '2' }}</td>
						</tr>
						<tr>
							<td>STATUS</td>
							<td class="pe-2">:</td>
							<td></td>
							<td colspan="5">1. Belum Kawin</td>
							<td colspan="5">2. Kawin</td>
							<td colspan="6">3. Cerai</td>
							<td class="border text-center">
								{{ $surat->status == 'BELUM KAWIN' ? '1' : ($surat->status == 'KAWIN' ? '2' : '3') }}
							</td>
						</tr>
						<tr>
							<td>AGAMA</td>
							<td class="pe-2">:</td>
							<td></td>
							<td colspan="5">1. Islam</td>
							<td colspan="5">2. Katolik</td>
							<td colspan="6">3. Protestan</td>
							<td class="border text-center">
								@switch($surat->agama)
									@case('ISLAM')
										1
									@break

									@case('KATOLIK')
										2
									@break

									@case('PROTESTAN')
										3
									@break

									@case('HINDU')
										4
									@break

									@case('BUDHA')
										5
									@break

									@default
										6
								@endswitch
							</td>
						</tr>
						<tr>
							<td colspan="3"></td>
							<td colspan="5">4. Hindu</td>
							<td colspan="5">5. Budha</td>
							<td colspan="6">6. Lain-lain</td>
							<td></td>
						</tr>
						<tr>
							<td>ALAMAT</td>
							<td class="pe-2">:</td>
							<td colspan="17" class="text-uppercase fw-medium text-justify" style="border-bottom: 1px solid black;">
								Desa {{ $surat->kel }} KEC. {{ $surat->kec }} KAB. {{ $surat->kab }} Provinsi {{ $surat->provinsi }}
							</td>
							<td></td>
						</tr>
						<tr>
							<td>TLPN / HP</td>
							<td class="pe-2">:</td>
							<td colspan="17" class="text-uppercase fw-medium text-justify" style="border-bottom: 1px solid black;">
								@php
									$phoneNumber = $surat->telp;
									$formattedPhoneNumber = substr($phoneNumber, 0, 4) . ' ' . substr($phoneNumber, 4, 4) . ' ' . substr($phoneNumber, 8);
								@endphp
								{{ $formattedPhoneNumber }}
							</td>
							<td></td>
						</tr>
						<tr>
							<td>BERLAKU S.D</td>
							<td class="pe-2">:</td>
							<td colspan="17" class="text-uppercase fw-medium text-justify" style="border-bottom: 1px solid black;">
								{{ \Carbon\Carbon::parse($surat->created_at)->addYears(2)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY') }}
							</td>
							<td></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div class="page-break"></div>
		<table class="w-100">
			<tr>
				<td class="align-top" style="width: 50%;">
					<div style="padding-left: 10px; padding-right: 15px;">
						<table class="w-100 table-bordered">
							<tr>
								<th>LAPORAN</th>
								<th>TANGGAL - BULAN - TAHUN</th>
								<th>TANDA TANGAN PENGANTAR KERJA / PETUGAS PENDAFTAR (CANTUMKAN NAMA DAN NIP)</th>
							</tr>
							<tr>
								<th>PERTAMA</th>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<th>KEDUA</th>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<th>KETIGA</th>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td colspan="3">
									<table class="table-borderless">
										<tr>
											<td>DITERIMA KERJA</td>
											<td>:</td>
											<td>....................................................................................................................</td>
										</tr>
										<tr>
											<td>TERHITUNG MULAI TANGGAL</td>
											<td>:</td>
											<td>....................................................................................................................</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
				</td>
				<td class="align-top" style="width: 50%;">
					<div style="padding-right: 25px;">
						<div>PENDIDIKAN FORMAL</div>
						<table class="w-100 table-pendidikan-formal mb-3">
							<tr>
								<td>NO</td>
								<td>Tingkat Pendidikan</td>
								<td>Jurusan</td>
								<td>Tahun Lulus</td>
							</tr>
							<tr>
								<td>1</td>
								<td class="text-left">SD/SEDERAJAT</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>2</td>
								<td class="text-left">SMPT/SEDERAJAT</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>3</td>
								<td class="text-left">SMTA/SMK/SEDERAJAT</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>4</td>
								<td class="text-left">D.I/AKTA I/D.II</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>5</td>
								<td class="text-left">AKTA III/D.III</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>6</td>
								<td class="text-left">SARJANA/S.1/AKTA IV/D.IV</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>7</td>
								<td class="text-left">PASCA SARJANA/AKTA V</td>
								<td></td>
								<td></td>
							</tr>
						</table>
						<div>KETERAMPILAN / PENGALAMAN KERJA</div>
						<table class="w-100 table-pendidikan-formal mb-3">
							<tr>
								<td>NO</td>
								<td>Nama Perusahaan</td>
								<td>Jabatan</td>
								<td>Lama Bekerja</td>
							</tr>
							<tr>
								<td>1</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>2</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							{{-- <tr>
								<td>3</td>
								<td></td>
								<td></td>
								<td></td>
							</tr> --}}
						</table>
					</div>
					<table style="width: 100%;">
						<tr>
							<td></td>
							<td style="text-align: center; width: 40%;">
								<div>PENGANTAR KERJA</div>
								<div><img src="{{ public_path('images/ttd.png') }}" alt="TTD" width="150" class="my-3"></div>
								<div>HASNI B. IBRAHIM</div>
								<div>NIP. 196705061990012002</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>

</html>
