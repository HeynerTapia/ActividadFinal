<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Registrar Usuario') ?></legend>
        <?= $this->Form->control('username', ['label' => 'Nombre de usuario']) ?>
        <?= $this->Form->control('password', ['label' => 'Contraseña', 'type' => 'password']) ?>
        <?= $this->Form->button(__('Registrar')) ?>
    </fieldset>
<?= $this->Form->end() ?>