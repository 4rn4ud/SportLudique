<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221115100352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment ADD lignecom_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CFD18099B FOREIGN KEY (lignecom_id) REFERENCES ligne_com (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9474526CFD18099B ON comment (lignecom_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CFD18099B');
        $this->addSql('DROP INDEX UNIQ_9474526CFD18099B ON comment');
        $this->addSql('ALTER TABLE comment DROP lignecom_id');
    }
}
