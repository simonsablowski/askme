<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta http-equiv="Content-Language" content="en"/>
		<title><? echo $this->localize('ask.me'); ?></title>
		<link href="<? echo $this->link('web/css/style.css'); ?>" rel="stylesheet" type="text/css" />
		<!--link type="image/x-icon" href="img/favicon.ico" rel="shortcut icon"/-->
		<script type="text/javascript" src="<? echo $this->link('web/js/jquery-1.4.2.min.js'); ?>"></script>
		<script type="text/javascript" src="<? echo $this->link('web/js/ask.me.js'); ?>"></script>
	</head>
	<body>
		<div id="document">
			<div id="head">
				<ul id="menu">
					<li class="item">
<? if ($User->isTemporary()): ?>
						<a href="#signIn" title="<? echo $this->localize('Sign in'); ?>"><? echo $this->localize('Sign in'); ?></a>
<? else: ?>
						<a href="<? echo $this->link('AskMe/signOut'); ?>" title="<? echo $this->localize('Sign out'); ?>"><? echo $this->localize('Sign out'); ?></a>
<? endif; ?>
					</li>
					<li class="item">
						<a href="#addQuestion" title="<? echo $this->localize('Add question'); ?>"><? echo $this->localize('Add question'); ?></a>
					</li>
					<li class="item">
						<a href="#answerQuestion" title="<? echo $this->localize('Answer question'); ?>"><? echo $this->localize('Answer question'); ?></a>
					</li>
					<li class="item">
						<span<? if ($User->isTemporary()): ?> title="<? echo $this->localize('Temporary user name &ndash; to create a user account, hit \'Sign in\'!'); ?>"<? endif; ?>><? echo $User->getName(); ?></span>
					</li>
				</ul>
<? if (isset($message) && !empty($message)): ?>
				<div id="message">
					<? echo $this->localize($message); ?>

				</div>
<? endif; ?>
			</div>
<? if (!is_null($Question)): ?>
			<div id="body">
				<div id="answerQuestion" class="page">
					<h2>
						<? echo $Question->getTitle(); ?>

					</h2>
					<form action="<? echo $this->link('AskMe/answerQuestion/') . $Question->getId(); ?>" method="post">
						<p>
							<textarea name="value"></textarea>
						</p>
						<p>
							<input type="submit" name="submit" value="<? echo $this->localize('Submit'); ?>"/>
						</p>
					</form>
				</div>
				<div id="addQuestion" class="page">
					<h2>
						<? echo $this->localize('Add question'); ?>

					</h2>
					<form action="<? echo $this->link('AskMe/addQuestion'); ?>" method="post">
						<p>
							<input type="text" name="title" value=""/>
						</p>
						<p>
							<input type="submit" name="submit" value="<? echo $this->localize('Submit'); ?>"/>
						</p>
					</form>
				</div>
				<div id="signIn" class="page">
					<h2>
						<? echo $this->localize('Sign in'); ?>

					</h2>
					<form action="<? echo $this->link('AskMe/signIn'); ?>" method="post">
						<p>
							<input type="text" name="name" value=""/>
						</p>
						<p>
							<input type="submit" name="submit" value="<? echo $this->localize('Submit'); ?>"/>
						</p>
					</form>
				</div>
			</div>
<? endif; ?>
		</div>
		<div id="foot">
			<p id="copyright">
				&copy; 2011 <a href="http://www.simsab.net" title="simsab">simsab</a>
			</p>
		</div>
	</body>
</html>