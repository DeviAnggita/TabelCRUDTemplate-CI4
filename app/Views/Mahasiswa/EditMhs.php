<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('mahasiswa')?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Data </h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Form Edit Data Vinf Box Course</h4>
            </div>

            <div class="card-body">
                <div class="container">
                    <?php
        if (!empty(session()->getFlashdata('success'))) { ?>

                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>

                    <?php } ?>
                    <?php if (!empty(session()->getFlashdata('info'))) { ?>

                    <div class="alert alert-info">
                        <?php echo session()->getFlashdata('info'); ?>
                    </div>

                    <?php } ?>

                    <?php if (!empty(session()->getFlashdata('warning'))) { ?>

                    <div class="alert alert-warning">
                        <?php echo session()->getFlashdata('warning'); ?>
                    </div>

                    <?php } ?>
                    <?php if (!empty(session()->getFlashdata('danger'))) { ?>

                    <div class="alert alert-danger">
                        <?php echo session()->getFlashdata('danger'); ?>
                    </div>

                    <?php } ?>

                    <form action="<?php echo base_url('Mahasiswa/update/'.$mhs['id']); ?>" method="post">

                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <label style="color: red;">
                                <?= $error = $validation->getError('nama'); ?>
                            </label>
                            <?php endif; ?>
                            <input type="text" name="nama" class="form-control" value="<?= $mhs['nama'] ?>"
                                placeholder="Isikan Nama Lengkap Mahasiswa">
                        </div>

                        <div class="form-group">
                            <label for="">Username</label>
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <label style="color: red;">
                                <?= $error = $validation->getError('username'); ?>
                            </label>
                            <?php endif; ?>
                            <input type="text" name="username" class="form-control" value="<?= $mhs['username'] ?>"
                                placeholder="Username">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <label style="color: red;">
                                <?= $error = $validation->getError('email'); ?>
                            </label>
                            <?php endif; ?>
                            <input type="email" name="email" class="form-control" value="<?= $mhs['email'] ?>"
                                placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <label style="color: red;">
                                <?= $error = $validation->getError('password'); ?>
                            </label>
                            <?php endif; ?>
                            <input type="password" name="password" class="form-control" value="<?= $mhs['password'] ?>"
                                placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <label style="color: red;">
                                <?= $error = $validation->getError('tanggal_lahir'); ?>
                            </label>
                            <?php endif; ?>
                            <input type="date" name="tanggal_lahir" class="form-control"
                                value="<?= $mhs['tanggal_lahir'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <label style="color: red;">
                                <?= $error = $validation->getError('jenis_kelamin'); ?>
                            </label>
                            <?php endif; ?>
                            <div class="form-group">
                                <a>
                                    Laki-Laki <?= form_radio('jenis_kelamin', 'Laki-Laki', false); ?>
                                    Perempuan <?= form_radio('jenis_kelamin', 'Perempuan ', false); ?>
                                </a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Alamat</label>
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <label style="color: red;">
                                <?= $error = $validation->getError('alamat'); ?>
                            </label>
                            <?php endif; ?>
                            <?php
                                $options = [
                                    'Sragen' => 'Sragen',
                                    'Surakarta'  => 'Surakarta',
                                    'Sukoharjo'    => 'Sukoharjo',
                                    'Karanganyar'  => 'Karanganyar',
                                    'Jakarta' => 'Jakarta',
                                ];
                                echo form_dropdown('alamat', $options, 'skh', 'class="form-control"');
                                ?>
                        </div>

                        <div class="form-group">
                            <label for="">No. Handphone</label>
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <label style="color: red;">
                                <?= $error = $validation->getError('no_hp'); ?>
                            </label>
                            <?php endif; ?>
                            <input type="" name="no_hp" class="form-control" placeholder="Isikan no hp aktif ">
                        </div>

                        <div class="form-group">
                            <label for="">Status Keaktifan</label>
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <label style="color: red;">
                                <?= $error = $validation->getError('status'); ?>
                            </label>
                            <?php endif; ?>
                            <?= form_hidden('status', 'Tidak Aktif'); ?>
                            <br />
                            <a> <?= form_checkbox('status', 'Mahasiswa Aktif', false); ?> Mahasiswa Aktif</a>
                        </div>

                        <div class="form-group">
                            <label for="">Program Studi</label>
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <label style="color: red;">
                                <?= $error = $validation->getError('prodi'); ?>
                            </label>
                            <?php endif; ?>
                            <?php
                                $options = [
                                    'D3 Teknik Informatika'  => 'D3 Teknik Informatika',
                                    'D3 Teknik Sipil'    => 'D3 Teknik Sipil',
                                    'D3 Teknik Mesin'  => 'D3 Teknik Mesin',
                                    'D3 Teknik Kimia' => 'D3 Teknik Kimia',
                                ];
                                echo form_dropdown('prodi', $options, 'D3 Teknik Informatika', 'class="form-control"');
                                ?>
                        </div>

                        <div class="form-group">
                            <label for="">Course</label>
                            <br />
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <label style="color: red;">
                                <?= $error = $validation->getError('course'); ?>
                            </label>
                            <?php endif; ?>
                            <a>
                                <?= form_checkbox('course', 'Design Web', false); ?> Design Web<br>
                                <?= form_checkbox('course', 'Coding', false); ?> Coding<br>
                                <?= form_checkbox('course', 'Keamanan Data', false); ?> Keamanan Data<br>
                                <?= form_checkbox('course', 'Javascript', false); ?> Javascript<br>
                            </a>
                        </div>

                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <label style="color: red;">
                                <?= $error = $validation->getError('ket'); ?>
                            </label>
                            <?php endif; ?>
                            <?= form_textarea('ket', '', 'placeholder="Silahkan menambahakan keterangan informasi tambahan di sini..."; class="form-control"',); ?>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<?= $this->endSection() ?>