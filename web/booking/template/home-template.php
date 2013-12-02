<?php global $db?>
<style>
#cmb_resource_chzn{width:495px !important;}
#cmb_resource_chzn div{width:493px !important;}
</style>
<script type="text/javascript" src="<?php echo get_site('javascript')?>/home.js"></script>
<div class="row-fluid">
	<br />
	<div class="span4 offset4"><div id="info"></div></div>
</div>
<div class="row-fluid">
	<div class="span2">
		<div id="dp6" data-date="<?php echo date('Y-m-d')?>" data-date-format="yyyy-mm-dd"></div>
		<p><span class="label label-important">Heads up!</span> Choose the resources you want to see in the calendar.</p>
		<div id="resource_picker"></div>
	</div>
    <div class="span10">
    	<div class="span3">
    		<div class="btn-group" style="float:left;">
	    		<button name="btn_today" id="btn_today" class="btn btn-small" onclick="return false;"><strong>Today</strong></button>
	        	<button name="btn_back" id="btn_back" class="btn btn-primary btn-small" onclick="return false;"><i class="icon-chevron-left icon-white"></i>&nbsp;</button>
	            <button name="btn_next" id="btn_next" class="btn btn-primary btn-small" onclick="return false;"><i class="icon-chevron-right icon-white"></i>&nbsp;</button>
	    	</div>
    	</div>
    	<div class="span6" id="calendar_title"></div>
	    <div class="span3">
	    	<div class="btn-group" data-toggle="buttons-radio" style="float:right;">
	        	<button name="btn_month" id="btn_month" class="btn btn-small" onclick="return false;"><strong>Month</strong></button>
	            <button name="btn_week" id="btn_week" class="btn btn-small active" onclick="return false;"><strong>Week</strong></button>
	            <button name="btn_day" id="btn_day" class="btn btn-small" onclick="return false;"><strong>Day</strong></button>
	        </div>
	    </div>
	    <br />
    	<div id="calendar"></div>
    </div>
</div>
<!--
* This area is dedicated to input forms
 -->
<div class="modal fade hide" id="new_booking">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
        <h3>New Booking</h3>
    </div>
    <div class="modal-body">
    	<form id="form_booking">
        	<table id="booking_set" border="0" width="100%" cellpadding="0" cellspacing="0">
            	<tr>
                	<td valign="top">
                    	<label class="control-label" for="subject"><strong>Subject:</strong></label>
                    	<input type="text" class="input-medium" id="subject" name="subject" />
                    </td>
                    <td valign="top">
                    	<label class="control-label" for="cmb_location"><strong>Location:</strong></label>
                    	<div class="controls" id="divlocations">Choose a resource first</div>
                    </td>
                </tr>
                <tr>
                	<td colspan="2" valign="top">
                    	<label class="control-label" for="divresources"><strong>Resource(s)</strong></label>
                    	<div class="controls" id="divresources"></div>
                    </td>
                </tr>
                <tr>
                	<td valign="top">
                    	<label class="control-label" for="repeat"><strong>Repeat this event:</strong></label>
                    	<select class="input-medium" name="repeat" id="repeat">
                        	<option value="weekly">Weekly</option>
                            <option value="daily">Daily</option>
                        </select>
                    </td>
                    <td valign="top">
                    	<div id="divrepeaton">
                            <label class="control-label" for="inlineCheckboxes"><strong>Repeat on:</strong></label>
                            <div class="controls">
                                <label class="checkbox inline">
                                    <input id="sunday" name="weekdays[]" value="1" type="checkbox" title="Sunday" />S
                                </label>
                                <label class="checkbox inline">
                                    <input id="monday" name="weekdays[]" value="2" type="checkbox" title="Monday" />M
                                </label>
                                <label class="checkbox inline">
                                    <input id="tuesday" name="weekdays[]" value="3" type="checkbox" title="Tuesday" />T
                                </label>
                                <label class="checkbox inline">
                                    <input id="wednesday" name="weekdays[]" value="4" type="checkbox" title="Wednesday" />W
                                </label>
                                <label class="checkbox inline">
                                    <input id="thursday" name="weekdays[]" value="5" type="checkbox" title="Thursday" />T
                                </label>
                                <label class="checkbox inline">
                                    <input id="friday" name="weekdays[]" value="6" type="checkbox" title="Friday" />F
                                </label>
                                <label class="checkbox inline">
                                    <input id="saturday" name="weekdays[]" value="7" type="checkbox" title="Saturday" />S
                                </label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                	<td valign="top">
                        <label class="control-label" for="starts_on"><strong>Starts on:</strong></label>
                        <input type="text" class="input-small" value="" name="starts_on" id="starts_on" readonly="readonly" />
                    </td>
                    <td valign="top">
                        <label class="control-label inline" for="endsonops"><strong>Ends on:</strong></label>
                        <div id="endsonops">
                        	<div class="controls">
                                <label class="radio inline">
                                    <input type="radio" checked="checked" value="edate" id="ends_date" name="ends_on">
                                    <label class="control-label" for="enddate">On</label>
                                    <input type="text" class="input-small" value="" name="enddate" id="enddate" readonly="readonly" />
                                </label>
                            <!--</div>
                            <div class="controls">-->
                                <label class="radio inline">
                                    <input type="radio" value="eoccurrences" id="ends_occurrences" name="ends_on" />
                                    <label class="control-label" for="occurrences">After</label>
                                    <input name="occurrences" id="occurrences" class="input-small" placeholder="Occurrences" value="" onkeypress="return intNumber(event,this);" />
                                </label>
                            </div>
                        </div>
                    </td>
                </tr>
       <!--         <tr>
                	<td valign="top">
                    	<label class="control-label" for="start_time"><strong>Start Time</strong>&nbsp;&nbsp;<span class="label label-info">[ Hour : Minute ]</span></label>
                        <input type="time" id="start_time" class="input-small" />
                    </td>
                    <td valign="top">
                   		<label class="control-label" for="end_time"><strong>End Time</strong>&nbsp;&nbsp;<span class="label label-info">[ Hour : Minute ]</span></label>
                        <input type="time" id="end_time" class="input-small" />
                    </td>
                </tr>   -->
		<tr>
                    <td valign="top" colspan=2>
			<table border=0 width="100%" cellpadding="0" cellspacing="0">
			<tr>
			<td valign="top">
                    	<label class="control-label" for="start_time"><strong>Start Time</strong>&nbsp;<span class="label label-info">[ Hour : Minute ]</span></label>
                        <input type="time" id="start_time" class="input-small" />
			<label class="control-label" for="end_time"><strong>End Time</strong>&nbsp;<span class="label label-info">[ Hour : Minute ]</span></label>
                        <input type="time" id="end_time" class="input-small" />
			</td><td valign="top" >
			<label class="control-label" for="comments"><strong>Comments:</strong></label>
			<textarea class="field span3" id="description" rows="3" placeholder="Add your comments here (up to 300 chars)"></textarea>        
			</td>
			</tr>
			</table>
                    </td>
                   
                </tr>

            </table>        
        </form>
    </div>
    <div class="modal-footer">
    	<a href="#" class="btn" data-dismiss="modal">Cancel</a>
        <a href="#" class="btn btn-primary" onclick="checkForm();">Save and Proceed</a>
    </div> 
</div>

<div id="modal_progress" class="modal fade hide">
	<div class="modal-header">
	        <h3>Processing your booking, please wait.</h3>
	</div>
	<div class="progress progress-striped active">
    		<div class="bar" style="width: 100%;"></div>
    	</div>
</div>

<!--  -->
<div class="modal fade hide" id="booking_qu">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
        <h3>Resources</h3>
    </div>
    <div class="modal-body">
    	<div id="booking_quantity"></div>
    </div>
    <div class="modal-footer">
    	<a href="#" class="btn" data-dismiss="modal">Cancel</a>
    	<a href="#" class="btn btn-danger" onclick="$('#booking_qu').modal('hide'); $('#new_booking').modal('show');">Modify</a>
        <a href="#" class="btn btn-primary" onclick="create_booking();">Save booking</a>
    </div> 
</div>
<div id="booking_quantity"></div>
<div id="resourcesdetail" class="modal fade hide">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
        <h3>Booking Details</h3>
    </div>
    <div class="modal-body">
    	<div id="booking_details"></div>
    </div>
    <div class="modal-footer">
    	<input type="hidden" name="bookinginfo" id="bookinginfo" />
    	<input type="hidden" name="bookingseries" id="bookingseries" />
    	<input type="hidden" name="bookingdate" id="bookingdate" />
    	<input type="hidden" name="bookingstarttime" id="bookingstarttime" />
    	<input type="hidden" name="bookingendtime" id="bookingendtime" />
    	<button class="btn btn-small" id="btn-eupdate" onclick="sendUpdate();"><i class="icon-pencil"></i>&nbsp;Update</button>
    	<button class="btn btn-small btn-danger" id="btn-edelete"><i class="icon-remove icon-white"></i>&nbsp;Delete</button>
    	<button class="btn btn-primary btn-small" data-dismiss="modal">Close</button>
    </div>
</div>
