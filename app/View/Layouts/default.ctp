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
    echo $this->Html->css('http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/flick/jquery-ui.css', array('media' => 'screen'));
    echo $this->Html->script(
        array(
            'http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js',
            'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js',
            'application',
            'jquery.carouFredSel-2.2.2',
            'jquery.marquee',
            'twitterFetcher'
        ));
    echo $this->Html->meta(
        'favicon.ico',
        '/favicon.ico',
        array('type' => 'icon')
    );
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
                    <?php echo $this->Html->link('HOME', '/');?></li>
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
                    <?php echo $this->Html->link('CONTACT', array('controller' => 'contact', 'action' => 'index'));?></li>
                </ul>
                <!--<div id="login-nav">
                  <%= render :partial=>'users/user_bar' %>
                </div>-->
            </div>
        </div>
	    <div id="logo-header">
            <div id="logo-content">
            <?php echo $this->Html->link('RPI Pi Delta Psi', '/', array('id' => 'logo')); ?>
		    </div>
        </div>
        <?php if ($home_link == 'active'): ?>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div id="twitter-home-container">
            <div id="twitter-home">
                <marquee behavior="scroll" direction="left" scrollamount="2" width="750" height="24"><ul style="margin:0;padding:0" id="posts">Getting your tweets...</ul></marquee>
                <span class="fade-left"></span>
                <span class="fade-right"></span>
                <a href="http://twitter.com/rpi_pdpsi" id="twitter-link" target="_blank">follow us on Twitter</a>
                <div class="fb-follow" data-href="https://www.facebook.com/rpipdpsi" data-height="25" data-colorscheme="light" data-layout="button" data-show-faces="true"></div>
            </div>
        </div>
        <?php endif; ?>
        <div class="container-container">
            <div class="container showgrid1">
                <div class="span-24">
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
        <?php if ($home_link == 'active'): ?>
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
            
            $(document).ready(function(){
                var config1 = {
                    "id": '499490292790095872',
                    "domId": '',
                    "showUser": false,
                    "maxTweets": 1,
                    "enableLinks": false,
                    "showRetweet": false,
                    "showInteraction": false,
                    'customCallback':tweet

                };
                twitterFetcher.fetch(config1);
            });
            
            function tweet(tweets){
                $('#posts').html(tweets[0]);
            }
        </script>
        <?php endif; ?>
        <div id="footer-content">
            <span id="copyright"> Copyright &copy; 2014 | Pi Delta Psi Fraternity, Inc.</span>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
