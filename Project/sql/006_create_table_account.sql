CREATE TABLE IF NOT EXISTS  `Accounts`
(
    `id`         int auto_increment not null,
    'accountNum'    varchar(12) not null unique,
    `userID`        int,
    'balance'       int,
    'accountType'   varchar(20),
    `created`       timestamp default current_timestamp,
    `modified`      timestamp default current_timestamp on update current_timestamp,
    PRIMARY KEY (`id`)
)