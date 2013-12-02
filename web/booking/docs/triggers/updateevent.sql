use booking_db;
-- select checkupdate(191, 53, 1, '2012-07-27', '11:50:00', '14:00:00');
-- drop function checktimes;
-- select date_add(curdate(), interval 1 day);
-- drop function checktimes;
/*select ifnull(sum(quantity),0) as numero from bookingevents where
    (
        bdate = '2012-07-11' and 
        ( (start_time >= '10:00:00' and end_time <= '12:00:00') or 
          (start_time >= '10:00:00' and start_time <= '12:00:00') or
          (end_time >= '10:00:00' and end_time <= '12:00:00') or
          (start_time < '10:00:00' and end_time > '12:00:00')
        )
    ) and resource_id = 5 and id != 100;*/
    delimiter $$

CREATE FUNCTION `updateevent`(performer char(8), ip varchar(16), eventid int, resourceid int, qu int, bookingdate date, stime time, etime time) RETURNS int(11)
begin
    declare i int default 0;
    DECLARE bookingid int default 0;
    set i = checkupdate(eventid, resourceid, qu, bookingdate, stime, etime);
    if i = 1 then
        UPDATE bookingevents SET start_time = stime, end_time = etime, bdate = bookingdate, quantity = qu WHERE id = eventid;
        SELECT booking_id INTO bookingid FROM view_booking WHERE event_id = eventid;
        INSERT INTO notification(resource_id,quantity,booking_id,event_id,performer,activity_type,ip) 
        values(resourceid,qu,bookingid,eventid,performer,'update',ip);
        return row_count();
    else
        return 0;
    end if;
end$$

