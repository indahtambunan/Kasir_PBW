            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Barang
                            </h2>

                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <th>Harga Beli</th>
                                        <th>Stok</th>
                                        <th>Harga Jual</th>
                                        <th>Profit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    <?php

                                        $no = 1;
                                        $sql = $koneksi->query("select * from barang");
                                        while ($data = $sql->fetch_assoc()) {
                                            
                                        

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['kode']; ?></td>
                                        <td><?php echo $data['nama_barang']; ?></td>
                                        <td><?php echo $data['satuan']; ?></td>
                                        <td><?php echo $data['harga_beli']; ?></td>
                                        <td><?php echo $data['stok']; ?></td>
                                        <td><?php echo $data['harga_jual']; ?></td>
                                        <td><?php echo $data['profit']; ?></td>
                                        <td>
                                            
                                            <a href="?page=barang&aksi=ubah&id=<?php echo $data['kode'] ?>" class="btn btn-success" >Ubah</a>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="?page=barang&aksi=hapus&id=<?php echo $data['kode'] ?>" class="btn btn-danger">Hapus</a>

                                        </td>
                                    </tr>  

                                    <?php } ?>

                                </tbody>
                            </table>
                            <a href="?page=barang&aksi=tambah" class="btn btn-primary" >Tambah</a>
                            <a href="page/barang/cetak.php" target="blank" class="btn btn-default" >Cetak</a>
                        </div>