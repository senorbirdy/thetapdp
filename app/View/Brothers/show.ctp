<?php echo $this->element('brothers_panel'); ?>
<div class="span-19 last">
    <?php echo $this->Html->link('&larr; Back to Roster Home', array('controller' => 'brothers', 'action' => 'index'), array('id' => 'back-brothers', 'escape' => false)); ?>
</div>
<div id="right-brothers-show" class="span-18 last">
    <div class="span-5">
        <?php echo $this->Html->image('../bros/'.$id.'/show/brother'.$id.'.png', array('style' => 'border: 1px solid #ccc; padding: 5px;')); ?>
	</div>
	<div class="span-13 last">
		<div class="brothers_info">
			<dl class="basic_info">
				<dt>Basic Info</dt>
                <dd><span class="info_title">Name:</span><?php echo $current['name']; ?></dd>
				<dd><span class="info_title">Hometown:</span><?php echo $current['hometown']; ?></dd>
                <dd><span class="info_title">Ethnicity:</span><?php echo $current['ethnicity']; ?></dd>
                <?php 
                if ($current['major'] != '') {
                    $majors = explode('/', $current['major']);
                    echo '<dd><span class="info_title">Major(s):</span>'.$majors[0].'</dd>';
                    if (count($majors) > 1) {
                        for ($i = 1; $i < count($majors); $i++)
                            echo '<dd><span class="info_title">&nbsp;</span>'.$majors[$i].'</dd>';
                    }
                }
                ?>
			</dl>
			<dl class="bros_info">
				<dt>Brothers Info</dt>
				<dd><span class="info_title">Pledge Name:</span><?php echo $current['pledge_name']; ?></dd>
				<dd><span class="info_title">Pledge Class:</span><?php echo $current['pledge_class'].' Class'; ?></dd>
				<dd><span class="info_title">Crossing:</span><?php echo $current['crossing']; ?></dd>
			</dl>
			<dl class="contact_info">
				<dt>Bio</dt>
				<dd><?php echo $current['bio']; ?></dd>
			</dl>
		</div>
	</div>
</div>
