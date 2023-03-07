<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Student Data</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="<?= base_url('admin/student/update/') . $student['nisn'] ?>" method="POST">
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="nisn">NISN</label>
                                <input type="text" class="form-control" id="nisn" disabled value="<?= $student['nisn'] ?>" placeholder="ex : 1234567890" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <?= form_error('nisn', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="col-sm-6">
                                <label for="nis">NIS</label>
                                <input type="text" class="form-control" id="nis" name="nis" value="<?= $student['nis'] ?>" placeholder="ex : 123456" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <?= form_error('nis', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $student['name'] ?>" placeholder="ex : Nana Mizuki">
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
                                            <option <?php if ($student['class_id'] == $row->class_id) echo "selected"; ?> value="<?= $row->class_id ?>"><?= $row->class ?> - <?= $row->major ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </optgroup>
                                    <optgroup label="Eleventh Grade">
                                        <?php
                                        foreach ($eleven as $row) :
                                        ?>
                                            <option <?php if ($student['class_id'] == $row->class_id) echo "selected"; ?> value="<?= $row->class_id ?>"><?= $row->class ?> - <?= $row->major ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </optgroup>
                                    <optgroup label="Twelfth Grade">
                                        <?php
                                        foreach ($twelve as $row) :
                                        ?>
                                            <option <?php if ($student['class_id'] == $row->class_id) echo "selected"; ?> value="<?= $row->class_id ?>"><?= $row->class ?> - <?= $row->major ?></option>
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
                                <input type="text" class="form-control" id="phone" name="phone" value="<?= $student['phone'] ?>" placeholder="ex : 081292389150" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <?= form_error('phone', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address"><?= $student['address'] ?></textarea>
                                <?= form_error('address', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="spp_id">Start SPP</label>
                                <?php
                                $spp = $this->db->get('tb_spp')->result();
                                ?>
                                <select name="spp_id" id="" class="form-control" required>
                                    <option value="" selected disabled>- Select One -</option>
                                    <?php
                                    foreach ($spp as $row) :
                                    ?>
                                        <option <?php if($student['spp_id'] == $row->id_spp) echo "selected"; ?> value="<?= $row->id_spp ?>"><?= $row->year ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                                <?= form_error('spp_id', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>