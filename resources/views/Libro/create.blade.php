@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nuevo Libro</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('libro.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del libro" required>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="number" name="npagina" id="npagina" class="form-control input-sm" placeholder="Número de Páginas" required>
									</div>
								</div>
							</div>

							<div class="form-group">
								<textarea name="resumen" class="form-control input-sm" placeholder="Resumen" required></textarea>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="number" name="edicion" id="edicion" class="form-control input-sm" placeholder="Edición del libro" required>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="number" name="precio" id="precio" class="form-control input-sm" placeholder="Precio del libro" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<textarea name="autor" class="form-control input-sm" placeholder="Autor" required></textarea>
							</div>
							<div class="form-group">
								<select name ="tipo_libro" id ="tipo_libro"  class="form-control mb-2" required>
                    				@foreach($tipo_libros as  $tipo)
                    					<option  value={{$tipo->id}}>{{ $tipo->nombre_tipo }}</option>
                   			 		@endforeach
                				</select>
							</div>           

							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('libro.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection