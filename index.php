<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        body {
            background-color: #98FB98; /* Warna hijau mint */
        }

        .container-fluid {
            background-color: #E0FFD1; /* Warna hijau muda lebih soft */
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <h1 class="text-center">Hello!</h1>
    
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?halaman=todo">Todo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"> </ul>
            </div>
        </div>
    </nav>
    <!-- NavBar -->

    <!-- Content -->
    <div class="container-fluid mt-3">
        <div class="row d-flex justify-content-center" style="min-height: 400px;">
            <div class="col-md-10 bg-white p-4 rounded">
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == 'todo') {
                        include 'todo.php';
                    } else if ($_GET['halaman'] == 'edit_todo') {
                        include 'edit_todo.php';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Content -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(".alert").delay(1000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>
</body>
</html>

