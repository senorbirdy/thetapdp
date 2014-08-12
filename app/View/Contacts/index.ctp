<div class="prepend-top span-19 prepend-2 last">
	<h1>CONTACT</h1>
	<p>Have questions or comments? Need help with the website or looking for assistance? Let us know what we can do to help.</p>

	<p>Simply shoot us an email. We'll respond to them as soon as possible.</p>
    <?php if (isset($errors)) { foreach ($errors as $e) echo $e; } ?>
    <span class="flash-notice"><?php echo $this->Session->flash(); ?></span>
    <?php echo $this->Form->create('Contact', array('class' => 'contact iform', 'action' => 'mail')); ?>
        <p style="position: relative">
            <?php echo $this->Form->input('email', array('type' => 'text', 'div' => false, 'size' => 30, 'class' => 'itext')); ?>
		</p>

		<p style="position: relative">
            <?php echo $this->Form->input('subject', array('type' => 'text', 'div' => false, 'size' => 30, 'class' => 'itext')); ?>
		</p>

		<p style="position: relative">
            <?php echo $this->Form->input('body', array('type' => 'text', 'div' => false, 'class' => 'itextarea', 'cols' => 40, 'rows' => 20)); ?>
		</p>

        <p style="position: relative">
            <?php echo $this->Form->submit('send', array('class' => 'ibutton', 'div' => false)); ?>
		</p>
    <?php echo $this->Form->end(); ?>
</div>

<?php echo $this->Html->script('jquery.infieldlabel', array('inline' => false)); ?>
<script>
	$(document).ready(function(){
	  $("label").inFieldLabels();
	});
</script>
