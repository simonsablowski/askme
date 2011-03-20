<?php

class AskMeController extends Controller {
	protected $MessageHandler = NULL;
	protected $User = NULL;
	
	public function link($path = NULL) {
		return $this->getConfiguration('basePath') . $path;
	}
	
	protected function redirect($path = NULL) {
		header('Location: ' . $this->link($path));
	}
	
	protected function displayView($view, $variables = array()) {
		$variables = array_merge(array(
			'message' => $this->getMessageHandler()->getMessage(),
			'User' => $this->getUser()
		), $variables);
		parent::displayView($view, $variables);
	}
	
	protected function setupMessageHandler() {
		$this->setMessageHandler(new MessageHandler);
		$this->getMessageHandler()->setSession($this->getSession());
	}
	
	protected function getMessageHandler() {
		if (is_null($this->MessageHandler)) $this->setupMessageHandler();
		return $this->MessageHandler;
	}
	
	protected function setupUser() {
		if ($User = $this->getSession()->getData('User')) {
			return $this->setUser($User);
		} else {
			return $this->setUser(new TemporaryUser);
		}
	}
	
	protected function getUser() {
		if (is_null($this->User)) $this->setupUser();
		return $this->User;
	}
	
	public function index() {
		$this->displayView('AskMe.index.php', array(
			'Question' => pos(Question::findAll(NULL, array('rand'), 1))
		));
	}
	
	public function answerQuestion($QuestionId) {
		$value = $this->getRequest()->getData('value');
		if (!empty($value)) {
			$Question = Question::find($QuestionId);
			$QuestionAnswer = new QuestionAnswer(array(
				'QuestionId' => $Question->getId(),
				'UserId' => $this->getUser()->getId(),
				'value' => $value
			));
			$QuestionAnswer->create();
			$this->getMessageHandler()->setMessage('The question was answered successfully.');
		}
		return $this->redirect();
	}
	
	public function addQuestion() {
		$title = $this->getRequest()->getData('title');
		if (!empty($title)) {
			$Question = new Question(array(
				'title' => $title
			));
			$Question->create();
			$this->getMessageHandler()->setMessage('The question was created successfully.');
		}
		return $this->redirect();
	}
	
	public function signIn() {
		$name = $this->getRequest()->getData('name');
		if (!empty($name)) {
			try {
				$User = User::findByName($name);
			} catch (Error $Error) {
				$User = new User(array(
					'name' => $name
				));
				$User->create();
				$User = User::findByName($name);
				$this->getMessageHandler()->setMessage('The user account was created successfully.');
			}
			$this->getSession()->setData('User', $User);
		}
		return $this->redirect();
	}
	
	public function signOut() {
		$this->getSession()->setData('User', NULL);
		return $this->redirect();
	}
}