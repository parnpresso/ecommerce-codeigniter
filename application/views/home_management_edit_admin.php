<!--div class='alert alert-success'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
</div-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
   <title>AdminZone</title>
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
    <fieldset>
      <legend style="text-align:center"><h2>แก้ไขหน้าหลัก</h2></legend><br />
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
      <?php echo form_open_multipart(base_url('admin/edit_home_validation/'.$content[0]->id),  array('class' => 'form-horizontal'));?>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label class="col-md-4 control-label" for="topic">ชื่อหัวเรื่อง</label>
            <div class="col-md-4">
              <input id="topic" name="topic" value="<?php echo $content[0]->topic;?>" type="text" placeholder="Name" class="form-control input-md" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="detail">รายละเอียด</label>
            <div class="col-md-4" >
              <textarea class="form-control" rows="5" id="detail" name="detail"><?php echo $content[0]->detail;?></textarea>

            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="detail">รูป</label>
            <div class="col-md-4" >
              <img width="400px" src="<?php echo public_url()."image/contents/".$content[0]->image;?>" />

            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="image">อัพโหลดรูป</label>
            <div class="col-md-4">
              <!--input type="file" name="image" id="image"-->
              <input id="file-0" class="file" type="file" multiple data-min-file-count="1" name="userfile">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <a href="<?php echo base_url('admin/home_management');?>" class="btn btn-danger" style="float:left;">กลับ</a>
              <button type="submit" class="btn btn-success" name="btn-signup" style="float:right;">
                <span class="glyphicon glyphicon-log-in"></span> &nbsp;แก้ไข
              </button>
            </div>
          </div>
        </div>
      </div>
      </form>

    </fieldset>


          </html>
