ALTER TABLE `area` ADD `featured` INT NOT NULL ;
ALTER TABLE `lodge` CHANGE `poll_rate` `poll_rate` DECIMAL(2,2) NULL DEFAULT '0.00';