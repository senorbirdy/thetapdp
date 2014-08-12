<?php echo $this->Html->script(array('fancybox/jquery.fancybox-1.3.1.pack.js', 'fancybox/jquery.easing-1.3.pack.js'), array('inline' => false)); ?>
<script>
	jQuery.noConflict();
</script>
<?php echo $this->Html->script(array('prototype', 'effects', 'application', 'controls', 'dragdrop')); ?>

<div id="left-gallery" class="span-15">
    <?php echo $this->Html->link('&larr; Back to Gallery Home', array('controller' => 'gallery', 'action' => 'index'), array('id' => 'back-gallery', 'escape' => false)); ?>
    <div id="images" style="display: none">
    <?php echo $this->element('gallery_page'); ?>
	</div>
    <span id="loader" style="display: none"></span>
</div>

<div id="right-gallery" class="span-7 last">
	<h1><?php echo $gallery; ?></h1>
</div>

<script>
    jQuery(document).ready(function() {
        jQuery("#loader").show().delay(1000).fadeOut(500);
        jQuery("#images").delay(1500).fadeIn();
    });
</script>
<style>
	#back-gallery{
		display: block;
		margin-bottom: 10px;
	}

    .test-box{
        background:none repeat scroll 0 0 #999999;
        float:left;
        height:120px;
        margin:0 10px 10px 0;
        width:110px;
    }

    .show-image{
        float: left;
        margin: 0 10px 10px 0;
    }

    .bw-overlay{
        position: absolute;
        top: 0;
        left: 0;
    }
</style>
