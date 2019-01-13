<input type="hidden" name="todoID" value="<?php echo $todo['id']; ?>">
<input type="text" name="todoText" value="<?php echo $todo['todo']; ?>">
<button class="btn" type="submit" formaction="update" name="updateTodo" value="<?php echo $todo['todo']; ?>">Update</button>
<button class="btn red" type="submit" formaction="delete" name="deleteTodo" value="<?php echo $todo['todo']; ?>">Delete</button>
<button class="btn" type="submit" formaction="toggle" name="toggle" value="<?php echo $todo['todo']; ?>">Toggle Done</button>
<?php if ($todo['done'] == 1) : ?>
    &#10004;
<?php endif; ?>
