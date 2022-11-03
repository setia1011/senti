<!doctype html>
<html>
<head>
	<title>senti :)</title>

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

		label {
			display: flex;
			cursor: pointer;
			font-weight: 500;
			position: relative;
			overflow: hidden;
			margin-bottom: 0.375em;
			/* Accessible outline */
			/* Remove comment to use */
			/*
				&:focus-within {
						outline: .125em solid $primary-color;
				}
		*/
		}
		label input {
			position: absolute;
			left: -9999px;
		}
		label input:checked + span {
			background-color: #d6d6e5;
		}
		label input:checked + span:before {
			box-shadow: inset 0 0 0 0.4375em #00005c;
		}
		label span {
			display: flex;
			align-items: center;
			padding: 0.275em 0.45em 0.275em 0.275em;
			border-radius: 99em;
			transition: 0.25s ease;
		}
		label span:hover {
			background-color: #d6d6e5;
		}
		label span:before {
			display: flex;
			flex-shrink: 0;
			content: "";
			background-color: #fff;
			width: 1.5em;
			height: 1.5em;
			border-radius: 50%;
			margin-right: 0.275em;
			transition: 0.25s ease;
			box-shadow: inset 0 0 0 0.125em #00005c;
		}
		.the-text {
			background-color: #ffe2c6;
			display: inline;
			/* padding: 11px; */
			border-radius: 5px;
			font-size: 1.2rem;
			font-weight: 500;
		}
		.the-options span {
			font-size: 1rem;
		}
		.save {
			cursor: pointer;
		}
		.polarity {
			background-color: #00005c;
			color: white;
		}
	</style>

	<!-- general boring stuff and some visual tweaks -->
	<link rel="stylesheet" href="css/screen.css">

</head>
<body>

<div id="app" class="container">

	<div class="row col">
		<a href="<?= base_url('/'); ?>">
			<h1><img src="<?php echo base_url('images/emotions-32.png'); ?>" alt=""></h1>
		</a>
	</div>

	<div class="row">
		<div class="col content">
			<!-- <h2>A Labeling - Sentiment Analysis Tool</h2> -->
			<p class="desc">By <a href="https://techack.id/">TecHack</a> and <a href="http://github.com/">check it out on GitHub</a>!</p>

			<p class="intro">This Labeling is created to make labeling dataset for Sentiment Analysis easier, work on it from anywhere and anytime.</p>

			<h3>Text - <b>{{ id }}</b></h3>
			<br>
			<p class="the-text">{{ next_text }}</p> - <span class="polarity">{{ polarity }}</span>
			<br>
			<br>
			<div class="the-options">
				<label>
					<input v-model="polarity" type="radio" name="radio" value="positive" checked/>
					<span>Positive</span>
				</label>
				<label>
					<input v-model="polarity" type="radio" name="radio" value="neutral"/>
					<span>Neutral</span>
				</label>
				<label>
					<input v-model="polarity" type="radio" name="radio" value="negative"/>
					<span>Negative</span>
				</label>
				<label>
					<input v-model="polarity" type="radio" name="radio" value="irrelevant"/>
					<span>Irrelevant</span>
				</label>
			</div>
			<br>
			<div>
				<button class="save">Save</button>
			</div>

			<br>
			<br>
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
  			</p>
		</div>
	</div>
</div>

</body>
</html>

<script src="<?= base_url('lib/vue-timepicker/VueTimepicker.umd.js'); ?>"></script>
<script src="<?= base_url('lib/vue/vue.min.js'); ?>"></script>
<script src="<?= base_url('lib/vue-select/vue-select.js') ?>"></script>
<script src="<?= base_url('lib/axios/axios.min.js'); ?>"></script>
<script src="<?= base_url('lib/lodash/lodash.min.js'); ?>"></script>
<script src="<?= base_url('lib/vue-pagination/vue-pagination.min.js'); ?>"></script>
<script src="<?= base_url('js/setia.js'); ?>"></script>
