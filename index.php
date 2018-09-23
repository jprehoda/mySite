<?php
 
// grab recaptcha library
require_once "recaptchalib.php";

// your secret key
$secret = "6Lf3eiMTAAAAAISw5ufT0SOCGb7X2izhxgJfVhVZ";

// empty response
$response = null;

// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
	$response = $reCaptcha->verifyResponse(
		$_SERVER["REMOTE_ADDR"],
		$_POST["g-recaptcha-response"]
	);
}
 
?><!DOCTYPE html><html lang=en><meta content="width=device-width,initial-scale=1"name=viewport><meta charset=utf-8><meta content="A general guide to Joe Prehoda's past work as a front end web developer in Southwest Florida."name=description><meta content="Joe Prehoda"name=author><meta content="Hello, I'm Joe Prehoda"property=og:title><meta content=http://www.joeprehoda.com/ property=og:url><meta content=website property=og:type><meta content=http://www.joeprehoda.com/site15/assets/open_graph_hp.jpg property=og:image><meta content="A general guide to Joe Prehoda's past work as a front end web developer in Southwest Florida."property=og:description><title>Joe Prehoda - A Front End Developer in Southwest Florida</title><link href="http://fonts.googleapis.com/css?family=Raleway:400,700"rel=stylesheet><link href=/site15/assets/min/base.min.css rel=stylesheet><link href=/site15/assets/min/home.min.css rel=stylesheet><link href=/site15/assets/favicon.ico rel=icon type=image/x-icon><script src=https://www.google.com/recaptcha/api.js></script><body id=top-anchor><header><nav><div class="force-block highlight"id=scroll-nav><div class="float-wrapper responsive-wrapper wrapper-small"><p class="raleway float-left raleway-bold"><a href=/ tabindex=1>JoePrehoda.com</a></p><a href=# class="float-right toggle-nav"><img alt="Operate Navigation"src=/site15/assets/navigation_menu.png></a></div></div><div id=slide-nav><ul><li class=raleway><a href=# tabindex=1 class=operate-nav data-anchor=#top-anchor><img alt=""src=/site15/assets/nav_icon_home.png role=presentation><span>Home</span></a><li class=raleway><a href=# tabindex=1 class=operate-nav data-anchor=#my-story-section><img alt=""src=/site15/assets/nav_icon_book.png role=presentation><span>About</span></a><li class=raleway><a href=# tabindex=1 class=operate-nav data-anchor=#what-i-know-section><img alt=""src=/site15/assets/nav_icon_know.png role=presentation><span>Development Skills</span></a><li class=raleway><a href=/site15/work.html tabindex=1><img alt=""src=/site15/assets/nav_icon_code.png role=presentation><span>Work Examples</span></a><li class=raleway><a href=# tabindex=1 class=toggle-modal aria-haspopup=true><img alt=""src=/site15/assets/nav_icon_mail.png role=presentation><span>Contact</span></a><li class=raleway><a href=https://www.linkedin.com/in/joe-prehoda-8040a325 tabindex=1><img alt=""src=/site15/assets/nav_icon_linkedin.png role=presentation><span>LinkedIn</span></a><li class=raleway><a href=# tabindex=1 class=archive-nav><img alt=""src=/site15/assets/nav_icon_archive.png role=presentation><span>Archive</span></a><ul><li class=raleway><a href=/2009/index.html tabindex=1><img alt=""src=/site15/assets/arrow.png role=presentation><span>2009 Site</span></a><li class=raleway><a href=/2011/index.html tabindex=1><img alt=""src=/site15/assets/arrow.png role=presentation><span class=no-nav-check>2011 Site</span></a></ul></ul></div></nav></header><main><section id=hero-background class=hide-tp><img alt=""src=/site15/assets/family_hero.jpg role=presentation> <img alt=""src=/site15/assets/solo_hero.jpg role=presentation class=alt-hero></section><section id=contact-form class=modal><div class="toggle-modal modal-body-mask"> </div><div class=contact-form-feilds id=contact-form-wrapper><div class=relative-element><?php
						if ($response != null && $response->success) {
							$mail_to_send_to = "contact@joeprehoda.com";
							$your_feedbackmail = "noreply@joeprehoda.com";

							echo '<p class="raleway contact-thank-you">Thank you '.$_POST['contact-name'].' for contacting me.<br />I should be contacting you shortly. <br /><a href="#" tabindex="100" class="toggle-modal" aria-haspopup="true">Close</a><p>';

							$name = $_POST['contact-name'] ;
							$email = $_POST['contact-email'] ;
							$subject = $_POST['contact-subject'] ;
							$message = $_POST['contact-message'] ;
							$finalMessage = '<p><strong>Name:</strong> '.$name.'</p><br /><br/>'.'<p><strong>Email:</strong> '.$email.'</p><br /><br/>'.'<p><strong>Subject:</strong> '.$subject.'</p><br /><br/>'.'<p><strong>Message:</strong> '.$message.'</p><br /><br/>' ;
								$headers = "From: $your_feedbackmail" . "\r\n" . "Reply-To: $email" . "\r\n"."Content-type: text/html; charset=iso-8859-1\r\n" ;
								$a = mail( $mail_to_send_to, "Feedback Form Results", $finalMessage, $headers );
						} else {
					?><h4 class=raleway>Contact</h4><form action="?formSubmit=true"id=contact-joe-prehoda method=post name=contact-joe-prehoda><fieldset><label class="raleway contact-label"for=contact-name id=contact-name-label>Your Name</label><input class="raleway contact-text-input"tabindex=20 autocomplete=off id=contact-name maxlength=50 name=contact-name placeholder="Your Name"required><label class="raleway contact-label"for=contact-email id=contact-email-label>Your Email</label><input class="raleway contact-text-input"tabindex=21 autocomplete=off id=contact-email maxlength=75 name=contact-email placeholder="Your Email"required type=email><label class="raleway contact-label"for=contact-subject id=contact-subject-label>Your Subject</label><input class="raleway contact-text-input"tabindex=22 autocomplete=off id=contact-subject maxlength=100 name=contact-subject placeholder="Your Subject"><label class="raleway contact-label"for=contact-message id=contact-message-label>Your Message</label><textarea autocomplete=off class="raleway contact-textarea"id=contact-message name=contact-message placeholder="Your Message..."required tabindex=23></textarea><input class="raleway white-text highlight contact-submit-button"tabindex=24 type=submit value=Submit><div class=relative-element><p class="raleway captcha-error">Please verify you are not a robot<div class=g-recaptcha id=g-recaptcha data-sitekey=6Lf3eiMTAAAAAAkyNNybRFNfdqO2Va0OsmDrTwIy data-tabindex=25></div></div></fieldset></form><?php } ?><div class="raleway close-contact-form toggle-modal">X</div></div></div></section><section id=hp-hero><img alt=""src=/site15/assets/hero_filler.png class="hide-tp hero-filler"> <img alt="Joe Prehoda's family"src=/site15/assets/hero_mobile.jpg class="hide-dt mobile-hero-img"><div class="float-wrapper responsive-wrapper wrapper-large hero-wrapper"><h1 class=raleway>Hi, I’m <span class=highlight-text>Joe</span> Prehoda</h1><h2 class=raleway>A web developer using inspired creativity<br class=visible-sm>to engage an audience.</h2><div class=float-wrapper><div class="operate-nav nav-bucket"data-anchor=#my-story-section tabindex=1><div class="raleway white-text highlight bucket-title wrapper-inset"><h3 class=raleway>My Story</h3></div><div class="wrapper-inset bucket-description"><p class=raleway>I’m a fast-learning front-<br class=hide-tp>end web developer always on the lookout for new ways to solve complex problems.</div><div class=bucket-image><img alt=Book src=/site15/assets/my_story_icon.png></div></div><div class="operate-nav nav-bucket"data-anchor=#what-i-know-section tabindex=1><div class="white-text highlight bucket-title wrapper-inset"><h3 class=raleway>What I Know</h3></div><div class="wrapper-inset bucket-description"><p class=raleway>Specializing in HTML,<br class=hide-tp>CSS and JavaScript, but these are just a few things that make up my portfolio.</div><div class=bucket-image><img alt="My Thoughts"src=/site15/assets/what_i_know_icon.png></div></div><div class=nav-bucket id=snippet-bucket><a href=/site15/work.html tabindex=1><div class="raleway white-text highlight bucket-title wrapper-inset"><h3 class=raleway>What I can do</h3></div><div class="wrapper-inset bucket-description"><p class=raleway>Check out some<br class=hide-tp>examples of my work or view my repository where I keep all of my code snippets.</div><div class=bucket-image><img alt="Code Snippets"src=/site15/assets/my_work_icon.png></div></a></div></div></div></section><section id=my-story-section><div class="float-wrapper responsive-wrapper wrapper-large"><div class="float-left section-image"id=hover-circle><img alt=""src=/site15/assets/history_bw.jpg role=presentation><div class=webkit-radius-fix><img alt=""src=/site15/assets/history_color.jpg role=presentation></div><div class="my-story-image-description highlight"><p class="raleway white-text">Professional Design<br>on a deadline</div></div><div class="float-right section-text"id=about-text><h4 class="raleway white-text">A bit about my experience</h4><p class="raleway white-text">I’ve been involved in the graphic design field since the early 2000s and moved over to web development in 2007 at the Naples Daily News. There I was given the chance to wear many hats, among them being web designer and web developer. Working for NDN provided a solid foundation which allowed me to move into a Senior Web Designer role at Sony Electronics. At Sony, I didn't just add to my coding experience, but I also gained knowledge in the business aspects of web design and development. The experience I gained from both Sony and NDN have allowed me to apply those talents today at Chico's as a Front End Developer.<p class="raleway white-text">I’m always on the lookout for new opportunities that will provide me a chance to learn and expand my talents in web development. <a href=https://www.linkedin.com/in/joe-prehoda-8040a325 tabindex=1>Feel free to check out my LinkedIn profile</a>.</div></div></section><section id=what-i-know-section><div class="float-wrapper responsive-wrapper wrapper-large"><div class="float-left section-text"id=skill-text><h4 class=raleway>Languages and Programs I know</h4><p class=raleway>Web Development, HTML, XHTML, HTML5, CSS, CSS3, JavaScript, jQuery, Angular, JSON, AJAX, SOAP, XML, REST, Bootstrap, Cross-browser compatibility, Responsive design, Media queries, PHP, Django, .Java, Git, SVN, SEO, ADA compliance, WordPress, Movable Type, Oracle’s ATG BCC, Filezilla, YouTube API, Facebook API, Twitter API, Pinterest API, Third party pixel integration, Email creation, Constant Contact, Wufoo, Survey Monkey, Omniture, Google Analytics, Google Tag Manager, Adobe Photoshop, Adobe Illustrator, Adobe Dreamweaver, Notepad++, Brackets, Jira, Trello, Zendesk, Agile, Scrum..<p class=raleway>I’m a pretty fast learner so if you have a proprietary system or something not in the list above, chances are I’ll pick it up pretty quickly. Interested in what you see here? <a href=# tabindex=1>Drop me a line and let’s chat</a>.</div><div class="float-right section-image"><img alt="Tribune Media Services | Naples Daily News | Sony Electronics | Chicos FAS"src=/site15/assets/past_employment.gif></div></div></section></main><footer class="float-wrapper wrapper_small"><p class="raleway white-text float-left">All trademarks belong to their authoritative owners.<p class="raleway float-right"><a href=# tabindex=1 class=toggle-modal aria-haspopup=true>Contact Me</a> <span class="white-text footer-divider">  |  </span><a href=https://www.linkedin.com/in/joe-prehoda-8040a325 tabindex=1>View My LinkedIn profile</a></footer><script src=https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js></script><script src=/site15/assets/min/jquery.base.min.js></script><script>!function(e,a,t,n,c,g,s){e.GoogleAnalyticsObject="ga",e.ga=e.ga||function(){(e.ga.q=e.ga.q||[]).push(arguments)},e.ga.l=1*new Date,g=a.createElement("script"),s=a.getElementsByTagName("script")[0],g.async=1,g.src="https://www.google-analytics.com/analytics.js",s.parentNode.insertBefore(g,s)}(window,document),ga("create","UA-19423886-1","auto"),ga("send","pageview")</script>