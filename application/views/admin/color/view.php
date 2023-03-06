<div class="custom-tab-1">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#button">Button</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#eleventh">Eleventh Grade</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#twelfth">Twelfth Grade</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="button" role="tabpanel">
            <div class="pt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h4 class="card-title">Button Color</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('website-color') ?>" method="post">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-6">
                                            <div class="example mb-3">
                                                <p class="mb-1">Background Color</p>
                                                <input type="text" class="as_colorpicker form-control" name="button_background" value="<?= $color['button_background'] ?>">
                                            </div>
                                            <div class="example mb-3">
                                                <p class="mb-1">Text Color</p>
                                                <input type="text" class="as_colorpicker form-control" name="button_color" value="<?= $color['button_color'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <div class="example mb-3">
                                                <p class="mb-1">Hover Background Color</p>
                                                <input type="text" class="as_colorpicker form-control" name="button_hover_background" value="<?= $color['button_hover_background'] ?>">
                                            </div>
                                            <div class="example mb-3">
                                                <p class="mb-1">Hover Text Color</p>
                                                <input type="text" class="as_colorpicker form-control" name="button_hover_color" value="<?= $color['button_hover_color'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
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
                                <h4 class="card-title">Eleventh Grade Students</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dup1" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>NISN</th>
                                                <th>NIS</th>
                                                <th>Name</th>
                                                <th>Class Majors</th>
                                                <th>Address</th>
                                                <th>Phone Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($eleventh as $row) :
                                            ?>
                                                <tr>
                                                    <td><?= $row->nisn ?></td>
                                                    <td><?= $row->nis ?></td>
                                                    <td><?= $row->name ?></td>
                                                    <td><?= $row->major ?></td>
                                                    <td><?= $row->address ?></td>
                                                    <td><?= $row->phone ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="<?= base_url('admin/student/update/') . $row->nisn ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                            <a href="<?= base_url('admin/student/delete/') . $row->nisn ?>" class="btn btn-danger shadow btn-xs sharp delete"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>NISN</th>
                                                <th>NIS</th>
                                                <th>Name</th>
                                                <th>Class Majors</th>
                                                <th>Address</th>
                                                <th>Phone Number</th>
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
                                <h4 class="card-title">Twelfth Grade Students</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dup2" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>NISN</th>
                                                <th>NIS</th>
                                                <th>Name</th>
                                                <th>Class Majors</th>
                                                <th>Address</th>
                                                <th>Phone Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($twelfth as $row) :
                                            ?>
                                                <tr>
                                                    <td><?= $row->nisn ?></td>
                                                    <td><?= $row->nis ?></td>
                                                    <td><?= $row->name ?></td>
                                                    <td><?= $row->major ?></td>
                                                    <td><?= $row->address ?></td>
                                                    <td><?= $row->phone ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="<?= base_url('admin/student/update/') . $row->nisn ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                            <a href="<?= base_url('admin/student/delete/') . $row->nisn ?>" class="btn btn-danger shadow btn-xs sharp delete"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>NISN</th>
                                                <th>NIS</th>
                                                <th>Name</th>
                                                <th>Class Majors</th>
                                                <th>Address</th>
                                                <th>Phone Number</th>
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