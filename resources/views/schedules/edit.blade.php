@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Agendamento</div>

				<div class="card-body">
					@foreach($schedules as $schedule)
					@if($schedule->id == $id)

					<form action="{{ route('schedules.create') }}" method="post">
						{{ csrf_field() }}
						@method('PATCH')


						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">Nome:</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $schedule->name }}" required autocomplete="name" autofocus>

								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="description" class="col-md-4 col-form-label text-md-right">Descrição:</label>

							<div class="col-md-6">
								<input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $schedule->description }}" required autocomplete="description" autofocus>

								@error('description')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="schedule_date" class="col-md-4 col-form-label text-md-right">Data:</label>

							<div class="col-md-6">
								<input id="schedule_date" type="text" class="form-control @error('schedule_date') is-invalid @enderror" name="schedule_date" value="{{ old('schedule_date') ?? $schedule->schedule_date }}" data-date-format="DD-MM-YYYY" required autocomplete="off" autofocus>

								@error('schedule_date')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="start_time" class="col-md-4 col-form-label text-md-right">Horário:</label>

							<div class="col-md-6">
								<input id="start_time" type="text" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time') ?? $schedule->start_time }}" required autocomplete="off" autofocus>

								@error('start_time')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="d-flex align-items-center justify-content-center">
							<input type="submit" value="Reagendar" class="btn btn-primary"/>
						</div>

					</form>

					@endif

					@endforeach
				</div>
			</div>
		</div>
	</div>

	@endsection
