<?= $this->extend('layouts/crudtemplate'); ?>



<?= $this->section('content');

?>
<?php 
$session = session();
if(isset($_SESSION['deleted']))
{
echo "<div class='alert alert-danger' role='alert' id='deleted'>";
echo $session->getFlashdata('deleted');
echo "</div>";

}
if(isset($_SESSION['created']))
{
echo "<div class='alert alert-success' role='alert' id='added'>";
echo $session->getFlashdata('created');
echo "</div>";

}
if(isset($_SESSION['edited']))
{
echo "<div class='alert alert-success' role='alert' id='updated'>";
echo $session->getTempdata('edited');
echo "</div>";

}
?>



<h2>Crud<a href="<?php echo base_url('add')?>" class="btn btn-primary float-end">Add</a></h2>
<pre>

  <div class="table-responsive">
  <table class="table table-dark">
    <thead class="table table-dark table-stripe">
      <tr>
        <th>S.no</th>
        <th>Name</th>
        <th>Description</th>
        <th>Phone</th>
        <th>Email</th>
        <th scope="col" class="w-25">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i=1;
                                foreach($test as $row)
                                {
                                 
                                    
     ?>                           
      <tr>
        <td> <?php echo $i++;?></td> 
        <td> <?php echo $row->name?></td> 
        <td><?php echo $row->description?></td> 
        <td><?php echo $row->contact_phone?></td>
        <td><?php echo $row->contact_email?></td>
        <td>
            <a href="editsingle/<?php echo $row->id?>" class="btn btn-success">Edit</a>
            <a href="delete/<?php echo $row->id?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>
 
    <?php }?>

    </tbody>
  </table>
</div>

<script>
        // Function to hide a div by its ID
        function hideDivById(id) {
            var div = document.getElementById(id);
            div.style.display = "none";
        }

        // Set a timeout to call the hideDivById function for each div after 10 seconds
        setTimeout(function() { hideDivById("updated");}, 3000);
        setTimeout(function() { hideDivById("added");}, 3000);
        setTimeout(function() { hideDivById("deleted");}, 3000);

</script>

<?= $this->endSection(); ?>
