<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Grade Data</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="<?= base_url('admin/grade/update/') . $grade['class_id'] ?>" method="POST">
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="class">Class</label>
                                <select name="class" id="class" class="form-control">
                                    <option value="" disabled selected>-- Select One --</option>
                                    <option <?php if($grade['class'] == '10') echo "selected"; ?> value="10">10</option>
                                    <option <?php if($grade['class'] == '11') echo "selected"; ?> value="11">11</option>
                                    <option <?php if($grade['class'] == '12') echo "selected"; ?> value="12">12</option>
                                </select>
                                <?= form_error('class', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="major">Major</label>
                                <input type="text" class="form-control" id="major" value="<?= $grade['major'] ?>" name="major" placeholder="ex : Software Engineering 2">
                                <?= form_error('major', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>