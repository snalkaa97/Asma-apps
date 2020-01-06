<?php

include 'header.php';


?>

<br><br><br>
<div class="container">
    <h2>Daftar Gejala</h2>
    <?php
    include 'config.php';
    $query = mysqli_query($con, "SELECT *FROM daftar_gejala");
    $no = 0;
    ?>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Gejala</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php while ($data = mysqli_fetch_assoc($query)) : $no++; ?>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['gejala']; ?></td>
                </tr>
            </tbody>

        <?php endwhile; ?>
    </table>
    <h2>Basis Pengetahuan Sistem</h2>
    <?php
    $query = mysqli_query($con, "SELECT *FROM basis_aturan LEFT JOIN daftar_gejala ON basis_aturan.id_gejala=daftar_gejala.id_gejala ORDER BY daftar_gejala.id_gejala ASC");
    $num = 0;
    ?>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Id Gejala</th>
                <th>Gejala</th>
                <th>Gejala Akut</th>
                <th>Gejala Kronis</th>
                <th>Gejala Periodik</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php while ($data = mysqli_fetch_assoc($query)) : $num++; ?>
                    <td><?php echo $num; ?></td>
                    <td><?php echo $data['id_gejala']; ?></td>
                    <td><?php echo $data['gejala']; ?></td>
                    <td><?php echo $data['ngejala_akut'] ?></td>
                    <td><?php echo $data['ngejala_kronis'] ?></td>
                    <td><?php echo $data['ngejala_periodik'] ?></td>
                </tr>
            </tbody>
        <?php endwhile; ?>
    </table>

    <h2>Daftar Penyakit</h2>
    <?php
    $query = mysqli_query($con, "SELECT *FROM daftar_penyakit");
    $num = 0;
    ?>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>ID Penyakit</th>
                <th>Nama Penyakit</th>
                <th>Nilai Bobot</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php while ($data = mysqli_fetch_assoc($query)) : $num++; ?>
                    <td><?php echo $num; ?></td>
                    <td><?= $data['id_penyakit'] ?></td>
                    <td><?= $data['nama_penyakit'] ?></td>
                    <td><?= $data['npenyakit'] ?></td>
                </tr>
            </tbody>
        <?php endwhile; ?>
    </table>
</div>