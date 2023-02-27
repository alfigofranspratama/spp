<div class="custom-tab-1">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tenth">Tenth Grade</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#eleventh">Eleventh Grade</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#twelfth">Twelfth Grade</a>
        </li>

    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="tenth" role="tabpanel">
            <div class="pt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h4 class="card-title">Tenth Grade Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Grade</th>
                                                <th>Class Majors</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($ten as $row) :
                                            ?>
                                                <tr>
                                                    <td><?= $row->class ?></td>
                                                    <td><?= $row->major ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="<?= base_url('admin/grade/update/') . $row->class_id ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                            <a href="<?= base_url('admin/grade/delete/') . $row->class_id ?>" class="btn btn-danger shadow btn-xs sharp delete"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Grade</th>
                                                <th>Class Majors</th>
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
        <div class="tab-pane fade" id="eleventh">
            <div class="pt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h4 class="card-title">Eleventh Grade Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dup1" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Grade</th>
                                                <th>Class Majors</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($eleven as $row) :
                                            ?>
                                                <tr>
                                                    <td><?= $row->class ?></td>
                                                    <td><?= $row->major ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="<?= base_url('admin/grade/update/') . $row->class_id ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                            <a href="<?= base_url('admin/grade/delete/') . $row->class_id ?>" class="btn btn-danger shadow btn-xs sharp delete"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Grade</th>
                                                <th>Class Majors</th>
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
        <div class="tab-pane fade" id="twelfth">
            <div class="pt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h4 class="card-title">Twelfth Grade Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dup2" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Grade</th>
                                                <th>Class Majors</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($twelve as $row) :
                                            ?>
                                                <tr>
                                                    <td><?= $row->class ?></td>
                                                    <td><?= $row->major ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="<?= base_url('admin/grade/update/') . $row->class_id ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                            <a href="<?= base_url('admin/grade/delete/') . $row->class_id ?>" class="btn btn-danger shadow btn-xs sharp delete"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Grade</th>
                                                <th>Class Majors</th>
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