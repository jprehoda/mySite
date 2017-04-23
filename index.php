<?php
 
// grab recaptcha library
require_once "recaptchalib.php";

// your secret key
$secret = "";

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
 
?>
<!doctype html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="description" content="A general guide to Joe Prehoda's past work as a front end web developer in Southwest Florida." />
	<meta name="author" content="Joe Prehoda" />
	<meta property="og:title" content="Hello, I'm Joe Prehoda" />
	<meta property="og:url" content="http://www.joeprehoda.com/" />
	<meta property="og:type" content="website" />
	<meta property="og:image" content="http://www.joeprehoda.com/site15/assets/open_graph_hp.jpg" />
	<meta property="og:description" content="A general guide to Joe Prehoda's past work as a front end web developer in Southwest Florida." />

	<title>Joe Prehoda - A Front End Developer in Southwest Florida</title>

	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway:400,700" />
	<link rel="stylesheet" type="text/css" href="/site15/assets/min/base.min.css" />
    <link rel="stylesheet" type="text/css" href="/site15/assets/min/home.min.css" />
	<link rel="icon" type="image/x-icon" href="/site15/assets/favicon.ico" />

	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body data-ng-app="joesApp" data-ng-controller="bodyCtrl" data-ng-class="{'alt-layout':switchLayout}" data-ng-click="checkNav($event)">
	<header>
		<nav>
			<div id="scroll-nav" class="force-block highlight" data-scroll data-ng-class="{'scrolling':isScrolled}">
				<div class="responsive-wrapper float-wrapper wrapper-small">
					<p class="float-left raleway raleway-bold"><a href="/" tabindex="1" data-ng-click="gotoElement('hero-background', $event)" >JoePrehoda.com</a></p>
					<a data-ng-click="operateNav($event)" href="#"><img class="float-right no-nav-check" src="/site15/assets/navigation_menu.png" alt="Operate Navigation" /></a>
				</div><!-- End .responsive-wrapper -->
			</div><!-- End #scroll-nav -->
			<div id="slide-nav" data-ng-class="{'nav-clicked':isNavOpen}" data-ng-style="{height: navHeightOffset()}">
				<ul>
					<li class="raleway"><a href="/#hero-background" data-ng-click="gotoElement('hero-background', $event)" tabindex="2"><img src="/site15/assets/nav_icon_home.png" alt="" role="presentation" /><span>Home</span></a></li>
					<li class="raleway"><a href="/#about-text" tabindex="3" data-ng-click="gotoElement('about-text', $event)"><img src="/site15/assets/nav_icon_book.png" alt="" role="presentation" /><span>About</span></a></li>
					<li class="raleway"><a href="/#skill-text" tabindex="4" data-ng-click="gotoElement('skill-text', $event)"><img src="/site15/assets/nav_icon_know.png" alt="" role="presentation" /><span>Development Skills</span></a></li>
					<li class="raleway no-nav-check"><a href="https://github.com/jprehoda" tabindex="5" class="no-nav-check"><img src="/site15/assets/nav_icon_code.png" alt="" role="presentation" class="no-nav-check" /><span class="no-nav-check">Code Snippets</span></a></li>
					<li class="raleway"><a href="#" data-ng-click="showContactForm($event)" tabindex="6"><img src="/site15/assets/nav_icon_mail.png" alt="" role="presentation" /><span>Contact</span></a></li>
					<li class="raleway no-nav-check"><a href="https://www.linkedin.com/in/joe-prehoda-8040a325" tabindex="7" class="no-nav-check"><img src="/site15/assets/nav_icon_linkedin.png" alt="" role="presentation" class="no-nav-check" /><span class="no-nav-check">LinkedIn</span></a></li>
					<li class="raleway no-nav-check"><a href="#" tabindex="8" class="no-nav-check" data-ng-class="{'active-nav-item':setNavItemActive}" data-ng-click="setNavItemActive = !setNavItemActive" ><img src="/site15/assets/nav_icon_archive.png" alt="" role="presentation" class="no-nav-check" /><span class="no-nav-check">Archive</span></a>
						<ul>
							<li class="raleway"><a class="no-nav-check" href="/2009/index.html" tabindex="9"><img src="/site15/assets/arrow.png" alt="" role="presentation" /><span class="no-nav-check">2009 Muddy Site</span></a></li>
							<li class="raleway"><a class="no-nav-check" href="/2011/index.html" tabindex="10"><img src="/site15/assets/arrow.png" alt="" role="presentation" /><span class="no-nav-check">2011 Heavy Design Site</span></a></li>
						</ul>
					</li>
				</ul>
			</div><!-- End #slideNav -->
		</nav>
	</header>

	<main>
		<section id="hero-background" class="hide-tp">
			<img src="/site15/assets/family_hero.jpg" role="presentation" alt="" />
			<img class="alt-hero" src="/site15/assets/solo_hero.jpg" role="presentation" alt="" />
		</section>

		<section id="contact-form" data-ng-class="{'show-contact':showContact}">
			<div class="contact-body-mask" data-ng-click="showContactForm($event)">&nbsp;</div>
			<div id="contact-form-wrapper" class="contact-form-feilds">
				<div class="relative-element">
					<?php
						if ($response != null && $response->success) {
							$mail_to_send_to = "contact@joeprehoda.com";
							$your_feedbackmail = "noreply@joeprehoda.com";

							echo '<p class="raleway contact-thank-you">Thank you '.$_POST['contact-name'].' for contacting me.<br />I should be contacting you shortly. <br /><a href="#" tabindex="100" data-ng-click="showContactForm($event)">Close</a><p>';

							$name = $_POST['contact-name'] ;
							$email = $_POST['contact-email'] ;
							$subject = $_POST['contact-subject'] ;
							$message = $_POST['contact-message'] ;
							$finalMessage = '<p><strong>Name:</strong> '.$name.'</p><br /><br/>'.'<p><strong>Email:</strong> '.$email.'</p><br /><br/>'.'<p><strong>Subject:</strong> '.$subject.'</p><br /><br/>'.'<p><strong>Message:</strong> '.$message.'</p><br /><br/>' ;
								$headers = "From: $your_feedbackmail" . "\r\n" . "Reply-To: $email" . "\r\n"."Content-type: text/html; charset=iso-8859-1\r\n" ;
								$a = mail( $mail_to_send_to, "Feedback Form Results", $finalMessage, $headers );
						} else {
					?>
					<h4 class="raleway">Contact</h4>
					<form data-ng-submit="contactSubmit($event)" method="post" action="?formSubmit=true" name="contact-joe-prehoda" id="contact-joe-prehoda">
						<fieldset>
							<label class="contact-label raleway" for="contact-name" id="contact-name-label">Your Name</label>
							<input autocomplete="off" class="contact-text-input raleway" name="contact-name" id="contact-name" tabindex="20" type="text" maxlength="50" placeholder="Your Name" required />
							<label class="contact-label raleway" for="contact-email" id="contact-email-label">Your Email</label>
							<input autocomplete="off" class="contact-text-input raleway" name="contact-email" id="contact-email" tabindex="21" type="email" maxlength="75" placeholder="Your Email" required />
							<label class="contact-label raleway" for="contact-subject" id="contact-subject-label">Your Subject</label>
							<input autocomplete="off" class="contact-text-input raleway" name="contact-subject" id="contact-subject" tabindex="22" type="text" maxlength="100" placeholder="Your Subject" />
							<label class="contact-label raleway" for="contact-message" id="contact-message-label">Your Message</label>
							<textarea autocomplete="off" class="contact-textarea raleway" name="contact-message" id="contact-message" tabindex="23" placeholder="Your Message..." required ></textarea>
							<input class="contact-submit-button raleway white-text highlight" type="submit" value="Submit" tabindex="24" />
							<div class="relative-element">
								<p class="captcha-error raleway" data-ng-class="{'show-captcha-error':showreCaptchaError}">Please verify you are not a robot</p>
								<div class="g-recaptcha" id="g-recaptcha" data-sitekey="6Lf3eiMTAAAAAAkyNNybRFNfdqO2Va0OsmDrTwIy" data-tabindex="25"></div>
							</div>
						</fieldset>
					</form>
					<?php } ?>
					<div class="close-contact-form raleway" data-ng-click="showContactForm($event)">X</div>
				</div>
			</div><!-- End .contact-form-feilds -->
		</section><!-- End #contact-form -->

		<section id="hp-hero">

			<img src="/site15/assets/hero_filler.png" alt="" class="hide-tp hero-filler" />
			<img class="mobile-hero-img hide-dt" src="/site15/assets/hero_mobile.jpg" alt="Joe Prehoda's family" />
			<div class="responsive-wrapper hero-wrapper float-wrapper wrapper-large">
				<h1 class="raleway">Hi, I&rsquo;m <span class="highlight-text">Joe</span> Prehoda</h1>
				<h2 class="raleway">A web developer using inspired creativity<br class="visible-sm" /> to engage an audience.</h2>

				<div class="float-wrapper">
					<div class="nav-bucket" data-ng-click="gotoElement('about-text', $event)" tabindex="30">
						<div class="bucket-title highlight wrapper-inset raleway white-text"><h3 class="raleway">My Story</h3></div>
						<div class="bucket-description wrapper-inset">
							<p class="raleway">I&rsquo;m a fast-learning front-<br class="hide-tp" />end web developer always on the lookout for new ways to solve complex problems.</p>
						</div>
						<div class="bucket-image">
							<img src="/site15/assets/my_story_icon.png" alt="Book" />
						</div>
					</div><!-- End .nav-bucket -->

					<div class="nav-bucket" data-ng-click="gotoElement('what-i-know-section', $event)" tabindex="31">
						<div class="bucket-title highlight wrapper-inset white-text"><h3 class="raleway">What I Know</h3></div>
						<div class="bucket-description wrapper-inset">
							<p class="raleway">Specializing in HTML,<br class="hide-tp" />CSS and JavaScript, but these are just a few things that make up my extensive portfolio.</p>
						</div>
						<div class="bucket-image">
							<img src="/site15/assets/what_i_know_icon.png" alt="My Thoughts" />
						</div>
					</div><!-- End .nav-bucket -->

					<div id="snippet-bucket" class="nav-bucket">
						<a href="https://github.com/jprehoda" tabindex="32">
							<div class="bucket-title highlight wrapper-inset raleway white-text"><h3 class="raleway">What I can do</h3></div>
							<div class="bucket-description wrapper-inset">
								<p class="raleway">Check out some<br class="hide-tp" />examples of my work or view my repository where I keep all of my code snippets.</p>
							</div>
							<div class="bucket-image">
								<img src="/site15/assets/my_work_icon.png" alt="Code Snippets" />
							</div>
						</a>
					</div><!-- End .nav-bucket -->
				</div><!-- End .float-wrapper -->
			</div><!-- End .hero-wrapper -->
		</section><!-- End #hp-hero -->

		<section id="my-story-section">
			<div class="float-wrapper responsive-wrapper wrapper-large">
				<div data-ng-mouseleave="isCircleHovered = !isCircleHovered" data-ng-mouseenter="isCircleHovered = !isCircleHovered" data-ng-class="{'circle-hovered':isCircleHovered}" id="hover-circle" class="section-image float-left">
					<img src="/site15/assets/history_bw.jpg" alt="" role="presentation" />
					<div class="webkit-radius-fix">
						<img src="/site15/assets/history_color.jpg" alt="" role="presentation" />
					</div>
					<div class="my-story-image-description highlight">
						<p class="raleway white-text">Professional Design<br/>on a deadline</p>
					</div>
				</div><!-- End #hover-circle -->
				<div id="about-text" class="section-text float-right">
					<h4 class="raleway white-text">A bit about my experience</h4>
					<p class="raleway white-text">I&rsquo;ve been involved in the graphic design field since the early 2000s and moved over to web development in 2007 at the Naples Daily News. There I was given the chance to wear many hats, among them being web designer and web developer. Working for NDN provided a solid foundation which allowed me to move into a Senior Web Designer role at Sony Electronics. At Sony, I didn't just add to my coding experience, but I also gained knowledge in the business aspects of web design and development. The experience I gained from both Sony and NDN have allowed me to apply those talents today at Chicos as a Front End Developer.</p>
					<p class="raleway white-text">I’m always on the look out for new opportunities that will provide me a chance to learn and expand my talents in web development. <a href="https://www.linkedin.com/in/joe-prehoda-8040a325" tabindex="35">Feel free to check out my LinkedIn profile</a>.</p>
				</div><!-- End .section-text -->
			</div><!-- End .responsive-wrapper -->
		</section><!-- End #my-story-section -->

		<section id="what-i-know-section">
			<div class="float-wrapper responsive-wrapper wrapper-large">
				<div id="skill-text" class="section-text float-left">
					<h4 class="raleway">Languages and Programs I know</h4>
					<p class="raleway">Web Development, HTML, XHTML, HTML5, CSS, CSS3, JavaScript, jQuery, Angular, JSON, AJAX, SOAP, XML, REST, Cross-browser compatibility, Responsive design, Media queries, PHP, Django, .jsp, Git, GitHub, SVN, SEO, ADA compliance, WordPress, Movable Type, Notepad++, Filezilla, YouTube API, Facebook API, Twitter API, Pinterest API, Email creation from scratch, Constant Contact, Wufoo, Survey Monkey, Omniture, Google Analytics, Adobe Photoshop, Adobe Illustrator, Adobe Dreamweaver (No I don’t use the code wizard), Brackets, Jira, Trello, Zendesk, Agile, Scrum.</p>
					<p class="raleway">I’m a pretty fast learner so if you have a proprietary system or something not in the list above, chances are I’ll pick it up pretty quickly. Interested in what you see here? <a href="#" tabindex="36" data-ng-click="showContactForm($event)">Drop me a line and let’s chat</a>.</p>
				</div><!-- End .section-text -->
				<div class="section-image float-right">
					<img src="/site15/assets/past_employment.gif" alt="Tribune Media Services | Naples Daily News | Sony Electronics | Chicos FAS" />
				</div><!-- End #hover-circle -->
			</div><!-- End .responsive-wrapper -->
		</section><!-- End #what-i-know-section -->
	</main>


	<footer class="wrapper_small float-wrapper">
		<p class="float-left raleway white-text">All trademarks belong to their authoritative owners.</p>
		<p class="float-right raleway">
			<a href="#" data-ng-click="showContactForm($event)" tabindex="37">Contact Me</a>
			<span class="footer-divider white-text">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
			<a href="https://www.linkedin.com/in/joe-prehoda-8040a325" tabindex="38">View My LinkedIn profile</a>
		</p>
	</footer>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<script type="text/javascript" src="/site15/assets/min/base.min.js"></script>
	<script type="text/javascript">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-19423886-1', 'auto');
		ga('send', 'pageview');
	</script>
</body>
</html>