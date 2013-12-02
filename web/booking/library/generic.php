<?php
class Generic{
	function getView($conditions = FALSE, $db = FALSE, $offset = FALSE, $limit = FALSE){
		if($db === FALSE)$db = new Booking_DB;
		if( $conditions !== FALSE )$c = $this->SetConditions($conditions);
		else $c = '';
		if($offset !== FALSE && $limit !== FALSE):
			$records = $db->get_results("SELECT * FROM {$this->view_name} {$c} LIMIT {$limit} OFFSET {$offset};");
		else:
			$records = $db->get_results("SELECT * FROM {$this->view_name} {$c};");
		endif;
		return $records;
	}
	
	function SetConditions($args){
		if( !empty($args) ){
			$f = array();
			foreach($this->filter_fields as $filter):
				array_push($f,"$filter LIKE '%$args%'");
			endforeach;	
			$this->filters = "WHERE ".implode(' OR ',$f);
			return $this->filters;
		}
		
		$this->filters = "WHERE ".implode($args['bond'],$args['keys']);
		return $this->filters;
	}
	
	function CountRows($db = FALSE){
		if($db == FALSE)$db = new Booking_DB;
		return $db->get_var("SELECT COUNT(*) FROM {$this->view_name} {$this->filters};");
	}
	
	function Insert($fields = FALSE, $values = FALSE, $db = FALSE){
		if( !$fields || !$values || ( count($fields) != count($values) ) )return FALSE;
		
		if($db == FALSE)$db = new Booking_DB;
		$db->query("INSERT INTO {$this->table_name}(".implode(",",$fields).") values(".implode(",",$values).")");
		return $db->insert_id;
	}
	
	function Pagination($limit = FALSE){
		if( empty($limit) )return '';
		
		$numpag = ceil($this->CountRows()/$limit);
		?>
        <div class="span3">
        	<span class="label label-info">Showing <?php echo ($this->CountRows() > 0)? ((($_POST['page']-1) * $limit) + 1): '0' ?> &ndash; <?php echo ($this->CountRows() < $limit || ((($_POST['page']-1) * $limit) + $limit) > $this->CountRows())? $this->CountRows(): (($_POST['page']-1) * $limit) + $limit?> of <?php echo $this->CountRows()?></span>
        </div>
        <div class="span9">
            <div class="pagination pagination-right">
                <!--<div id="label">Showing <?php echo ((($_POST['page']-1) * $limit) + 1)?> &ndash; <?php echo (($_POST['page']-1) * $limit) + $limit?> of <?php echo $this->CountRows()?></div>-->
                <ul>
                    <li><a href="javascript:void(0)" onclick="prevPage('<?php echo $_POST['page']?>','1')" title="First Page"><i class="icon-chevron-left"></i></a></li>
                    <?php for($i=1; $i<=$numpag; $i++):?>
                        <?php if( $i == $_POST['page'] ) $class = "active"; else $class = "";?>
                        <li class="<?php echo $class?>"><a href="javascript:void(0)" onclick="turnPage('<?php echo $i?>')"><?php echo $i?></a></li>
                    <?php endfor;?>
                    <li><a href="javascript:void(0)" onclick="nextPage('<?php echo $_POST['page']?>','<?php echo $numpag?>')" title="Last Page"><i class="icon-chevron-right"></i></a></li>
                </ul>                
            </div>
        </div>
        <?php
	}
	
	function Delete($id){
		if( !is_numeric($id) )return false;
		$db = new Booking_DB;
		return $db->query("DELETE FROM {$this->table_name} WHERE {$this->primary_key} = {$id}");
	}
}
?>