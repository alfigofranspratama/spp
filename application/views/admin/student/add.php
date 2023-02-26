<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input New Student Data</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="<?= base_url('admin/student/add') ?>" method="POST">
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="nisn">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="ex : 1234567890" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <?= form_error('nisn', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="col-sm-6">
                                <label for="nis">NIS</label>
                                <input type="text" class="form-control" id="nis" name="nis" placeholder="ex : 123456" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <?= form_error('nis', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="ex : Nana Mizuki">
                                <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="class">Class</label>
                                <select name="class" id="class" class="dropdown-groups">
                                    <option value="" selected disabled>-- Select One --</option>
                                    <optgroup label="Tenth Grade">
                                        <?php
                                        foreach ($ten as $row) :
                                        ?>
                                            <option value="<?= $row->class_id ?>"><?= $row->class ?> - <?= $row->major ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </optgroup>
                                    <optgroup label="Eleventh Grade">
                                        <?php
                                        foreach ($eleven as $row) :
                                        ?>
                                            <option value="<?= $row->class_id ?>"><?= $row->class ?> - <?= $row->major ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </optgroup>
                                    <optgroup label="Twelfth Grade">
                                        <?php
                                        foreach ($twelve as $row) :
                                        ?>
                                            <option value="<?= $row->class_id ?>"><?= $row->class ?> - <?= $row->major ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </optgroup>
                                </select>
                                <?= form_error('class', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="ex : 081292389150" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <?= form_error('phone', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address"></textarea>
                                <?= form_error('address', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>