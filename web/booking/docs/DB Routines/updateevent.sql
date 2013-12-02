use booking_db;
delimiter $$
create function updateevent(eventid int, resourceid int, qu int, bookingdate date, stime time, etime time) returns int
begin
    declare i int default 0;
    set i = checkupdate(eventid, resourceid, qu, bookingdate, stime, etime);
    if i = 1 then
        update bookingevents set start_time = stime, end_time = etime, bdate = bookingdate, quantity = qu where id = eventid;
        return row_count();
    else
        return 0;
    end if;
end;
$$