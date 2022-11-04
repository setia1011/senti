<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('css/auth.css'); ?>">
</head>
<body>
<div id="app" class="container">
	<!-- code here -->
	<div class="card">
		<div class="card-image">	
			<h2 class="card-heading">
				Login
				<small>User you credentials account</small>
			</h2>
		</div>
		<div class="card-form">
			<div class="input">
				<input type="text" v-model="username" class="input-field" required/>
				<label class="input-label">Username</label>
			</div>
			<div class="input">
				<input type="password" v-model="password" class="input-field" required/>
				<label class="input-label">Password</label>
			</div>
			<div class="action">
				<button v-on:click="auth" class="action-button"  style="cursor: pointer;">Let's Go!</button>
			</div>
        </div>
		<div class="card-info">
			<p>By signing up you are agreeing to our <a href="#">Terms and Conditions</a></p>
		</div>
	</div>
</div>

</body>
</html>

<script src="<?= base_url('lib/vue/vue.min.js'); ?>"></script>
<script src="<?= base_url('lib/axios/axios.min.js'); ?>"></script>
<script src="<?= base_url('lib/lodash/lodash.min.js'); ?>"></script>
<script src="<?= base_url('js/auth.js'); ?>"></script>