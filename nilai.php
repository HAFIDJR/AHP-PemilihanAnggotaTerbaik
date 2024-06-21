<?php
include_once './dasboard/header_new.php';
include_once 'includes/nilai.inc.php';
$pro = new Nilai($db);
$stmt = $pro->readAll();
?>

<div class="container px-4">

    <div class="row m-2">
        <div class="col-md-6 text-left">
            <h4>Data Nilai Preferensi</h4>
        </div>
        <div class="col-md-6 text-right">
            <button onclick="location.href='nilai-baru.php'" class="btn btn-primary">Tambah Data</button>
        </div>
    </div>
    <br />


    <table class="table m-2" id="tabeldata">
        <thead>
            <tr>
                <th width="30px">No</th>
                <th>Keterangan Nilai</th>
                <th>Jumlah Nilai</th>
                <th width="100px">Aksi</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>No</th>
                <th>Keterangan Nilai</th>
                <th>Jumlah Nilai</th>
                <th>Aksi</th>
            </tr>
        </tfoot>

        <tbody>
            <?php
            $no = 1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['ket_nilai'] ?></td>
                    <td><?php echo $row['jum_nilai'] ?></td>
                    <td class="text-center d-flex flex-row justify-content-around">
                        <a href="nilai-ubah.php?id=<?php echo $row['id_nilai'] ?>" class="btn btn-warning "><span class="fa-solid fa-pen-to-square" aria-hidden="true"></span></a>
                        <a href="nilai-hapus.php?id=<?php echo $row['id_nilai'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="fa-solid fa-trash" aria-hidden="true"></span></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>
</div>