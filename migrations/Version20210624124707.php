<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210624124707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_experiences (user_id INT NOT NULL, experiences_id INT NOT NULL, INDEX IDX_2B19C7E5A76ED395 (user_id), INDEX IDX_2B19C7E5423DE140 (experiences_id), PRIMARY KEY(user_id, experiences_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_experiences ADD CONSTRAINT FK_2B19C7E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_experiences ADD CONSTRAINT FK_2B19C7E5423DE140 FOREIGN KEY (experiences_id) REFERENCES experiences (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_experiences');
    }
}
