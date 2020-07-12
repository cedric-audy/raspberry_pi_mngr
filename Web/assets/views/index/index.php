
<div class="page-index">
	<h1>Bienvenue au gestionnaire de serveurs CVManager</h1>
	<p>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</p>

	<div class="signin">
		<button id="triggerSignIn">Authentification</button>
	</div>

	<script>
		$("#triggerSignIn").leanModal({overlay : 1, closeButton: ".close-overlay"});
	</script>
</div>


<div id="lean_overlay">
	<div class="overlay-container">
		<a class="close-overlay" href="javascript:void(0)">x</a>
		<h2>Authentification</h2>

		<div class="padded">
			<form action="/" method="post">
				<div class="form-label">Nom d'usager :</div>
				<div class="form-input"><input type="text" name="username" /></div>
				<div class="form-separator"></div>

				<div class="form-label">Mot de passe :</div>
				<div class="form-input"><input type="password" name="password" /></div>
				<div class="form-separator"></div>

				<div class="form-label">&nbsp;</div>
				<div class="form-input"><button>Entrer</button></div>
				<div class="form-separator"></div>
			</form>
		</div>
	</div>	
</div>