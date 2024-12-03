<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241203134344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, release_date DATE NOT NULL, rating INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_library (game_id INT NOT NULL, library_id INT NOT NULL, INDEX IDX_3442E793E48FD905 (game_id), INDEX IDX_3442E793FE2541D7 (library_id), PRIMARY KEY(game_id, library_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre_game (genre_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_98C6E87C4296D31F (genre_id), INDEX IDX_98C6E87CE48FD905 (game_id), PRIMARY KEY(genre_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE library (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, status VARCHAR(255) NOT NULL, added_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_A18098BCA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platform (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platform_game (platform_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_A72356A0FFE6496F (platform_id), INDEX IDX_A72356A0E48FD905 (game_id), PRIMARY KEY(platform_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, roles VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE game_library ADD CONSTRAINT FK_3442E793E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_library ADD CONSTRAINT FK_3442E793FE2541D7 FOREIGN KEY (library_id) REFERENCES library (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genre_game ADD CONSTRAINT FK_98C6E87C4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genre_game ADD CONSTRAINT FK_98C6E87CE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE library ADD CONSTRAINT FK_A18098BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE platform_game ADD CONSTRAINT FK_A72356A0FFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE platform_game ADD CONSTRAINT FK_A72356A0E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_library DROP FOREIGN KEY FK_3442E793E48FD905');
        $this->addSql('ALTER TABLE game_library DROP FOREIGN KEY FK_3442E793FE2541D7');
        $this->addSql('ALTER TABLE genre_game DROP FOREIGN KEY FK_98C6E87C4296D31F');
        $this->addSql('ALTER TABLE genre_game DROP FOREIGN KEY FK_98C6E87CE48FD905');
        $this->addSql('ALTER TABLE library DROP FOREIGN KEY FK_A18098BCA76ED395');
        $this->addSql('ALTER TABLE platform_game DROP FOREIGN KEY FK_A72356A0FFE6496F');
        $this->addSql('ALTER TABLE platform_game DROP FOREIGN KEY FK_A72356A0E48FD905');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE game_library');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE genre_game');
        $this->addSql('DROP TABLE library');
        $this->addSql('DROP TABLE platform');
        $this->addSql('DROP TABLE platform_game');
        $this->addSql('DROP TABLE user');
    }
}
