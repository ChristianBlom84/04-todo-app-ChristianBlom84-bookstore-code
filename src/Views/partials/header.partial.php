<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?= $this->getStylesheet('styles'); ?>" rel="stylesheet">
    <title>Welcome to the Super Duper Todohack</title>
</head>
<body>
    <main role="main">
        <h1>Todo Hack</h1>
        <section class="container">
        <div class="formcontainer">
            <form action="create" method="POST">
                <input type="text" name="todocontent" autofocus>
                <button class="btn teal" type="submit" name="submitTodo" value="Add item">Add Item</button>
            </form>
        </div>