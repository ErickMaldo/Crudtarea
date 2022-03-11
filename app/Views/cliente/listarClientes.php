<?= $this->extend("base/base") ?>
<?= $this->section("section-content") ?>
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Clientes</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Dashboard v1</li>
				</ol>
			</div>
		</div>
	</div>
</div>


<section class="content">
	<div class="container-fluid">
		<div class="row">
		<?php if ( session()->getFlashdata("textflas") ): ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= session()->getFlashdata("textflas") ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>	
				<?php endif ?>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Lista de clientes</h3>
						<form action="/clientes">
							<div class="row justify-content-end">
								<div class="col-md-2">
									<select name="campobusqueda" class="form-control">
										<option value="nombres">Nombres</option>
										<option value="dui">DUI</option>
									</select>
								</div>
								<div class="col-md-2">
									<input type="text" name="valorCampo" class="form-control">
								</div>
								<div class="col-md-1">
									<button type="submit" class="btn btn-outline-primary">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>
							<div class="d-flex align-item-center">
							</div>
						</form>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table text-center">
								<thead>
									<tr>
										<th>Id</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Telefono</th>
										<th>Email</th>
										<th>Dui</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($clientes as $c): ?>
										<tr>
											<td><?= $c["id"] ?></td>
											<td><?= $c["nombres"] ?></td>
											<td><?= $c["apellidos"] ?></td>
											<td><?= $c["telefono"] ?></td>
											<td><?= $c["email"] ?></td>
											<td><?= $c["dui"] ?></td>
											<td class="w-25">
												<a href="/clientes/editar/<?= $c['id'] ?>" class="btn btn-info btn-sm">Editar</a>
												<a href="/clientes/eliminar/<?= $c['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar registro?')">Eliminar</a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">
						<?= $pager->links("default", "paginador") ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection() ?>
<?= $this->section("section-script") ?>
<?= $this->endSection() ?>
