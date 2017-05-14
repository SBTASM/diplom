<?php

use yii\db\Migration;

class m170317_131416_race extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable("{{%race}}", [
            'id' => $this->primaryKey(),
            'city' => $this->string()->notNull(),
            'club_name' => $this->string()->notNull(),
            'age_group_race' => $this->integer()->notNull(),
            'name_1' => $this->string()->notNull(),
            'name_2' => $this->string()->notNull(),
            'name_3' => $this->string()->notNull(),
            'name_4' => $this->string()->notNull(),
            'date_of_birth_1' => $this->string()->notNull(),
            'date_of_birth_2' => $this->string()->notNull(),
            'date_of_birth_3' => $this->string()->notNull(),
            'date_of_birth_4' => $this->string()->notNull(),

            'owner_id' => $this->integer()->notNull(),

            'age_grou_race' => $this->integer()->notNull()
        ], $tableOptions);
        
        $this->createIndex('idx-race-owner_id', 'race', 'owner_id');
        $this->createIndex('idx-age_group_race', 'age_group_race', 'id');
        $this->addForeignKey(
            'fk-race-owner_id',
            'race',
            'owner_id',
            'request',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-age_group_race-id',
            'race',
            'age_group_race',
            'age_group_race',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m170317_131416_race cannot be reverted.\n";

        return $this->dropTable("{{%race}}");
    }
}
