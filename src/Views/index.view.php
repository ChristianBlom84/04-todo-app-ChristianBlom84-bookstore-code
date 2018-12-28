<section class="container">
    <form action="add" method="POST">
        <input type="text" name="todocontent">
        <button type="submit" name="submitTodo" value="Add item">Add Item</button>
    </form>
    <?php foreach ($this->todoList as $todo) : ?>
        <form action="" method="POST">
            <input type="text" name="todoText" value="<?php echo $todo['todo']; ?>" data-id="<?php echo $todo['id']; ?>">
            <button type="submit" formaction="update" name="updateTodo" value="<?php echo $todo['todo']; ?>">Update</button>
            <button type="submit" formaction="delete" name="deleteTodo" value="<?php echo $todo['todo']; ?>">Delete</button>
            <button type="submit" formaction="toggle" name="toggle" value="<?php echo $todo['todo']; ?>">Toggle Done</button>
            <?php if ($todo['done'] == 1) : ?>
                &#10004;
            <?php endif; ?>
        </form>
    <?php endforeach; ?>
    <form action="/" method="GET">
        <button type="submit" formaction="done">Show done</button>
        <button type="submit" formaction="in-progress">Show in progress</button>
        <button type="submit">Show all</button>
    </form>
</section>