<ul>
    <?php foreach ($this->books as $book) : ?>
        <li>
            <a href="/books/<?= $book['id']; ?>">
                <?= $book['title']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>