<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
    <?php 
    echo $this->Html->charset(); 
    echo $this->Html->css(
        array(
            'blueprint/screen', 
            'styles', 
            'fancybox/jquery.fancybox-1.3.1'
        ), array('media' => "screen, progection")
    );
    echo $this->Html->css('blueprint/print', array('media' => 'print'));
    echo $this->Html->css('http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/flick/jquery-ui.css', array('media' => 'screen'));
    echo $this->Html->script(
        array(
            'http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js',
            'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js',
            'application',
            'jquery.carouFredSel-2.2.2',
            'jquery.marquee',
            'jquery.jtwitter'
        ));

    ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
        <div id="nav-container">
            <div id="nav">
                <ul>
                    <li class=<?php echo $home_link ?>>
                    <?php echo $this->Html->link('HOME', array('controller' => 'home', 'action' => 'index'));?></li>
                    <li class=<?php echo $about_link ?>>
                    <?php echo $this->Html->link('ABOUT', array('controller' => 'about', 'action' => 'index'));?></li>
                    <li class=<?php echo $rush_link ?>>
                    <?php echo $this->Html->link('RUSH', array('controller' => 'rush', 'action' => 'index'));?></li>
                    <li class=<?php echo $brothers_link ?>>
                    <?php echo $this->Html->link('BROTHERS', array('controller' => 'brothers', 'action' => 'index'));?></li>
                    <li class=<?php echo $gallery_link ?>>
                    <?php echo $this->Html->link('GALLERY', array('controller' => 'gallery', 'action' => 'index'));?></li>
                    <li class=<?php echo $calendar_link ?>>
                    <?php echo $this->Html->link('CALENDAR', array('controller' => 'calendar', 'action' => 'index'));?></li>
                    <li class=<?php echo $contact_link ?>>
                    <?php echo $this->Html->link('CONTACT', array('controller' => 'contacts', 'action' => 'index'));?></li>
                </ul>
                <!--<div id="login-nav">
                  <%= render :partial=>'users/user_bar' %>
                </div>-->
            </div>
        </div>
	    <div id="logo-header">
            <div id="logo-content">
            <?php echo $this->Html->link('RPI Pi Delta Psi', array('controller' => 'home', 'action' => 'index'), array('id' => 'logo')); ?>
		    </div>
	    </div>
        <!--<div id="twitter-home-container">
            <div id="twitter-home">
                <marquee behavior="scroll" direction="left" scrollamount="2" width="750" height="24"><ul style="margin:0;padding:0" id="posts">Getting your tweets...</ul></marquee>
                <span class="fade-left"></span>
                <span class="fade-right"></span>
                <a href="http://twitter.com/rpi_pdpsi" id="twitter-link" target="_blank">follow us on Twitter</a>
            </div>
        </div>-->
        <div class="container-container">
            <div class="container showgrid1">
                <div class="span-24">
                    <?php echo $this->Session->flash(); ?>

                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('marquee').marquee('pointer').mouseover(function () {
              $(this).trigger('stop');
            }).mouseout(function () {
              $(this).trigger('start');
            }).mousemove(function (event) {
              if ($(this).data('drag') == true) {
                this.scrollLeft = $(this).data('scrollX') + ($(this).data('x') - event.clientX);
              }
            }).mousedown(function (event) {
              $(this).data('drag', true).data('x', event.clientX).data('scrollX', this.scrollLeft);
            }).mouseup(function () {
              $(this).data('drag', false);
            });
            
            /*$(document).ready(function(){
                // Get latest 6 tweets by jQueryHowto
                $.jTwitter('rpi_pdpsi', 1, function(data){
                    $('#posts').empty();
                    $.each(data, function(i, post){
                        $('#posts').append(
                            '<li class="post" style="display:inline"><span class="twitter-date">'
                            // See output-demo.js file for details
                            +    prettifyDate(post.created_at)
                            + '</span> '
                            +    post.text
                            +'</li>'
                        );
                    });
                });
            });*/

            function prettifyDate(time){
                var values = time.split(" ");
                time = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];

                var parsed_date = Date.parse(time);

                var relative_to = (arguments.length > 1) ? arguments[1] : new Date();

                var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
                delta = delta + (relative_to.getTimezoneOffset() * 60);

                var out = '';

                if (delta < 60) {
                    out = 'a minute ago';
                } else if (delta < 120) {
                    out = 'couple of minutes ago';
                } else if (delta < (45 * 60)) {
                    out = (parseInt(delta / 60)).toString() + ' minutes ago';
                } else if (delta < (90 * 60)) {
                    out = 'an hour ago';
                } else if (delta < (24 * 60 * 60)) {
                    out = '' + (parseInt(delta / 3600)).toString() + ' hours ago';
                } else if (delta < (48 * 60 * 60)) {
                    out = '1 day ago';
                } else {
                    out = (parseInt(delta / 86400)).toString() + ' days ago';
                }

                return out;
            }
        </script>
        <div id="footer-content">
            <span id="copyright"> Copyright &copy; 2014 | Pi Delta Psi Fraternity, Inc.</span>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
