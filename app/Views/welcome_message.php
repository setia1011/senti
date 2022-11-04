<!doctype html>
<html>
<head>
	<title>senti :)</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;1,300&display=swap" rel="stylesheet">

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
			.content { width: 50%; }
			.sidebar { width: 50%; }
			.info    { width: 100%;   }
		}

		@media only screen and (min-width: 76em) {
			.content { width: 50%; } /* 7/12 */
			.sidebar { width: 50%; } /* 5/12 */
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
			background-color: beige;
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
		.polarity {
			background-color: #00005c;
			color: white;
		}
		.text-id {
			width: 110px;
			text-align: center;
			font-weight: 600;
		}
		.btnx {
			width: 40px;
			background-color: #d6d6e5;
			cursor: pointer;
			box-shadow: 2px 2px blue;
			border-radius: 2px 2px 2px 2px;
			border: 1px solid darkcyan;
		}
		.refresh {
			box-shadow: 2px 2px #41b900 !important;
		}
		.save {
			box-shadow: 2px 2px #dd8615 !important;
		}
		.save img {
			font-size: 1rem;
		}
		.text-status img {
			width: 1.5rem;
    		vertical-align: middle;
		}
		
		.wrapper {
			width: 0px;
			animation: fullView 0.5s forwards linear;
		}

		.br {
			border-radius: 8px;  
		}

		.w80 {
			width: 80%;
		}

		.card-box {
			/* border: 2px solid #fff; */
			/* box-shadow: 0px 0px 10px 0 #a9a9a9; */
			padding: 0;
			/* width: 80%; */
			/* margin: 0px auto; */
			margin-bottom: 2.5em !important;
		}

		.Pic {
			height: 65px;
			width: 65px;
			border-radius: 50%;
		}

		.comment {
			height: 10px;
			background: #777;
			margin-top: 20px;
		}

		.animate {
			animation : shimmer 2s infinite;
			background: linear-gradient(to right,#eff1f3 4%,#e2e2e2 25%,#eff1f3 36%);
			background-size: 1000px 100%;
		}

		@keyframes fullView {
			100% {
				width: 100%;
			}
		}

		@keyframes shimmer {
			0% {
				background-position: -1000px 0;
			}
			100% {
				background-position: 1000px 0;
			}
		}
	</style>

	<!-- general boring stuff and some visual tweaks -->
	<link rel="stylesheet" href="css/screen.css">

</head>
<body>

<div id="app" class="container">

	<!-- <div class="row col">
		<a href="<?= base_url('/'); ?>" style="display: inline-flex;">
			<h1><img src="<?php echo base_url('images/emotions-32.png'); ?>" alt=""></h1>
		</a>
	</div> -->

	<div class="row">
		
		<div class="col content">
			<!-- <h2>A Labeling - Sentiment Analysis Tool</h2> -->
			<!-- <p class="desc">By <a href="https://techack.id/">tecHack</a> and <a href="http://github.com/">check it out on GitHub</a>!</p> -->

			<!-- <p class="intro">Labeling dataset with polarities: <b>Positive</b>, <b>Neutral</b>, <b>Negative</b>, <b>Irrelevant</b>.</p> -->

			<h3>TexID - <input v-model="id" v-on:change="findText" class="text-id" type="text" :value="id"> &nbsp; <span v-if="text_status" class="text-status"><img src="<?= base_url('images/checked.svg'); ?>" alt=""></span></h3>
			<br>
			<div v-show="shimmer" class="col content card-box br">
				<div class="wrapper">
					<div class="Pic animate"></div>
					<div class="comment br animate w80"></div>
					<div class="comment br animate"></div>
					<div class="comment br animate"></div>
				</div>
			</div>
			<div v-if="shimmer == false">
				<p class="the-text">{{ next_text }} -</p> <span v-model="polarity" class="polarity">{{ polarity_text }}</span>
				<br>
				<br>
				<div class="the-options">
					<label>
						<input v-model="polarity_text" type="radio" value="positive"/>
						<span>Positive</span>
					</label>
					<label>
						<input v-model="polarity_text" type="radio" value="neutral"/>
						<span>Neutral</span>
					</label>
					<label>
						<input v-model="polarity_text" type="radio" value="negative"/>
						<span>Negative</span>
					</label>
					<label>
						<input v-model="polarity_text" type="radio" value="irrelevant"/>
						<span>Irrelevant</span>
					</label>
				</div>
			</div>
			<br>
			<div style="float: right;">
				<button class="btnx prev" v-on:click="findText('prev')"><img src="<?= base_url('images/prev.svg'); ?>" alt=""></button>
				<button class="btnx next" v-on:click="findText('next')"><img src="<?= base_url('images/next.svg'); ?>" alt=""></button>
				<button class="btnx refresh" v-on:click="nextText"><img src="<?= base_url('images/refresh.svg'); ?>" alt=""></button>&nbsp;&nbsp;
				
			</div>
			<div style="float: left;">
				<button class="btnx save" v-on:click="saveStatus"><img src="<?= base_url('images/save.svg'); ?>" alt=""></button>
			</div>

			<br>
			<br>
		</div>

		<div class="col sidebar">

			<!-- <h2>Info</h2>
			<p>Labeling dataset with polarities: Positive, Neutral, Negative, Irrelevant.</p> -->
			<!-- <p class="intro">Labeling dataset with polarities: <b>Positive</b>, <b>Neutral</b>, <b>Negative</b>, <b>Irrelevant</b>.</p> -->

			<!-- <div class="row">
				<div class="col feature">
					<h4><img src="<?= base_url('images/project.svg'); ?>" alt=""></h4>
					<p>BBM, Pertalite, Pertamax</p>
				</div>

				<div class="col feature">
					<h4><img src="<?= base_url('images/graph.svg'); ?>" alt=""></h4>
					<p>{{ done }}/{{ total }} (Rp. {{ done * 20 }})</p>
				</div>
			</div> -->

			<p class="social">
				<p class="desc">By <a href="https://techack.id/">TecHackID</a></p>
				<!-- <iframe src="http://ghbtns.com/github-btn.html?user=mourner&amp;repo=dead-simple-grid&amp;type=watch&amp;count=true" width="84" height="20"></iframe>
  				<iframe src="http://ghbtns.com/github-btn.html?user=mourner&amp;repo=dead-simple-grid&amp;type=fork&amp;count=true" width="84" height="20"></iframe> -->
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
