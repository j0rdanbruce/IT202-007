ALTER TABLE User ADD COLUMN firstName VARCHAR(30)
not null default 'firstName';

ALTER TABLE User ADD COLUMN lastName VARCHAR(30)
not null default 'lastName';