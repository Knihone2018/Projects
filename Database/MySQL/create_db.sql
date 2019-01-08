DROP TABLE IF EXISTS playerEndorseCompany;
DROP TABLE IF EXISTS playerPlayInGame;
DROP TABLE IF EXISTS refereeGuideGame;
DROP TABLE IF EXISTS teamPlayInGame;

DROP TABLE IF EXISTS Player;
DROP TABLE IF EXISTS University;
DROP TABLE IF EXISTS Company;
DROP TABLE IF EXISTS Game;
DROP TABLE IF EXISTS Referee;
DROP TABLE IF EXISTS Team;
DROP TABLE IF EXISTS State;
DROP TABLE IF EXISTS Coach;

CREATE TABLE Player(
   playerID INTEGER,
   position CHAR(2),
   number INTEGER,
   weight INTEGER,
   height DECIMAL(4,1),
   firstName VARCHAR(50),
   lastName VARCHAR(50),
   age INTEGER,
   university VARCHAR(50),
   team VARCHAR(50),
   PRIMARY KEY (playerID)
);

CREATE TABLE University(
   name VARCHAR(50),
   established INTEGER,
   students INTEGER,
   type CHAR(10),
   endowment INTEGER,
   PRIMARY KEY (name)
);

CREATE TABLE Company(
   name VARCHAR(50),
   foundedYear INTEGER,
   revenue INTEGER,
   employees INTEGER,
   headquarter VARCHAR(50),
   PRIMARY KEY (name)
);

CREATE TABLE Game(
   gameID INTEGER,
   date DATE,
   host VARCHAR(50),
   guest VARCHAR(50),
   isPlayoff BOOLEAN,
   PRIMARY KEY (gameID)
);

CREATE TABLE Referee(
   refereeID INTEGER,
   firstName VARCHAR(50),
   lastName VARCHAR(50),
   age INTEGER,
   yearsInNBA INTEGER,
   PRIMARY KEY (refereeID)
);

CREATE TABLE Team(
   name VARCHAR(50),
   city VARCHAR(50),
   state CHAR(2),
   conference CHAR(10),
   bossFirstName VARCHAR(50),
   bossLastName VARCHAR(50),
   managerFirstName VARCHAR(50),
   managerLastName VARCHAR(50),
   founded INTEGER,
   PRIMARY KEY (name)
);

CREATE TABLE State(
   name CHAR(2),
   capital VARCHAR(50),
   population INTEGER,
   landArea INTEGER,   
   PRIMARY KEY (name)
);

CREATE TABLE Coach(
   coachID INTEGER,
   teamName VARCHAR(50),
   firstName VARCHAR(50),
   lastName VARCHAR(50),
   age INTEGER,
   yearsInLeague INTEGER,
   isHeadCoach BOOLEAN,
   PRIMARY KEY (coachID)
);

CREATE TABLE playerEndorseCompany(
   playerID INTEGER,
   companyName VARCHAR(50),
   price INTEGER,
   PRIMARY KEY (playerID, companyName),
   FOREIGN KEY (playerID) REFERENCES Player(playerID)
                          ON UPDATE CASCADE
                          ON DELETE CASCADE
);

CREATE TABLE playerPlayInGame(
   playerID INTEGER,
   gameID INTEGER,
   points INTEGER,
   rebounds INTEGER,
   assists INTEGER,
   blocks INTEGER,
   shootingRate DECIMAL(5, 2),
   PRIMARY KEY (playerID, gameID),
   FOREIGN KEY (playerID) REFERENCES Player(playerID)
                          ON UPDATE CASCADE
                          ON DELETE CASCADE,
   FOREIGN KEY (gameID) REFERENCES Game(gameID)
                        ON UPDATE CASCADE
                        ON DELETE CASCADE  
);

CREATE TABLE refereeGuideGame(
   refereeID INTEGER,
   gameID INTEGER,
   PRIMARY KEY (refereeID, gameID),
   FOREIGN KEY (refereeID) REFERENCES Referee(refereeID)
                          ON UPDATE CASCADE
                          ON DELETE CASCADE,
   FOREIGN KEY (gameID) REFERENCES Game(gameID)
                        ON UPDATE CASCADE
                        ON DELETE CASCADE
);

CREATE TABLE teamPlayInGame(
   teamName VARCHAR(50),
   gameID INTEGER,
   pointsGet INTEGER,
   pointsLoose INTEGER,
   shootingRate DECIMAL(5,2),
   totalFouls INTEGER,   
   PRIMARY KEY (teamName,gameID),
   FOREIGN KEY (gameID) REFERENCES Game(gameID)
                        ON UPDATE CASCADE
                        ON DELETE CASCADE
);

