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
			<?php if (! empty($mensajesDeError)): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?php foreach ($mensajesDeError as $field => $error): ?>
						<p><?= $error ?></p>
					<?php endforeach ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>	
			<?php endif ?>
			<div class="col-md-12">
				<form action="/clientes/actualizar/<?= $cliente["id"] ?>" method="post">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Actualizar cliente</h3>
						</div>
						<div class="card-body">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombres..." value="<?= $cliente["nombres"] ?>">
								</div>
								<div class="form-group">
									<input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos..." value="<?= $cliente["apellidos"] ?>">
								</div>
								<div class="form-group">
									<input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono..." value="<?= $cliente["telefono"] ?>">
								</div>
								<div class="form-group">
									<input type="text" name="email" id="email" class="form-control" placeholder="Email..." value="<?= $cliente["email"] ?>">
								</div>
								<div class="form-group">
									<input type="text" name="dui" id="dui" class="form-control" placeholder="DUI..." value="<?= $cliente["dui"] ?>" data-inputmask="'mask': '99999999-9'" data-mask>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">
								Editar
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection() ?>
<?= $this->section("section-script") ?>
<script type="text/javascript">

	$(function() {
		$("[data-mask]").inputmask();
	});

</script>
<?= $this->endSection() ?>
