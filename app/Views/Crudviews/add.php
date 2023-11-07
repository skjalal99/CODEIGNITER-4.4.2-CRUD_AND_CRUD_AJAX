<?= $this->extend('layouts/crudtemplate'); ?>



<?= $this->section('content'); ?>
 <?php $validation = \Config\Services::validation(); 
 helper('form');?>
      <!-- Create Entry Form -->
      <form id="create-form" action="<?php echo base_url('create')?>" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
                    <?php if($validation->getError('name')) {?>
                        <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('name'); ?>
                        </div>
                    <?php }?>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"><?= set_value('description') ?></textarea>
                <?php if($validation->getError('description')) {?>
                        <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('description'); ?>
                        </div>
                    <?php }?>
            </div>
            <div class="form-group">
                <label for="contact_phone">Phone:</label>
                <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="<?= set_value('contact_phone') ?>">
                <?php if($validation->getError('contact_phone')) {?>
                        <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('contact_phone'); ?>
                        </div>
                    <?php }?>
            </div>
            <div class="form-group">
                <label for="contact_email">Email:</label>
                <input type="email" class="form-control" id="contact_email" name="contact_email" value="<?= set_value('contact_email') ?>">
                <?php if($validation->getError('contact_email')) {?>
                        <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('contact_email'); ?>
                        </div>
                    <?php }?>
            </div>
            <button type="submit" class="btn btn-primary">ADD</button>
        </form>
        <?= $this->endsection(); ?>