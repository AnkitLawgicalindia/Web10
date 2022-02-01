@extends('layouts.login_app')
@section('content')
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 text-center mb-5">
				<h2 class="heading-section">Rgi Expert Solution</h2>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-6 col-lg-4">
				<div class="login-wrap p-0">
					<livewire:login-livewire />
					<livewire:scripts />
				</div>
			</div>
		</div>
	</div>
</section>

@endsection