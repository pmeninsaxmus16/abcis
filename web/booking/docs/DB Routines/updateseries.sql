use booking_db;
delimiter $$
create function updateseries(updateall int, eventid int, booking_id int, bookingdate date, stime time, etime time) returns int
begin
    declare response int default 0;
    if updateall = 0 then
        -- modify just a simple event.
        response = updateevent(eventid, resourceid int, qu int, bookingdate date, stime time, etime time) 
    else
    
    end if;
end;
$$