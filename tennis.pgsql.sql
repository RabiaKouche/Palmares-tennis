-- 
-- Structure de la table `Classement`
--

CREATE TABLE Classement (

 Code_Clas SERIAL PRIMARY KEY not null,
 Type_Clas varchar(3) CHECK (Type_Clas IN ('ATP','WTA')),
 Année_Clas int NOT NULL CHECK (Année_Clas>1970 and Année_Clas <2021)

) ;


--    
-- Contenu de la table `Classement`
--

INSERT INTO Classement(Type_Clas,Année_Clas) VALUES

( 'ATP',2019),
( 'WTA',2019),
( 'ATP',2018),
( 'WTA',2018),
( 'ATP',2017),
( 'WTA',2017),
( 'ATP',2016),
( 'WTA',2016),
( 'ATP',2015),
( 'WTA',2015),
( 'ATP',2014),
( 'WTA',2014),
( 'ATP',2013),
( 'ATP',2012),
( 'ATP',2011),
( 'ATP',2010),
( 'ATP',2009),
( 'ATP',2008),
( 'ATP',2007),
( 'ATP',2006),
( 'ATP',2005),
( 'ATP',2004),
( 'ATP',2003),
( 'ATP',2002),
( 'ATP',2001),
( 'ATP',2000),
( 'ATP',1999),
( 'ATP',1998),
( 'ATP',1997),
( 'ATP',1996),
( 'ATP',1995),
( 'ATP',1994),
( 'ATP',1993),
( 'ATP',1992),
( 'ATP',1991),
( 'ATP',1990);




--
-- Structure de la table `Nation`
--


CREATE TABLE Nation (
 
    Code_Nat       varchar(3) PRIMARY KEY NOT NULL,
    nom_Nat        varchar(15) UNIQUE NOT NULL
   
 );


--
-- Contenu de la table 'Nation',
--


INSERT INTO Nation (Code_Nat,Nom_Nat) VALUES


    ('FRA','FRANCE'),
    ('SUI','SUISSE'),
    ('USA','ETATS-UNIS'),
    ('ESP','ESPAGNE'),
    ('AUS','AUSTRALIE'),
    ('ALL','ALLEMAGNE'),
    ('SUE','SUEDE'),
    ('CRO','CROATIE'),
    ('RUS','RUSSIE'),
    ('BEL','BELGIQUE'),
    ('ARG','ARGANTINE'),
    ('ITA','ITALIE'),
    ('SER' ,'SERBIE'),
    ('GRE','GRECE'),
    ('BRE','BRETAGNE'),
    ('CAN','CANADA'),
    ('UKR','UKRAINE'),
    ('JAP','JAPAN'),
    ('EQU','EQUATEUR'),
    ('CHL','CHILI'),
    ('BRA','BRASIL'),
    ('ADS','AFRIQUE-DU-SUD'),
    ('AUT','AUTRICHE'),
    ('BUL','BULGARIE'),
    ('ECO','ECOSSE'),
    ('PBA','PAYS-BAS'),
    ('SLO','SLOVAQUIE'),
    ('TCH','TCHEQUE'),
    ('CHI','CHINE'),
    ('DAN','DANEMARK'),
    ('LET','LETTONIE'),
    ('POL','POLOGNE'),
    ('ROU','ROUMANIE'),
    ('ISR','ISRAEL');



--
-- Structure de la table `joueur`
--

CREATE TABLE Joueur
(
    
    Code_J         SERIAL PRIMARY KEY not null,
    nom_J          varchar(20) ,
    Prénom_J       varchar(20) NOT NULL,
    Date_Nais_J    date        NOT NULL,
    Sexe_J         char        NOT NULL CHECK (Sexe_J IN ('F','H')),
    Code_Nat       varchar(3)  NOT NULL ,
    FOREIGN KEY (Code_Nat) REFERENCES Nation (Code_Nat) ON UPDATE CASCADE ON DELETE CASCADE


 );

--
-- Contenu de la table Joueur
--
--

 INSERT INTO Joueur(nom_J,Prénom_J,Date_Nais_J,Sexe_J,Code_Nat) VALUES

('Bautista', 'Roberto', '1988-04-14', 'H','ESP'),
('Federer', 'Roger', '1981-08-08', 'H','SUI'),
( 'Nadal',   'Raphael', '1986-06-03', 'H', 'ESP'),
( 'Djokovic','Novack', '1987-05-22','H','SER'),
( 'Medvedev','Daniil', '1997-04-20', 'H','RUS'),
( 'Thiem', 'Dominic', '1993-09-03', 'H', 'AUS'),
( 'Zverev', 'Alexandre', '1993-09-03', 'H','ALL'),
( 'Monfils', 'Gael', '1986-09-01', 'H', 'FRA'),
( 'Berrittini', 'Matteo', '1981-08-08', 'H','ITA'),
( 'Tsitsipas', 'Stefanos', '1986-06-03', 'H', 'GRE'),
( 'Dimitrov','Grigor', '1991-05-16', 'H','BUL'),
( 'Cilic',' Marin', '1988-09-28', 'H', 'CRO'),
( 'Goffin','David', '1990-12-07','H', 'BEL'),
( 'Sock','Jack', '1992-09-24', 'H', 'USA'),
( 'Wawrinka', 'Stanislas', '1985-03-28', 'H', 'SUI'),
( 'Busta', 'Pablo-Carreno', '1991-07-12','H','ESP'),
( 'Murray','Andy', '1987-05-22','H','ECO'),
( 'Raonic','Milos', '1996-02-11', 'H','CAN'),
( 'nishikori', 'Kei', '1989-12-29', 'H', 'JAP'),
( 'Cilic', 'Marin', '1993-09-03', 'H','CRO'),
( 'Berdych', 'Thomas', '1986-01-09', 'H', 'TCH'),
( 'Gasquet', 'Richard', '1986-06-18', 'H', 'FRA'),
( 'Tsonga', 'Jo-Wilfriend', '1985-04-17', 'H', 'FRA'),
( 'Del-potro', 'Juan-Martin', '1988-09-23', 'H', 'ARG'),
( 'Tipsarevic', 'Janko','1984-06-22', 'H', 'SER'),
( 'Fish', 'Mardy','1981-12-09', 'H', 'USA'),
( 'Almagro', 'Nicolas','1985-08-21', 'H', 'ESP'),
( 'Soderling', 'Robin','1984-08-14', 'H', 'SUE'),
( 'Rodick', 'Andy','1982-08-30', 'H', 'USA'),
( 'Verdasco', 'Fernando ','1983-11-15', 'H', 'ESP'),
( 'Youzhny', 'Mikhail','1982-06-25', 'H', 'RUS'),
( 'Davydenko', 'Nikolay ','1981-06-02', 'H', 'UKR'),
( 'Simon', 'Gilles','1984-12-27', 'H', 'FRA'),
( 'Blake', 'James','1979-12-28', 'H', 'USA'),
( 'Nalbandian', 'David' ,'1982-01-01', 'H', 'ARG'),
( 'Ljubicic', 'ivan ','1979-03-19', 'H', 'CRO'),
( 'Robredo', 'Tommy ','1982-05-01', 'H', 'ESP'),
( 'Ancic', 'Mario ','1984-03-30', 'H', 'CRO'),
( 'Lleyton', 'Hewitt ','1981-02-24', 'H', 'AUS'),
( 'Agassi', 'Andre','1970-04-27', 'H', 'USA'),
( 'Coria', 'Guillermo','1982-01-13', 'H', 'ARG'),
( 'Gaudio', 'Goston ','1978-12-09', 'H', 'ARG'),
( 'Safin', 'Marat ','1980-01-27', 'H', 'RUS'),
( 'Moya', 'Carlos','1976-08-27', 'H', 'ESP'),
( 'Henman', 'Tim' ,'1974-09-06','H', 'BRE'),
( 'Juan', 'Carlos-Ferrero','1980-12-02', 'H', 'ESP'),
( 'Schuttler', 'Rainer ','1976-04-25', 'H', 'ALL'),
( 'Grosjean', 'Sébastien ','1978-05-29', 'H', 'FRA'),
( 'Costa', 'Albert','1975-06-23', 'H', 'ESP'),
( 'Hass', 'Tommy ','1978-04-03', 'H', 'ALL'),
( 'Samparas', 'pete','1971-08-12', 'H', 'USA'),
( 'Rafter', 'Patrick ','1972-09-28', 'H', 'AUS'),
( 'Kuerten', 'Gustavo ','1976-09-10', 'H', 'BRA'),
( 'Norman', 'Magnus ','1976-05-30', 'H', 'SUE'),
( 'Kafelnikov', 'Ievgueni','1974-02-18', 'H', 'RUS'),
( 'Enqvist', 'Thomas','1974-03-13', 'H', 'SUE'),
('Corretja', 'Alex','1971-04-11', 'H', 'ESP'),
( 'Todd', 'Martin','1970-07-08', 'H', 'USA'),
( 'Lapentti', 'Nicolas','1976-08-13','H', 'EQU'),
( 'Kiefer', 'Nicolas' ,'1977-07-05', 'H', 'ALL'),
( 'Krajicek', 'Richard','1976-05-30', 'H', 'PBA'),
( 'Rios', 'Marcelo','1975-12-16', 'H', 'CHL'),
( 'Muster', 'Thomas','1976-10-02', 'H', 'AUT'),
( 'Bruguera', 'Sergi','1971-01-16', 'H', 'ESP'),
( 'Bjorkman', 'Jonas','1972-03-23', 'H', 'SUE'),
('Rafter', 'Patrick ','1972-12-28', 'H', 'AUS'),
( 'Chang', 'Michael','1972-02-22', 'H', 'USA'),
('Rusedski', 'Greg ','1973-09-06', 'H', 'BRE'),
( 'Ferreira', 'Wayne','1971-09-15', 'H', 'ADS'),
( 'Becker', 'Boris ','1967-11-22', 'H', 'ALL'),
( 'Ivanisvic', 'Goran','1971-09-13', 'H', 'CRO'),
( 'Courier', 'Jim ','1970-08-17', 'H', 'USA'),
( 'Edberg', 'Stefan','1966-01-19', 'H', 'SUE'),
( 'Berasategui', 'Alberto','1973-06-28', 'H', 'ESP'),
( 'Stich', 'Michael','1968-10-18', 'H', 'ALL'),
( 'Pioline', 'Cédric','1968-06-15', 'H', 'FRA'),
( 'Lendl', 'Ivan','1960-03-07', 'H', 'TCH'),
('Forget', 'Guy ','1965-01-04', 'H', 'FRA'),
( 'Novacek', 'Karel ','1965-03-30', 'H', 'TCH'),
( 'Korda', 'Petr ','1968-01-23', 'H', 'TCH'),
( 'Gomez', 'Andre','1960-02-27', 'H', 'EQU'),
( 'Gilbert', 'Brad ','1961-08-09', 'H', 'USA'),
( 'Jarryd', 'Anders','1961-07-13', 'H', 'SUE'),
( 'Anderson', 'Kevin','1986-05-18', 'H', 'ADS'),
( 'Isner', 'John','1985-04-26', 'H', 'USA'),
('Ferrer','David','1982-04-02','H','ESP'),
('Gonzalez','Fernando','1980-07-29','H','CHL'),
('Novak','Jiri','1975-03-22','H','TCH'),
('Kucera','Karol','1974-03-04','H','SLO'),
('Sanchez','Emilio','1965-06-29','H','ESP'),
('Barty','Ashleigh','1996-04-24','F','AUS'),
('Pliskova','karolina','1992-03-21','F','TCH'),
('Osaka','Naomi','1997-10-16','F','JAP'),
('Muguruza','Garbine','1993-10-08','F','ESP'),
('Wozniacki','Caroline','1990-07-11','F','DAN'),
('Ostapenko','Jelena','1980-09-30','F','LET'),
('Kvitova','Petra','1990-03-08','F','TCH'),
('Bencic','Belinda','1997-03-10','F','SUI'),
('Bertens','Kiki','1991-12-10','F','PBA'),
('Williams','Serena','1981-09-26','F','USA'),
('Garcia','Caroline','1993-10-16','F','FRA'),
('Konta','Johanna','1991-05-17','F','BRE'),
('Vandeweghe','Coco','1991-12-06','F','USA'),
('Kerber','Angelique','1988-01-18','F','ALL'),
('Stephens','Sloane','1990-07-11','F','USA'),
('Kasatkina','Daria','1997-05-07','F','RUS'),
('Radwanska','Agnieszka','1989-03-06','F','POL'),
('Williams','Venus','1980-06-17','F','USA'),
('Suarez Navarro','Carla','1988-09-03','F','ESP'),
('Keys','Madison','1995-02-17','F','USA'),
('Kuznetsova','Svetlana','1985-06-27','F','RUS'),
('Sharapova','Maria','1987-04-19','F','RUS'),
('Pennetta','Flavia','1982-02-25','F','ITA'),
('Safarova','Lucie','1987-04-19','F','TCH'),
('Bouchard','Eugenie','1994-02-25','F','BEL'),
('Cibulkova','Dominika','1989-05-06','F','SLO'),
('Azarenka','Victoria','1989-07-31','F','BEL'),
('Errani','Sara','1987-04-29','F','ITA'),
('Na','Li','1989-07-31','F','CHI'),
('Stosur','Samantha','1984-03-30','F','AUS'),
('Henin','Justine','1982-06-01','F','BEL'),
('Davenport','Lindsay','1976-06-08','F','USA'),
('Hingis','Martina','1980-09-30','F','SUI'),
('Zvonareva','Vera','1984-09-07','F','RUS'),
('Bartoli','Marion','1984-10-02','F','FRA'),
('Clijsters','Kim','1983-06-08','F','BEL'),
('Schiavone','Francesca','1980-06-23','F','ITA'),
('Jankovic','Jelena','1985-02-28','F','SER'),
('Dementieva','Elena','1981-10-15','F','RUS'),
('Safina','Dinara','1986-04-27','F','RUS'),
('Martinez Sanchez','Maria_José','1982-08-12','F','ESP'),
('Peer','Shahar','1987-05-01','F','ISR'),
('Ivanovic','Ana','1987-11-06','F','SER'),
('Chakvetadze','Anna','1987-03-05','F','RUS'),
('Hantuchova','Daniela','1983-04-23','F','TCH'),
('Mauresmo','Amelie','1979-07-05','F','FRA'),
('Petrova','Nadia','1982-06-08','F','RUS'),
('Vaidisova','Nicole','1989-04-23','F','TCH'),
('Schnyder','Patty','1978-12-14','F','SUI'),
('Pierce','Mary','1975-01-15','F','FRA'),
('Myskina','Anastasia','1981-07-08','F','RUS'),
('Capriati','Jennifer','1976-03-29','F','USA'),
('Rubin','Chanda','1976-02-18','F','USA'),
('Sugiyama','Ai','1975-07-05','F','JAP'),
('Seles','Monica','1973-12-02','F','USA'),
('Dokic','Jelena','1983-04-12','F','AUS'),
('Martinez','Conchita','1972-04-16','F','ESP'),
('Sanchez','Arantxa','1971-12-18','F','ESP'),
('Tauziat','Nathalie','1967-10-17','F','FRA'),
('Halep','Simona','1961-09-27','F','ROU'),
('Svitolina','Elina','1994-10-12','F','UKR'),
('Kirilenko','Maria','1987-01-25','F','RUS'),
('Azarenka','Roberta','1983-02-18','F','ITA'),
('Kournikova','Anna','1981-06-07','F','RUS'),
('Schett','Barbara','1976-03-10','F','AUT'),
('Halard','Julie','1970-09-10','F','FRA'),
('Novotna','Jana','1968-10-02','F','TCH'),
('Graf','Steffi','1969-06-14','F','ALL'),
('Andreescu','Bianca','2000-06-16','F','CAN')

;





--
-- Structure de la table `Appartient`
--


CREATE TABLE Appartient
(
      Code_J      int  NOT NULL REFERENCES Joueur (Code_J) ON UPDATE CASCADE ON DELETE CASCADE ,
      Code_Clas   int  NOT NULL REFERENCES Classement (Code_Clas) ON UPDATE CASCADE ON DELETE CASCADE,
     

      PRIMARY KEY(Code_J,Code_Clas),

      Points      integer
 );



--
-- Contenu de la table `Appartient`
--


INSERT INTO Appartient VALUES

(1,1,2540),
(2,1,6590),
(3,1,9985),
(4,1,9145),
(5,1,5705),
(6,1,5825),
(7,1,3345),
(8,1,2530),
(9,1,2870),
(10,1,5300),
(3,3,7480),
(4,3,9045),
(2,3,6420),
(7,3,6385),
(24,3,5300),
(84,3,4710),
(20,3,4250),
(6,3,4095),
(19,3,3590),
(85,3,3155),
(2, 5,9605),
(3,5,10645),
(15,5,3150),
(11,5,5150),
(6,5,4015),
(12,5,3805),
(13,5,3775),
(14,5,3165),
(16,5,2615),
(7,5,4610),
(17,7,12410),
(4,7,11780),
(18,7,5450),
(15,7,5315),
(19,7,4905),
(12,7,3650),
(8,7,3625),
(6,7,3415),
(3,7,3300),
(21,7,3060),
(4,9,16585),
(17,9,8945),
(2,9,8265),
(15,9,6865),
(3,9,5230),
(21,9,4620),
(86,9,4305),
(19,9,4235),
(22,9,2850),
(23,9,2635),
(4,11,11360),
(2,11,9775),
(3,11,6835),
(15,11,5370),
(19,11,5025),
(17,11,4675),
(21,11,4600),
(18,11,4440),
(12,11,4150),
(86,11,4045),
(3,13,13030),
(4,13,12260),
(86,13,5800),
(17,13,5790),
(24,13,5255),
(2,13,4205),
(21,13,4180),
(15,13,3730),
(22,13,3300),
(23,13,3065),
(2,14,10265),
(17,14,8000),
(3,14,6690),
(4,14,12920),
(86,14,6505),
(21,14,4680),
(24,14,4480),
(23,14,3490),
(25,14,2990),
(22,14,2515),
(4,15,13630),
(3,15,9595),
(2,15,8170),
(17,15,7380),
(86,15,4925),
(21,15,3700),
(23,15,4335),
(26,15,2965),
(25,15,2595),
(27,15,2380),
(3,16,12450),
(2,16,9145),
(4,16,6035),
(17,16,5760),
(28,16,5580),
(21,16,3955),
(86,16,3735),
(23,16,3655),
(30,16,3240),
(31,16,2920),
(2,17,10550),
(3,17,9205),
(4,17,8310),
(17,17,7030),
(24,17,6785),
(32,17,4930),
(29,17,4410),
(28,17,3410),
(30,17,3300),
(23,17,2875),
(3,18,6675),
(2,18,5305),
(4,18,5295),
(17,18,3720),
(32,18,2715),
(23,18,2050),
(33,18,1980),
(29,18,1970),
(24,18,1945),
(34,18,1775),
(2,19,7180),
(3,19,5735),
(4,19,4470),
(86,19,2750),
(29,19,2530),
(32,19,2825),
(87,19,2005),
(22,19,1930),
(35,19,1775),
(37,19,1765),
(2,20,8370),
(3,20,4470),
(32,20,2825),
(34,20,2530),
(36,20,2495),
(29,20,2415),
(37,20,2375),
(35,20,2295),
(38,20,2060),
(87,20,2015),
(2,21,6725),
(3,21,4765),
(29,21,3085),
(39,21,2490),
(32,21,2390),
(35,21,2370),
(40,21,2275),
(41,21,2190),
(36,21,2180),
(42,21,2050),
(2,22,6335),
(29,22,3655),
(39,22,3590),
(43,22,3060),
(44,22,2520),
(45,22,2465),
(41,22,2400),
(40,22,2100),
(35,22,1945),
(42,22,1920),
(29,23,4535),
(2,23,4375),
(46,23,4205),
(40,23,3425),
(41,23,3330),
(47,23,3205),
(44,23,2280),
(35,23,2060),
(39,23,1615),
(48,23,1610),
(39,24,4485),
(40,24,3395),
(43,24,2845),
(46,24,2740),
(44,24,2630),
(2,24,2590),
(88,24,2335),
(45,24,2215),
(49,24,2070),
(29,24,2045),
(39,25,4365),
(53,25,3855),
(40,25,3520),
(55,25,3090),
(46,25,3040),
(48,25,2790),
(52,25,2785),
(50,25,2285),
(45,25,2100),
(51,25,1940),
(53,26,4195),
(43,26,4120),
(51,26,3385),
(54,26,3110),
(55,26,2935),
(40,26,2765),
(39,26,2625),
(57,26,2475),
(56,26,2210),
(45,26,2020),
(40,27,4059),
(55,27,2733),
(51,27,2427),
(56,27,1850),
(53,27,1875),
(60,27,1757),
(58,27,1864),
(59,27,1654),
(62,27,1769),
(61,27,1581),
(51,28,3131),
(62,28,2920),
(53,28,2759),
(52,28,2464),
(44,28,2432),
(40,28,2135),
(45,28,1804),
(89,28,1820),
(68,28,1849),
(61,28,1815),
(51,29,3666),
(52,29,2469),
(67,29,2443),
(65,29,2217),
(55,29,2133),
(68,29,1966),
(44,29,1887),
(64,29,1749),
(63,29,1794),
(62,29,1707),
(51,30,3760),
(67,30,2843),
(55,30,2797),
(71,30,2704),
(63,30,2491),
(70,30,2281),
(61,30,1841),
(40,30,1716),
(56,30,1632),
(69,30,1540),
(51,31,4842),
(40,31,4765),
(63,31,4474),
(70,31,3325),
(67,31,3211),
(55,31,2560),
(56,31,2505),
(72,31,2471),
(69,31,2144),
(71,31,1861),
(51,32,5097),
(40,32,3249),
(70,32,3237),
(64,32,3007),
(71,32,2936),
(67,32,2647),
(73,32,2471),
(74,32,2470),
(75,32,2380),
(58,32,2307),
(51,33,4128),
(75,33,3445),
(72,33,3390),
(64,33,2590),
(73,33,2571),
(90,33,2415),
(71,33,2186),
(67,33,2154),
(63,33,2033),
(76,33,2012),
(72,34,3599),
(73,34,3236),
(51,34,3074),
(71,34,2718),
(70,34,2530),
(67,34,2277),
(80,34,2174),
(77,34,1985),
(40,34,1852),
(61,34,1816),
(73,35,3515),
(72,35,3205),
(70,35,2822),
(75,35,2675),
(77,35,2565),
(51,35,2492),
(78,35,2392),
(79,35,1599),
(80,35,1570),
(40,35,1519),
(73,36,3889),
(70,36,3528),
(77,36,2581),
(40,36,2398),
(51,36,1888),
(81,36,1680),
(63,36,1654),
(71,36,1514),
(82,36,1451),
(91,2,7851),
(92,2,5940),
(93,2,5496),
(150,2,5462),
(159,2,5133),
(151,2,5075),
(97,2,4776),
(98,2,4685),
(99,2,4245),
(100,2,3935),
(150,4,6921),
(104,4,5875),
(95,4,5586),
(151,4,5350),
(93,4,5115),
(105,4,5023),
(97,4,4630),
(92,4,4465),
(99,4,4335),
(106,4,3415),
(117,6,6175),
(94,6,6135),
(95,6,6015),
(92,6,5730),
(108,6,5597),
(151,6,5500),
(96,6,5010),
(101,6,4385),
(102,6,3610),
(103,6,3258),
(104,8,9080),
(100,8,4050),
(107,8,5600),
(150,8,5228),
(116,8,4875),
(92,8,4600),
(94,8,4236),
(110,8,4137),
(111,8,4115),
(102,8,3640),
(106,10,9945),
(150,10,6060),
(94,10,5200),
(112,10,5011),
(107,10,4500),
(97,10,4220),
(108,10,3790),
(113,10,3621),
(114,10,3590),
(105,10,3590),
(100,12,9510),
(112,12,6960),
(114,12,6785),
(97,12,6070),
(133,12,5330),
(107,12,4881),
(115,12,4460),
(95,12,4365),
(119,12,3900),
(104,12,3812);