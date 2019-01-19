<?php

namespace Todo\Models;

class TodoModel extends AbstractModel
{
    public static function getTodoList()
    {
        $query = <<<SQL
            SELECT * FROM todos;
SQL;
        
        static::$db->query($query);
        $todos = static::$db->resultSet();
        return $todos;
    }

    public static function createTodo($post)
    {
        $query = <<<SQL
            INSERT INTO todos (todo)
            VALUES (:todo);
SQL;
        static::$db->query($query);
        static::$db->bind(':todo', $post['todocontent']);
        static::$db->resultSet();
    }

    public static function deleteTodo($post)
    {
        $query = <<<SQL
            DELETE FROM todos
            WHERE id = :id
            LIMIT 1;
SQL;
        static::$db->query($query);
        static::$db->bind(':id', $post['todoID']);
        static::$db->resultSet();
    }

    public static function updateTodo($post)
    {
        $query = <<<SQL
            UPDATE todos
            SET todo = :newTodo
            WHERE todo = :todo
            LIMIT 1;
SQL;
        static::$db->query($query);
        static::$db->bind(':todo', $post['updateTodo']);
        static::$db->bind(':newTodo', $post['todoText']);
        static::$db->resultSet();
    }

    public static function toggleTodo($post)
    {
        $query = <<<SQL
            SELECT * FROM todos;
SQL;
        
        static::$db->query($query);
        $todos = static::$db->resultSet();
        foreach ($todos as $todo) {
            if ($todo['id'] == $post['todoID']) {
                if ($todo['done'] == 0) {
                    $todoState = 1;
                } else {
                    $todoState = 0;
                }
            }
        }
        $query = <<<SQL
            UPDATE todos
            SET done = :newStatus
            WHERE id = :id
            LIMIT 1;
SQL;
        static::$db->query($query);
        static::$db->bind(':id', $post['todoID']);
        static::$db->bind(':newStatus', $todoState);
        static::$db->resultSet();
    }

    public static function toggleAll($post)
    {
        $query = <<<SQL
            SELECT * FROM todos;
SQL;
        
        static::$db->query($query);
        $todos = static::$db->resultSet();
        foreach ($todos as $todo) {
            if ($todo['done'] == 0) {
                $todoState = 1;
            } else {
                $todoState = 0;
            }
        }
        $query = <<<SQL
            UPDATE todos
            SET done = :newStatus
SQL;
        static::$db->query($query);
        static::$db->bind(':newStatus', $todoState);
        static::$db->resultSet();
    }

    public static function searchTodo($post)
    {
        $query = <<<SQL
            SELECT * FROM todos
            WHERE todo LIKE :searchTodo;
SQL;
        static::$db->query($query);
        static::$db->bind(':searchTodo', '%' . $post['search'] . '%');
        $todos = static::$db->resultSet();
        return $todos;
    }
}
