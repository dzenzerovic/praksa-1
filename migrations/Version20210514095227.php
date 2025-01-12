<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210514095227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("CREATE TABLE `praksa`.`Users` (
  `UserID` INT NOT NULL,
  `LastName` VARCHAR(45) NULL,
  `FirstName` VARCHAR(45) NULL,
  `Mail` VARCHAR(255) NULL,
  `PrivilegeID` INT NULL,
  PRIMARY KEY (`UserID`));

CREATE TABLE `praksa`.`Privileges` (
  `PrivilegeID` INT NOT NULL,
  `Privilege` VARCHAR(45) NULL,
  PRIMARY KEY (`PrivilegeID`));
  
INSERT INTO Privileges VALUES (1, 'Admin');
INSERT INTO Privileges VALUES (0, 'User');");
        $this->addSql('DROP TABLE Privileges');
        $this->addSql('ALTER TABLE Users DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE Users ADD last_name VARCHAR(255) NOT NULL, ADD first_name VARCHAR(255) NOT NULL, DROP LastName, DROP FirstName, CHANGE Mail mail VARCHAR(255) NOT NULL, CHANGE userid user_id INT NOT NULL, CHANGE privilegeid privelege_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Users ADD PRIMARY KEY (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Privileges (PrivilegeID INT NOT NULL, Privilege VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, PRIMARY KEY(PrivilegeID)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE users DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE users ADD LastName VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, ADD FirstName VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, DROP last_name, DROP first_name, CHANGE mail Mail VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE user_id UserID INT NOT NULL, CHANGE privelege_id PrivilegeID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD PRIMARY KEY (UserID)');
    }
}
