<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Data Pelanggan
                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php

                            $no = 1;
                            $sql = $koneksi->query("select * from pelanggan");
                            while ($data = $sql->fetch_assoc()) {
                        ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['nama_pelanggan']; ?></td>
                            <td><?php echo $data['alamat_pelanggan']; ?></td>
                            <td><?php echo $data['telepon_pelanggan']; ?></td>
                            <td><?php echo $data['email_pelanggan']; ?></td>
                            <td>
                                <a href="?page=pelanggan&aksi=ubah&id=<?php echo $data['kode_pelanggan'] ?>" class="btn btn-success" ><i class="material-icons" data-toggle="tooltip" data-placement="top" title="Edit">create</i></a>
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="?page=pelanggan&aksi=hapus&id=<?php echo $data['kode_pelanggan'] ?>" class="btn btn-danger"><i class="material-icons" data-toggle="tooltip" data-placement="top" title="Hapus">delete_sweep</i></a>
                            </td>
                        </tr>  

                        <?php } ?>

                    </tbody>
                </table>
                <a href="?page=pelanggan&aksi=tambah" class="btn btn-primary" >Tambah</a>
            </div>