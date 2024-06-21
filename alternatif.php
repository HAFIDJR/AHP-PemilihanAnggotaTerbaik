<?php
include_once './dasboard/header_new.php';
include_once 'includes/alternatif.inc.php';
$pro = new Alternatif($db);
$stmt = $pro->readAll();
?>

<div class="container px-4">
    <div class="row">
        <div class="col-md-6 text-left">
            <h4>Data Alternatif</h4>
        </div>
        <div class="col-md-6 text-right">
            <button onclick="location.href='alternatif-baru.php'" class="btn btn-primary">Tambah Data</button>
        </div>
    </div>
    <br />

    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="30px">No</th>
                <th>ID Alternatif</th>
                <th>Nama Alternatif</th>
                <th>Hasil Akhir</th>
                <th width="100px">Aksi</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>No</th>
                <th>ID Alternatif</th>
                <th>Nama Alternatif</th>
                <th>Hasil Akhir</th>
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
                    <td><?php echo $row['id_alternatif'] ?></td>
                    <td><?php echo $row['nama_alternatif'] ?></td>
                    <td><?php echo $row['hasil_akhir'] ?></td>
                    <td class="text-center text-center d-flex justify-content-between">
                        <a href="alternatif-ubah.php?id=<?php echo $row['id_alternatif'] ?>" class="btn btn-warning"><span class="fa-solid fa-pen-to-square" aria-hidden="true"></span></a>
                        <a href="alternatif-hapus.php?id=<?php echo $row['id_alternatif'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="fa-solid fa-trash" aria-hidden="true"></span></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>
</div>