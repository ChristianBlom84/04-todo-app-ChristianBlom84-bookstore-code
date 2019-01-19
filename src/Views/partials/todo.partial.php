<input type="hidden" name="todoID" value="<?php echo $todo['id']; ?>" />
<input type="text" name="todoText" value="<?php echo $todo['todo']; ?>" />
<button class="btn" type="submit" formaction="update" name="updateTodo" value="<?php echo $todo['todo']; ?>">
    Update
</button>
<button class="btn red" type="submit" formaction="delete" name="deleteTodo" value="<?php echo $todo['todo']; ?>">
    Delete
</button>
<input class="toggle" type="checkbox" name="toggle" id="<?= $todo['id'] ?>" onchange="submit();" <?= $todo['done'] === "1" ? 'checked="true"' : "" ?> />
<label for="<?= $todo['id'] ?>"></label>
