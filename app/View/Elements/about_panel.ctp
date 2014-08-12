<div id="left-about" class="span-5">
	<ul id="about-side">
        <li class=<?php echo $intro_link ?>><?php echo $this->Html->link('Introduction', array('controller' => 'about', 'action' => 'index')); ?></li>
		<li class=<?php echo $history_link ?>><?php echo $this->Html->link('Fraternity History', array('controller' => 'about', 'action' => 'history')); ?></li>
		<li class=<?php echo $mission_link ?>><?php echo $this->Html->link('Mission Statement', array('controller' => 'about', 'action' => 'mission')); ?></li>	
    </ul>
    <?php echo $this->Html->image('crest.png', array('style' => 'margin: 40px 39px;')); ?>
</div>
