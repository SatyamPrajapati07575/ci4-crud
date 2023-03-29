<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<div class="container shadow my-5">
      <!-- alert start -->
      <div class="row">
        <div class="col-sm-12">
            <?php
            if (session()->has('message')) {
            ?>
                <div class="alert <?= session()->getFlashdata('alert-class') ?> ">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- alert end -->
    <div class="row">
        <div class="col-sm-12 float-right shadow mb-3 ">
            <h3 style="display: inline-block; font-family: Georgia, 'Times New Roman', Times, serif;" class="mt-2">SUBJECT MANAGEMENT SYSTEM</h3>
            <a href="<?= site_url('subjects/create') ?>" class="btn btn-info mb-2 mt-2" style="float: right">Add Subject</a>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($subjects) > 0) {
                        foreach ($subjects as $subject) {
                    ?>
                            <tr>
                                <td><?= $subject['id'] ?> </td>
                                <td><?= $subject['name'] ?> </td>
                                <td><?= $subject['description'] ?> </td>
                                <td>
                                    <a href="<?= site_url('subjects/edit/'.$subject['id']) ?>" class="btn btn-success">Edit</a> &nbsp;&nbsp;
                                    <a href="<?= site_url('subjects/delete/'.$subject['id']) ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="4" class="text-center">No data found</td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>