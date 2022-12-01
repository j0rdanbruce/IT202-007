CREATE TABLE IF NOT EXISTS  `UserRoles`
(
    `id`         int auto_increment not null,
    `userID`    int,
    `roleID`  int,
    `isActive`  TINYINT(1) default 1,
    `created`    timestamp default current_timestamp,
    `modified`   timestamp default current_timestamp on update current_timestamp,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`userID`) REFERENCES User(`id`),
    FOREIGN KEY (`roleID`) REFERENCES Roles(`id`),
    UNIQUE KEY (`userID`, `roleID`)
)