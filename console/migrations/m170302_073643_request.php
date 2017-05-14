<?php

use yii\db\Migration;

class m170302_073643_request extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%request}}", [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(255)->notNull(),
            'last_name' => $this->string(255)->notNull(),
            'pat_name' => $this->string(255)->notNull(),
            'date_of_birth' => $this->string()->notNull(),
            'sex' => $this->boolean()->notNull()->defaultValue(false),
            'age_group' => $this->integer()->notNull(),
            'club_name' => $this->string(255)->notNull(),
            'city' => $this->string()->notNull(),
            'email' => $this->string(255)->notNull(),
            'phone_number' => $this->string(255)->notNull()->unique(),
            'race' => $this->boolean()->notNull()->defaultValue(false),
        ], $tableOptions);

        $this->createIndex('idx-request-age_group', 'request', 'age_group');
        $this->addForeignKey(
            'fk-spool-age_group',
            'request',
            'age_group',
            'age_group',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m170302_073643_spool cannot be reverted.\n";

        return $this->dropTable("{{%request}}");
    }
}
