<h1>
    Bookmarks tagged with
    <?= $this->Text->toList(h($tags)) ?>
</h1>

<section>
<?php foreach ($bookmarks as $bookmark): ?>
    <article>
        <!-- Use the HtmlHelper to create a link -->
        <h4><?= $this->Html->link($bookmark->title, $bookmark->url) ?></h4>
        <small><?= h($bookmark->url) ?></small>

        <!-- Use the TextHelper to format text -->
        <?= $this->Text->autoParagraph(h($bookmark->description)) ?>
        
        <!-- Add the additional link when the title is clicked -->
        <?= $this->Html->scriptBlock('
            document.querySelector("h4 a").addEventListener("click", function(event) {
                event.preventDefault();
                window.location.href = "http://localhost:8765/bookmarks/tagged/Padre%20Rico,%20Padre%20pobre";
            });
        '); ?>
    </article>
<?php endforeach; ?>
</section>
