<?php

namespace App\Controller;

class Home extends \App\Common {

	public function isPrivate() {
		return true;
	}

	public function action_index() {
		$this->view->subview = 'home/index';

		$msg = $this->pixie->session->get("action-message", null);
		if (!empty($msg)) {
			$this->view->infoMessage = $msg;
			$this->pixie->session->remove("action-message");
		}

		$actionList = array();

		$actionList["General"] = array();
		$actionList["General"][] = array("id" => "identification", "label" => "Identification", "image" => "pawn"); 
		$actionList["General"][] = array("id" => "restart", "label" => "Redémarrer", "image" => "reload", "special" => "confirm");
		$actionList["General"][] = array("id" => "update", "label" => "Mise à  jour", "image" => "inbound");
		$actionList["General"][] = array("id" => "usage", "label" => "Ressources", "image" => "graph");
		$actionList["General"][] = array("id" => "log", "label" => "Log", "image" => "copy");
		$actionList["General"][] = array("id" => "log-ssh", "label" => "SSH Log", "image" => "copy");
		$actionList["General"][] = array("id" => "backup", "label" => "Backup", "image" => "disk");
		$actionList["General"][] = array("id" => "virus-check", "label" => "Virus Check", "image" => "pacman");
		$actionList["General"][] = array("id" => "url", "label" => "URL", "image" => "cloud", "special" => "URL");
		
		$actionList["Usagers"] = array();
		$actionList["Usagers"][] = array("id" => "create-user", "label" => "Créer", "image" => "user2", "special" => "Nom,Mot de passe"); 
		$actionList["Usagers"][] = array("id" => "delete-user", "label" => "Supprimer", "image" => "user4", "special" => "Nom"); 
		$actionList["Usagers"][] = array("id" => "list-users", "label" => "Afficher", "image" => "user5"); 
		$actionList["Usagers"][] = array("id" => "lock-user", "label" => "Verrouiller", "image" => "lock", "special" => "Nom"); 
		$actionList["Usagers"][] = array("id" => "unlock-user", "label" => "Déverrouiller", "image" => "unlock", "special" => "Nom"); 
		$actionList["Usagers"][] = array("id" => "update-password", "label" => "Changer MDP", "image" => "key", "special" => "Nom,Mot de passe"); 

		//$actionList["Autres"] = array();
		//$actionList["Autres"][] = array("id" => "special1", "label" => "Spécial #1", "image" => "pacman", "special" => "Répertoire");

		$this->view->actionList = $actionList;

		$currentId = $this->request->param('id');

		if ($this->request->post('id') != null) {
			$currentId = $this->request->post('id');
		}

		if ($currentId != null) {
			chdir("../../Scripts");

			foreach ($actionList as $key => $actions) {
				foreach ($actions as $action) {
					if ($action["id"] == $currentId) {
						$params = "";

						if ($this->request->post('param') != null) {
							$paramList = $this->request->post('param');

							foreach ($paramList as $param) {
								$params .= ' "' . str_replace(" ", "", $param) . '"';
							}
						}

						$msg = shell_exec('sudo ./' . $action["id"] . '.sh ' . trim($params));	
						$this->pixie->session->set("action-message", $msg);
						$this->redirect('/home/index');
						break;
					}
				}
			}
		}
	}
}
