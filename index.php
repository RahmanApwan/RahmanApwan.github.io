<?php
session_start();

if (!isset($_SESSION['username'])) {

    header("Location: login.php");
    exit();
}

$datapaket = array (
    array("Paket A", "cuci kering biasa",40000),
    array("Paket B ", "Cuci kering dan lipat",45000),
    array("Paket C" , " Cuci kering, setrika, dan lipat",50000),
    array("Paket D","Cuci kering, setrika, pengharum,lipat",55000)
    );

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kontol</title>
</head>
<script src="https://cdn.tailwindcss.com"></script>
<body class="bg-gray-50">
    <nav class="fixed top-0 left-0 w-full shadow-md bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li id="hide" >
                        <a href="#home" class="block py-2 px-3 text-white bg-blue-700 hover:text-blue-800 rounded md:bg-transparent md:text-blue-600 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
                    </li>
                    <li id="show">
                        <a href="#trans" class="block py-2 px-3 text-white bg-blue-700 hover:text-blue-800  rounded md:bg-transparent md:text-blue-600 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Transaksi</a>
                    </li>
                </ul>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li id="hide" >
                        <a href="logout.php" class="block py-2 px-3 text-white bg-blue-700 hover:text-blue-800 rounded md:bg-transparent md:text-blue-600 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Logout</a>
                    </li>
            </div>
        </div>
    </nav>
<div class="container mx-auto py-4 mt-16">
    <div class=" pb-36 bg-gray-300 rounded-md my-6">
        <div class="m-6 pt-6">
        <h2 class="text-xl ">Selamat Datang, <?php echo $_SESSION['username']; ?>!</h2>
        </div>
    </div>
    <div id="home" class="flex justify-center">
        <?php for ($i = 0; $i < count($datapaket); $i++) {
            $option = $datapaket[$i]; ?>
        <div class="flex flex-col-reverse border-t-2 border-blue-900 text-center shadow-xl rounded mx-3 my-6">
            <div class="px-20 py-12" >
                <button type="button" id="option-button" class=" bg-blue-900 hover:bg-blue-950 text-white font-bold py-2 px-4 rounded" data-option-value="<?= $i ?>" data-option-data="<?= htmlspecialchars($option[2], ENT_QUOTES, 'UTF-8') ?>">
                   <a href="#trans">Pilih <?php echo $option[0] ?></a> 
                </button>
            </div>
            <?php for ($j = 0; $j < count($datapaket[$i]); $j++) { ?>
                <div class="mt-3" >
                    <p> <?= $datapaket[$i][$j] ?> </p>
                </div>
            <?php } ?>
            
        </div>
        <?php } ?>
    </div>
    <div id="trans" class="hidden">
        <form method="post" action="proses_transaksi.php" class="">
                <div class="shadow-md rounded bg-gray-500 p-auto">
                    <div class="mx-12 py-10">
                    <div class="flex justify-between">
                        <div class="mt-6">
                            <label for="no_transaksi">No Transaksi</label>
                            <input type="text" id="no_transaksi" name="no_transaksi" required>
                        </div>
                        <div class="mt-6 flex">
                            <div class="mr-3">
                            <input type="checkbox" name="tidak" id="tidak" data-nol="0" onchange="updateCheckboxes(this)">
                            <label for="tidak">Tidak Ada Tambahan - Rp.0</label>
                            </div>
                            <div class="">
                            <input type="checkbox" name="pelembut" id="pelembut" class="pelembut" data-value="10000" onchange="updateCheckboxes(this)">
                            <label for="pelembut">Pelembut - Rp.10.000</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <label for="Tanggal">Tanggal</label>
                        <input type="date" id="Tanggal" name="Tanggal" required>
                    </div>
                    <div class="mt-6">
                        <label for="nama_cus">Nama Customer</label>
                        <input type="text" id="nama_cus" name="nama_cus" required>
                    </div>
                    <div class="mt-6">
                        <label for="id_paket">Pilih Paket:</label>
                        <select id="id_paket"  name="id_paket">
                            <?php
                            for ($i = 0; $i < count($datapaket); $i++) :
                                $option = $datapaket[$i];
                            ?>
                                <option value="<?= $i ?>"> <?php echo "$option[0]"; ?> </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="mt-6 mb-6">
                        <label for="harga">Harga</label>
                        <input type="text" id="harga" readonly>
                    </div>
                    </div>
                </div>
                <div class="flex justify-between ">
                    <div class="px-5 py-12 ">
                        <div class="py-4">
                        <label for="total" >Total harga</label>
                        <input type="number" name="total" id="total" readonly>
                        </div>
                        <div class="py-4">
                        <label for="pembayaran">Pembayaran</label>
                        <input type="number" name="pembayaran" id="pembayaran">
                        </div>
                    </div>
                
                    <div class="px-6 py-12">
                        <button type="button" id="hitungKembalian">Hitung Kembalian</button>

                        <label for="kembalian" required>Kembalian</label>
                        <input type="number" name="kembalian" id="kembalian" readonly >
                    </div>
                    <div class="px-6 py-12">
                        <button type="submit" class=" bg-blue-900 hover:bg-blue-950 text-white font-bold py-2 px-4 rounded">Simpan Transaksi</button>
                    </div>
                </div>
        </form>
    </div>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
    var datapaket = <?php echo json_encode($datapaket); ?>;
    var select = document.getElementById('id_paket');
    var inputField = document.getElementById('harga');
    var pelembutCheckbox = document.getElementById('pelembut');
    var tidakCheckbox = document.getElementById('tidak');
    var totalInput = document.getElementById('total');
    var pembayaranInput = document.getElementById('pembayaran');
    var kembalianInput = document.getElementById('kembalian');
    var buttons = document.querySelectorAll('#option-button');
    const elementToToggle = document.getElementById('trans');

    function updateTotal() {
        var selectedOptionIndex = select.value;
        var selectedOptionData = datapaket[selectedOptionIndex][2];
        var total = parseInt(selectedOptionData);

        if (pelembutCheckbox.checked) {
            total += parseInt(pelembutCheckbox.getAttribute('data-value'));
        } else if (tidakCheckbox.checked) {
            total += parseInt(tidakCheckbox.getAttribute('data-nol'));
        }

        totalInput.value = total;
    }

    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function () {
            var optionValue = this.getAttribute('data-option-value');
            select.value = optionValue;

            var dataToDisplay = this.getAttribute('data-option-data');
            inputField.value = dataToDisplay;

            elementToToggle.classList.remove('hidden');

            updateTotal();
        });
    }

    pelembutCheckbox.addEventListener('change', function () {
        if (pelembutCheckbox.checked) {
            tidakCheckbox.checked = false;
        }
        updateTotal();
    });

    tidakCheckbox.addEventListener('change', function () {
        if (tidakCheckbox.checked) {
            pelembutCheckbox.checked = false;
        }
        updateTotal();
    });

    inputField.value = "0";
    totalInput.value = "0";
    pembayaranInput.value = "";
    kembalianInput.value = "";

    select.addEventListener('change', function () {
        var selectedOptionIndex = this.value;
        var selectedOptionData = datapaket[selectedOptionIndex][2];
        inputField.value = selectedOptionData;

        updateTotal();
    });

    var hitungKembalianButton = document.getElementById('hitungKembalian');
    hitungKembalianButton.addEventListener('click', function () {
        hitungKembalian();
    });

    function hitungKembalian() {
        var totalHarga = parseInt(totalInput.value);
        var pembayaran = parseInt(pembayaranInput.value);

        if (isNaN(pembayaran)) {
            alert('Silakan masukkan jumlah pembayaran!');
            return;
        }

        if (!isNaN(totalHarga) && !isNaN(pembayaran)) {
            var kembalian = pembayaran - totalHarga;
            kembalianInput.value = (kembalian < 0 ? 0 : kembalian);
        }
    }

    const show = document.getElementById('show');
    const hide = document.getElementById('hide');

    show.addEventListener('click', () => {
        elementToToggle.classList.remove('hidden');
    });

    hide.addEventListener('click', () => {
        elementToToggle.classList.add('hidden');
    });
});

function updateCheckboxes(checkbox) {
    if (checkbox.id === 'tidak' && checkbox.checked) {
        document.getElementById('pelembut').checked = false;
    } else if (checkbox.id === 'pelembut' && checkbox.checked) {
        document.getElementById('tidak').checked = false;
    }
}
    </script>
</body>

</html>
