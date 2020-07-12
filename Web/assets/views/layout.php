<!DOCTYPE html>
<html>
	<head>
		<title>CVManager</title>
		<meta charset="utf-8"/>
		<link rel="icon" href="/images/icon.ico" />
		<script src="/js/jquery-2.1.0.min.js"></script>
		<script src="/js/jquery.leanModal.min.js"></script>
		<link rel="stylesheet/less" href="/css/global.less" />
		<script src="/js/less.js"></script>
	</head>
	<body>
		<header class="band">
					<nav>
						<ul>
							<?php
								if ($loggedIn) {
									?>
											<li><a href="/index/logout">Déconnexion</a></li>
									<?php
								}
							?>
						</ul>
					</nav>
			
			<h5><a href="/">CVManager</a></h5>
			<div class="clear"></div>
		</header>
		
		<div class="main-section">
			<div class="container">
				<?php
					if (!empty($errorMessage)) {
						?>
						<div class="error-message"><?= $errorMessage ?></div>
						<?php
					}
					else if (!empty($successMessage)) {
						?>
						<div class="success-message"><?= $successMessage ?></div>
						<?php
					}
					else if (!empty($warningMessage)) {
						?>
						<div class="warning-message"><?= $warningMessage ?></div>
						<?php
					}
					else if (!empty($infoMessage)) {
						?>
						<div class="info-message"><?= $infoMessage ?></div>
						<?php
					}
				?>
				<?php include($subview.'.php');?>	
			</div>	
		</div>
		
		<footer class="band footer">
			<nav>
				<ul>
					<li><a href="/index/about">À propos de</a></li>
				</ul>
			</nav>

			Développé par Frédéric Thériault
		</footer>
	</body>
</html>