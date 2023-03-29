<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<div class="container my-5 shadow">
    
    <?php $validation = \Config\Services::validation(); ?>
    <div class="row">
        <div class="col-sm-12 float-right shadow mb-3 ">
            <h3 style="display: inline-block; font-family: Georgia, 'Times New Roman', Times, serif;" class="mt-2">SUBJECT MANAGEMENT SYSTEM</h3>
            <a href="<?php echo site_url('/') ?>" class="btn btn-info mb-2 mt-2" style="float: right">Back to Home</a>

        </div>
    </div>

    <!--  -->
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
    <?php
    // if($validation){echo $validation->listErrors();} 
    ?>
    <!--  -->

    <div class="col-sm-12">
        <form action="<?= site_url('subjects/store') ?>" method="post" autocomplete="off">
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control mb-2" value="<?= old('name') ?>" />

                    <!--  -->
                    <?php if ($validation->getError('name')) { ?>
                        <div class='text-danger mt-2'>
                            <?= $error = $validation->getError('name'); ?>
                        </div>
                    <?php }

                    ?>
                </div>

                <!--  -->
            </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <label for="desc">Description</label>
            <textarea name="description" id="desc" cols="30" rows="3" class="form-control"><?= old('description') ?></textarea>

            <?php if ($validation->getError('description')) { ?>
                <?php
                //  echo '<p class="invalid-feedback"></p>'. $validation->getError('description'); 
                ?>
                <div class='text-danger mt-2'>
                    <?= $error = $validation->getError('description'); ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 text-center">

            <input type="submit" value="Submit" name="submit" class="btn btn-success text my-3">
        </div>
    </div>
    </form>
</div>
</div>
</div>

<?= $this->endSection() ?>