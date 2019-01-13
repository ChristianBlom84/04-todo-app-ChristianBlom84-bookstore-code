    <?php foreach ($this->todoList as $todo) : ?>
        <form action="" method="POST">
            <?= includeWith('/partials/todo.partial.php', compact('todo', $todo)) ?>
        </form>
    <?php endforeach; ?>