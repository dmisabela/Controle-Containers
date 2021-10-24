---------------------SCRIPTS---------------------





-- `control-ctnr`.navio definition

CREATE TABLE `navio` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(100) NOT NULL,
  `NUM_VIAGEM` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- `control-ctnr`.cliente definition

CREATE TABLE `cliente` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(100) NOT NULL,
  `CNPJ` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- `control-ctnr`.containers definition

CREATE TABLE `containers` (
`ID` int(11) NOT NULL AUTO_INCREMENT,
`NUM_CTNR` varchar(20) NOT NULL,
`AVARIAS` varchar(100) NOT NULL,
`ID_NAVIO` int(11) NOT NULL,
 `ID_CLIENTE` int(11) DEFAULT NULL,
PRIMARY KEY (`ID`),
KEY `containers_FK` (`ID_NAVIO`),
KEY `containers_FK_1` (`ID_CLIENTE`),
CONSTRAINT `containers_FK` FOREIGN KEY (`ID_NAVIO`) REFERENCES `navio` (`ID`),
CONSTRAINT `containers_FK_1` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `cliente` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- `control-ctnr`.produto definition

CREATE TABLE `produto` (
`ID` int(11) NOT NULL AUTO_INCREMENT,
`NOME` varchar(100) NOT NULL,
`QUANTIDADE` int(11) NOT NULL,
`ID_CTNR` int(11) NOT NULL,
PRIMARY KEY (`ID`),
KEY `produto_FK` (`ID_CTNR`),
                           CONSTRAINT `produto_FK` FOREIGN KEY (`ID_CTNR`) REFERENCES `containers` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
