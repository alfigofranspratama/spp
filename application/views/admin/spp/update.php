<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update SPP</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="<?= base_url('admin/spp/update/') . $spp['id_spp'] ?>" method="POST">
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="year">Year</label>
                                <input type="text" class="form-control" id="year" value="<?= $spp['year'] ?>" disabled oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="year" placeholder="ex : 2023">
                                <?= form_error('year', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control" id="amount" value="<?= $spp['amount'] ?>" name="amount" placeholder="ex : 100000" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <?= form_error('amount', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>