<div class="span-24" style="margin: 40px 0 0px">
<h1>Rensselaer Polytechnic Institute <br/>
PI DELTA PSI Galleries</h1>
</div>

<div id="gallery-bottom"></div>
<div class="span-17">
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
<div class="span-7 last">
	<div id="gallery-index-right">
		Feel free to browse our photo gallery and see how Pi Delta Psi is both a fun and rewarding Fraternity to be a part of.
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

#gallery-index{
padding: 0 25px;
float: left;
}

#gallery-index-right{
	background: none repeat scroll 0 0 #FFFFFF;
	border: 1px solid #DDDDDD;
	margin: 50px 0 0;
	padding: 20px;
}
</style>

<script>
	$(document).ready(function() {
		$("#gallery-carousel").carouFredSel({
			height				: 207,
			width				: 790,
			auto				: false,
			items				: 5,
			scroll : {
				items			: 1,
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
