use booking_db;
delimiter //
create function 
    add_resource(i int(11), nm varchar(85),cid int(11),qu int(11),tbb time,tid int(11)) 
    returns int(11)
    begin
    declare pid int(11);
    
    select count(*) into pid from resource where id = i;
    if pid > 0 then
        -- perform and update
        update resource set name = nm, category_id = cid, quantity = qu, time_before_booking = tbb, timetable_id = tid where id = i;
        set pid = i;
    else
        -- perform an insert
        insert into resource(name,category_id,quantity,time_before_booking,is_active,created_date,timetable_id) values(nm,cid,qu,tbb,'t',now(),tid);
        select last_insert_id() into pid;
    end if;
    return pid;
    end;
// delimiter;