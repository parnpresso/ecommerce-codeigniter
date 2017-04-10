
<?php //var_dump($orders); ?>
<section id="cart-page">
    <div class="container">

      <div class="row">
        <div class="col-lg-6">

          <h3>ดูรายงานประจำเดือน</h3>

        </div><!-- /.col-lg-6 -->
        <div class="col-lg-6">
          <!--div class="input-group pull-right">
            <form class="navbar-form " action="<?php echo base_url('admin/search_promotion');?>" method="post">
              <input type="text" class="form-control" id="username" name="name" placeholder="ค้นหาโปรโมชั่น..." required="">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">ค้นหา</button>
              </span>
            </form>
          </div--><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
    </br>

    <form method="post" action="<?php echo base_url('admin/view_report');?>">
    <div class="row">
      <div class="col col-md-3">
        <label for="sel1">เลือกเดือน</label>
        <select class="form-control" id="month" name="month">
          <option value="1">มกราคม</option>
          <option value="2">กุมภาพันธ์</option>
          <option value="3">มีนาคม</option>
          <option value="4">เมษายน</option>
          <option value="5">พฤษภาคม</option>
          <option value="6">มิถุนายน</option>
          <option value="7">กรกฎาคม</option>
          <option value="8">สิงหาคม</option>
          <option value="9">กันยายน</option>
          <option value="10">ตุลาคม</option>
          <option value="11">พฤศจิกายน</option>
          <option value="12">ธันวาคม</option>
        </select>
      </div>
      <div class="col col-md-3">
        <label for="sel1">เลือกปี</label>
        <select class="form-control" id="year" name="year">
          <option value="2017">2560</option>
          <option value="2016">2559</option>
          <option value="2015">2558</option>
          <option value="2014">2557</option>
          <option value="2013">2556</option>
          <option value="2012">2555</option>
          <option value="2011">2554</option>
          <option value="2010">2553</option>
          <option value="2009">2552</option>
          <option value="2008">2551</option>
        </select>
      </div>

      <div class="col col-md-6">
          <button type="submit" name="type" value="summary" class="btn btn-sm btn-success btn-create"><h4>สรุปยอดขายรวม</h4></button>
          <button type="submit" name="type" value="popular" class="btn btn-sm btn-success btn-create"><h4>สรุปสินค้าขายดี</h4></button>
      </div>
    </div>
    </form>
