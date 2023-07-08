<!DOCTYPE html>
<html>

<head>
    <title>Invoice View</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;400;900&display=swap');

    :root {
        --primary: #0000ff;
        --secondary: #3d3d3d;
        --white: #fff;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Lato', sans-serif;
    }

    body {
        background: var(--secondary);
        padding: 30px;
        color: var(--secondary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }

    .bold {
        font-weight: 900;
    }

    .light {
        font-weight: 100;
    }

    .wrapper {
        background: var(--white);
        padding: 30px;
    }

    .invoice_wrapper {
        border: 3px solid var(--primary);
        width: 700px;
        max-width: 100%;
    }

    .invoice_wrapper .header .logo_invoice_wrap,
    .invoice_wrapper .header .bill_total_wrap {
        display: flex;
        justify-content: space-between;
        padding: 30px;
    }

    .invoice_wrapper .header .logo_sec {
        display: flex;
        align-items: center;
    }

    .invoice_wrapper .header .logo_sec .title_wrap {
        margin-left: 5px;
    }

    .invoice_wrapper .header .logo_sec .title_wrap .title {
        text-transform: uppercase;
        font-size: 18px;
        color: var(--primary);
    }

    .invoice_wrapper .header .logo_sec .title_wrap .sub_title {
        font-size: 12px;
    }

    .invoice_wrapper .header .invoice_sec,
    .invoice_wrapper .header .bill_total_wrap .total_wrap {
        text-align: right;
    }

    .invoice_wrapper .header .invoice_sec .invoice {
        font-size: 28px;
        color: var(--primary);
    }

    .invoice_wrapper .header .invoice_sec .invoice_no,
    .invoice_wrapper .header .invoice_sec .date {
        display: flex;
        width: 100%;
    }

    .invoice_wrapper .header .invoice_sec .invoice_no span:first-child,
    .invoice_wrapper .header .invoice_sec .date span:first-child {
        width: 70px;
        text-align: left;
    }

    .invoice_wrapper .header .invoice_sec .invoice_no span:last-child,
    .invoice_wrapper .header .invoice_sec .date span:last-child {
        width: calc(100% - 70px);
    }

    .invoice_wrapper .header .bill_total_wrap .total_wrap .price,
    .invoice_wrapper .header .bill_total_wrap .bill_sec .name {
        color: var(--primary);
        font-size: 20px;
    }

    .invoice_wrapper .body .main_table .table_header {
        background: var(--primary);
    }

    .invoice_wrapper .body .main_table .table_header .row {
        color: var(--white);
        font-size: 18px;
        border-bottom: 0px;
    }

    .invoice_wrapper .body .main_table .row {
        display: flex;
        border-bottom: 1px solid var(--secondary);
    }

    .invoice_wrapper .body .main_table .row .col {
        padding: 10px;
    }

    .invoice_wrapper .body .main_table .row .col_no {
        width: 5%;
    }

    .invoice_wrapper .body .main_table .row .col_des {
        width: 45%;
    }

    .invoice_wrapper .body .main_table .row .col_price {
        width: 20%;
        text-align: center;
    }

    .invoice_wrapper .body .main_table .row .col_qty {
        width: 10%;
        text-align: center;
    }

    .invoice_wrapper .body .main_table .row .col_total {
        width: 20%;
        text-align: right;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap {
        display: flex;
        justify-content: space-between;
        padding: 5px 0 30px;
        align-items: flex-end;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap .paymethod_sec {
        padding-left: 30px;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec {
        width: 30%;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p {
        display: flex;
        width: 100%;
        padding-bottom: 5px;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span {
        padding: 0 10px;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span:first-child {
        width: 60%;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span:last-child {
        width: 40%;
        text-align: right;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p:last-child span {
        background: var(--primary);
        padding: 10px;
        color: #fff;
    }

    .invoice_wrapper .footer {
        padding: 30px;
    }

    .invoice_wrapper .footer>p {
        color: var(--primary);
        text-decoration: underline;
        font-size: 18px;
        padding-bottom: 5px;
    }

    .invoice_wrapper .footer .terms .tc {
        font-size: 16px;
    }
</style>

<body>

    <div class="wrapper">
        <div class="invoice_wrapper">
            <div class="header">
                <div class="logo_invoice_wrap">
                    <div class="logo_sec">
                        <img src="{{ asset('assets/img/fixtravelgo.png') }}" width="250px;" height="50px;">
                    </div>
                    <div class="invoice_sec">
                        <img src="{{ asset('assets/img/logojmt2.png') }}" width="80px;" height="100px;">
                    </div>
                </div>
                <div class="bill_total_wrap">
                    <div class="bill_sec">
                        <p>INVOICE</p>
                        <p class="bold name">Aldian Willia</p>
                        <span>
                            aldian18ti@mahasiswa.pcr.ac.id
                        </span>
                    </div>
                    <div class="total_wrap">
                        <p>ONLINE(MIDTRANS)</p>
                        <p class="bold price">12 Januari 2023</p>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="main_table">
                    <div class="table_header">
                        <div class="row">
                            <div class="col col_no">NO. </div>
                            <div class="col col_des"> DESKRIPSI</div>
                            <div class="col col_price">BIAYA</div>
                            <div class="col col_qty">JUMLAH</div>
                            <div class="col col_total">TOTAL</div>
                        </div>
                    </div>
                    <div class="table_body">
                        <div class="row">
                            <div class="col col_no">
                                <p>01</p>
                            </div>
                            <div class="col col_des">
                                <p class="bold">Tiket</p>
                                <p>Harga basis tiket.</p>
                            </div>
                            <div class="col col_price">
                                <p>Rp.150.000</p>
                            </div>
                            <div class="col col_qty">
                                <p>2</p>
                            </div>
                            <div class="col col_total">
                                <p>Rp.300.000</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col_no">
                                <p>02</p>
                            </div>
                            <div class="col col_des">
                                <p class="bold">Esekutif</p>
                                <p>Penambahan biaya.</p>
                            </div>
                            <div class="col col_price">
                                <p>Rp.30.000</p>
                            </div>
                            <div class="col col_qty">
                                <p>2</p>
                            </div>
                            <div class="col col_total">
                                <p>Rp.60.000</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col_no">
                                <p>03</p>
                            </div>
                            <div class="col col_des">
                                <p class="bold">Diskon</p>
                                <p>Pengurangan Biaya.</p>
                            </div>
                            <div class="col col_price">
                                <p>Rp.20.000</p>
                            </div>
                            <div class="col col_qty">
                                <p>2</p>
                            </div>
                            <div class="col col_total">
                                <p>Rp.40.000</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col_no">
                                <p>04</p>
                            </div>
                            <div class="col col_des">
                                <p class="bold">Admin</p>
                                <p>Biaya Transfer Online.</p>
                            </div>
                            <div class="col col_price">
                                <p>Rp.5.000</p>
                            </div>
                            <div class="col col_qty">
                                <p>-</p>
                            </div>
                            <div class="col col_total">
                                <p>Rp.5.000</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="paymethod_grandtotal_wrap">
                    <div class="paymethod_sec">
                        <p class="bold">Payment Method</p>
                        <p>Visa, master Card and We accept Cheque</p>
                    </div>
                    <div class="grandtotal_sec">
                        <p class="bold">
                            <span>Total Bayar</span>
                            <span>Rp.325.000</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="footer">
                <p style="color: red">Perhatian!!!</p>
                <div class="terms">
                    <p>*Pembatalan tiket minimal 1 hari sebelum keberangkatan, potongan 25% dari total bayar</p>
                    <p>*Pembatalan tiket pada hari keberangkatan uang tidak kembali</p>
                    <p>*Antar jemput hanya untuk dalam kota, max 5 km dari pusat kota</p>
                    <p>*Dilarang membawa binatang, buah-buahan yang berbahaya</p>
                    <p>*Dilarang membawa barang yang dilarang oleh undang-undang (narkotika)</p>
                    <p>*Kami menerima kritik dan saran</p>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
