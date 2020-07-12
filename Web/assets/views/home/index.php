
<div class="page-home">
	<?php
		foreach ($actionList as $actionType => $typeActions) {
			?>
			<h1><?= $actionType ?></h1>
			<ul>
				<?php  
					foreach ($typeActions as $action) {
						?>
						<li>				
							<?php 
								if (!empty($action["special"])) {
									if ($action["special"] == "confirm") {
										?>
										<a href="javascript:void(0)" onclick="confirmBox('/home/index/<?= $action["id"] ?>')" class="confirmBtn">
										<?php
									}
									else {
										$specialArray = explode(",", $action["special"]);
										$labelParams = "";

										foreach ($specialArray as $label) {
											$labelParams .= "'" .$label ."',";
										}

										$labelParams = substr($labelParams, 0, -1);

										?>
										<a href="javascript:void(0)" onclick="prompt1('<?= $action["id"] ?>', <?= $labelParams ?>)" class="confirmBtn">
										<?php
									}
								}
								else {
									?>
									<a href="/home/index/<?= $action["id"] ?>">
									<?php
								}
							?>
								<img src="/images/icons/outline-<?= $action["image"] ?>.png" alt="<?= $action["label"] ?>" />
								<?= $action["label"] ?>
							</a>		
						</li>
						<?php
					}
				?>
				
				<li></li>
			</ul>
			<?php
		}
	?>
</div>

<div id="lean_overlay">
	<div class="overlay-container">
		<div id="confirm-box">
			<a class="close-overlay" href="javascript:void(0)">x</a>
			<h2>Confirmer?</h2>

			<div class="padded">
				<div class="form-label" style="text-align:left"><button onclick="confirmValidated()">Oui</button></div>
				<div class="form-input"><button class="close-overlay">Non</button></div>
				<div class="form-separator"></div>
			</div>
		</div>
		<div id="prompt-box-1">
			<a class="close-overlay" href="javascript:void(0)">x</a>
			<h2>Information</h2>

			<div class="padded">
				<form action="/home/index" method="post">
					<input type="hidden" name="id" id="prompt-action" value="" />
					<div id="form-question-1">
						<div class="form-label"><span id="prompt-1-label"></span></div>
						<div class="form-input"><input type="text" name="param[]" /></div>
						<div class="form-separator"></div>
					</div>

					<div id="form-question-2">
						<div class="form-label"><span id="prompt-2-label"></span></div>
						<div class="form-input"><input type="text" name="param[]" /></div>
						<div class="form-separator"></div>
					</div>

					<div id="form-question-3">
						<div class="form-label"><span id="prompt-3-label"></span></div>
						<div class="form-input"><input type="text" name="param[]" /></div>
						<div class="form-separator"></div>
					</div>

					<div id="form-question-4">
						<div class="form-label"><span id="prompt-4-label"></span></div>
						<div class="form-input"><input type="text" name="param[]" /></div>
						<div class="form-separator"></div>
					</div>

					<div class="form-label">&nbsp;</div>
					<div class="form-input"><button>Valider</button></div>
					<div class="form-separator"></div>
				</form>
			</div>
		</div>
	</div>	
</div>

<script>
	var relocateTo = null;

	function hideAll() {
		$("#confirm-box").css("display", "none");
		$("#prompt-box-1").css("display", "none");
	}

	function confirmBox(loc) {
		hideAll();
		relocateTo = loc;

		$("#confirm-box").css("display", "block");
	}
	
	function updateFormQuestion(position, label) {
		if (typeof label == "undefined") {
			$("#form-question-" + position).css("display", "none");
		}
		else {
			$("#form-question-" + position).css("display", "block");	
			$("#prompt-" + position + "-label").html(label);
			
			if (label == "Mot de passe") {
				$("#form-question-" + position + " input").get(0).setAttribute('type', 'password');
			}
			else {
				$("#form-question-" + position + " input").get(0).setAttribute('type', 'text');
			}
		}
	}

	function prompt1(action, label, label2, label3,  label4) {
		hideAll();

		$(".form-input input[type=password]").val("");
		$(".form-input input[type=text]").val("");
		$("#prompt-action").val(action);
		
		updateFormQuestion(1, label);
		updateFormQuestion(2, label2);
		updateFormQuestion(3, label3);
		updateFormQuestion(4, label4);
		
		$("#prompt-box-1").css("display", "block");
	}

	function confirmValidated() {
		window.location.href = relocateTo;
	}

	$(".confirmBtn").leanModal({overlay : 1, closeButton: ".close-overlay"});
</script>
