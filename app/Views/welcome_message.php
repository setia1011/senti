<!doctype html>
<html>
<head>
	<title>Senti</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">

	<!-- a grid framework in 250 bytes? are you kidding me?! -->
	<link rel="stylesheet" href="css/grid.css">

	<!-- all the important responsive layout stuff -->
	<style>
		.container { max-width: 90em; }

		/* you only need width to set up columns; all columns are 100%-width by default, so we start
		   from a one-column mobile layout and gradually improve it according to available screen space */

		@media only screen and (min-width: 34em) {
			.feature, .info { width: 50%; }
		}

		@media only screen and (min-width: 54em) {
			.content { width: 66.66%; }
			.sidebar { width: 33.33%; }
			.info    { width: 100%;   }
		}

		@media only screen and (min-width: 76em) {
			.content { width: 58.33%; } /* 7/12 */
			.sidebar { width: 41.66%; } /* 5/12 */
			.info    { width: 50%;    }
		}
	</style>

	<!-- general boring stuff and some visual tweaks -->
	<link rel="stylesheet" href="css/screen.css">

</head>
<body>

<div class="container">

	<div class="row col">
		<h1>Senti</h1>
	</div>

	<div class="row">
		<div class="col content">
			<h2>A Labeling Tool</h2>
			<p class="desc">By <a href="https://techack.id/">TecHack</a> and <a href="http://github.com/">check it out on GitHub</a>!</p>

			<p class="intro">This Labeling is created to make labeling dataset for Sentiment Analysis easier, work on it from anywhere and anytime.</p>

			<h3>Text</h3>

			<p>Cum sociis natoque penatibus et m. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et m. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>

			<input type="text">
		</div>

		<div class="col sidebar">

			<h2>Info</h2>
			<p>Labeling dataset with polarities: Positive, Neutral, Negative, Irrelevant.</p>

			<div class="row">
				<div class="col feature">
					<h4>Project</h4>
					<p>Labeling dataset Twitter</p>
				</div>

				<div class="col feature">
					<h4>Progress</h4>
					<p>100/100000</p>
				</div>
			</div>

			<p class="social">
				<iframe src="http://ghbtns.com/github-btn.html?user=mourner&amp;repo=dead-simple-grid&amp;type=watch&amp;count=true" width="84" height="20"></iframe>
  				<iframe src="http://ghbtns.com/github-btn.html?user=mourner&amp;repo=dead-simple-grid&amp;type=fork&amp;count=true" width="84" height="20"></iframe>
  				<a href="https://twitter.com/share" class="twitter-share-button" data-url="https://github.com/mourner/dead-simple-grid" data-text="Dead Simple Grid — a 250-byte responsive CSS grid framework that is just that. Dead simple." data-related="LeafletJS">Tweet</a>
  			</p>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="http://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	</div>
</div>

</body>
</html>
