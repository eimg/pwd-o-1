<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container" style="max-width: 600px">
            <span class="navbar-brand mb-0 h1">List</span>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="new.php" class="nav-link text-white">
                            <i class="fa-solid fa-plus"></i> New Role
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-4" style="max-width: 600px">
        <?php
            $db = new PDO('mysql:dbhost=localhost;dbname=project', 'root', '');
            $result = $db->query('SELECT * FROM roles');
            $roles = $result->fetchAll();
        ?>
        <ul class="list-group mb-3">
            <?php foreach($roles as $role): ?>
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <div>
                        <span class="fw-bold"><?= $role['name'] ?></span>
                        <span class="text-muted">(<?= $role['value'] ?>)</span>
                    </div>
                    <div>
                        <a href="edit.php?id=<?= $role['id'] ?>" class="btn btn-sm btn-primary me-2">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>
                        <a href="del.php?id=<?= $role['id'] ?>" class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash"></i> Delete
                        </a>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</body>
</html>
