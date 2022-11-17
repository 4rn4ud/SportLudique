<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221115094715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, content VARCHAR(255) NOT NULL, note INT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_com (id INT AUTO_INCREMENT NOT NULL, quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE command ADD ligne_com_id INT NOT NULL');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD452569371 FOREIGN KEY (ligne_com_id) REFERENCES ligne_com (id)');
        $this->addSql('CREATE INDEX IDX_8ECAEAD452569371 ON command (ligne_com_id)');
        $this->addSql('ALTER TABLE product ADD ligne_com_id INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD52569371 FOREIGN KEY (ligne_com_id) REFERENCES ligne_com (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD52569371 ON product (ligne_com_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD452569371');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD52569371');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE ligne_com');
        $this->addSql('DROP INDEX IDX_8ECAEAD452569371 ON command');
        $this->addSql('ALTER TABLE command DROP ligne_com_id');
        $this->addSql('DROP INDEX IDX_D34A04AD52569371 ON product');
        $this->addSql('ALTER TABLE product DROP ligne_com_id');
    }
}
