<!DOCTYPE html>

<html lang="en">

<head>

<title><?php echo $this->template->meta_title;?></title>
<meta name="description" content="<?php echo $this->template->meta_description;?>">
<?php echo $this->template->rel_prev;?>
<?php echo $this->template->rel_next;?>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style_en.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/skins/green.css" id="colors"/>
<link href="<?php echo base_url(); ?>css/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script><!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){
z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='https://v2.zopim.com/?4xMUMCGjkL09WmoX1BqBZ7aauQdPN0R8';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');

<!--End of Zendesk Chat Script-->

</script>
 <script>


      function PopIt() { return "Are you sure you want to leave?"; }
     function UnPopIt()  { /* nothing to return */ } 
 
     $(document).ready(function() {
    $("a").click(function(){ window.onbeforeunload = UnPopIt; });
   $(".btn").click(function(){ window.onbeforeunload = UnPopIt; });
     window.onbeforeunload = PopIt;
     });
           
            // var myEvent = window.attachEvent || window.addEventListener;
            // var chkevent = window.attachEvent ? 'onbeforeunload' : 'beforeunload'; /// make IE7, IE8 compatable
 
            // myEvent(chkevent, function(e) { // For >=IE7, Chrome, Firefox
            //     var confirmationMessage = ' ';  // a space
            //     (e || window.event).returnValue = confirmationMessage;
            //     return confirmationMessage;
            // });

 //  $(window).bind('beforeunload', function(){

 //    $('#lnkLogOut').click(function () {
 //        window.onbeforeunload = null;
 //    });
 
 //   //  $(".btn").click(function () {
 //   //      window.onbeforeunload = null;
 //   // });

 // });

// $(function () {


// });


// window.onbeforeunload = function (event) {
//     var message = 'Important: Please click on \'Save\' button to leave this page.';
//     if (typeof event == 'undefined') {
//         event = window.event;
//     }
//     if (event) {
//         event.returnValue = message;
//     }
//     return message;
// };

//digitalclock
// var start = Date.now();
// // the event you'd like to time goes here:
// doSomethingForALongTime();
// var end = Date.now();
// var elapsed = end - start; 

// var difference = new Date(elapsed);
// //If you really want the hours/minutes, 
// //Date has functions for that too:
// var diff_hours = difference.getHours();
// var diff_mins = difference.getMinutes();



// function diff(start, end) {
//     start = start.split(":");
//     end = end.split(":");
//     var startDate = new Date(0, 0, 0, start[0], start[1], 0);
//     var endDate = new Date(0, 0, 0, end[0], end[1], 0);
//     var diff = endDate.getTime() - startDate.getTime();
//     var hours = Math.floor(diff / 1000 / 60 / 60);
//     diff -= hours * 1000 * 60 * 60;
//     var minutes = Math.floor(diff / 1000 / 60);

//     // If using time pickers with 24 hours format, add the below line get exact hours
//     if (hours < 0)
//        hours = hours + 24;

//     return (hours <= 9 ? "0" : "") + hours + ":" + (minutes <= 9 ? "0" : "") + minutes;
// }
//  function startTime(start)
// {
// var now = new Date();
// var today = diff(start, now);
// // var h=today.getHours();
// // var m=today.getMinutes();
// // var s=today.getSeconds();
// // // add a zero in front of numbers<10
// // h=checkTime(h);
// // m=checkTime(m);
// // s=checkTime(s);
// document.getElementById('digitalclock').innerHTML= today;
// t=setTimeout(function(){startTime()},500);
// }

// function checkTime(i)
// {
// if (i<10)
//   {
//   i="0" + i;
//   }
// return i;
// }
// var start = new Date();
// window.setTimeout('startTime(start)', 1000);

(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
  _fbq.push(['addPixelId', '522025754595812']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=522025754595812&amp;ev=PixelInitialized" /></noscript>
</head>

<body onload="startTime(login);">

<div id="bg">

<div id="top-navigation" class="hidden-phone">

	<div class="container">

		<ul id="top-social" style="margin-left: -82px;">
			<?php /*?>
			<li><a href="#" class="tip" data-toggle="tooltip" data-placement="bottom" title="Youtube"><span class="youtube"></span></a></li>

			<li><a href="#" class="tip" data-toggle="tooltip" data-placement="bottom" title="Twitter"><span class="twitter"></span></a></li>
			<?php */?>
            <li><a href="https://twitter.com/araboclipo" target="_blank" class="tip" data-toggle="tooltip" data-placement="bottom" title="Twitter"><span class="twitter"></span></a></li>
			<li><a href="https://www.facebook.com/arabminiclip" target="_blank" class="tip" data-toggle="tooltip" data-placement="bottom" title="Facebook"><span class="facebook"></span></a></li>
			<li><a href="https://plus.google.com/+Arabminiclip/" target="_blank" class="tip" data-toggle="tooltip" data-placement="bottom" title="Google +"><span class="google"></span></a></li>
		</ul>

		<ul id="categories" style="margin-right: -69px;">
			<li><a <?php if($this->uri->segment(2) == "carrier") {?> class="active"<?php }?>  href="<?php echo base_url()."en"; ?>/contact">Contact</a></li>            
			<li><a <?php if($this->uri->segment(2) == "gifts") {?> class="active"<?php }?> href="<?php echo base_url()."en"; ?>/gifts">Gift Shop</a></li>
			<li><a <?php if($this->uri->segment(2) == "blog") {?> class="active"<?php }?> href="<?php echo base_url()."en"; ?>/blog">Games News</a></li>

			<?php foreach($categories as $c){?>

			<li><a<?php if($c->slug == $this->uri->segment(3)) {?> class="active"<?php }?> href="<?php echo base_url()."en"; ?>/games-category/<?php echo $c->slug; ?>/"><?php echo $c->name; ?></a></li>

			<?php }?>

		</ul>
	</div>

</div>

<div id="sub-navigation">

	<div class="container">

		<div class="sub-navigation">

			<span>Welcome to Arab Mini Clip</span>

            <a class="pull-left lang" href="<?php echo base_url(); ?>ar"><img src="<?php echo base_url(); ?>images/flag_ar.png" alt="Arab" /></a>

			<a class="pull-left lang" href="<?php echo base_url(); ?>en"><img src="<?php echo base_url(); ?>images/flag_en.png" alt="English" /></a>

			<?php if (!$this->ion_auth->logged_in()){?>
      			<a class="btn btn-small btn-primary" href="<?php echo base_url(); ?>en/account/#login">Sign in</a> 
      			<a class="btn btn-small btn-primary" href="<?php echo base_url(); ?>en/account/#registration">Registration</a>
      		<?php }else{?>
      			<a class="btn btn-small btn-danger" href="<?php echo base_url(); ?>en/account/logout/">Sign out <i class="icon-off icon-white"></i></a>
                <a class="btn btn-small btn-info" href="<?php echo base_url(); ?>en/account/">My account <i class="icon-user icon-white"></i></a>
      		<?php }?>

		</div>		

	</div>

</div>

<div id="head">

	<div class="container spotlight">

		<div class="logo pull-left"><a href="<?php echo base_url(); ?>ar"><img src="<?php echo base_url(); ?>images/logo.png" alt="logo" /></a></div>

		<div class="pull-right visible-desktop" style="padding-top: 15px;">

			<script type='text/javascript'><!--//<![CDATA[
   var m3_u = (location.protocol=='https:'?'https://ads.ad4game.com/www/delivery/ajs.php':'http://ads.ad4game.com/www/delivery/ajs.php');
   var m3_r = Math.floor(Math.random()*99999999999);
   if (!document.MAX_used) document.MAX_used = ',';
   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
   document.write ("?zoneid=52139&amp;block=1&amp;blockcampaign=1");
   document.write ('&amp;cb=' + m3_r);
   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
   if (document.context) document.write ("&context=" + escape(document.context));
   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
   document.write ("'><\/scr"+"ipt>");
//]]>--></script><noscript><a onclick="myfunc()" href='http://ads.ad4game.com/www/delivery/dck.php?n=a0bd539c' target='_blank'><img src='//ads.ad4game.com/www/delivery/avw.php?zoneid=52139&amp;n=a0bd539c' border='0' alt='' /></a></noscript>


		</div>

	</div>

</div>

<div id="main-navigation">

	<div class="container-fluid">

		<ul id="menu-top" style="margin-right: 75px;">
		     <li <?php if($this->uri->segment(2) == "contact") {?> class="active"<?php }?>><a href="<?php echo base_url()."en"; ?>/contact">Contact</a></li>
			<li <?php if($this->uri->segment(2) == "gifts") {?> class="active"<?php }?>><a href="<?php echo base_url()."en"; ?>/gifts">GIFT SHOP</a></li>
			<li <?php if($this->uri->segment(2) == "blog") {?> class="active"<?php }?>><a href="<?php echo base_url()."en"; ?>/blog">GAMES NEWS</a></li>

			<?php foreach($categories as $c){?>

			<li<?php if($c->slug == $this->uri->segment(3)) {?> class="active" <?php }?>><a href="<?php echo base_url()."en"; ?>/games-category/<?php echo $c->slug; ?>"><?php echo $c->name; ?></a></li>

			<?php }?>
			<li><a href="<?php echo base_url()."en"; ?>"><i class="fa fa-home fa-5"></i></a></li>
		</ul>

	</div>

</div>

<?php if($this->template->menu == 'home') {?>

	<?php echo $this->template->widget('slide_widget'); ?>

<?php }?>
<div class="container">
  <div id="wrapper" class="center" style="margin: 0 0 10px;">
    <div class="padding">
      <iframe  src='//ads.ad4game.com/www/delivery/afr.php?zoneid=52139' framespacing='0' frameborder='no' scrolling='no' width='728' height='90'><a href='http://ads.ad4game.com/www/delivery/dck.php?n=aaa07f75' target='_blank'><img src='//ads.ad4game.com/www/delivery/avw.php?zoneid=52139&amp;n=aaa07f75' border='0' alt='' /></a></iframe>
    </div>
  </div>
</div>