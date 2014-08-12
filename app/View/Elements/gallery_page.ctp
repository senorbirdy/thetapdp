<div id="images-partial_<?php echo $this->Paginator->counter('{:page}'); ?>">
    <?php 
    foreach ($photos as $photo) {
        echo $this->Html->link(
        '<span style="position: relative; float: left">'.
            $this->Html->image('../galleries/thumb/'.$photo['image_file_name']).
            $this->Html->image('../galleries/bw/'.$photo['image_file_name'], 
            array('class' => 'bw-overlay')).
        '</span>',
        '../galleries/original/'.$photo['image_file_name'], 
        array('class' => 'lightbox show-image', 'rel' => 'group', 'escape' => false));
    }
    ?>
</div>
<?php  
if ($this->Paginator->counter('{:pages}') - $this->Paginator->counter('{:page}') > 0) { 
    echo '<div id="flow_pagination">'; 
    echo $this->Paginator->next('<input type="button" style="background: rgb(51, 51, 51);" value="More">',  array('tag' => false, 'escape' => false)); 
    echo '</div>'; 
} 
?>     
<script>
    jQuery(document).ready(function() {
        var url = jQuery('.next').attr('href');
        jQuery('.next').click(function(e) {
            jQuery(this).remove();
            jQuery.get(url, function(data) {
                jQuery("#loader").show().delay(1000).fadeOut(500);
                setTimeout(function() {
                    jQuery('#images').append(data);
                }, 1500);
            });
            return false;
        });
    });

    jQuery("#flow_pagination input").mouseover(function(){
        jQuery(this).css("background", "#58B7DD");
    }).mouseout(function(){
        jQuery(this).css("background", "#333333");
    });

    jQuery("a.show-image").hover(
        function(){
            jQuery(this).find('.bw-overlay').fadeOut('fast');
        },
            function(){
                jQuery(this).find('.bw-overlay').fadeIn('fast');
            }
    );

    jQuery(document).ready(function() { 
        jQuery("a.lightbox").fancybox({ 
            'transitionIn'  :   'elastic', 
                'transitionOut' :   'elastic', 
                'speedIn'       :   200,  
                'speedOut'      :   200,  
                'overlayShow'   :   true, 
                'centerOnScroll':   true, 
                'overlayOpacity':   0.75, 
                'overlayColor'  :  '#000', 
                'titleShow'     : false 
        }); 
    });
</script>
