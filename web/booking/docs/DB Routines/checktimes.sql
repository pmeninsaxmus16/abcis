use booking_db;
delimiter $$
create function checktimes(resourceid int, qu int, bookingdate date, stime time, etime time) returns int
begin
    declare i int default 0;
    declare j int default 0;
    declare available int default 0;
    -- first check if requested quantity is less than available
    select quantity into j from resource where id = resourceid;
    if j < qu then
        return 0;
    end if;
    -- now check if this resource is booked for the requested date and period
    select ifnull(sum(quantity),0) into i from bookingevents where
    (
        bdate = bookingdate and 
        ( (start_time >= stime and end_time <= etime) or 
          (start_time >= stime and start_time <= etime) or
          (end_time >= stime and end_time <= etime) or
          (start_time < stime and end_time > etime)
        )
    ) and resource_id = resourceid;
    set j = 0;
    select quantity into j from resource where id = resourceid;
    set available = j - i;
    if available >= qu then
        return 1;
    else    
        return 0;-- return no available
    end if;
end;
$$