use booking_db;
delimiter $$
create function getnextday(bookingdate date, dayofw int, skip int) returns date
begin
    declare fdate date default curdate();
    
    case dayofw
        when 1 then -- sunday
            SELECT DATE_ADD(bookingdate, INTERVAL ((8 + (7*skip)) - IF(DAYOFWEEK(bookingdate)=1, (8 - 1), DAYOFWEEK(bookingdate))) DAY) INTO fdate;
        when 2 then -- monday
            SELECT DATE_ADD(bookingdate, INTERVAL ((2 + (7*skip)) - IF(DAYOFWEEK(bookingdate)=1, (2 - 1), DAYOFWEEK(bookingdate))) DAY) INTO fdate;
        when 3 then -- tuesday
            SELECT DATE_ADD(bookingdate, INTERVAL ((3 + (7*skip)) - IF(DAYOFWEEK(bookingdate)=1, (3 - 1), DAYOFWEEK(bookingdate))) DAY) INTO fdate;
        when 4 then -- wednesday
            SELECT DATE_ADD(bookingdate, INTERVAL ((4 + (7*skip)) - IF(DAYOFWEEK(bookingdate)=1, (4 - 1), DAYOFWEEK(bookingdate))) DAY) INTO fdate;
        when 5 then -- thursday
            SELECT DATE_ADD(bookingdate, INTERVAL ((5 + (7*skip)) - IF(DAYOFWEEK(bookingdate)=1, (5 - 1), DAYOFWEEK(bookingdate))) DAY) INTO fdate;
        when 6 then -- friday
            SELECT DATE_ADD(bookingdate, INTERVAL ((6 + (7*skip)) - IF(DAYOFWEEK(bookingdate)=1, (6 - 1), DAYOFWEEK(bookingdate))) DAY) INTO fdate;
        when 7 then -- saturday
            SELECT DATE_ADD(bookingdate, INTERVAL ((7 + (7*skip)) - IF(DAYOFWEEK(bookingdate)=1, (7 - 1), DAYOFWEEK(bookingdate))) DAY) INTO fdate;
    end case;
    return fdate;
end;
$$