<div class="custom-tab-1">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#spp">SPP</a>
        </li>

    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="spp" role="tabpanel">
            <div class="pt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h4 class="card-title">SPP Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Tahun</th>
                                                <th>Nominal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($spp as $row) :
                                            ?>
                                                <tr>
                                                    <td><?= $row->year ?></td>
                                                    <td>Rp. <?= number_format($row->amount, 0, ".",".") ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="<?= base_url('admin/spp/update/') . $row->id_spp ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                            <a href="<?= base_url('admin/spp/delete/') . $row->id_spp ?>" class="btn btn-danger shadow btn-xs sharp delete"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Tahun</th>
                                                <th>Nominal</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>