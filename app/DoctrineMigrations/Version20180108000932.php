<?php declare(strict_types = 1);

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180108000932 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, image_name VARCHAR(255) NOT NULL, image_path VARCHAR(255) NOT NULL, image_size INT NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D64992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_8D93D649A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_8D93D649C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, id_post INT DEFAULT NULL, id_user INT DEFAULT NULL, is_valid TINYINT(1) NOT NULL, content TEXT DEFAULT NULL, date DATETIME DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, INDEX FK_comment_id_user (id_user), INDEX FK_comment_id_post (id_post), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, id_user INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, content TEXT DEFAULT NULL, date DATETIME DEFAULT NULL, INDEX FK_post_id_user (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, ville VARCHAR(100) DEFAULT NULL, intitule VARCHAR(255) DEFAULT NULL, entreprise VARCHAR(255) DEFAULT NULL, type VARCHAR(100) DEFAULT NULL, description TEXT DEFAULT NULL, ordre INT DEFAULT NULL, codepostal INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intro (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) DEFAULT NULL, content TEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(50) DEFAULT NULL, image_name VARCHAR(255) NOT NULL, image_path VARCHAR(255) NOT NULL, image_size INT NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, annee_debut DATE DEFAULT NULL, annee_fin DATE DEFAULT NULL, annee_courante VARCHAR(25) DEFAULT NULL, intitule VARCHAR(100) DEFAULT NULL, ecole VARCHAR(255) DEFAULT NULL, ville VARCHAR(100) DEFAULT NULL, codepostal INT DEFAULT NULL, description TEXT DEFAULT NULL, lien VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realisation (id INT AUTO_INCREMENT NOT NULL, link VARCHAR(255) DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, image_name VARCHAR(255) NOT NULL, image_path VARCHAR(255) NOT NULL, image_size INT NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wbnt_dfgb_testrelated (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(60) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wbnt_dfgb_test (id INT AUTO_INCREMENT NOT NULL, testrelated_id INT DEFAULT NULL, name VARCHAR(60) DEFAULT NULL, INDEX IDX_A86F10518E63F6D6 (testrelated_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CD1AA708F FOREIGN KEY (id_post) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C6B3CA4B FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D6B3CA4B FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE wbnt_dfgb_test ADD CONSTRAINT FK_A86F10518E63F6D6 FOREIGN KEY (testrelated_id) REFERENCES wbnt_dfgb_testrelated (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C6B3CA4B');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D6B3CA4B');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CD1AA708F');
        $this->addSql('ALTER TABLE wbnt_dfgb_test DROP FOREIGN KEY FK_A86F10518E63F6D6');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE intro');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE realisation');
        $this->addSql('DROP TABLE wbnt_dfgb_testrelated');
        $this->addSql('DROP TABLE wbnt_dfgb_test');
    }
}
