<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161028010645 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bb_blog (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', user_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(100) NOT NULL, status VARCHAR(10) NOT NULL, INDEX IDX_9F6BFAA6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bb_comment (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', parent_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, content VARCHAR(2048) NOT NULL, status VARCHAR(10) NOT NULL, user_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', INDEX IDX_C1137961A76ED395 (user_id), INDEX IDX_C1137961727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bb_post (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', user_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', blog_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(100) NOT NULL, content LONGTEXT NOT NULL, status VARCHAR(10) NOT NULL, INDEX IDX_5F4C768A76ED395 (user_id), INDEX IDX_5F4C768DAE07E97 (blog_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bb_user (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, username VARCHAR(100) NOT NULL, password VARCHAR(64) NOT NULL, last_login DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', status VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bb_user_profile (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', user_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, first_name VARCHAR(30) NOT NULL, last_name VARCHAR(30) NOT NULL, UNIQUE INDEX UNIQ_DCAD2C3FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bb_blog ADD CONSTRAINT FK_9F6BFAA6A76ED395 FOREIGN KEY (user_id) REFERENCES bb_user (id)');
        $this->addSql('ALTER TABLE bb_comment ADD CONSTRAINT FK_C1137961727ACA70 FOREIGN KEY (parent_id) REFERENCES bb_comment (id)');
        $this->addSql('ALTER TABLE bb_post ADD CONSTRAINT FK_5F4C768A76ED395 FOREIGN KEY (user_id) REFERENCES bb_user (id)');
        $this->addSql('ALTER TABLE bb_post ADD CONSTRAINT FK_5F4C768DAE07E97 FOREIGN KEY (blog_id) REFERENCES bb_blog (id)');
        $this->addSql('ALTER TABLE bb_user_profile ADD CONSTRAINT FK_DCAD2C3FA76ED395 FOREIGN KEY (user_id) REFERENCES bb_user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bb_post DROP FOREIGN KEY FK_5F4C768DAE07E97');
        $this->addSql('ALTER TABLE bb_comment DROP FOREIGN KEY FK_C1137961727ACA70');
        $this->addSql('ALTER TABLE bb_blog DROP FOREIGN KEY FK_9F6BFAA6A76ED395');
        $this->addSql('ALTER TABLE bb_post DROP FOREIGN KEY FK_5F4C768A76ED395');
        $this->addSql('ALTER TABLE bb_user_profile DROP FOREIGN KEY FK_DCAD2C3FA76ED395');
        $this->addSql('DROP TABLE bb_blog');
        $this->addSql('DROP TABLE bb_comment');
        $this->addSql('DROP TABLE bb_post');
        $this->addSql('DROP TABLE bb_user');
        $this->addSql('DROP TABLE bb_user_profile');
    }
}
