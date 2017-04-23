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
