<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet" />
    <style>
        body {
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .container {
            border: solid white 1px;
            height: max-content;
            background-color: #fff;
            padding: 10px;
            border-radius: 15px;
            margin: 3% 5%;
        }

        .name {
            font-weight: bold;
        }

        .head {
            padding: 10px;
            height: max-content;
            width: 100%;
            display: flex;
            gap: 10px;
            box-sizing: border-box;
            background-color: #47867B;
        }

        .head img {
            height: 20px;
        }

        table {
            border-spacing: 0px;
        }

        .container_main {
            background-color: #EDF2F7;
            border-radius: 15px;
            border: solid #EDF2F7 1px;
            height: max-content;
            width: 100%;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="container_main">
        <div class="container">
            <div class="pembuka">
                <p class="name">Salam, {{ $data['nama'] }} yang kami hormati,</p>
                <p>
                    Selamat! pendaftaran Anda pada
                    <span class="name">POS Keuangan Bersama</span> telah kami terima.
                    Kami mengonfirmasi bahwa Anda telah mendaftar sebagai bagian dari
                    layanan yang kami sediakan detail sebagai berikut:
                </p>
            </div>
            <hr />
            <div class="indentitas">
                <p class="name">Identitas Pendaftar</p>
                <table>
                    <tr>
                        <td>Nama lengkap</td>
                        <td>:</td>
                        <td>{{ $data['nama'] }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $data['alamat'] }}</td>
                    </tr>
                    <tr>
                        <td>No Hp</td>
                        <td>:</td>
                        <td>{{ $data['no_hp'] }}</td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td>:</td>
                        <td>{{ $data['tujuan'] }}</td>
                    </tr>
                </table>
            </div>
            <div class="indentitas">
                <p class="name">Detail Kegiatan</p>
                <table>
                    <tr>
                        <td>Nama Program</td>
                        <td>:</td>
                        <td>{{ $data['program'] }}</td>
                    </tr>
                    <tr>
                        <td>Instansi</td>
                        <td>:</td>
                        <td>{{ $data['instansi'] }}</td>
                    </tr>
                    <!-- <tr>
                            <td>Call Center</td>
                            <td>:</td>
                            <td>{{ $data['call_center'] }}</td>
                        </tr>  -->
                </table>
            </div>
            <p>Untuk perbaikan dan keberlanjutan layanan kami, silakan mengisi survei berikut:
                <br>https://forms.gle/F1aSkAYVvcJtjWKGA
            </p>

            <p>
                <i>Note : Dengan mengisi survei di atas, Anda berkesempatan untuk mendapatkan voucher GOJEK s.d
                    Rp123.000 <br>
                    (tergantung wilayah). Syarat dan ketentuan berlaku. <br>
                    Klik https://www.gojek.com/blog/gojek/PosEdukasiGojek untuk informasi lebih lanjut.
                </i>
            </p>

            <p class="name">Salam Sukses, <br />POS Keuangan Bersama</p>
            <p style="font-size:12px;color:#a7afb3;margin:auto;width:max-content">
                © 2024 Powered by PT Digital Desa Indonesia
            </p>
        </div>
    </div>
</body>

</html>
