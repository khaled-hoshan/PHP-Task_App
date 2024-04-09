<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .todo-item {
            display: flex !important;
            margin: 8px 0;
            border-radius: 0;
            background: #f7f7f7;
        }

        .todo-item.completed div {
            text-decoration: line-through;
        }

        .todo-item-remove {
            visibility: hidden;
        }

        .todo-item:hover .todo-item-remove {
            visibility: visible;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card mt-3">
                    <div class="card-header p-3">
                        <form action="task/create" method="POST">
                            <div class="input-group">
                                <input type="text" name="description" class="form-control" placeholder="New Task..." required />
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body p-3">
                        <ul class="nav nav-pills justify-content-center mb-3">
                            <li class="nav-item">
                                <a href="<?= home() ?>" class="nav-link">All</a>
                            </li>
                            <li class="nav-item">
                                <a href="?completed=0" class="nav-link">In Progress</a>
                            </li>
                            <li class="nav-item">
                                <a href="?completed=1" class="nav-link">Finished</a>
                            </li>

                        </ul>
                        <?php foreach ($tasks as $task) : ?>
                            <div class="todo-item p-2 <?= !$task->completed ?: 'completed' ?>">
                                <div class="p-1">
                                    <a href="task/update?id=<?= $task->id ?>&completed=<?= $task->completed ? '0' : '1' ?>">
                                        <i class="bi fs-5 <?= $task->completed ? 'bi-check-square' : 'bi-clock text-secondary' ?> "></i>
                                    </a>
                                </div>
                                <div class="flex-fill m-auto p-2">
                                    <?= $task->description ?>
                                </div>
                                <div class="mb-2">
                                    <a href="task/delete?id=<?= $task->id ?>" class="todo-item-remove">
                                        <i class="bi bi-trash text-danger fs-4"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>