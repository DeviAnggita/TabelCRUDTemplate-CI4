<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('mahasiswa')?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail Data </h1>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Form Detail Data Vinf Box Course</h4>
        </div>
        <div class="card-body table-responsive">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: </td>
                    <td><?= $mhs['nama']; ?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>: </td>
                    <td><?= $mhs['username']; ?></td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td>: </td>
                    <td><?= $mhs['email']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: </td>
                    <td><?= $mhs['tanggal_lahir']; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: </td>
                    <td><?= $mhs['alamat']; ?></td>
                </tr>
                <tr>
                    <td>No. Handphone</td>
                    <td>: </td>
                    <td><?= $mhs['no_hp']; ?></td>
                </tr>
                <tr>
                    <td>Prgram Studi</td>
                    <td>: </td>
                    <td><?= $mhs['prodi']; ?></td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td>: </td>
                    <td><?= $mhs['fakultas']; ?></td>
                </tr>
                <tr>
                    <td>Universitas</td>
                    <td>: </td>
                    <td><?= $mhs['universitas']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: </td>
                    <td><?= $mhs['jenis_kelamin']; ?></td>
                </tr>
                <tr>
                    <td>Status Mahasiswa</td>
                    <td>: </td>
                    <td><?= $mhs['status']; ?></td>
                </tr>
                <tr>
                    <td>Course</td>
                    <td>: </td>
                    <td><?= $mhs['course']; ?></td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>: </td>
                    <td><?= $mhs['ket']; ?></td>
                </tr>
            </table>
            <br>
            <p><?= anchor('mahasiswa', 'List Data Vinf Box Course'); ?></p>
            <p><?= anchor('mahasiswa/input', 'Input Data Vinf Box Course'); ?></p>
        </div>
        </table>
    </div>
    </div>
</section>
<?= $this->endSection() ?>