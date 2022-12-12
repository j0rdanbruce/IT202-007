CREATE TABLE IF NOT EXISTS 'Transactions'(
    `id`         int auto_increment not null,
    'accountSrc' INT,
    'accountDest' INT,
    'balanceChg' INT,
    'transType' VARCHAR(20),
    'memo' VARCHAR(100),
    'expectedTotal' INT DEFAULT 0,
    `created`    timestamp default current_timestamp,
    `modified`   timestamp default current_timestamp on update current_timestamp,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`userID`) REFERENCES User(`id`)
)