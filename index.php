<!doctype html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-left">
                                        <h1 class="text-gray-900 mb-4 text-center font-weight-bold">Pendaftaran Rute <br> Penerbangan <br><br></h1>
                                    </div>
                                    <form method="Post">
                                        <div class="form-group row">
                                            <label for="maskapai" class="col-sm-2 col-form-label">Maskapai</label>
                                            <div class="col-sm-10">
                                                <input type="text" placeholder="Nama Maskapai" class="form-control" id="maskapai" name="maskapai">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="asal" class="col-sm-2 col-form-label">Bandara Asal</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="asal" name="asal" type="string">
                                                    <option>Pilih Bandara Asal</option>
                                                    <option value="Soekarno-Hatta (CGK)">Soekarno-Hatta (CGK)</option>
                                                    <option value="Husein Sastranegara (BDO)">Husein Sastranegara (BDO)</option>
                                                    <option value="Abdul RachamanSaleh (MLG)">Abdul RachamanSaleh (MLG)</option>
                                                    <option value="Juanda (SUB)">Juanda (SUB)</option>
                                                </select>
                                                <input type="hidden" class="form-control" id="bPajak" name="bPajak" value="">

                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="asal" class="col-sm-2 col-form-label">Bandara Tujuan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="tujuan" name="tujuan" type="string">
                                                    <option>Pilih Bandara Tujuan</option>
                                                    <option value="NgurahRai (DPS)">NgurahRai (DPS)</option>
                                                    <option value="Hasanudin (UPG)">Hasanudin (UPG)</option>
                                                    <option value="Inanwatan (INX)">Inanwatan (INX)</option>
                                                    <option value="Sultan Iskandarmuda (BJT)">Sultan Iskandarmuda (BJT)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="harga" class="col-sm-2 col-form-label">Harga Tiket</label>
                                            <div class="col-sm-10">
                                                <input type="number" placeholder="Harga Tiket" class="form-control" id="harga" name="harga">
                                            </div>
                                        </div>

                                        <div>
                                            <input name="submit" id="submit" type="submit" class="btn btn-success center btn-lg btn-block">
                                        </div>

                                    </form>
                                    <!-- <input name="submit" id="submit" type="submit" class="btn btn-primary mb-3">Process</input> -->
                                    <div class="form-group row">
                                        <div class="col-sm text-center" id='display'>
                                            <?php
                                            function total($a = 0, $b = 0)
                                            {
                                                $total = $a + $b;
                                                return $total;
                                            }


                                            $berkas = "data/data.json"; //Variabel berisi nama berkas di mana data dibaca dan ditulis.
                                            $dataCustomer = array(); //Variabel array kosong untuk menampung data customer dari berkas.

                                            //Mengambil data dari berkas dan mengkonversi data tersebut menjadi array PHP.
                                            //Variabel $dataJson berisi data dari berkas dalam bentuk array Json.
                                            //Variabel $dataCustomer berisi data pada $dataJson yang sudah dikonversi menjadi array PHP.
                                            $dataJson = file_get_contents($berkas);
                                            $dataCustomer = json_decode($dataJson, true);
                                            //echo "$dataJson"; //menampilkan isi data json
                                            //echo "<br><br>";
                                            // print_r($dataCustomer); //menampilkan isi dataCustomer yang sudah berupa array

                                            if (isset($_POST['submit'])) {

                                                if ($_POST['asal'] == "Husein Sastranegara (BDO)") {
                                                    $pAsal = 30000;
                                                } else if ($_POST['asal'] == "Soekarno-Hatta (CGK)") {
                                                    $pAsal = 50000;
                                                } else {
                                                    $pAsal = 40000;
                                                }
                                                if ($_POST['tujuan'] == "NgurahRai (DPS)") {
                                                    $pTujuan = 80000;
                                                } else if ($_POST['tujuan'] == "Inanwatan (INX)") {
                                                    $pTujuan = 90000;
                                                } else {
                                                    $pTujuan = 70000;
                                                }

                                                $hargaTiket =  $_POST['harga'];
                                                //menghtung total pajak
                                                $pajak = total($pAsal, $pTujuan);
                                                //menghtung total Bayar
                                                $totalHargaTiket = total($pajak, $hargaTiket);
                                                //Memasukkan data customer dari form ke dalam array $databaru.
                                                $dataBaru = array(
                                                    'maskapai' => $_POST['maskapai'],
                                                    'asal' => $_POST['asal'],
                                                    'tujuan' => $_POST['tujuan'],
                                                    // 'pajakAsal' => $pAsal,
                                                    // 'pajakTujuan' => $pTujuan,
                                                    'harga' => $_POST['harga'],
                                                    'totalpajak' => $pajak,
                                                    'totalHargaTiket' => $totalHargaTiket,
                                                );
                                                //print_r($dataBaru);
                                                array_push($dataCustomer, $dataBaru); //Menambahkan data baru ke dalam data yang sudah ada dalam berkas. 
                                                //Mengkonversi kembali data customer dari array PHP menjadi array Json dan menyimpannya ke dalam berkas.
                                                $dataJson = json_encode($dataCustomer, JSON_PRETTY_PRINT);
                                                file_put_contents($berkas, $dataJson);
                                            }
                                            ?>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="text-left">
                                                <h3 class="text-gray-900 mb-4 text-center font-weight-bold">Daftar Rute Tersedia<br></h3>
                                            </div>
                                            <div>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Maskapai</th>
                                                            <th scope="col">Asal Penerbangan</th>
                                                            <th scope="col">Tujuan Penerbangan</th>
                                                            <th scope="col">Harga Tiket</th>
                                                            <th scope="col">Pajak</th>
                                                            <th scope="col">Total Harga Tiket</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $maskapai = array_column($dataCustomer, 'maskapai');
                                                        array_multisort($maskapai, SORT_ASC, $dataCustomer); //mengurutkan kolom maskapai dengan urutan A-Z
                                                        for ($i = 0; $i < count($dataCustomer); $i++) {
                                                            $maskapai = $dataCustomer[$i]['maskapai'];
                                                            $asal = $dataCustomer[$i]['asal'];
                                                            $tujuan = $dataCustomer[$i]['tujuan'];
                                                            $harga = $dataCustomer[$i]['harga'];
                                                            $pajak = $dataCustomer[$i]['totalpajak'];
                                                            $total = $dataCustomer[$i]['totalHargaTiket'];
                                                            //	Baris untuk menampilkan data customer.
                                                            echo "<tr>
                                                                <td>" . $maskapai . "</td> <!-- Data nama. -->
                                                                <td>" . $asal . "</td> <!-- Data nomor hp. -->
                                                                <td>" . $tujuan . "</td> <!-- Data jenis kelamin. -->
                                                                <td>" . $harga . "</td> <!-- Data item1. -->
                                                                <td>" . $pajak . "</td> <!-- Data item2. -->
                                                                <td>" . $total . "</td> <!-- Data item3. -->
                                                            </tr>";
                                                        }

                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>