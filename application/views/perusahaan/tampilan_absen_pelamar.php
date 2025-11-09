<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body bg-primary text-white">
                <h5 class="text-center text-uppercase font-weight-bolder">pelamar perusahaan</h5>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center text-uppercase" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-uppercase">
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">PELAMAR</th>
                                <th scope="col">ASAL SEKOLAH</th>
                                <th scope="col">PERUSAHAAN</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">TIMESTAMP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                foreach ($pelamar as $row) {
                                ?>
                                    <td><?php echo $no++; ?></td>
                                    <td class="text-center"><?= $row['id'] ?></td>
                                    <td class="text-center"><?= $row['nama_pelamar'] ?></td>
                                    <td class="text-center"><?= $row['asal_sekolah'] ?></td>
                                    <td class="text-center"><?= $row['nama_perusahaan'] ?></td>
                                    <td class="text-center"><?= $row['status'] ?></td>
                                    <td class="text-center"><?= $row['timestam'] ?></td>

                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>