<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookmark $bookmark
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $tags
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <!-- se carga la pagina para editar un libro -->
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bookmark->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bookmark->id), 'class' => 'side-nav-item']
            ) ?>
            <!-- SE CARGA EN UNA VARIABLE -->
            <?= $this->Html->link(__('List Bookmarks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookmarks form content">
            <?= $this->Form->create($bookmark) ?>
            <fieldset>
                <legend><?= __('Edit Bookmark') ?></legend>
                <!-- SE CARGAN LOS ESPACIOS PARA EDITAR UN LIBRO -->
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                    echo $this->Form->control('url');
                    echo $this->Form->control('tags._ids', ['options' => $tags]);
                ?>
            </fieldset>
            <!-- UNA VEZ ACTUALIZADOS LOS CAMPOS SE CARGA EN LA BASE DE DATOS -->
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
