INSERT INTO users (email, password, role_id, name, surname, titles, chair_id)
VALUES
    ('user1@example.com', 'hashed_password_1', 1, 'John', 'Doe', 'Ph.D.', 1),
    ('user2@example.com', 'hashed_password_2', 2, 'Jane', 'Smith', 'M.Sc.', 2),
    ('user3@example.com', 'hashed_password_3', 1, 'Robert', 'Johnson', 'B.Sc.', 1),
    ('user4@example.com', 'hashed_password_4', 2, 'Sarah', 'Brown', 'M.Sc.', 3),
    ('user5@example.com', 'hashed_password_5', 1, 'Michael', 'Wilson', 'B.Sc.', 2),
    ('user6@example.com', 'hashed_password_6', 2, 'Emily', 'Davis', 'Ph.D.', 4),
    ('user7@example.com', 'hashed_password_7', 1, 'Daniel', 'Miller', 'B.Sc.', 3),
    ('user8@example.com', 'hashed_password_8', 2, 'Olivia', 'Taylor', 'M.Sc.', 2),
    ('user9@example.com', 'hashed_password_9', 1, 'Matthew', 'Anderson', 'B.Sc.', 4),
    ('user10@example.com', 'hashed_password_10', 2, 'Ava', 'Moore', 'Ph.D.', 1);

INSERT INTO roles (role_name)
VALUES
    ('Administrator'),
    ('Editor'),
    ('User'),
    ('Guest'),
    ('Moderator'),
    ('Developer'),
    ('Manager'),
    ('Supervisor'),
    ('Analyst'),
    ('Support');

-- Wypełnij tabelę departments przykładowymi danymi
INSERT INTO departments (name)
VALUES
    ('Human Resources'),
    ('Marketing'),
    ('Finance'),
    ('IT'),
    ('Sales'),
    ('Customer Service'),
    ('Research and Development'),
    ('Legal'),
    ('Operations'),
    ('Management');

INSERT INTO chairs (name, department_id)
VALUES
    ('Chair 1', 1),
    ('Chair 2', 2),
    ('Chair 3', 1),
    ('Chair 4', 3),
    ('Chair 5', 2),
    ('Chair 6', 3),
    ('Chair 7', 4),
    ('Chair 8', 5),
    ('Chair 9', 4),
    ('Chair 10', 5);

-- Wypełnij tabelę sylabus_initialized przykładowymi danymi
INSERT INTO sylabus_initialized (
    code_subject,
    name_subject,
    type_study,
    speciality,
    degree,
    semester,
    chair_id,
    required,
    calculator_for_subjects_to_order,
    status_subject,
    ects_summary,
    total_number_of_hours,
    lectures_number_of_hours,
    seminars_number_of_hours,
    exercise_number_of_hours,
    type_of_exercice,
    direction_name,
    subject_content_id,
    number_of_hours_with_lecturer,
    number_of_hours_of_consultation,
    number_of_hours_participation_in_research,
    number_of_hours_mandatory_practices_and_internships,
    number_of_hours_participations_in_the_exam_and_credits,
    number_of_hours_online_classes,
    number_of_hours_own_work,
    study_profile
)
VALUES
    ('SUBJ001', 'Subject 1', 'Full-Time', 'Computer Science', 'B.Sc.', 'Spring 2023', 1, 'Yes', 5.5, 'Active', 5, 120, 60, 30, 30, 'Lecture', 'Computer Science Department', 1, 40, 10, 20, 30, 20, 10, 20, 'General'),
    ('SUBJ002', 'Subject 2', 'Part-Time', 'Business Administration', 'M.Sc.', 'Fall 2023', 2, 'No', 4.0, 'Active', 4, 90, 40, 20, 30, 'Seminar', 'Business Department', 2, 30, 15, 10, 20, 10, 15, 25, 'Management'),
    ('SUBJ003', 'Subject 3', 'Full-Time', 'Electrical Engineering', 'Ph.D.', 'Summer 2023', 3, 'Yes', 6.0, 'Active', 6, 150, 70, 30, 50, 'Lab', 'Electrical Engineering Department', 3, 60, 20, 25, 35, 10, 30, 40, 'Engineering'),
    ('SUBJ004', 'Subject 4', 'Part-Time', 'Nursing', 'B.Sc.', 'Fall 2023', 4, 'No', 4.5, 'Active', 4, 100, 50, 20, 30, 'Clinical', 'Nursing Department', 4, 40, 15, 10, 25, 10, 15, 20, 'Healthcare'),
    ('SUBJ005', 'Subject 5', 'Full-Time', 'Physics', 'B.Sc.', 'Spring 2023', 1, 'Yes', 5.0, 'Active', 5, 130, 60, 35, 35, 'Lecture', 'Physics Department', 5, 45, 10, 25, 30, 20, 15, 30, 'Science'),
    ('SUBJ006', 'Subject 6', 'Part-Time', 'Psychology', 'M.Sc.', 'Fall 2023', 2, 'No', 4.2, 'Active', 4, 95, 40, 20, 35, 'Seminar', 'Psychology Department', 6, 35, 15, 12, 23, 10, 18, 22, 'Psychology'),
    ('SUBJ007', 'Subject 7', 'Full-Time', 'Chemistry', 'B.Sc.', 'Summer 2023', 3, 'Yes', 5.8, 'Active', 5, 140, 70, 30, 40, 'Lab', 'Chemistry Department', 7, 50, 20, 28, 32, 12, 28, 35, 'Science'),
    ('SUBJ008', 'Subject 8', 'Part-Time', 'History', 'M.Sc.', 'Spring 2023', 4, 'No', 4.3, 'Active', 4, 110, 50, 25, 35, 'Seminar', 'History Department', 8, 30, 10, 15, 20, 10, 20, 20, 'History'),
    ('SUBJ009', 'Subject 9', 'Full-Time', 'Mathematics', 'Ph.D.', 'Fall 2023', 5, 'Yes', 6.5, 'Active', 6, 160, 80, 40, 40, 'Lecture', 'Mathematics Department', 9, 60, 25, 30, 40, 20, 25, 40, 'Science'),
    ('SUBJ010', 'Subject 10', 'Part-Time', 'Sociology', 'B.Sc.', 'Summer 2023', 6, 'No', 4.6, 'Active', 4, 120, 60, 30, 30, 'Seminar', 'Sociology Department', 10, 35, 15, 10, 20, 10, 15, 25, 'Sociology');

INSERT INTO sylabus_suplementary (other_way_of_teaching, form_of_assessment, participation_of_ects_for_number_of_hours_lecturer, participation_of_ects_for_number_of_hours_online, participation_of_ects_for_number_of_hours_own_work, description_of_the_prequesities, language_of_lessons, list_of_primary_literature_to_the_subject, list_of_suplementary_literature_to_the_subject, lecturers_competence_to_teach_the_subject, directional_effects_id, subject_effects_id)
VALUES
    ('Online lectures', 'Final exam', 0.5, 0.3, 0.2, 'None', 'English', 'Book A, Book B', 'Additional Book X, Additional Book Y', 'Highly qualified', 1, 2),
    ('In-person classes', 'Continuous assessment', 0.4, 0.2, 0.4, 'Prerequisite course X', 'Spanish', 'Textbook 1, Textbook 2', 'Supplementary Guide Z', 'Experienced in the field', 2, 3),
    ('Hybrid (online and in-person)', 'Final project', 0.6, 0.4, 0.3, 'Prerequisite course Y', 'French', 'Manual A, Manual B', 'Additional Notes', 'PhD holder', 3, 1),
    ('Online lectures', 'Final exam', 0.5, 0.3, 0.2, 'None', 'English', 'Book A, Book B', 'Additional Book X, Additional Book Y', 'Highly qualified', 1, 2),
    ('In-person classes', 'Continuous assessment', 0.4, 0.2, 0.4, 'Prerequisite course X', 'Spanish', 'Textbook 1, Textbook 2', 'Supplementary Guide Z', 'Experienced in the field', 2, 3),
    ('Hybrid (online and in-person)', 'Final project', 0.6, 0.4, 0.3, 'Prerequisite course Y', 'French', 'Manual A, Manual B', 'Additional Notes', 'PhD holder', 3, 1),
    ('Online lectures', 'Final exam', 0.5, 0.3, 0.2, 'None', 'English', 'Book A, Book B', 'Additional Book X, Additional Book Y', 'Highly qualified', 1, 2),
    ('In-person classes', 'Continuous assessment', 0.4, 0.2, 0.4, 'Prerequisite course X', 'Spanish', 'Textbook 1, Textbook 2', 'Supplementary Guide Z', 'Experienced in the field', 2, 3),
    ('Hybrid (online and in-person)', 'Final project', 0.6, 0.4, 0.3, 'Prerequisite course Y', 'French', 'Manual A, Manual B', 'Additional Notes', 'PhD holder', 3, 1),
    ('Online lectures', 'Final exam', 0.5, 0.3, 0.2, 'None', 'English', 'Book A, Book B', 'Additional Book X, Additional Book Y', 'Highly qualified', 1, 2);

INSERT INTO user_to_sylabus (sylabus_id, user_id) VALUES (1, 1), (1, 2), (1, 3), (2, 4);  