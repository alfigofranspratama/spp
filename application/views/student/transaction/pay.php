<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input New Transaction Data</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="3" class="text-center">Student Information</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 10%;">NISN</td>
                                <td style="width: 1%;" class="text-center">:</td>
                                <td><?= $student['nisn'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 10%;">NIS</td>
                                <td style="width: 1%;" class="text-center">:</td>
                                <td><?= $student['nis'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 10%;">Name</td>
                                <td style="width: 1%;" class="text-center">:</td>
                                <td><?= $student['name'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 10%;">Address</td>
                                <td style="width: 1%;" class="text-center">:</td>
                                <td><?= $student['address'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 10%;">Phone</td>
                                <td style="width: 1%;" class="text-center">:</td>
                                <td><?= $student['phone'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 10%;">History</td>
                                <td style="width: 1%;" class="text-center">:</td>
                                <td><a href="<?= base_url('student/transaction/detail/') . $student['nisn'] ?>">Click Here</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="<?= base_url('student/transaction/pay/') . $student['nisn'] ?>" method="POST">
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="pay_month">Pay Month (Rp. <?= number_format($spp['amount'], 0, ".", ".") ?> / Month)</label>
                                <select name="pay_month" id="pay_month" class="dropdown-groups">
                                    <option value="" selected disabled>-- Select One --</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                                <?= form_error('pay_month', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="pay_year">Pay Year</label>
                                <select name="pay_year" id="pay_year" class="dropdown-groups">
                                    <option value="" selected disabled>-- Select One --</option>
                                    <?php
                                    $early = $spp['year'];
                                    $final = $spp['year'] + 3;
                                    for ($i = $early; $i <= $final; $i++) {
                                    ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <?= form_error('pay_year', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>