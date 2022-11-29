ALTER TABLE User ADD COLUMN logName varchar(30) 
not null unique default (substring_index(email, '@', 1)) 
COMMENT 'logname field that defaults to the name of the email given';