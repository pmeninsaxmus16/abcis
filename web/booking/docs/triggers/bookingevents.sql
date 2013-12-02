use booking_db;
-- drop trigger record_new_event;
DELIMITER |

CREATE TRIGGER record_new_event AFTER INSERT ON bookingevents
  FOR EACH ROW BEGIN
    DECLARE eventowner varchar(8);
    DECLARE eventip varchar(16);
    SELECT owner INTO eventowner FROM view_booking WHERE event_id = NEW.id;
    SELECT ip INTO eventip FROM view_booking WHERE event_id = NEW.id;
    INSERT INTO notification(resource_id,quantity,booking_id,event_id,performer,activity_type,ip) 
        values(NEW.resource_id,NEW.quantity,NEW.booking_id,NEW.id,eventowner,'new',eventip);
  END
|

DELIMITER ;