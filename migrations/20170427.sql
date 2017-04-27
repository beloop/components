UPDATE course_enrolled_users SET end_date = DATE_ADD(end_date, INTERVAL 6 MONTH);
UPDATE user SET email = LOWER(email);
