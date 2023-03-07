<style>
    table {
        border-collapse: collapse;
    }

    tr>td {
        padding: 5px;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="card-title">
                    <?php
                    if ($val != "") {
                        echo $val;
                    } else {
                        echo "All";
                    }
                    ?>
                    Reports
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%" border="1">
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