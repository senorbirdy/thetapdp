<div id="left-about" class="span-5">
	<ul id="about-side">
        <li class=<?php echo $left_rush_link ?>><?php echo $this->Html->link('Rush Pi Delta Psi!', array('controller' => 'rush', 'action' => 'index')); ?></li>
		<li class=<?php echo $why_link ?>><?php echo $this->Html->link('Why Pi Delta Psi?', array('controller' => 'rush', 'action' => 'why')); ?></li>
		<li class=<?php echo $faq_link ?>><?php echo $this->Html->link('Frequently Asked Question', array('controller' => 'rush', 'action' => 'faq')); ?></li>	
    </ul>
    <?php echo $this->Html->image('crest.png', array('style' => 'margin: 40px 39px;')); ?>
</div>
