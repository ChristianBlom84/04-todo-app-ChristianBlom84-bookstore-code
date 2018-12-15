<section class="container">
    <form action="" method="POST">
        <input type="text" name="todocontent">
        <input type="submit" name="submit_todo" value="Add item">
    </form>

    <ul>
        <?php foreach ($this->todoList as $todo) : ?>
            <li><?= $todo['todo']; ?></li>
        <?php endforeach; ?>
    </ul>
</section>