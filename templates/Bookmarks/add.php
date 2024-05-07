<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookmark $bookmark
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $tags
 */
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <!-- carga la pagina para agregar un libro -->
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Bookmarks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookmarks form content">
            <?= $this->Form->create($bookmark) ?>
            <fieldset>
                <!-- añade todos los campo para un nuevo libro -->
                <legend><?= __('Add Bookmark') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                    echo $this->Form->control('url');
                    echo $this->Form->control('tags');
                ?>
                <!-- se carga el libro en la base de dato -->
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
