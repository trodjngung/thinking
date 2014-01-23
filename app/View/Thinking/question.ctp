<div class="question">
	<textarea rows="4" cols="50" text-align='center'>
		<?php
			echo ''.$question;
		?>
		<?php // echo ''.$rand; ?>
	</textarea>
	<?php
		echo $this->Html->link('Yes',array('action'=>'question',1),array('class'=>'btn btn-primary btn-block btn-large'));
		echo $this->Html->link('No',array('action'=>'question',0),array('class'=>'btn btn-primary btn-block btn-large'));
	?>
</div>