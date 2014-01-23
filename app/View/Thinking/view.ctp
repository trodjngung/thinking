<div class="information">
	<h1 class="information-title">Information</h1>
    <form method="post">
    	NickName: <input type="text" name="name" required="required"  >
    	Age: <input type="number" name="age" required="required" >
    	<p>Gender:</p> 
    	<input type="checkbox" name="gender" value="Male"> Male
    	<input type="checkbox" name="gender" value="Female"> Female
        <div class="btn btn-primary btn-block btn-large">
            <?php echo $this->Html->link('Play', array('controller'=>'Thinking','action'=>'question'));
            ?>
        </div>
    </form>
</div>
