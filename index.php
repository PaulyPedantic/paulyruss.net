<?php
	include 'scripts/header.php';
?>

		<div class="jumbotron intro section bg-img-section" id="home">
			<h1>My name is Pauly Russ. </h1>
			<p class="lead">I'm a Technical Analyst, and I've built this page to tell you about myself. I enjoy tech, music, and the outdoors. I want to have a positive impact on the world. If you want more than the bullet points, </p>
			<p class="lead"><a href="#contact" class="btn btn-lg btn-success">Let's talk</a></p>
		</div>

		<div class="container section no-img-section" id="skills">
			<h3 class="sectionHead">Skills</h3>
			<div class="row">
				<div class="col-sm-4">
					<div class="text-center skillHead">
						<i class="fa fa-line-chart fa-5x hidden-xs"></i>
						<h4>Business</h4>
					</div>
					<ul class="skillsList">
						<li>Communication, Documentation, and Presentation</li>
						<li>Negotiation and Customer Service</li>
						<li>Continuous Improvement</li>
						<li>SDLC and Agile</li>
					</ul>
				</div>
				<div class="col-sm-4">
					<div class="text-center skillHead">
						<i class="fa fa-code-fork fa-5x hidden-xs"></i>
						<h4>Technical</h4>
					</div>
					<ul class="skillsList">
						<li>HTML, CSS, JavaScript, PHP, Bootstrap, JQuery</li>
						<li>ANSI SQL, Oracle 12g, MySQL, Database Design</li>
						<li>Cherwell, Mingle, iHeat, MS Visio, MS Project</li>
						<li>SSH, Git, Bash, FTP, Character Encoding</li>
					</ul>
				</div>
				<div class="col-sm-4">
					<div class="text-center skillHead">
						<i class="fa fa-users fa-5x hidden-xs"></i>
						<h4>Leadership</h4>
					</div>
					<ul class="skillsList">
						<li>Servant and Horizontal Leadership</li>
						<li>Coaching, Conflict and Change Management</li>
						<li>Strategic Thinking and Decision Quality.</li>
						<li>Self-Awareness and Listening</li>
					</ul>
				</div>
			</div>
		</div>

		<div id="about" class="section bg-img-section">
			<div class="container">
				<h3 class="sectionHead">My Story</h3>
				<p>I was born and raised in Racine, Wisconsin. After high school, I moved a little bit north to Milwaukee for college where I studied Music Composition and Technology at the University of Wisconsin-Milwaukee. During my time there, I became interested
					in and devoted my personal projects and a good chunk of my elective studies to programming, computer music, and digital art. After leaving school, I turned my tech skills into a career path, working full time at Quad/Graphics in List Management. I
					advanced quickly through the levels of my role, and with the guidance of several key mentors, I grew into an Information Technology role as a member of the Analyst team Recently, I returned to UWM enrolled part-time in the School of Information Science,
					and I'm poised to graduate in December 2016 with a Bachelor of Science in Information Science and Technology.</p>
				<p>I'm actively working to learn new things daily, emphasizing skills in business, technology, and leadership. My ultimate goal is to develop into a major influencer in a non-profit or business with a mission to address education, poverty alleviation,
					youth outreach, or medical care accessibility using information technology. To further that goal, I plan to learn independently to fill some of the gaps in my knowledge for a few years before enrolling in a masters program that offers an emphasis in Data Science, Information Systems, or similar areas of study.
				</p>
			</div>
		</div>

		<div class="container section no-img-section" id="work">
			<h3 class="sectionHead">Work Examples</h3>
			<div class="row">
				<div class="col-sm-4">
					<a href="/randomQuoteGen/" target="_blank" alt="random quote generator"><img src="/img/quoteGen.png" class="img-responsive img-circle workItem" id="workItem1" alt="Screen capture of random quote generator"></a>
				</div>
				<div class="col-sm-4">
					<a href="http://paulruss.uwmsois.com/assignment8" target="_blank"  alt="guest book"><img src="/img/guestbook.png" class="img-responsive img-circle workItem" id="workItem2">
				</div>
				<div class="col-sm-4">
					<img src="http://placehold.it/350/222222/ffffff?text=Placeholder+Project+3" class="img-responsive img-circle workItem" id="workItem3">
				</div>
			</div>
		</div>

		<div id="contact" class="bg-img-section section fullHeight">
			<div class="container">
				<h3 class="sectionHead">Contact</h3>
				<p> I like having a contact form as part of the page, and as soon as I migrate the page from <a href="www.github.io" target="_blank" class="inlineLink"> Github Pages </a> to a dedicated host, I can write the server side code to make it actually send an email. For now, I'd love to talk to you through my accounts on Twitter, Github, LinkedIn, or Free Code Camp. You can find me using the buttons below.</p>
				<div class="row">
					<div class="col-md-6 col-md-offset-1">
						<form class="form-horizontal" action="scripts/email-action.php" method="POST">
							<div class="form-group">
								<label for="userEmail" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" name="email" placeholder="Please provide an email address I can reply to." >
								</div>
							</div>
							<div class="form-group">
								<label for="userMessage" class="col-sm-2 control-label">Message</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="userMessage" placeholder="Type a message here if you have a question, comment, or want to work together." rows="5" ></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-lg btn-success" disabled="true">Submit</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-3">
						<a href="https://twitter.com/PaulyPedantic" class="btn btn-lg btn-default btn-block" id="twitter" data-show-count="false"><i class="fa fa-twitter-square" aria-hidden="true" target="_blank"></i> Twitter</a>
						<a href="https://github.com/PaulyPedantic" target="_blank" class="btn btn-lg btn-default btn-block" id="github"><i class="fa fa-github-square" aria-hidden="true"></i> Github</a>
						<a href="https://www.linkedin.com/in/paulyruss" target="_blank" class="btn btn-lg btn-default btn-block" id="linkedIn"><i class="fa fa-linkedin-square" aria-hidden="true"></i> LinkedIn</a>
						<a href="https://www.freecodecamp.com/paulypedantic" target="_blank" class="btn btn-lg btn-default btn-block" id="freeCodeCamp"><i class="fa fa-fire" aria-hidden="true"></i> FreeCodeCamp</a>
					</div>
				</div>
			</div>
		</div>

<?php
include 'scripts/footer.php';
?>
