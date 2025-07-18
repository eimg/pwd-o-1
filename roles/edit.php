<!-- edit.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container" style="max-width: 600px">
            <div class="d-flex align-items-center">
                <a href="index.php" class="navbar-brand d-flex align-items-center">
                    <i class="fa-solid fa-arrow-left me-2"></i>
                </a>
                <span class="navbar-text mx-auto fw-bold text-white">Edit</span>
            </div>
        </div>
    </nav>
    <div class="container py-4" style="max-width: 600px">
        <?php
        $id = $_GET['id'];

        $db = new PDO('mysql:dbhost=localhost;dbname=project', 'root', '');

        $stmt = $db->prepare("SELECT * FROM roles WHERE id = :id");
        $stmt->execute([':id' => $id]);

        $role = $stmt->fetch();
        ?>
        <form action="update.php" method="post" class="card p-4 shadow-sm">
            <input type="hidden" name="id" value="<?= $role['id'] ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="<?= $role['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="value" class="form-label">Value</label>
                <input type="text" id="value" name="value" class="form-control" placeholder="Value" value="<?= $role['value'] ?>">
            </div>
            <button class="btn btn-primary">
                <i class="fa-solid fa-floppy-disk"></i> Update Role
            </button>
        </form>
    </div>
</body>

</html>