<?php

namespace App;

/**
 * Base controller
 *
 * @property-read \App\Pixie $pixie Pixie dependency container
 */
abstract class Common extends \PHPixie\Controller {

	protected $view;

	public function before() {
		$this->view = $this->pixie->view('layout');
		$this->view->loggedIn = $this->pixie->session->get("loggedIn", false);

		if ($this->isPrivate() && !$this->view->loggedIn) {
			$this->redirect('/');
		}

	}

	public function after() {
		$this->response->body = $this->view->render();
	}

	public abstract function isPrivate();
}
