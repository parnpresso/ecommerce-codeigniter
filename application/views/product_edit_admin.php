<!--div class='alert alert-success'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
</div-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
   <title>Add new product</title>
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <!-- Optional theme -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
   <!-- Latest compiled and minified JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
  <br/><br/>
  <div class="container-fluid">
    <form class="form-horizontal" action="<?php echo base_url('admin/edit_product_validation/'.$product[0]->id);?>" method="post" id="register-form">
      <fieldset>
        <!-- Form Name -->
        <legend style="text-align:center"><h2>Edit product</h2></legend>
        <br />
        <?php
        if ($this->session->flashdata('error')){
          echo '<div class="col-md-4 col-md-offset-4">
          <div class="alert alert-danger alert-error">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
            Invalid Input
          </div>
          </div>
          ';
        }
        ?>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Product Name</label>
              <div class="col-md-4">
                <input id="name" name="name" value="<?php echo $product[0]->name;?>" type="text" placeholder="Name" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Product Category</label>
              <div class="col-md-4">
                <?php
        					if (form_error('item_price_rate') != NULL){
        					    echo '<div class="alert alert-danger alert-error">';
        					    echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'. form_error('item_price_rate');
        					    echo '</div>';
        					}
        					echo form_dropdown('category', $categories);
        					echo "</p>";
        				?>

              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="price">Product Price</label>
              <div class="col-md-4">
                <input id="price" name="price" value="<?php echo $product[0]->price;?>" type="text" placeholder="Price" class="form-control input-md" required="">

              </div>
            </div>


            <!-- Text input fname-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="detail">Product Detail</label>
              <div class="col-md-4" >
                <textarea class="form-control" rows="5" id="detail" name="detail"><?php echo $product[0]->detail;?></textarea>

              </div>
            </div>

            <!-- Text input lname-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="image">Image</label>
              <div class="col-md-4">
                <input type="file" name="image" id="image">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <a href="<?php echo base_url('admin/product');?>" class="btn btn-danger" style="float:left;">Back</a>
                <button type="submit" class="btn btn-success" name="btn-signup" style="float:right;">
                  <span class="glyphicon glyphicon-log-in"></span> &nbsp;Edit
                </button>
              </div>
            </div>

          </form>
          </html>
