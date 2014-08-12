<div style="padding: 40px 0; float: left">
	<div class="span-12">
		<h1>Excellence Through Brotherhood</h1>
		<p>The mission of Pi Delta Psi Fraternity, Inc. is to maintain its Fraternal existence by instilling values that nurture and perpetuate the continual growth and development of the individual through Academic Achievement, Cultural Awareness, Righteousness, Friendship and Loyalty while fostering ethical behavior, leadership, and philanthropy.</p>
        <br/>
        <?php echo $this->Html->link('Learn More', array('controller' => 'about', 'action' => 'index'), array('class' => 'button')); ?> 
	</div>
    <div class="span-12 last">
        <?php echo $this->Html->image('pdpsifrontpagebanner.png'); ?>
	</div>
</div>

<div class="span-24" style="background: url(img/logos-background06.png)">

	<div id="gallery-bottom"></div>
	
		<div class="span-7">
			<div id="gallery-home-left">
				<h1>GALLERIES</h1>
                <p>Galleries are fun to look at and waste time.  The galleries are separated by semester, so it's easier to browse through. Go ahead, check them out and enjoy!</p>
                <?php echo $this->Html->link('Go to Gallery Home &rarr;', array('controller' => 'gallery', 'action' => 'index'), array('class' => 'button1', 'escape' => false)); ?>
			</div>
		</div>
		<div class="prepend-1 span-16 last">
			<a id="v2_prev" href="#">&larr; prev </a>
            <div id="gallery-carousel">
            <?php 
            foreach ($galleries as $gallery) {
                echo '<div class="gallery-home">';
                    echo '<div class="gallery-home-shadow">';
                        echo '<div class="gallery-home-content">';
                            echo $this->Html->link(
                                $this->Html->image('../galleries/thumb/'.$photos[$gallery['title']]),
                                array('controller' => 'gallery', 'action' => 'show', $gallery['title']),
                                array('escape' => false)
                            );  
                        echo '</div>';
                        echo '<div class="gallery-home-title">';
                            echo $gallery['title'];
                        echo '</div>';
                    echo '</div>';
                    echo $this->Html->link('View Gallery', 
                        array('controller' => 'gallery', 'action' => 'show', $gallery['title']),
                        array('class' => 'gallery-home-link')
                    );  
                echo '</div>';
            } 
            ?>
			</div>
			 <a id="v2_next" href="#"> next &rarr;</a>
		</div>
		
	<div id="gallery-top"></div>
	
</div>

<div id="rush-home" class="span-11">
    <?php echo $this->Html->link('Learn more', array('controller' => 'rush', 'action' => 'index'), array('id' => 'rush-home-link')); ?>
	<div>
		<p>Rush is a period for you to meet the brothers of Pi Delta Psi. By throwing events for our rushes to attend, we hope to provide an opportunity for you to get to know the brothers better and to learn more about the fraternity.</p>
        <?php echo $this->Html->link('Learn more', array('controller' => 'rush', 'action' => 'index'), array('class' => 'button1')); ?>
	</div>
</div>

<div id="calendar-home" class="span-12 last">
    <?php echo $this->Html->image('calendar.png'); ?>
	<div>
		<h1>Calendar</h1>
		<p>Please browse through our calendar to find what events RPI Pi Delta Psi are holding.</p>
        <?php echo $this->Html->link('Go to Calendar', array('controller' => 'calendar', 'action' => 'index'), array('class' => 'button1')); ?>
	</div>
</div>

<!--[if IE]>
<style type="text/css">
.gallery-home-shadow{
    filter:
    progid:DXImageTransform.Microsoft.Shadow(color='#042b47', Direction=45, Strength=1)
    progid:DXImageTransform.Microsoft.Shadow(color='#042b47', Direction=135, Strength=1)
    progid:DXImageTransform.Microsoft.Shadow(color='#042b47', Direction=225, Strength=1)
    progid:DXImageTransform.Microsoft.Shadow(color='#042b47', Direction=315, Strength=1);
    position: relative;
    top: -12px;
    left: -12px;
    zoom: 1;
}
</style>
<![endif]-->

<style>

.gallery-home-shadow{
	background: green; /* must use for IE */
	-webkit-box-shadow: 0px 0px 4px #999;
	-moz-box-shadow: 0px 0px 4px #999;
	box-shadow: 0px 0px 4px #999;
}
</style>

<script>
	$(document).ready(function() {
		$("#gallery-carousel").carouFredSel({
			height				: 207,
			width				: 475,
			auto				: false,
			items				: 3,
			scroll : {
				items			: 3,
				effect			: "easeOutBounce",
				duration		: 1000,							
				pauseOnHover	: true
			},
			prev : {	
				button	: "#v2_prev",
				key		: "left"
			},
			next : { 
				button	: "#v2_next",
				key		: "right"
			}
		});				
	});	

</script>
