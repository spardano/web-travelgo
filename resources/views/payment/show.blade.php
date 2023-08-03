<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <div class="container">

        <div class="content mt-4">
            <h2 class="h2" style="font-weight: bold">Pembayaran</h2>
            <p style="font-weight:200;">Untuk mengkonfirmasi keberangkatan, silahkan lakukan pembayaran</p>
        </div>

        <div class="card">
            <div class="card-body">
                <span class="text-secondary">Rp</span> <label class="display-4" style="font-weight: 500;">{{number_format($paymentTransactions->booking->total_biaya)}}</label>

                <div class="row mt-2">
                    <div class="col border border-1 rounded p-2 m-2">
                      <label class="fw-light fs-6 text-secondary text-info">
                      <span class="material-symbols-outlined">
                        alt_route
                        </span>
                        </label>

                        <p class="text-center mt-2">{{$paymentTransactions->booking->bookingDetail[0]->ticket->jadwal->trayek->nama_trayek}}</p>
                    </div>
                    <div class="col border border-1 rounded p-2 m-2">
                        
                      <label class="fw-light fs-6 text-secondary text-success"><span class="material-symbols-outlined">
                        star
                        </span>
                       </label>

                       <p class="text-center mt-2">{{$paymentTransactions->booking->bookingDetail[0]->ticket->jadwal->jenis_kelas->namaKelas}}</p>

                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col border border-1 rounded p-2 m-2">
                      <label class="fw-light fs-6 text-secondary text-warning"><span class="material-symbols-outlined">
                        confirmation_number
                        </span>
                       </label>

                        <p class="text-center mt-2">
                            {{count($paymentTransactions->booking->bookingDetail)}} Tiket
                        </p>
                      
                    </div>
                    <div class="col border border-1 rounded p-2 m-2">
                      <label class="fw-light fs-6 text-secondary text-primary"><span class="material-symbols-outlined">
                        schedule
                        </span>
                        </label>

                      <p class="text-center mt-2">7/8/2023</p>
                      
                    </div>
                </div>
                
            </div>
        </div>

        <div class="alert alert-primary d-flex align-items-center p-2 mt-2">
            <div class="svg-icon svg-icon-2hx svg-icon-primary me-3">
                <span class="material-symbols-outlined" style="font-size: 50px">
                    gpp_maybe
                    </span>
            </div>
        
            <div class="d-flex flex-column">
             
                <span>Lakukan pembayaran sebelum 24 jam dari waktu pembooking-an dilakukan.</span>
              
            </div>
            <!--end::Wrapper-->
        </div>

        @if ($paymentTransactions->payment_status == 1)
        <div class="d-grid gap-2 mt-4">
            <button class="btn btn-lg btn-outline-primary" id="pay-button">Bayar Sekarang</button>
          </div>
        @else
            Payment successful
        @endif

    </div>
   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
// <!-- <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"> -->
</script>
<script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', function(e) {
        e.preventDefault();

        snap.pay('{{ $snapToken }}', {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                window.location.href = "{{ route('payment-success')}}";
                console.log(result)
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                window.location.href = "{{ route('payment-error')}}";
                console.log(result)
            }
        });
    });
</script>

</html>