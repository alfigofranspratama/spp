<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="card-title">History Transaction</h4>
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