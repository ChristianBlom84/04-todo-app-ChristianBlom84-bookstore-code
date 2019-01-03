    <?php foreach ($this->todoList as $todo) : ?>
        <?php if ($todo['done'] == 1) : ?>
            <form action="" method="POST">
                <input type="hidden" name="todoID" value="<?php echo $todo['id']; ?>">
                <input type="text" name="todoText" value="<?php echo $todo['todo']; ?>">
                <button type="submit" formaction="update" name="updateTodo" value="<?php echo $todo['todo']; ?>">Update</button>
                <button type="submit" formaction="delete" name="deleteTodo" value="<?php echo $todo['todo']; ?>">Delete</button>
                <button type="submit" formaction="toggle" name="toggle" value="<?php echo $todo['todo']; ?>">Toggle Done</button>
                <span>&#10004;</span>
            </form>
        <?php endif; ?>
    <?php endforeach; ?>