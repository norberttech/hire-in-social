<?php

declare(strict_types=1);

/*
 * This file is part of the Hire in Social project.
 *
 * (c) Norbert Orzechowicz <norbert@orzechowicz.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HireInSocial\Doctrine\DBAL\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200201200358 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE his_specialization (id UUID NOT NULL, slug VARCHAR(255) NOT NULL, facebook_channel_page_id VARCHAR(255) DEFAULT NULL, facebook_channel_page_access_token VARCHAR(255) DEFAULT NULL, facebook_channel_group_id VARCHAR(255) DEFAULT NULL, twitter_account_id VARCHAR(255) DEFAULT NULL, twitter_screen_name VARCHAR(255) DEFAULT NULL, twittero_auth_token VARCHAR(255) DEFAULT NULL, twittero_auth_token_secret VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E60FD12B989D9B62 ON his_specialization (slug)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E60FD12BA719CCF6 ON his_specialization (facebook_channel_group_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E60FD12B322E56FB ON his_specialization (twitter_account_id)');
        $this->addSql('CREATE TABLE his_job_offer_pdf (id UUID NOT NULL, offer_id UUID NOT NULL, path VARCHAR(255) NOT NULL, created_at TIMESTAMP(6) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN his_job_offer_pdf.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE his_job_offer_application (id UUID NOT NULL, offer_id UUID NOT NULL, email_hash VARCHAR(255) NOT NULL, created_at TIMESTAMP(6) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN his_job_offer_application.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE his_job_offer_slug (slug TEXT NOT NULL, offer_id UUID NOT NULL, created_at TIMESTAMP(6) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(slug))');
        $this->addSql('COMMENT ON COLUMN his_job_offer_slug.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE his_user (id UUID NOT NULL, email_address TEXT NOT NULL, created_at TIMESTAMP(6) WITHOUT TIME ZONE NOT NULL, blocked_at TIMESTAMP(6) WITHOUT TIME ZONE DEFAULT NULL, fb_user_app_id VARCHAR(255) DEFAULT NULL, linked_in_user_app_id VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX idx_unique_fb_user_app_id ON his_user (fb_user_app_id)');
        $this->addSql('CREATE UNIQUE INDEX idx_unique_email ON his_user (email_address)');
        $this->addSql('COMMENT ON COLUMN his_user.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN his_user.blocked_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE his_facebook_post (fb_id VARCHAR(255) NOT NULL, job_offer_id UUID NOT NULL, PRIMARY KEY(fb_id))');
        $this->addSql('CREATE INDEX idx_fb_post_job_offer_id ON his_facebook_post (job_offer_id)');
        $this->addSql('CREATE TABLE his_extra_offer (id UUID NOT NULL, created_at TIMESTAMP(6) WITHOUT TIME ZONE NOT NULL, expires_at TIMESTAMP(6) WITHOUT TIME ZONE NOT NULL, user_id UUID NOT NULL, used_at TIMESTAMP(6) WITHOUT TIME ZONE DEFAULT NULL, offer_id UUID DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN his_extra_offer.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN his_extra_offer.expires_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN his_extra_offer.used_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE his_job_offer (id UUID NOT NULL, email_hash VARCHAR(255) NOT NULL, user_id UUID NOT NULL, specialization_id UUID NOT NULL, created_at TIMESTAMP(6) WITHOUT TIME ZONE NOT NULL, salary JSON DEFAULT NULL, removed_at TIMESTAMP(6) WITHOUT TIME ZONE DEFAULT NULL, locale_code VARCHAR(12) NOT NULL, company_name VARCHAR(255) NOT NULL, company_url VARCHAR(2083) NOT NULL, company_description VARCHAR(512) NOT NULL, position_seniority_level SMALLINT NOT NULL, position_name VARCHAR(255) NOT NULL, position_description VARCHAR(1024) NOT NULL, location_remote BOOLEAN NOT NULL, location_country_code VARCHAR(2) DEFAULT NULL, location_city VARCHAR(512) DEFAULT NULL, location_lat DOUBLE PRECISION DEFAULT NULL, location_lng DOUBLE PRECISION DEFAULT NULL, contract_type VARCHAR(255) NOT NULL, description_benefits VARCHAR(1024) NOT NULL, description_requirements_description VARCHAR(1024) NOT NULL, description_requirements_skills JSON NOT NULL, contact_email VARCHAR(255) NOT NULL, contact_name VARCHAR(255) NOT NULL, contact_phone VARCHAR(16) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN his_job_offer.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN his_job_offer.salary IS \'(DC2Type:his_offer_salary)\'');
        $this->addSql('COMMENT ON COLUMN his_job_offer.removed_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN his_job_offer.description_requirements_skills IS \'(DC2Type:his_offer_description_requirements_skill)\'');
        $this->addSql('CREATE TABLE his_twitter_tweet (id VARCHAR(255) NOT NULL, job_offer_id UUID NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_twitter_tweet_job_offer_id ON his_twitter_tweet (job_offer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP TABLE his_specialization');
        $this->addSql('DROP TABLE his_job_offer_pdf');
        $this->addSql('DROP TABLE his_job_offer_application');
        $this->addSql('DROP TABLE his_job_offer_slug');
        $this->addSql('DROP TABLE his_user');
        $this->addSql('DROP TABLE his_facebook_post');
        $this->addSql('DROP TABLE his_extra_offer');
        $this->addSql('DROP TABLE his_job_offer');
        $this->addSql('DROP TABLE his_twitter_tweet');
    }
}
