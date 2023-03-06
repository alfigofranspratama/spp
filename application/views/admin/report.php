<div class="row">
    <div class="col-lg-12">
        <div id="accordion-seven" class="accordion accordion-header-bg accordion-bordered">
            <div class="accordion__item">
                <div class="accordion__header accordion__header--primary btn-primary collapsed" data-toggle="collapse" data-target="#header-bg_collapseOne">
                    <span class="accordion__header--icon"></span>
                    <span class="accordion__header--text">Filter Report</span>
                    <span class="accordion__header--indicator"></span>
                </div>
                <div id="header-bg_collapseOne" class="collapse accordion__body" data-parent="#accordion-seven">
                    <div class="accordion__body--text bg-white">
                        <div class="mb-3">
                            <p class="mb-1">Pick Date</p>
                            <input class="form-control input-daterange-datepicker" type="text" name="daterange">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="card-title">All Reports</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Paid Date</th>
                                <th>Employee Name</th>
                                <th>NISN</th>
                                <th>Student Name</th>
                                <th>Pay Month</th>
                                <th>Pay Year</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($report as $row) :
                            ?>
                                <tr>
                                    <td><?= $row->paid_date ?></td>
                                    <td><?= $row->name ?></td>
                                    <td><?= $row->nisn ?></td>
                                    <td>
                                        <?php
                                        $student = $this->db->get_where('student_data', ['nisn' => $row->nisn])->row_array();
                                        echo $student['name'];
                                        ?>
                                    </td>
                                    <td><?= $row->pay_month ?></td>
                                    <td><?= $row->pay_year ?></td>
                                    <td><?= number_format($row->pay_amount, 0, ".", ".") ?></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Paid Date</th>
                                <th>Employee Name</th>
                                <th>NISN</th>
                                <th>Student Name</th>
                                <th>Pay Month</th>
                                <th>Pay Year</th>
                                <th>Amount</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>