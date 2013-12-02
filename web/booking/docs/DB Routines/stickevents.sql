use booking_db;
/*delimiter $$
create function stickevents(bookingid int) returns varchar(200)
begin
    declare a varchar(200);
    declare i int default 0;
    declare done int default false;
    DECLARE events CURSOR FOR SELECT id FROM bookingevents WHERE booking_id = bookingid;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
    
    OPEN events;
        read_loop: LOOP
            FETCH events INTO i;
            IF done THEN
                LEAVE read_loop;
            END IF;
            set a = concat_ws(':',a,cast(i as char));
        END LOOP;
    CLOSE events;
    return a;
end$$;*/
-- select stickevents(57);