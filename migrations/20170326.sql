ALTER TABLE course_enrolled_users DROP FOREIGN KEY FK_60466C7D591CC992;
ALTER TABLE course_enrolled_users DROP FOREIGN KEY FK_60466C7DA76ED395;
ALTER TABLE course_enrolled_users ADD enrollment_date DATETIME DEFAULT NULL, ADD end_date DATETIME DEFAULT NULL, ADD enabled TINYINT(1) DEFAULT '1' NOT NULL, ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL;
ALTER TABLE course_enrolled_users ADD CONSTRAINT FK_60466C7D591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE;
ALTER TABLE course_enrolled_users ADD CONSTRAINT FK_60466C7DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE;

UPDATE course_enrolled_users
INNER JOIN course ON course_enrolled_users.course_id = course.id
SET course_enrolled_users.enrollment_date = course.start_date, course_enrolled_users.end_date = course.end_date;

ALTER TABLE course DROP start_date, DROP end_date;
ALTER TABLE course_lesson DROP start_date;
ALTER TABLE course_lesson ADD offset_in_days INT DEFAULT 0 NOT NULL;
ALTER TABLE course_lesson ADD demo TINYINT(1) DEFAULT '0' NOT NULL;

DELETE FROM course_enrolled_users WHERE user_id = 36;

DELETE FROM course_enrolled_users WHERE user_id = 35 and course_id IN (15, 28, 3, 38);
DELETE FROM course_enrolled_users WHERE user_id = 70 and course_id IN (15);
DELETE FROM course_enrolled_users WHERE user_id = 244 and course_id IN (15);
UPDATE course_enrolled_users SET course_id = 43 WHERE course_id IN (15, 28, 3, 38);
UPDATE instagram SET course_id = 43 WHERE course_id IN (15, 28, 3, 38);
DELETE FROM course WHERE id IN (15, 28, 3, 38);

DELETE FROM course_enrolled_users WHERE user_id = 35 and course_id IN (26, 35, 5, 1);
DELETE FROM course_enrolled_users WHERE user_id = 59 and course_id IN (1);
DELETE FROM course_enrolled_users WHERE user_id = 64 and course_id IN (1);
DELETE FROM course_enrolled_users WHERE user_id = 70 and course_id IN (1, 5);
UPDATE course_enrolled_users SET course_id = 42 WHERE course_id IN (26, 35, 5, 1);
UPDATE instagram SET course_id = 42 WHERE course_id IN (26, 35, 5, 1);
DELETE FROM course WHERE id IN (26, 35, 5, 1);

DELETE FROM course_enrolled_users WHERE user_id = 35 and course_id IN (20, 30, 24);
DELETE FROM course_enrolled_users WHERE user_id = 151 and course_id IN (20, 30, 24);
UPDATE course_enrolled_users SET course_id = 39 WHERE course_id IN (20, 30, 24);
UPDATE instagram SET course_id = 39 WHERE course_id IN (20, 30, 24);
DELETE FROM course WHERE id IN (20, 30, 24);

DELETE FROM course_enrolled_users WHERE user_id = 35 and course_id IN (37, 4, 29, 16);
DELETE FROM course_enrolled_users WHERE user_id = 188 and course_id IN (16);
DELETE FROM course_enrolled_users WHERE user_id = 124 and course_id IN (4);
DELETE FROM course_enrolled_users WHERE user_id = 231 and course_id IN (16);
DELETE FROM course_enrolled_users WHERE user_id = 394 and course_id IN (37);
UPDATE course_enrolled_users SET course_id = 44 WHERE course_id IN (37, 4, 29, 16);
UPDATE instagram SET course_id = 44 WHERE course_id IN (37, 4, 29, 16);
DELETE FROM course WHERE id IN (37, 4, 29, 16);

DELETE FROM course_enrolled_users WHERE user_id = 35 and course_id IN (27, 36, 7, 2);
DELETE FROM course_enrolled_users WHERE user_id = 95 and course_id IN (2);
DELETE FROM course_enrolled_users WHERE user_id = 103 and course_id IN (2);
DELETE FROM course_enrolled_users WHERE user_id = 187 and course_id IN (7);
DELETE FROM course_enrolled_users WHERE user_id = 394 and course_id IN (36);
UPDATE course_enrolled_users SET course_id = 41 WHERE course_id IN (27, 36, 7, 2);
UPDATE instagram SET course_id = 41 WHERE course_id IN (27, 36, 7, 2);
DELETE FROM course WHERE id IN (27, 36, 7, 2);

DELETE FROM course_enrolled_users WHERE user_id = 35 and course_id IN (21, 32, 25);
DELETE FROM course_enrolled_users WHERE user_id = 151 and course_id IN (21, 32, 25);
UPDATE course_enrolled_users SET course_id = 40 WHERE course_id IN (21, 32, 25);
UPDATE instagram SET course_id = 40 WHERE course_id IN (21, 32, 25);
DELETE FROM course WHERE id IN (21, 32, 25);

INSERT INTO course_enrolled_users VALUES (8, 35, '2017-01-01 00:00:00', '2050-12-31 00:00:00', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO course_enrolled_users VALUES (9, 35, '2017-01-01 00:00:00', '2050-12-31 00:00:00', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO course_enrolled_users VALUES (10, 35, '2017-01-01 00:00:00', '2050-12-31 00:00:00', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO course_enrolled_users VALUES (11, 35, '2017-01-01 00:00:00', '2050-12-31 00:00:00', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO course_enrolled_users VALUES (22, 35, '2017-01-01 00:00:00', '2050-12-31 00:00:00', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO course_enrolled_users VALUES (23, 35, '2017-01-01 00:00:00', '2050-12-31 00:00:00', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO course_enrolled_users VALUES (22, 151, '2017-01-01 00:00:00', '2050-12-31 00:00:00', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO course_enrolled_users VALUES (23, 151, '2017-01-01 00:00:00', '2050-12-31 00:00:00', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

UPDATE course_lesson SET demo='1' WHERE id='89';
UPDATE course_lesson SET demo='1' WHERE id='99';
UPDATE course_lesson SET demo='1' WHERE id='108';
UPDATE course_lesson SET demo='1' WHERE id='123';
UPDATE course_lesson SET demo='1' WHERE id='221';
UPDATE course_lesson SET demo='1' WHERE id='232';

UPDATE course_lesson SET offset_in_days='3' WHERE id='382';
UPDATE course_lesson SET offset_in_days='7' WHERE id='383';
UPDATE course_lesson SET offset_in_days='10' WHERE id='384';
UPDATE course_lesson SET offset_in_days='14' WHERE id='385';
UPDATE course_lesson SET offset_in_days='17' WHERE id='386';
UPDATE course_lesson SET offset_in_days='21' WHERE id='387';
UPDATE course_lesson SET offset_in_days='24' WHERE id='388';
UPDATE course_lesson SET offset_in_days='28' WHERE id='389';
UPDATE course_lesson SET offset_in_days='31' WHERE id='390';

UPDATE course_lesson SET offset_in_days='3' WHERE id='393';
UPDATE course_lesson SET offset_in_days='7' WHERE id='394';
UPDATE course_lesson SET offset_in_days='10' WHERE id='395';
UPDATE course_lesson SET offset_in_days='14' WHERE id='396';
UPDATE course_lesson SET offset_in_days='17' WHERE id='397';
UPDATE course_lesson SET offset_in_days='21' WHERE id='398';
UPDATE course_lesson SET offset_in_days='24' WHERE id='399';
UPDATE course_lesson SET offset_in_days='28' WHERE id='400';
UPDATE course_lesson SET offset_in_days='31' WHERE id='401';

UPDATE course_lesson SET offset_in_days='3' WHERE id='404';
UPDATE course_lesson SET offset_in_days='7' WHERE id='405';
UPDATE course_lesson SET offset_in_days='10' WHERE id='406';
UPDATE course_lesson SET offset_in_days='14' WHERE id='407';
UPDATE course_lesson SET offset_in_days='17' WHERE id='408';
UPDATE course_lesson SET offset_in_days='21' WHERE id='409';
UPDATE course_lesson SET offset_in_days='24' WHERE id='410';
UPDATE course_lesson SET offset_in_days='28' WHERE id='411';

UPDATE course_lesson SET offset_in_days='3' WHERE id='414';
UPDATE course_lesson SET offset_in_days='7' WHERE id='415';
UPDATE course_lesson SET offset_in_days='10' WHERE id='416';
UPDATE course_lesson SET offset_in_days='14' WHERE id='417';
UPDATE course_lesson SET offset_in_days='17' WHERE id='418';
UPDATE course_lesson SET offset_in_days='21' WHERE id='419';
UPDATE course_lesson SET offset_in_days='24' WHERE id='420';
UPDATE course_lesson SET offset_in_days='28' WHERE id='421';

UPDATE course_lesson SET offset_in_days='3' WHERE id='424';
UPDATE course_lesson SET offset_in_days='7' WHERE id='425';
UPDATE course_lesson SET offset_in_days='10' WHERE id='426';
UPDATE course_lesson SET offset_in_days='14' WHERE id='427';
UPDATE course_lesson SET offset_in_days='17' WHERE id='428';
UPDATE course_lesson SET offset_in_days='21' WHERE id='429';
UPDATE course_lesson SET offset_in_days='24' WHERE id='430';
UPDATE course_lesson SET offset_in_days='28' WHERE id='431';
UPDATE course_lesson SET offset_in_days='31' WHERE id='432';
UPDATE course_lesson SET offset_in_days='35' WHERE id='433';
UPDATE course_lesson SET offset_in_days='38' WHERE id='434';
UPDATE course_lesson SET offset_in_days='42' WHERE id='435';
UPDATE course_lesson SET offset_in_days='45' WHERE id='436';

UPDATE course_lesson SET offset_in_days='3' WHERE id='439';
UPDATE course_lesson SET offset_in_days='7' WHERE id='440';
UPDATE course_lesson SET offset_in_days='10' WHERE id='441';
UPDATE course_lesson SET offset_in_days='14' WHERE id='442';
UPDATE course_lesson SET offset_in_days='17' WHERE id='443';
UPDATE course_lesson SET offset_in_days='21' WHERE id='444';
UPDATE course_lesson SET offset_in_days='24' WHERE id='445';
UPDATE course_lesson SET offset_in_days='28' WHERE id='446';
UPDATE course_lesson SET offset_in_days='31' WHERE id='447';
UPDATE course_lesson SET offset_in_days='35' WHERE id='448';
UPDATE course_lesson SET offset_in_days='38' WHERE id='449';
UPDATE course_lesson SET offset_in_days='42' WHERE id='450';
UPDATE course_lesson SET offset_in_days='45' WHERE id='451';

UPDATE course SET code='professional-food-styling' WHERE id='39';
UPDATE course SET code='estilismo-culinario-profesional' WHERE id='40';
UPDATE course SET code='composición-percepcion-visual' WHERE id='41';
UPDATE course SET code='composition-and-visual-perception' WHERE id='42';
UPDATE course SET code='food-styling-photography' WHERE id='43';
UPDATE course SET code='estilismo-fotografia-gastronomica' WHERE id='44';
