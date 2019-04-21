ALTER TABLE `events` CHANGE `start_time` `start_time` DATETIME NULL DEFAULT NULL;
ALTER TABLE `events` CHANGE `end_time` `end_time` DATETIME NULL DEFAULT NULL;

UPDATE events SET start_time = "2019-11-05 14:30:00" WHERE event_id = "1";
UPDATE events SET start_time = "2018-04-01 09:00:00" WHERE event_id = "2";
UPDATE events SET start_time = "2019-05-15 12:30:00" WHERE event_id = "3";
UPDATE events SET start_time = "2019-08-13 15:00:00" WHERE event_id = "4";
UPDATE events SET start_time = "2019-04-30 11:00:00" WHERE event_id = "5";
UPDATE events SET start_time = "2019-11-25 10:45:00" WHERE event_id = "6";
UPDATE events SET start_time = "2019-09-16 18:00:00" WHERE event_id = "7";
UPDATE events SET start_time = "2019-04-21 10:30:00" WHERE event_id = "8";
UPDATE events SET start_time = "2019-05-17 20:15:00" WHERE event_id = "9";
UPDATE events SET start_time = "2019-06-12 16:30:00" WHERE event_id = "10";


UPDATE events SET end_time = "2019-11-05 16:00:00" WHERE event_id = "1";
UPDATE events SET end_time = "2018-04-01 10:00:00" WHERE event_id = "2";
UPDATE events SET end_time = "2019-05-15 13:45:00" WHERE event_id = "3";
UPDATE events SET end_time = "2019-08-13 16:15:00" WHERE event_id = "4";
UPDATE events SET end_time = "2019-04-30 11:45:00" WHERE event_id = "5";
UPDATE events SET end_time = "2019-11-25 11:45:00" WHERE event_id = "6";
UPDATE events SET end_time = "2019-09-16 19:30:00" WHERE event_id = "7";
UPDATE events SET end_time = "2019-04-21 16:00:00" WHERE event_id = "8";
UPDATE events SET end_time = "2019-05-17 21:30:00" WHERE event_id = "9";
UPDATE events SET end_time = "2019-06-12 17:15:00" WHERE event_id = "10";