<?php
  //var_dump($categories);
  //var_dump($this->input->post());
?>
<main id="faq" class="inner-bottom-md">
	<div class="container">

		<section class="section">
			<div class="page-header">
				<h2 class="page-title">สมัครรับข้อมูลข่าวสาร</h2>
				<p class="page-subtitle">อัพเดท โปรโมชั่น ต่างๆ</p>
			</div>
    </section><!-- /.section-page-title -->
  <section class="section intellectual-property inner-bottom-xs">
    <h2>โปรเลือกประเภทข่าวสารที่ท่านจะติดตาม</h2>
    <form action="<?php echo base_url('site/subscribing');?>" id="subform" method="post">
      <?php
        for ($x = 0; $x <= sizeof($categories)-1; $x++) {
          $data = array(
            'name'          => 'cate'.$x,
            'id'            => $categories[$x]->id,
            'value'         => $categories[$x]->id,
            'checked'       => FALSE,
            'style'         => 'margin:10px'
          );

          echo form_checkbox($data);
          echo $categories[$x]->name;
          echo '<br/>';
        }

      ?>
    </br>
      <input type="hidden" name="email" value="<?php echo $this->input->post('email');?>" />
      <a href="#" class="le-button huge" onclick="document.getElementById('subform').submit()">สมัคร</a>
    </form>
  </section>



			</div><!-- /.panel-group -->
		</section><!-- /.section -->

	</div><!-- /.container -->
</main><!-- /.inner-bottom-md -->
