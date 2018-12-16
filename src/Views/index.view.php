<section class="container">
    <form action="add" method="POST">
        <input type="text" name="todocontent">
        <input type="submit" name="submit_todo" value="Add item">
    </form>

    <ol>
        <form action="delete" method="POST">
            <?php foreach ($this->todoList as $todo) : ?>
                <li><?= $todo['todo']; ?><input type="submit" name="<?= $todo['todo'] ?>" value="Delete Item"></li>
            <?php endforeach; ?>
        </form>
    </ol>
</section>