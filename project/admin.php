<?php
include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$auth = Auth::check();

$table = new UsersTable(new MySQL);
$users = $table->all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar bg-primary navbar-dark navbar-expand">
        <div class="container">
            <a href="#" class="navbar-brand">Admin</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">
                        <?= $auth->name ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="_actions/logout.php" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <table class="table table-bordered table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th></th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->phone ?></td>
                    <td>
                        <?php if ($user->role_id == 3): ?>
                            <span class="badge bg-success">
                                <?= $user->role ?>
                            </span>
                        <?php elseif ($user->role_id == 2): ?>
                            <span class="badge bg-primary">
                                <?= $user->role ?>
                            </span>
                        <?php else: ?>
                            <span class="badge bg-secondary">
                                <?= $user->role ?>
                            </span>
                        <?php endif ?>
                    </td>
                    <td></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>