<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230605124542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE command (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, id_product_id INT NOT NULL, date DATE NOT NULL, INDEX IDX_8ECAEAD4A76ED395 (user_id), INDEX IDX_8ECAEAD4E00EE68D (id_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command_fournisseur (id INT AUTO_INCREMENT NOT NULL, id_product_id INT DEFAULT NULL, INDEX IDX_3309C8C9E00EE68D (id_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, lignecom_id INT NOT NULL, content VARCHAR(255) NOT NULL, note INT NOT NULL, date DATE NOT NULL, UNIQUE INDEX UNIQ_9474526CFD18099B (lignecom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_com (id INT AUTO_INCREMENT NOT NULL, command_id INT NOT NULL, product_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_B65E39F233E1689A (command_id), INDEX IDX_B65E39F24584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, id_fournisseur_id INT DEFAULT NULL, quantityp INT NOT NULL, label VARCHAR(255) NOT NULL, unitprice INT NOT NULL, description VARCHAR(255) NOT NULL, stock_alert INT DEFAULT NULL, qte_acommander INT DEFAULT NULL, INDEX IDX_D34A04AD5A6AC879 (id_fournisseur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD4E00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE command_fournisseur ADD CONSTRAINT FK_3309C8C9E00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CFD18099B FOREIGN KEY (lignecom_id) REFERENCES ligne_com (id)');
        $this->addSql('ALTER TABLE ligne_com ADD CONSTRAINT FK_B65E39F233E1689A FOREIGN KEY (command_id) REFERENCES command (id)');
        $this->addSql('ALTER TABLE ligne_com ADD CONSTRAINT FK_B65E39F24584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD5A6AC879 FOREIGN KEY (id_fournisseur_id) REFERENCES fournisseur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD4A76ED395');
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD4E00EE68D');
        $this->addSql('ALTER TABLE command_fournisseur DROP FOREIGN KEY FK_3309C8C9E00EE68D');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CFD18099B');
        $this->addSql('ALTER TABLE ligne_com DROP FOREIGN KEY FK_B65E39F233E1689A');
        $this->addSql('ALTER TABLE ligne_com DROP FOREIGN KEY FK_B65E39F24584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD5A6AC879');
        $this->addSql('DROP TABLE command');
        $this->addSql('DROP TABLE command_fournisseur');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE ligne_com');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
