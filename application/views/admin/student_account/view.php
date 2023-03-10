<div class="custom-tab-1">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tenth">Tenth Grade</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#eleventh">Eleventh Grade</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#twelfth">Twelfth Grade</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="tenth" role="tabpanel">
            <div class="pt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h4 class="card-title">Tenth Grade Students</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email Address</th>
                                                <th>Username</th>
                                                <th>Phone Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($tenth as $row) :
                                            ?>
                                                <tr>
                                                    <td><?= $row->name ?></td>
                                                    <td><?= $row->email_address ?></td>
                                                    <td><?= $row->username ?></td>
                                                    <td><?= $row->phone ?></td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email Address</th>
                                                <th>Username</th>
                                                <th>Phone Number</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="eleventh">
            <div class="pt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h4 class="card-title">Eleventh Grade Students</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dup1" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email Address</th>
                                                <th>Username</th>
                                                <th>Phone Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($eleventh as $row) :
                                            ?>
                                                <tr>
                                                    <td><?= $row->name ?></td>
                                                    <td><?= $row->email_address ?></td>
                                                    <td><?= $row->username ?></td>
                                                    <td><?= $row->phone ?></td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email Address</th>
                                                <th>Username</th>
                                                <th>Phone Number</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="twelfth">
            <div class="pt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h4 class="card-title">Twelfth Grade Students</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dup2" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email Address</th>
                                                <th>Username</th>
                                                <th>Phone Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($twelfth as $row) :
                                            ?>
                                                <tr>
                                                    <td><?= $row->name ?></td>
                                                    <td><?= $row->email_address ?></td>
                                                    <td><?= $row->username ?></td>
                                                    <td><?= $row->phone ?></td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email Address</th>
                                                <th>Username</th>
                                                <th>Phone Number</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>