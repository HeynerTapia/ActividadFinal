<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>

<?= $this->Form->create($users) ?>
    <fieldset>
        <legend><?= __('Registrar Usuario') ?></legend>
        <?= $this->Form->control('username', ['label' => 'Nombre de usuario']) ?>
        <?= $this->Form->control('password', ['label' => 'Contraseña', 'type' => 'password']) ?>
        <?= $this->Form->button(__('Registrar')) ?>
    </fieldset>
<?= $this->Form->end() ?>