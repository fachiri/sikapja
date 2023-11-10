@extends('layouts.dashboard')
@section('title', 'Pengaturan')
{{-- @push('css')
	<link rel="stylesheet" href="{{ asset('css/extensions/choices.css') }}">
@endpush --}}
@section('content')
	<section class="section">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Ganti Password</h5>
					</div>
					<div class="card-body">
						<form action="{{ route('auth.change_password') }}" method="POST">
              @csrf
							<div class="form-group my-2">
								<label for="old_password" class="form-label">Password Sekarang</label>
								<input type="password" name="old_password" id="old_password" class="form-control" placeholder="Masukkan Password Lama">
							</div>
							<div class="form-group my-2">
								<label for="new_password" class="form-label">Password Baru</label>
								<input type="password" name="new_password" id="new_password" class="form-control" placeholder="Masukkan Password Baru">
							</div>
							<div class="form-group my-2">
								<label for="repeat_new_password" class="form-label">Ulangin Password Baru</label>
								<input type="password" name="repeat_new_password" id="repeat_new_password" class="form-control" placeholder="Ulangi Password Baru">
							</div>

							<div class="form-group d-flex justify-content-end my-2">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
