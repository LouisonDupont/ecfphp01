<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210611133114 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competences (id INT AUTO_INCREMENT NOT NULL, y_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_DB2077CEAE732C28 (y_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_competences (user_id INT NOT NULL, competences_id INT NOT NULL, INDEX IDX_723BBE5BA76ED395 (user_id), INDEX IDX_723BBE5BA660B158 (competences_id), PRIMARY KEY(user_id, competences_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competences ADD CONSTRAINT FK_DB2077CEAE732C28 FOREIGN KEY (y_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE user_competences ADD CONSTRAINT FK_723BBE5BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_competences ADD CONSTRAINT FK_723BBE5BA660B158 FOREIGN KEY (competences_id) REFERENCES competences (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competences DROP FOREIGN KEY FK_DB2077CEAE732C28');
        $this->addSql('ALTER TABLE user_competences DROP FOREIGN KEY FK_723BBE5BA660B158');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE competences');
        $this->addSql('DROP TABLE user_competences');
    }
}
