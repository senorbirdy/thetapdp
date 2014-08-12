<div id="left-brothers" class="span-5">
    <ul>
        <?php 
        foreach ($brothers as $bro) {
            if ($bro['id'] == $id)
                echo '<li>'.$this->Html->link($bro['name'], array('controller' => 'brothers', 'action' => 'show', $bro['id']), array('class' => 'active')).'</li>';
            else
                echo '<li>'.$this->Html->link($bro['name'], array('controller' => 'brothers', 'action' => 'show', $bro['id'])).'</li>';
        } 
        ?>
	</ul>
</div>
