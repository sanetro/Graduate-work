# Users
INSERT INTO users (email, password, role, id_teacher) VALUES ('council@qwerty.edu.pl', 'council', 'council', 4);
INSERT INTO users (email, password, role, id_teacher) VALUES ('guest@qwerty.edu.pl', 'guest', 'guest', 3);
INSERT INTO users (email, password, role, id_teacher) VALUES ('department@qwerty.edu.pl', 'department', 'user', 2);
INSERT INTO users (email, password, role, id_teacher) VALUES ('jan.kowalski@qwerty.edu.pl', 'Kowalski', 'user', 1);
INSERT INTO users (email, password, role, id_teacher) VALUES ('bartek.santiego@qwerty.edu.pl', 'santiego', 'user', 5);

# Teachers
INSERT INTO teachers (name, surname, titles, chair, department, university) 
VALUES ('Jan', 'Kowalski', 'inż.', 'Informatyka Stosowana', 'Technologie Komputerowe', 'Uniwersytet Nieznanego Miasta Zwykły');
INSERT INTO teachers (name, surname, titles, chair, department, university) 
VALUES ('Marek', 'Kwiat', 'dr inż.', 'Informatyka Stosowana', 'Technologie Komputerowe', 'Uniwersytet Nieznanego Miasta Zwykły');
INSERT INTO teachers (name, surname, titles, chair, department, university) 
VALUES ('Anna', 'Annowna', 'dr inż.', 'Medycyna współczesna', 'Medycyna', 'Uniwersytet Nieznanego Miasta Zwykły');
INSERT INTO teachers (name, surname, titles, chair, department, university) 
VALUES ('Katarzyna', 'Katarzyńska', 'dr hab. ', 'Medycyna współczesna', 'Medycyna', 'Uniwersytet Nieznanego Miasta Zwykły');
INSERT INTO teachers (name, surname, titles, chair, department, university) 
VALUES ('Bartek', 'Santiego', 'inż. ', 'Informatyka stosowana', 'Technologie Komputerowe', 'Uniwersytet Nieznanego Miasta Zwykły');


# Subjects
INSERT INTO subjects (code, name_subject, coordinator, teacher, type_study, speciality, bachelor_degree, semester, department, chair, required, lgo_p, subject_status, ects, lgo, lgw, lgs, lgc, type_of_exercice, pfpz, f_zal, e_lgwyk, e_pw, ects_sg, ects_tl, ects_ts, lg_wyk, lg_k, lg_uwb, lg_ops, lg_uez, lg_online, lg_pw, pr_st, wy_wst, j_wyk, sp_ww, sp_wc, sp_ws, lit_podst, lit_uzup, kdpp) 
VALUES ("12.45.W1.A", "Structure menagement", "prof. dr hab. inż. Jan Niekowalski", "prof. dr. hab. inż. Jan Niekowalski", "stacjonarne", "magisterskie", "2", "4", "Uniwersytet w Europie", "Inżynieria nauk stosowanych", "tak", 2.43, "subject_status", 9.0, 1.0, 2.0, 2.0, 2.0, "type_of_exercice", "pfpz", 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, "pr_st", "wy_wst", "j_wyk", "sp_ww", "sp_wc", "sp_ws", "lit_podst", "lit_uzup", 2.0);
INSERT INTO subjects (code, name_subject, coordinator, teacher, type_study, speciality, bachelor_degree, semester, department, chair, required, lgo_p, subject_status, ects, lgo, lgw, lgs, lgc, type_of_exercice, pfpz, f_zal, e_lgwyk, e_pw, ects_sg, ects_tl, ects_ts, lg_wyk, lg_k, lg_uwb, lg_ops, lg_uez, lg_online, lg_pw, pr_st, wy_wst, j_wyk, sp_ww, sp_wc, sp_ws, lit_podst, lit_uzup, kdpp) 
VALUES ("54.25.A1.B", "Structure menagement", "prof. dr hab. inż. Jan Niekowalski", "prof. dr. hab. inż. Jan Niekowalski", "stacjonarne", "magisterskie", "2", "4", "Uniwersytet w Europie", "Inżynieria nauk stosowanych", "tak", 2.43, "subject_status", 9.0, 1.0, 2.0, 2.0, 2.0, "type_of_exercice", "pfpz", 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, "pr_st", "wy_wst", "j_wyk", "sp_ww", "sp_wc", "sp_ws", "lit_podst", "lit_uzup", 2.0);
INSERT INTO subjects (code, name_subject, coordinator, teacher, type_study, speciality, bachelor_degree, semester, department, chair, required, lgo_p, subject_status, ects, lgo, lgw, lgs, lgc, type_of_exercice, pfpz, f_zal, e_lgwyk, e_pw, ects_sg, ects_tl, ects_ts, lg_wyk, lg_k, lg_uwb, lg_ops, lg_uez, lg_online, lg_pw, pr_st, wy_wst, j_wyk, sp_ww, sp_wc, sp_ws, lit_podst, lit_uzup, kdpp) 
VALUES ("126.64.2f.a", "Structure menagement", "prof. dr hab. inż. Jan Niekowalski", "prof. dr. hab. inż. Jan Niekowalski", "stacjonarne", "magisterskie", "2", "4", "Uniwersytet w Europie", "Inżynieria nauk stosowanych", "tak", 2.43, "subject_status", 9.0, 1.0, 2.0, 2.0, 2.0, "type_of_exercice", "pfpz", 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, "pr_st", "wy_wst", "j_wyk", "sp_ww", "sp_wc", "sp_ws", "lit_podst", "lit_uzup", 2.0);
INSERT INTO subjects (code, name_subject, coordinator, teacher, type_study, speciality, bachelor_degree, semester, department, chair, required, lgo_p, subject_status, ects, lgo, lgw, lgs, lgc, type_of_exercice, pfpz, f_zal, e_lgwyk, e_pw, ects_sg, ects_tl, ects_ts, lg_wyk, lg_k, lg_uwb, lg_ops, lg_uez, lg_online, lg_pw, pr_st, wy_wst, j_wyk, sp_ww, sp_wc, sp_ws, lit_podst, lit_uzup, kdpp) 
VALUES ("54.3.6.6.W1.A", "Structure menagement", "prof. dr hab. inż. Jan Niekowalski", "prof. dr. hab. inż. Jan Niekowalski", "stacjonarne", "magisterskie", "2", "4", "Uniwersytet w Europie", "Inżynieria nauk stosowanych", "tak", 2.43, "subject_status", 9.0, 1.0, 2.0, 2.0, 2.0, "type_of_exercice", "pfpz", 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, "pr_st", "wy_wst", "j_wyk", "sp_ww", "sp_wc", "sp_ws", "lit_podst", "lit_uzup", 2.0);
INSERT INTO subjects (code, name_subject, coordinator, teacher, type_study, speciality, bachelor_degree, semester, department, chair, required, lgo_p, subject_status, ects, lgo, lgw, lgs, lgc, type_of_exercice, pfpz, f_zal, e_lgwyk, e_pw, ects_sg, ects_tl, ects_ts, lg_wyk, lg_k, lg_uwb, lg_ops, lg_uez, lg_online, lg_pw, pr_st, wy_wst, j_wyk, sp_ww, sp_wc, sp_ws, lit_podst, lit_uzup, kdpp) 
VALUES ("12.FF.a.g.A", "Structure menagement", "prof. dr hab. inż. Jan Niekowalski", "prof. dr. hab. inż. Jan Niekowalski", "stacjonarne", "magisterskie", "2", "4", "Uniwersytet w Europie", "Inżynieria nauk stosowanych", "tak", 2.43, "subject_status", 9.0, 1.0, 2.0, 2.0, 2.0, "type_of_exercice", "pfpz", 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, 2.0, "pr_st", "wy_wst", "j_wyk", "sp_ww", "sp_wc", "sp_ws", "lit_podst", "lit_uzup", 2.0);


INSERT INTO roles (role_name) VALUES ("test role 1");
INSERT INTO roles (role_name) VALUES ("test role 2");
INSERT INTO roles (role_name) VALUES ("test role 3");

INSERT INTO teachers (name, surname, titles) VALUES ('Jan', 'Kowalski', 'prof.');
INSERT INTO teachers (name, surname, titles) VALUES ('NieJan', 'JanKowalski', 'Nie prof.');


INSERT INTO users (email, password, role_id, teacher_id) VALUES ('test@qwerty.edu.pl', 'test', 1, 1);
INSERT INTO users (email, password, role_id, teacher_id) VALUES ('nietest@qwerty.edu.pl', 'nietest', 1, 2);
