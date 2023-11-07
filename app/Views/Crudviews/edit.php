<?= $this->extend('layouts/crudtemplate'); ?>



<?= $this->section('content'); ?>
      
      <!-- Create Entry Form -->
      <form id="create-form" action="<?php echo base_url('update/').$single_data->id;?>" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required value=<?= $single_data->name;?>>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" ><?= $single_data->description;?></textarea>
            </div>
            <div class="form-group">
                <label for="contact_phone">Phone:</label>
                <input type="text" class="form-control" name="phone" id="contact_phone" value='<?= $single_data->contact_phone;?>' name="contact_phone">
            </div>
            <div class="form-group">
                <label for="contact_email">Email:</label>
                <input type="email" class="form-control" name="email" id="contact_email" value='<?= $single_data->contact_email;?>'name="contact_email">
            </div>
            <button type="submit" class="btn btn-primary">Create Entry</button>
        </form>
        <?= $this->endsection(); ?>