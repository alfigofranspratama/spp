<div class="custom-tab-1">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#student">Student Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#transaction">Transaction Details</a>
        </li>

    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="student" role="tabpanel">
            <div class="pt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h4 class="card-title">Student Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <table class="table table-bordered" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th colspan="3" class="text-center">Student Data Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width: 15%;">NISN</td>
                                                <td style="width: 1%;" class="text-center">:</td>
                                                <td><?= $student['nisn'] ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 15%;">NIS</td>
                                                <td style="width: 1%;" class="text-center">:</td>
                                                <td><?= $student['nis'] ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 15%;">Name</td>
                                                <td style="width: 1%;" class="text-center">:</td>
                                                <td><?= $student['name'] ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 15%;">Class Majors</td>
                                                <td style="width: 1%;" class="text-center">:</td>
                                                <td><?= $class['class'] ?> - <?= $class['major'] ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 15%;">Address</td>
                                                <td style="width: 1%;" class="text-center">:</td>
                                                <td><?= $student['address'] ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 15%;">Phone</td>
                                                <td style="width: 1%;" class="text-center">:</td>
                                                <td><?= $student['phone'] ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 15%;">Enter the School Year</td>
                                                <td style="width: 1%;" class="text-center">:</td>
                                                <td><?= $spp['year'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="transaction">
            <div class="pt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h4 class="card-title">History</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Employee</th>
                                                <th>Paid Date</th>
                                                <th>Pay Month</th>
                                                <th>Pay Year</th>
                                                <th>Pay Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($history as $row) :
                                            ?>
                                                <tr>
                                                    <td><?= $row->name ?></td>
                                                    <td><?= $row->paid_date ?></td>
                                                    <td><?= $row->pay_month ?></td>
                                                    <td><?= $row->pay_year ?></td>
                                                    <td>Rp. <?= number_format($row->pay_amount, 0, ".", ".") ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="<?= base_url('student/history/pdf_report/') . $row->id_transaction ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-file-text-o"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
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