#4.4 Опис програмної реалізації
SQL-скрипт для створення бази даних:
CREATE DATABASE railway_station;
USE railway_station;
SQL-скрипти для створення таблиць:
#1.Маршрути:
CREATE TABLE Маршрути (	
Номер_маршруту MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
Пункт_відправлення VARCHAR(120),
	Пункт_призначення VARCHAR(120),
		PRIMARY KEY (Номер_маршруту));
	
#2.Потяги:
CREATE TABLE Потяги (
Номер_потягу MEDIUMINT UNSIGNED NOT NULL,
                     Кількість_вагонів INTEGER(8) ,
                     Тип_потягу VARCHAR(50) ,
                     PRIMARY KEY (Номер_потягу));
#3.Дні відправлення: 
CREATE TABLE Дні_відправлення (
id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
                     Номер_потягу MEDIUMINT UNSIGNED ,
                     Номер_маршруту MEDIUMINT UNSIGNED ,
                     День_відправлення DATE ,
		Час_відправлення DATETIME ,
Час_прибуття DATETIME ,
Тривалість_маршруту TIME ,
Перелік_зупинок INTEGER (8),
		     FOREIGN KEY (Номер_потягу) REFERENCES Потяги (Номер_потягу),
		     FOREIGN KEY (Номер_маршруту) REFERENCES Маршрути (Номер_маршруту),
                     PRIMARY KEY (id));
#4.Вагони:
CREATE TABLE Вагони (
id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
Номер_вагону MEDIUMINT UNSIGNED,
Номер_потягу MEDIUMINT UNSIGNED,
Тип_вагону VARCHAR (50),
Кількість_місць INTEGER(8),
FOREIGN KEY (Номер_потягу) REFERENCES Потяги (Номер_потягу),
PRIMARY KEY (id));
#5.Місця:
CREATE TABLE Місця (
id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	        Номер_місця MEDIUMINT UNSIGNED, 
Номер_потягу MEDIUMINT UNSIGNED,
Номер_вагону MEDIUMINT UNSIGNED,
Статус_Місця ENUM('Заброньовано','Вільне'),
FOREIGN KEY (Номер_потягу) REFERENCES Потяги (Номер_потягу),
PRIMARY KEY (id));
#6.Пасажири:
CREATE TABLE Пасажири (
id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	Прізвище_пасажира VARCHAR(50),
	Імя_пасажира VARCHAR(50),
	          Номер_телефону_пасажира VARCHAR (30),
Наявність_пільги ENUM(‘Так’, ‘Ні’),
	PRIMARY KEY (id));
#7.Квитки:
CREATE TABLE Квитки (
Номер_квитка MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
Номер_маршруту MEDIUMINT UNSIGNED,
День_відправлення DATE, 	          	
Номер_місця MEDIUMINT UNSIGNED, 
Номер_потягу MEDIUMINT UNSIGNED,
Номер_вагону MEDIUMINT UNSIGNED,
Прізвище_пасажира VARCHAR(50),
	Імя_пасажира VARCHAR(50),
Наявність_пільги ENUM('Так', 'Ні'),
Ціна FLOAT,
FOREIGN KEY (Номер_маршруту) REFERENCES Маршрути (Номер_маршруту),
FOREIGN KEY (Номер_потягу) REFERENCES Потяги (Номер_потягу),


	PRIMARY KEY (Номер_квитка));

#SQL-скрипти для внесення тестових даних:
##1.Маршрути:
INSERT INTO Маршрути(Пункт_відправлення,Пункт_призначення) VALUES('Львів', 'Київ');
INSERT INTO Маршрути(Пункт_відправлення,Пункт_призначення) VALUES('Львів', 'Рівне');
INSERT INTO Маршрути(Пункт_відправлення,Пункт_призначення) VALUES('Ужгород', 'Ковель');
INSERT INTO Маршрути(Пункт_відправлення,Пункт_призначення) VALUES('Харків', 'Ужгород');
INSERT INTO Маршрути(Пункт_відправлення,Пункт_призначення) VALUES('Львів', 'Здолбунів');

#2.Потяги:
INSERT INTO Потяги VALUES(806, 3, 'Рейковий автобус');
INSERT INTO Потяги VALUES(815, 2, 'ІнтерСіті');
INSERT INTO Потяги VALUES(804, 3, 'Пасажирський');
INSERT INTO Потяги VALUES(819, 2, 'Електричка');
INSERT INTO Потяги VALUES(8048, 1, 'Туристичний');

#3.Дні відправлення: 

INSERT INTO Дні_відправлення (Номер_потягу, Номер_маршруту, День_відправлення, Час_відправлення, Час_прибуття, Тривалість_маршруту, Перелік_зупинок) VALUES(804, 4, '2023-05-22', '2023-05-22 18:30:00', '2023-05-23 05:30:00', '09:00:00', 8);
INSERT INTO Дні_відправлення  (Номер_потягу, Номер_маршруту, День_відправлення, Час_відправлення, Час_прибуття, Тривалість_маршруту, Перелік_зупинок ) VALUES(806, 2, '2023-05-21', '2023-05-21 06:45:00', '2023-05-21 09:36:00', '02:45:00', 6 );
INSERT INTO Дні_відправлення  (Номер_потягу, Номер_маршруту, День_відправлення, Час_відправлення, Час_прибуття, Тривалість_маршруту, Перелік_зупинок ) VALUES(815, 1, '2023-05-24', '2023-05-24 06:00:00', '2023-05-21 10:30:00', '04:30:00', 4 );
INSERT INTO Дні_відправлення  (Номер_потягу, Номер_маршруту, День_відправлення, Час_відправлення, Час_прибуття, Тривалість_маршруту, Перелік_зупинок ) VALUES(819, 5, '2023-05-23', '2023-05-23 17:30:00', '2023-05-21 20:05:00', '02:35:00', 3 );
INSERT INTO Дні_відправлення  (Номер_потягу, Номер_маршруту, День_відправлення, Час_відправлення, Час_прибуття, Тривалість_маршруту, Перелік_зупинок ) VALUES(8048, 3, '2023-05-25', '2023-05-25 02:30:00', '2023-05-21 09:15:00', '06:45:00', 7 );

#4.Вагони:
INSERT INTO Вагони(Номер_вагону, Номер_потягу, Тип_вагону, Кількість_місць) VALUES(1, 806, 'Плацкарт', 8);
INSERT INTO Вагони(Номер_вагону, Номер_потягу, Тип_вагону, Кількість_місць) VALUES(2, 806, 'Плацкарт', 7);
INSERT INTO Вагони(Номер_вагону, Номер_потягу, Тип_вагону, Кількість_місць) VALUES(3, 806, 'Плацкарт', 7);
INSERT INTO Вагони(Номер_вагону, Номер_потягу, Тип_вагону, Кількість_місць) VALUES(1, 815, 'Плацкарт преміум', 6);
INSERT INTO Вагони(Номер_вагону, Номер_потягу, Тип_вагону, Кількість_місць) VALUES(2, 815, 'Плацкарт преміум', 6);
INSERT INTO Вагони(Номер_вагону, Номер_потягу, Тип_вагону, Кількість_місць) VALUES(1, 8048, 'Купе', 4);
INSERT INTO Вагони(Номер_вагону, Номер_потягу, Тип_вагону, Кількість_місць) VALUES(1, 819, 'Люкс', 8);
INSERT INTO Вагони(Номер_вагону, Номер_потягу, Тип_вагону, Кількість_місць) VALUES(2, 819, 'Люкс', 8);
INSERT INTO Вагони(Номер_вагону, Номер_потягу, Тип_вагону, Кількість_місць) VALUES(1, 804, 'Плацкарт', 8);
INSERT INTO Вагони(Номер_вагону, Номер_потягу, Тип_вагону, Кількість_місць) VALUES(2, 804, 'Плацкарт', 7);
INSERT INTO Вагони(Номер_вагону, Номер_потягу, Тип_вагону, Кількість_місць) VALUES(3, 804, 'Плацкарт', 7);

#5.Місця:
# 806 потяг 1 вагон
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця ) VALUES(1, 806, 1, 'Заброньовано');
INSERT INTO Місця (Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(1, 806, 2, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу,  Номер_місця,  Статус_місця) VALUES(1, 806, 3, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(1, 806, 4, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця) VALUES (1, 806, 5, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (1, 806, 6, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (1, 806, 7, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця ) VALUES (1, 806, 8, 'Вільне');

# 806 потяг 2 вагон
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця ) VALUES(2, 806, 1, 'Вільне');
INSERT INTO Місця (Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(2, 806, 2, 'Заброньовано');
INSERT INTO Місця(Номер_вагону, Номер_потягу,  Номер_місця,  Статус_місця) VALUES(2, 806, 3, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(2, 806, 4, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця) VALUES (2, 806, 5, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (2, 806, 6, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (2, 806, 7, 'Вільне');

# 806 потяг 3 вагон
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця ) VALUES(3, 806, 1, 'Вільне');
INSERT INTO Місця (Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(3, 806, 2, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу,  Номер_місця,  Статус_місця) VALUES(3, 806, 3, 'Заброньовано');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(3, 806, 4, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця) VALUES (3, 806, 5, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (3, 806, 6, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (3, 806, 7, 'Вільне');




# 815 потяг 1 вагон
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця ) VALUES(1, 815, 1, 'Заброньовано');
INSERT INTO Місця (Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(1, 815, 2, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу,  Номер_місця,  Статус_місця) VALUES(1, 815, 3, 'Заброньовано');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(1, 815, 4, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця) VALUES (1, 815, 5, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (1, 815, 6, 'Вільне');

# 815 потяг 2 вагон
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця ) VALUES(2, 815, 1, 'Вільне');
INSERT INTO Місця (Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(2, 815, 2, 'Заброньовано');
INSERT INTO Місця(Номер_вагону, Номер_потягу,  Номер_місця,  Статус_місця) VALUES(2, 815, 3, 'Заброньовано');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(2, 815, 4, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця) VALUES (2, 815, 5, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (2, 815, 6, 'Вільне');

# 8048 потяг 1 вагон
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця ) VALUES(1, 8048, 1, 'Вільне');
INSERT INTO Місця (Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(1, 8048, 2, 'Заброньовано');
INSERT INTO Місця(Номер_вагону, Номер_потягу,  Номер_місця,  Статус_місця) VALUES(1, 8048, 3, 'Заброньовано');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(1, 8048, 4, 'Вільне');

# 819  потяг 1 вагон
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця ) VALUES(1, 819, 1, 'Заброньовано');
INSERT INTO Місця (Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(1, 819, 2, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу,  Номер_місця,  Статус_місця) VALUES(1, 819, 3, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(1, 819, 4, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця) VALUES (1, 819, 5, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (1, 819, 6, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (1, 819, 7, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця ) VALUES (1, 819, 8, 'Вільне');

# 819  потяг 2 вагон
INSERT INTO Місця (Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця ) VALUES(2, 819, 1, 'Вільне');
INSERT INTO Місця (Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(2, 819, 2, 'Заброньовано');
INSERT INTO Місця(Номер_вагону, Номер_потягу,  Номер_місця,  Статус_місця) VALUES(2, 819, 3, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(2, 819, 4, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця) VALUES (2, 819, 5, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (2, 819, 6, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (2, 819, 7, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця ) VALUES (2, 819, 8, 'Вільне');

# 804 потяг 1 вагон
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця ) VALUES(1, 804, 1, 'Заброньовано');
INSERT INTO Місця (Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(1, 804, 2, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу,  Номер_місця,  Статус_місця) VALUES(1, 804, 3, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(1, 804, 4, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця) VALUES (1, 804, 5, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (1, 804, 6, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (1, 804, 7, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця ) VALUES (1, 804, 8, 'Вільне');

# 804 потяг 2 вагон
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця ) VALUES(2, 804, 1, 'Вільне');
INSERT INTO Місця (Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(2, 804, 2, 'Заброньовано');
INSERT INTO Місця(Номер_вагону, Номер_потягу,  Номер_місця,  Статус_місця) VALUES(2, 804, 3, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(2, 804, 4, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця) VALUES (2, 804, 5, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (2, 804, 6, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (2, 804, 7, 'Вільне');

# 804 потяг 3 вагон
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця ) VALUES(3, 804, 1, 'Вільне');
INSERT INTO Місця (Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(3, 804, 2, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу,  Номер_місця,  Статус_місця) VALUES(3, 804, 3, 'Заброньовано');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES(3, 804, 4, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця,  Статус_місця) VALUES (3, 804, 5, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (3, 804, 6, 'Вільне');
INSERT INTO Місця(Номер_вагону, Номер_потягу, Номер_місця, Статус_місця) VALUES (3, 804, 7, 'Вільне');




#6.Пасажири:
INSERT INTO Пасажири(Прізвище_пасажира, Імя_пасажира, Номер_телефону_пасажира, Наявність_пільги) VALUES('Висоцький', 'Сергій',  '+380*********', 'Так');
INSERT INTO Пасажири(Прізвище_пасажира, Імя_пасажира, Номер_телефону_пасажира, Наявність_пільги) VALUES('Висоцька', 'Дарина',  '+380*********', 'Ні');
INSERT INTO Пасажири(Прізвище_пасажира, Імя_пасажира, Номер_телефону_пасажира, Наявність_пільги) VALUES('Сорока', 'Соломія',  '+380*********', 'Так');
INSERT INTO Пасажири(Прізвище_пасажира, Імя_пасажира, Номер_телефону_пасажира, Наявність_пільги) VALUES('Швець', 'Анастасія',  '+380*********', 'Так');
INSERT INTO Пасажири(Прізвище_пасажира, Імя_пасажира, Номер_телефону_пасажира, Наявність_пільги) VALUES('Кос', 'Ігор',  '+380*********', 'Ні');

#7.Квитки

INSERT INTO Квитки (Номер_маршруту, День_відправлення, Номер_потягу, Номер_місця,  Номер_вагону, Прізвище_пасажира, Імя_пасажира, Наявність_пільги, Ціна)VALUES
(2, '2023-05-21',  806, 1, 1, 'Висоцький ', 'Сергій', 'Так', 50.00),
(1, '2023-05-22', 815, 2,  2, 'Кос ', 'Ігор', 'Ні', 75.00),
(2, '2023-05-21', 806, 3,  3, 'Висоцька', 'Дарина', 'Ні', 60.00),
(4, '2023-05-22', 804, 2,  2, 'Швець ', 'Анастасія', 'Так', 45.00),
(3, '2023-05-24', 8048, 3,  3, 'Сорока', 'Солаомія', 'Так', 50.00);