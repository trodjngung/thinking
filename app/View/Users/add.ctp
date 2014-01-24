<h1>ngocanh</h1>
<div class="login">
	<div class="information">
	<?php echo $this->Form->create('User', array('class' => 'form_play')); ?>
	
		<h1 class="information-title"><legend><?php echo __('Information'); ?></legend></h1>
    	<?php 
        	echo $this->Form->input('username');
        	echo $this->Form->input('age');
        	echo $this->Form->input('gender',array('options' => array('0' => 'Female', '1' =>'Male')));
    	?>
	
	<?php 
		echo $this->Form->submit('Play Now', array('class'=>'play_now'));
    	echo $this->Form->end();
	?>
	</div>
	<div class="matcuoi">
		<img src="/app/webroot/img/matcuoi2.png">;
	</div>
</div>
