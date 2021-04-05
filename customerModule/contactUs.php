<!DOCTYPE html>
<html>
<head>
    <title>Contact Us!| Gym</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


<div class="container">
    <h3>Contact us</h3>
    <form action="pro.php" method="POST">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Message:</label>
            <textarea class="form-control" name="message" required></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </form>
</div>


</body>
</html>