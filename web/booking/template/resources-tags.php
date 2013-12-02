<?php
//template name: Template for resources
?>
<?php
global $limit;
$r = new Resource;
$page = $_POST['page'];
if( empty($page) || $page == 1 ):
	$offset = 0;
else:
	$offset = (($page-1) * $limit);
endif;
?>
<style>
#slider { margin: 10px; }
#resource_quantity{width:210px !important;}
.ui-slider-handle{background-color:#000;}
</style>
<div class="row-fluid">
	<div class="span12">
    	<div id="info"></div>
    </div>
</div>
<div class="row-fluid">
	<div class="span6">
    	<button name="btn_new" id="btn_new" class="btn btn-primary" onclick="addResource();"><i class="icon-pencil icon-white"></i> New Resource</button>
    	<button name="btn_print" id="btn_print" class="btn btn-primary"><i class="icon-print icon-white"></i> Print</button>
        <button name="btn_print" id="btn_print" class="btn btn-primary"><i class="icon-th icon-white"></i> Export to CSV</button>
        <button name="btn_trash" id="btn_trash" class="btn btn-danger" onclick="addActions('resource.php','Resource','delete');"><i class="icon-trash icon-white"></i> Delete</button>
    </div>
    <div class="span6" style="text-align:right;">
    	<input type="text" name="search_keyword" id="search_keyword" class="search-query" value="<?php echo $_POST['keyword']?>" placeholder="Type a keyword for your search..." />
        <button class="btn btn-primary" onclick="performSearch('#search_keyword')"><i class="icon-search icon-white"></i> Search</button>
        <button class="btn btn-danger" onclick="clearSearch()"><i class="icon-refresh icon-white"></i> Reset</button>
    </div>
</div>
<div class="row-fluid">
	<div class="span12">
    	<hr />
    </div>
</div>
<div class="row-fluid">
	<div class="span12">
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                <th width="8%" colspan="2" align="center">*</th>
                <th>#</th>
                <th>Resource</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Must be booked before</th>
                </tr>
            </thead>
            <tbody>
				<?php $record = $offset + 1;?>
                <?php $filters = ( !empty($_POST['keyword']) )? $_POST['keyword']: FALSE;?>
                <?php foreach($r->getView( $filters , FALSE, $offset, $limit) as $rs):?>
                <tr id="tr<?php echo $rs->resource_id?>">
                	<td><input type="checkbox" name="item[]" id="item<?php echo $record?>" value="<?php echo $rs->resource_id?>" /></td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
                            Options
                            <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)" onclick="edit('<?php echo $rs->resource_id?>','<?php echo $rs->resource_name?>','<?php echo $rs->resource_quantity?>','<?php echo $rs->category_id?>','<?php echo substr($rs->resource_timeleft,0,5)?>','<?php echo $rs->timetable_id?>');"><i class="icon-edit"></i> Edit</a></li>
                                <li><a href="javascript:void(0)" onclick="confirmDelete('resource.php','Resource','delete','<?php echo $rs->resource_id?>')"><i class="icon-trash"></i> Delete</a></li>
                                <li class="divider"></li>
                                <li><a href="javascript:void(0)"><i class="icon-user"></i> Administrators</a></li>
                                <li><a href="javascript:void(0)" onclick="addLocations('<?php echo $rs->resource_id?>');"><i class="icon-globe"></i> Locations</a></li>
                            </ul>
                        </div>
                    </td>
                    <td><?php echo $record?></td>
                    <td><?php echo $rs->resource_name?></td>
                    <td><?php echo $rs->resource_quantity?></td>
                    <td><?php echo $rs->category_name?></td>
                    <td><?php echo $rs->resource_timeleft?></td>
                </tr>
                <?php $record++;?>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<div class="row-fluid">
    <?php $r->Pagination($limit)?>
</div>
<!--
* This area is dedicated to input forms
 -->
<div class="modal fade hide" id="new_resource">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
        <h3>New Resource</h3>
    </div>
    <div class="modal-body">
    	<form class="well form-horizontal">
        	<input type="hidden" name="resource_id" id="resource_id" value="0" />
        	<fieldset>
            	<div class="control-group" id="divname">
                	<label class="control-label" for="resource_name">Name</label>
                    <div class="controls">
                    	<input type="text" class="input-large" id="resource_name" name="resource_name" />
                    </div>
                </div>
                <div class="control-group" id="divcategory">
                	<label class="control-label" for="resource_category">Category</label>
                    <div class="controls" id="category_select"></div>
                </div>
                <div class="control-group" id="divquantity">
                	<label class="control-label" for="resource_quantity">Quantity</label>
                    <div class="controls">
                    	<div id="resource_quantity"></div>
                        <p class="help-block" id="quantity-label">1</p>
                    </div>
                </div>
                <div class="control-group" id="divtime">
                	<label class="control-label" for="resource_time">Time Restriction</label>
                    <div class="controls">
                    	<input type="text" class="input-large" id="resource_time" name="resource_time" readonly="readonly" value="00:00" />
                        <p class="help-block">Set an interval of time for this resource to be booked before its use. To pick it up just click on the time box.</p>
                    </div>
                </div>
                <div class="control-group" id="divtimetable">
                	<label class="control-label" for="cmb_timetable">Timetable</label>
                    <div class="controls" id="timetables"></div>
                </div>
            </fieldset>	
        </form>
    </div>
    <div class="modal-footer">
    	<a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary" onclick="checkForm();">Save changes</a>
    </div> 
</div>
<!-- 
**********************************************************************************************************************************************************************************
-->
<div class="modal fade hide" id="locations">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
        <h3>Locations</h3>
    </div>
    <div class="modal-body" style="height:320px;">
    	<form class="well form-horizontal">
        	<input type="hidden" name="resourceid" id="resourceid" value="0" />
        	<fieldset>
            	<div class="control-group" id="divname">
                	<label class="control-label" for="cmb_room">Locations</label>
                    <div class="controls" id="divroom"></div>
                </div>
            </fieldset>	
        </form>
    </div>
    <div class="modal-footer">
    	<a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary" onclick="processLocations();">Save changes</a>
    </div> 
</div>
<!-- 
**********************************************************************************************************************************************************************************
-->
<!-- 
**********************************************************************************************************************************************************************************
-->
<div class="modal fade hide" id="administrators">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
        <h3>Administrators</h3>
    </div>
    <div class="modal-body" style="height:320px;">
    	<form class="well form-horizontal">
        	<input type="hidden" name="resourceid" id="resourceid" value="0" />
        	<fieldset>
            	<div class="control-group" id="divname">
                	<label class="control-label" for="cmb_room">Administrator(s)</label>
                    <div class="controls" id="divroom"></div>
                </div>
            </fieldset>	
        </form>
    </div>
    <div class="modal-footer">
    	<a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary" onclick="processLocations();">Save changes</a>
    </div> 
</div>
<!-- 
**********************************************************************************************************************************************************************************
-->
<script type="text/javascript">
$(document).ready(function(){
	$("#search_keyword").focus();
	loadAction({action:'resource_categories'},'#category_select');
	loadAction({action:'get_timetables'},'#timetables');
	//loadAction('get_locations','#divroom');
	$("#resource_quantity").slider({ 
		min: 1,
		max: 100,
		slide: function(event,ui){
			$('#quantity-label').html(ui.value);
		}
	});
	$('#resource_time').timepicker({stepMinute: 10});
	$("#search_keyword").keypress(function(event) {
		if ( event.which == 13 ) {
			performSearch('#search_keyword');
		}
	});
	//$(".chzn-select").chosen(); 
	//$(".chzn-select-deselect").chosen({allow_single_deselect:true});
});
function checkForm(){
	var message = '';
	if($('#resource_name').val() == ''){
		alert('Please make sure that you have typed a name for the resource.');
		$('#resource_name').focus();
		return;
	}
	if($('#cmb_category').val() == -1){
		alert('Please make sure that you have chosen a valid category for the resource.');
		$('#cmb_category').focus();
		return;
	}
	if($('#cmb_timetable').val() == -1){
		alert('Please make sure that you have chosen a valid timetable for the resource.');
		$('#cmb_timetable').focus();
		return;
	}
	//alert($('#quantity-label').text());
	add_edit_resource($('#resource_id').val(),$('#resource_name').val(),$('#cmb_category').val(),$('#quantity-label').text(),$('#resource_time').val()+':00',$('#cmb_timetable').val());
}
function edit(id,nm,qu,cid,tbb,tid){
	$('#resource_id').val(id);
	$('#resource_name').val(nm);
	$('#quantity-label').text(qu);
	$("#resource_quantity").slider('value',qu);
	$('#cmb_category').val(cid);
	$('#resource_time').val(tbb);
	$('#cmb_timetable').val(tid);
	$('#new_resource').modal('show');
}
function addResource(){
	$('#resource_id').val('0');
	$('#resource_name').val('');
	$('#quantity-label').text('1');
	$("#resource_quantity").slider('value',1);
	$('#cmb_category').val('-1');
	$('#resource_time').val('00:00');
	$('#cmb_timetable').val('-1');
	$('#new_resource').modal('show');
}
function addLocations(rsid){
	$.ajax({
		url: ajax_url+'/functions.php',
		type: 'POST',
		data: {action: 'get_locations', resource: rsid, multiple: 'multiple'},
		context: document.body,
		statusCode: {
			404: function() {
			  $('#info').html('<div class="alert alert-error fade in"><button class="close" data-dismiss="alert">&times;</button><p>This action could not be performed.</p></div>');
			  $(".alert").alert();
			  return false;
			}
		},
		success: function(data) {
			$('#divroom').html(data);
			$(".chzn-select").chosen();
			$('#locations').modal('show');
			$('#resourceid').val(rsid);
		}
	});
}
function processLocations(){
	if($('#cmb_room').val() == '')return false;
	
	add_edit_locations($('#cmb_room').val(),$('#resourceid').val());
	//alert($('#cmb_room').val());
}
</script>