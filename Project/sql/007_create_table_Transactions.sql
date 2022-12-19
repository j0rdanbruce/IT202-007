CREATE TABLE IF NOT EXISTS `Transactions`
(
    `id` int not null auto_increment,
    `accountSrc` INT,
    `accountDest` INT,
    `balanceChg` INT,
    `transType` VARCHAR(20),
    `memo` VARCHAR(100),
    `expectedTotal` INT,
    `created`    timestamp default current_timestamp,
    `modified`   timestamp default current_timestamp on update current_timestamp,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`accountSrc`) REFERENCES Account (`id`),
    FOREIGN KEY (`accountDest`) REFERENCES Account (`id`)
)