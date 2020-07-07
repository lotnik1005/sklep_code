<br>
<form action="<?= base_url(); ?>login/doLogin" method="post">
	<h2>Strona logowania</h2>
	<hr>
	<?php if ($this->session->flashdata()) { ?>
		<div class="alert alert-warning">
			<?= $this->session->flashdata('msg'); ?>
		</div>
	<?php } ?>
	<div class="form-group">
		<label for="email">Adres email</label>
		<input type="email" name="email" required class="form-control" id="email">
	</div>
	<div class="form-group">
		<label for="pwd">Hasło</label>
		<input type="password" name="password" required class="form-control" id="pwd">
	</div>
	<button type="submit" class="btn btn-default">Zaloguj</button>
	<span class="float-right"><a href="<?= base_url() . register; ?>" class="btn btn-primary">Zarejestruj</a></span>
</form>
