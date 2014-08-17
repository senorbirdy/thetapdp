<style>
.tip {
    color: #666;
    background:#1d1d1d;
    display:none; /*--Hides by default--*/
    padding:10px;
    position:absolute;    z-index:1000;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
.tip h1{
	margin: 0;
}
.tip .pledge-class{
	display: block;
	text-align: right;
	padding-bottom: 10px;
	border-bottom: 1px solid #333;
}
.tip .name{
	border-top: 1px solid #222;
	display: block;
	padding: 10px 0 0;
}
</style>
<?php echo $this->element('brothers_panel'); ?>
<div id="right-brothers" class="span-18 last">
    <?php 
    foreach ($brothers as $bro) {
		echo "<div id='bro-".$bro['id']."' class='brothers'>";
	 	echo $this->Html->link(
            $this->Html->image('../bros/'.$bro['id'].'/bw/brother'.$bro['id'].'.png', array('class' => 'bw-overlay', 'style' => 'display: none')).$this->Html->image('../bros/'.$bro['id'].'/thumb/brother'.$bro['id'].'.png', array('class' => 'colored', 'style' => 'display: none')).'<span class="loader-brother"></span><span class="tip"><h1>'.$this->Html->image('logo-brothers.png').$bro['pledge_name'].'</h1><span class="pledge-class">'.$bro['pledge_class'].' Class</span><span class="name">'.$bro['name'].'</span></span>'
, array('controller' => 'brothers', 'action' => 'show', $bro['id']), array('class' => 'tip_trigger', 'escape' => false));
			echo '<div>';
		echo '</div>';
    echo '</div>';
    }
    ?>
</div>

<script>

$(document).ready(function(){
	$('.brothers').each(function(){
		var broid = $(this).attr("id");
		//console.log(broid);
		$("#"+broid).find('img').delay(500).fadeIn();
	});
});

$('.brothers a').hover(
	function(){
		jQuery(this).find('.bw-overlay').fadeOut('fast');
	},
	function(){
		jQuery(this).find('.bw-overlay').fadeIn('fast');
	}
);
$(document).ready(function() {
    //Tooltips
    $(".tip_trigger").hover(function(){
        tip = $(this).find('.tip');
        tip.show(); //Show tooltip
    }, function() {
        tip.hide(); //Hide tooltip   
    }).mousemove(function(e) {
        var mousex = e.pageX + 20; //Get X coodrinates
        var mousey = e.pageY + 20; //Get Y coordinates
        var tipWidth = tip.width(); //Find width of tooltip
        var tipHeight = tip.height(); //Find height of tooltip

        //Distance of element from the right edge of viewport
        var tipVisX = $(window).width() - (mousex + tipWidth);
        //Distance of element from the bottom of viewport
        var tipVisY = $(window).height() - (mousey + tipHeight);

        if ( tipVisX < 20 ) { //If tooltip exceeds the X coordinate of viewport
            mousex = e.pageX - tipWidth - 20;
        } if ( tipVisY < 20 ) { //If tooltip exceeds the Y coordinate of viewport
            mousey = e.pageY - tipHeight - 20;
        } 
        tip.css({  top: mousey, left: mousex });
    });
});
</script>
