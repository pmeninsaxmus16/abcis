USE booking_db;
delimiter $$
create function createseriesevent(repeats varchar(6), repeaton int, startson date, endsoc int, endson date, bookingid int, resourceid int, qu int, stime time, etime time) returns int
begin
    declare i int default 0;
    declare j int default 0;
	declare k int default 0;
    declare enddate date;
    declare available int default 0;
    declare bookingdate date;
    -- validate parameters
	/* valid booking id */
    select count(*) into i from bookingheader where id = bookingid;
	if i = 0 then
		return 0;
	end if;
	/* valid resource id */
	select count(*) into j from resource where id = resourceid;
	if j = 0 then
		return 0;
	end if;
    -- first set events for daily series
	set j = 0;
	set i = 0;
	set k = 0;
    if repeats = 'daily' then
		if endsoc = -1 then -- IF NO NUMBER OF OCCURRENCES BUT DATE
			set enddate = endson;
			set bookingdate = date_add(startson, interval i day);
			while bookingdate <= enddate do
				set available = checktimes(resourceid,qu,bookingdate,stime,etime); 
				if available = 1 then
					set j = j+ 1;
					INSERT INTO `bookingevents`(`booking_id`,`resource_id`,`quantity`,`start_time`,`end_time`,`bdate`) VALUES(bookingid,resourceid,qu,stime,etime,bookingdate);
				end if;
				set i = i + 1;
				set bookingdate = date_add(startson, interval i day);
		   end while;
		else -- IF NUMBER OF OCCURRENCES IS SET
			set bookingdate = startson;
			set i = 0;
			while i < endsoc do
				set available = checktimes(resourceid,qu,bookingdate,stime,etime); 
				if available = 1 then
					set j = j+ 1;
					INSERT INTO `bookingevents`(`booking_id`,`resource_id`,`quantity`,`start_time`,`end_time`,`bdate`) VALUES(bookingid,resourceid,qu,stime,etime,bookingdate);
				end if;
				set i = i + 1;
				set bookingdate = date_add(startson, interval i day);
			end while;    
		end if;
    else -- weekly repeats
    	if repeaton = -1 then -- IF NO DAY IS PICKED
			if endsoc = -1 then -- IF NO NUMBER OF OCCURRENCES BUT DATE
				set i = 0;
				set enddate = endson;
				set bookingdate = date_add(startson, interval i day);
				while bookingdate <= enddate do
					set available = checktimes(resourceid,qu,bookingdate,stime,etime); 
					if available = 1 then
						set j = j+ 1;
						INSERT INTO `bookingevents`(`booking_id`,`resource_id`,`quantity`,`start_time`,`end_time`,`bdate`) VALUES(bookingid,resourceid,qu,stime,etime,bookingdate);
					end if;
					set i = i + 7;
					set bookingdate = date_add(startson, interval i day);
			   end while;
			else -- IF NUMBER OF OCCURRENCES IS SET
				set bookingdate = startson;
				set k = 1;
				while k <= endsoc do
					set available = checktimes(resourceid,qu,bookingdate,stime,etime); 
					if available = 1 then
						set j = j+ 1;
						INSERT INTO `bookingevents`(`booking_id`,`resource_id`,`quantity`,`start_time`,`end_time`,`bdate`) VALUES(bookingid,resourceid,qu,stime,etime,bookingdate);
					end if;
					set i = i + 7; -- counter for weeks
					set k = k + 1; -- counter for iterations
					set bookingdate = date_add(startson, interval i day);
				end while;    
			end if;	-- END DATE / OCCURRENCES
		else -- IF DAY WAS PICKED
			if endsoc = -1 then -- IF NO NUMBER OF OCCURRENCES BUT DATE
				set i = 0;
				set enddate = endson;
				set bookingdate = getnextday(startson, repeaton, i);
				while bookingdate <= enddate do
					set available = checktimes(resourceid,qu,bookingdate,stime,etime); 
					if available = 1 then
						set j = j+ 1;
						INSERT INTO `bookingevents`(`booking_id`,`resource_id`,`quantity`,`start_time`,`end_time`,`bdate`) VALUES(bookingid,resourceid,qu,stime,etime,bookingdate);
					end if;
					set i = i + 1;
					set bookingdate = getnextday(startson, repeaton, i);
			   end while;
			else -- IF NUMBER OF OCCURRENCES IS SET
				set bookingdate = startson;
				set k = 1;
				set i = 0;
				set bookingdate = getnextday(startson, repeaton, i);
				while k <= endsoc do
					set available = checktimes(resourceid,qu,bookingdate,stime,etime); 
					if available = 1 then
						set j = j+ 1;
						INSERT INTO `bookingevents`(`booking_id`,`resource_id`,`quantity`,`start_time`,`end_time`,`bdate`) VALUES(bookingid,resourceid,qu,stime,etime,bookingdate);
					end if;
					set i = i + 1; -- counter for weeks
					set k = k + 1; -- counter for iterations
					set bookingdate = getnextday(startson, repeaton, i);
				end while;    
			end if;	-- END DATE / OCCURRENCES
		end if; -- END NO DAY PICKED
    end if;
	return j;
end;
$$