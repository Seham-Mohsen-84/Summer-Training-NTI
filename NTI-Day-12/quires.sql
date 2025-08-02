CREATE VIEW course_student_count AS
SELECT c.title AS course_name, COUNT(e.student_id) AS student_count
FROM courses c JOIN enrollments e ON c.id = e.course_id
GROUP BY c.title;


CREATE VIEW students_with_few_courses AS
SELECT s.name AS student_name,COUNT(e.course_id) AS courses_count
FROM students s LEFT JOIN enrollments e ON s.id = e.student_id
GROUP BY s.name
HAVING COUNT(e.course_id) < 1;


CREATE VIEW students_without_courses AS
SELECT s.name AS student_name
FROM students s LEFT JOIN enrollments e ON s.id = e.student_id
WHERE s.id NOT IN ( SELECT student_id FROM enrollments );


CREATE VIEW student_course_count AS
SELECT s.name AS student_name,COUNT(e.course_id) AS courses_count
FROM students s JOIN enrollments e ON s.id = e.student_id
GROUP BY s.name;