<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootstrap 5 Thank You Example</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div class="vh-100 d-flex justify-content-center align-items-center">
                <div class="col-md-4">
                    <div class="border border-3 border-danger"></div>
                    <div class="card  bg-white shadow p-5">
                        <div class="mb-4 text-center">
                            <img src="{{asset('assets/img/error.gif')}}" alt="">
                        </div>
                        <div class="text-center">
                            <h1>Ooopss !</h1>
                            <p>{{ $message }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>