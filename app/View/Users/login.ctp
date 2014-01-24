
<div class="information">
	<h1 class="information-title">Information</h1>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Information'); ?></legend>
        <?php 
            echo $this->Form->input('username');
            echo $this->Form->input('age');
            echo $this->Form->input('gender', array('options' => array('0' => 'Female', '1' =>'Male')));
        ?>
    </fieldset>
     <div class="btn btn-primary btn-block btn-large">
            <?php echo $this->Form->end(__('Play')); ?>
    </div>
</div>
