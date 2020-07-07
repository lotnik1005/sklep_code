<br />
<form action="<?= base_url(); ?>register/doRegister" method="post">
    <h2>Rejestracja</h2>
    <hr />
    <!-- show error messages if the form validation fails -->
    <?php if ($this->session->flashdata()) { ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('errors'); ?>
        </div>
    <?php } ?>
    <div class="form-group">
        <label for="name">Imię i nazwisko:</label>
        <input type="text" name="name" required class="form-control" id="name">
    </div>
    <div class="form-group">
        <label for="email">Adres email:</label>
        <input type="email" name="email" required class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="pwd">Hasło:</label>
        <input type="password" name="password" required class="form-control" id="pwd">
    </div>
    <button type="submit" class="btn btn-default">Zapisz</button>
    <span class="float-right"><a href="<?= base_url() . 'login'; ?>" class="btn btn-primary">Login</a></span>
</form>

