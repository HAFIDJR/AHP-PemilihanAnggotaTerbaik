<?php
include_once './dasboard/header_new.php';
include_once 'includes/kriteria.inc.php';
$pro = new Kriteria($db);
$stmt = $pro->readAll();
?>
<div class="container px-4">

    <div class="row mt-2">
        <div class="col-md-6 text-left">
            <h4>Data Kriteria</h4>
        </div>
        <div class="col-md-6 text-right ">
            <button onclick="location.href='kriteria-baru.php'" class="btn btn-primary">Tambah Data</button>
        </div>
    </div>
    <br />
    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="30px">No</th>
                <th>ID Kriteria</th>
                <th>Nama Kriteria</th>
                <th>Bobot Kriteria</th>
                <th width="100px">Aksi</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th width="30px">No</th>
                <th>ID Kriteria</th>
                <th>Nama Kriteria</th>
                <th>Bobot Kriteria</th>
                <th width="100px">Aksi</th>
            </tr>
        </tfoot>

        <tbody>
            <?php
            $no = 1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['id_kriteria'] ?></td>
                    <td><?php echo $row['nama_kriteria'] ?></td>
                    <td><?php echo $row['bobot_kriteria'] ?></td>
                    <td class="text-center d-flex justify-content-between">
                        <a href="kriteria-ubah.php?id=<?php echo $row['id_kriteria'] ?>" class="btn btn-warning"><span class="fa-solid fa-pen-to-square" aria-hidden="true"></span></a>
                        <a href="kriteria-hapus.php?id=<?php echo $row['id_kriteria'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="fa-solid fa-trash" aria-hidden="true"></span></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>

</div>