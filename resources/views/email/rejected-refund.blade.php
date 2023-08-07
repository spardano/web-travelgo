<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Penolakan Refund</title>

</head>
<body style="background-color: rgba(248,249,250, 0.936) !important;" class="bg-light">
    <div style="text-align: center; margin-top:20px; margin-bottom:40px;" class="container text-center">
      <img class="my-4" style="width: 140px; margin-bottom:30px;" src="{{asset('assets/img/logo-travel-go.png')}}" />
      
      <div class="card" style="width: 40rem; margin:0 auto; background:white; border-radius:20px; text-align:left;">
        
        <ul style="padding: 0" class="list-group list-group-flush">
            <li style="position: relative;
            padding:20px;
            display: block; 
            text-decoration: none; 
            border-bottom:1px solid #dee2e6;
            border-top-left-radius: inherit;
            border-top-right-radius: inherit;" class="list-group-item">
                <div class="text-start mb-4 mt-4">
                    <h5 style="font-weight: 700 !important; 
                    font-size: 1.25rem;
                    line-height: 1.2;
                    margin-top:0;" class="card-title fw-bold">Penolakan Refund</h5>
                    <p class="card-text">Mohon maaf pengajuan refund anda harus kami tolak karena alasan berikut:</p>
                </div>
            </li>
            <li style="position: relative;
            display: block; 
            padding:20px;
            border-bottom:1px solid #dee2e6;
            text-decoration: none;" class="list-group-item">
                <div style="text-align:center;">
                   {{ $alasan_penolakan }}
                </div>
            </li>

        </ul>

        <div style="padding:20px; 
        border-top:1px solid #dee2e6;" class="card-footer text-start">
            www.web-travelgo.com <br>
            <i class="fa-brands fa-whatsapp text-success"></i> +62 822 8983 2837 <br>
            <i class="fa-brands fa-facebook text-primary"></i> Jasa Mulya Travel
        </div>

      </div>
      
    </div>

  </body>
  
</html>