CREATE TABLE IF NOT EXISTS `User` (
`UserID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Photo` text,
  `Bio` text,
  `FirstName` text,
  `LastName` text,
  `Phone` text,
  `SignupToken` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf16;
ALTER TABLE `User` ADD PRIMARY KEY (`UserID`);
ALTER TABLE `User`MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
