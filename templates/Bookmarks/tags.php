<h1>
    <!-- SE CARGA LA LISTA A LA VISTA -->
    LIBROS EN LA TIENDA
    <?= $this->Text->toList(h($tags)) ?>
</h1>

<section>
<?php foreach ($bookmarks as $bookmark): ?>
    <article>
        <!-- CARGAMOS LAS DIRECCIONES -->
        <h4><?= $this->Html->link($bookmark->title, $bookmark->url) ?></h4>
        <small><?= h($bookmark->url) ?></small>

        <!-- CARGAMOS LOS DIRECCIONES  -->
        <?= $this->Text->autoParagraph(h($bookmark->description)) ?>
        
        <!-- SE CARGA LA URL A LA PAGINA -->
        <?= $this->Html->scriptBlock('
            document.querySelector("h4 a").addEventListener("click", function(event) {
                event.preventDefault();
                window.location.href = "http://localhost:8765/bookmarks/tagged/' . urlencode($bookmark->title) . '";
            });
        '); ?>
    </article>
<?php endforeach; ?>
</section>
