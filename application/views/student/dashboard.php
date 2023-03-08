<div class="row">
    <div class="col-xl-9 col-xxl-8">
        <div class="card">
            <div class="card-header border-0 flex-wrap pb-0">
                <div class="mb-3">
                    <h4 class="fs-20 text-black">Payment Traffic (Soon)</h4>
                    <p class="mb-0 fs-12 text-black">The traffic is monthly student spp payments</p>
                </div>
            </div>
            <div class="card-body pb-2 px-3">
                <div id="marketChart" class="market-line"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-4">
        <div class="card">
            <div class="card-header border-0 pb-0">
                <h4 class="fs-20 text-black">SPP Statistic (Soon)</h4>
            </div>
            <div class="card-body pb-0">
                <div id="currentChart" class="current-chart"></div>
                <div class="chart-content">
                    <div class="d-flex justify-content-between mb-2 align-items-center">
                        <div>
                            <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="15" height="15" rx="7.5" fill="#EB8153" />
                            </svg>
                            <span class="fs-14">Remaining Payment</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-2 align-items-center">
                        <div>
                            <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="15" height="15" rx="7.5" fill="#71B945" />
                            </svg>

                            <span class="fs-14">Payment Amount</span>
                        </div>
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