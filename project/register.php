<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center" style="max-width: 600px">
        <h1 class="h3 my-4">Register</h1>
        <form action="_actions/create.php" method="post" class="mb-3">
            <input type="text" name="name" placeholder="Name"
                class="form-control mb-2" required>
            <input type="email" name="email" placeholder="Email"
                class="form-control mb-2" required>
            <input type="text" name="phone" placeholder="Phone"
                class="form-control mb-2" required>
            <textarea name="address" placeholder="address"
                class="form-control mb-2" required></textarea>
            <input type="password" name="password" placeholder="Password"
                class="form-control mb-2" required>

            <button class="btn btn-primary w-100">Register</button>
        </form>

        <a href="index.php">Login</a>
    </div>
</body>
</html>