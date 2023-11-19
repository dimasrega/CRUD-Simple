<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: royalblue;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="d-flex justify-content-center">
            <div class="card">


                <?php echo form_open('login'); ?>

                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">username</label><br>
                        <?php echo form_error('username'); ?>
                        <input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label><br>
                        <?php echo form_error('email'); ?>
                        <input type="email" name="email" value="<?php echo set_value('email'); ?>" size="50" />
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label><br>
                        <?php echo form_error('password'); ?>
                        <input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">User Akses</label><br>
                        <?php echo form_error('akses'); ?>
                        <input type="text" name="user_akses" value="<?php echo set_value('user_akses'); ?>" size="50" />

                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
        </div>
    </div>

    </form>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>