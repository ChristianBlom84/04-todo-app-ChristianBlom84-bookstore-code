    <?php foreach ($this->todoList as $todo) : ?>
        <?php if ($todo['done'] == 1) : ?>
            <form action="" method="POST">
                <?= includeWith('/partials/todo.partial.php', compact('todo', $todo)) ?>
            </form>
        <?php endif; ?>
    <?php endforeach; ?>