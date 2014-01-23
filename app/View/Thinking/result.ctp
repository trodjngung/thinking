<div class="question">
	<textarea rows="4" cols="50">
		<?php
			if($peopleId == 0) {
				echo 'Xin Loi do co mot so nguoi dung co dac diem giong nhau nen chua phan biet dc.<br>';
				echo 'Nguyen nhan do truong cau hoi chua du nhieu de phan biet.<br>';
				echo 'Hoac do ban chon mot so thong tin khong dung voi nguoi do.<br>';
				echo 'Mong moi nguoi thong cam!';
			} else {
				echo ''.$peopleName;
			}
		?>
	</textarea>
	<?php
	echo $this->Html->link('Play',array('action'=>'question'),array('class'=>'btn btn-primary btn-block btn-large'));
	?>
</div>
