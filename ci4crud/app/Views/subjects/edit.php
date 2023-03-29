<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<div class="container my-5 shadow">
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

    <!-- validation start -->
    <?php $validation = \Config\Services::validation(); ?>
    
    <!-- validatio end -->
    <div class="row my-5">
        <div class="col-sm-12">
            <a href="<?php echo site_url('/') ?>" class="btn btn-info shadow"> Back to Home </a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="<?=site_url('subjects/update/'.$subject['id'])?>" method="post" autocomplete="off">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="<?= old('name', $subject['name']) ?>" class="form-control mb-2" />
                        <!-- Error -->
                        <?php if ($validation->getError('name')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('name'); ?>
                            </div>
                        <?php } ?>
                        <!--  -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="desc">Description</label>
                        <textarea name="description" id="desc" cols="30" rows="3" class="form-control"><?= old('description', $subject['description']) ?></textarea>
                        <!-- Error -->
                        <?php if ($validation->getError('description')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('description'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 text-center">

                        <input type="submit" value="Update" name="submit" class="btn btn-success text my-3">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>