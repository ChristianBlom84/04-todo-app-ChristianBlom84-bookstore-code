    <?php foreach ($this->todoList as $todo) : ?>
        <form action="toggle" method="POST">
            <?= includeWith('/partials/todo.partial.php', compact('todo', $todo)) ?>
        </form>
    <?php endforeach; ?>