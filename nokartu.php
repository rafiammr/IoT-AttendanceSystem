<?php
    include "koneksi.php";
    $sql = mysqli_query($connect, "SELECT * FROM tmprfid");
    // Periksa apakah ada data
if ($sql && mysqli_num_rows($sql) > 0) {
    $data = mysqli_fetch_array($sql);
    $nokartu = $data['nokartu'];
} else {
    $nokartu = ''; // Tetapkan nilai default
}
?>


<div class="form-group">
    <label class="text-black">No.Kartu</label>
    <input type="text" name="nokartu" id="nokartu" placeholder="Tempelkan Kartu atau Tag RFID Anda"
        class="block w-full rounded-md border-0 px-3.5 py-2  text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
        value="<?php echo $nokartu; ?>">
</div>