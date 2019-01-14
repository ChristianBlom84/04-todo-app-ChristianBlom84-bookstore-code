    <?php foreach ($this->todoList as $todo) : ?>
        <?php if ($todo['done'] == 0) : ?>
            <form action="toggle" method="POST">
                <?= includeWith('/partials/todo.partial.php', compact('todo', $todo)) ?>
            </form>
        <?php endif; ?>
    <?php endforeach; ?>