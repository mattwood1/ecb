CREATE  TABLE `purchase` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `purchaseDate` DATE NULL ,
  `company` TEXT NULL ,
  `invoiceNumber` TEXT NULL ,
  `referenceNumber` TEXT NULL ,
  `amount` DECIMAL(10,2) NULL ,
  `vat` DECIMAL(10,2) NULL ,
  `total` DECIMAL(10,2) NULL ,
  `dueDate` DATE NULL ,
  `dateCreated` DATETIME NULL ,
  `dateModified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;
