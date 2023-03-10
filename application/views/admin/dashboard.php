<?php
$student = $this->db->get('student_data')->num_rows();
$employee = $this->db->get_where('tb_users', ['level' => 'Employee'])->num_rows();
$transaction = $this->db->get('tb_transaction')->num_rows();


?>
<div class="row">
    <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
        <div class="widget-stat card bg-primary">
            <div class="card-body  p-4">
                <div class="media">
                    <span class="mr-3">
                        <i class="la la-users"></i>
                    </span>
                    <div class="media-body text-white">
                        <p class="mb-1">Total Students</p>
                        <h4 class="text-white"><?= $student ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
        <div class="widget-stat card bg-danger">
            <div class="card-body p-4">
                <div class="media ai-icon">
                    <span class="mr-3">
                        <svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </span>
                    <div class="media-body">
                        <p class="mb-1 text-white">Transaction</p>
                        <h4 class="mb-0 text-white"><?= $transaction ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
        <div class="widget-stat card bg-info">
            <div class="card-body p-4">
                <div class="media">
                    <span class="mr-3">
                        <i class="flaticon-381-heart"></i>
                    </span>
                    <div class="media-body text-white">
                        <p class="mb-1">Total Employees</p>
                        <h4 class="text-white"><?= $employee ?></h4>
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
                <h4 class="card-title">Latest History</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Student</th>
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
                                    <td>
                                        <?php
                                        $student = $this->db->get_where('student_data', ['nisn' => $row->nisn])->row_array();
                                        echo $student['name'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row->id_employee == 0) {
                                            echo "Xendit Payment";
                                        } else {
                                            echo $row->name;
                                        }
                                        ?>
                                    </td>
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