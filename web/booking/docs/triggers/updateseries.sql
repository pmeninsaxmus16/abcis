-- SELECT * FROM abcelgg.sn_users_entity;
use booking_db;
delimiter $$

CREATE FUNCTION `updateseries`(performer char(8), ip varchar(16), bookingid int, dayDelta int, stime time, etime time) RETURNS int(11)
begin
    DECLARE counter INT DEFAULT 0;
    DECLARE eid INT;
    DECLARE eresourceid INT;
    DECLARE equ INT;
    DECLARE eventdate date;
    DECLARE done INT DEFAULT 0;
    DECLARE events CURSOR FOR SELECT id, resource_id,quantity,bdate FROM bookingevents WHERE booking_id = bookingid;
    DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done = 1;
        OPEN events;
        REPEAT
            FETCH events INTO eid,eresourceid,equ,eventdate;
            SET counter = counter + updateevent(performer, ip, eid, eresourceid, equ, date_add(eventdate, interval dayDelta day), stime, etime);
        UNTIL done END REPEAT;
        CLOSE events;
    RETURN counter;
end$$

