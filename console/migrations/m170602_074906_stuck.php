<?php

use yii\db\Migration;

class m170602_074906_stuck extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%stuck}}", [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'number' => $this->integer()->notNull(),
            'track_num' => $this->integer()->notNull(),
            'type_id' => $this->integer()->notNull(),
            'age_group_id' => $this->integer()->notNull(),
            'time' => $this->string()->defaultValue(NULL),
        ], $tableOptions);

        $this->createIndex("idx-stuck-owner_id", "stuck", "owner_id");
        $this->createIndex("idx-stuck-type_id", "stuck", "type_id");
        $this->createIndex("idx-stuck-age_group_id", "stuck", "age_group_id");

        $this->addForeignKey(
            "fk-stuck-owner_id",
            "stuck",
            "owner_id",
            "request",
            "id",
            "CASCADE"
        );
        $this->addForeignKey(
            "fk-stuck-type_id",
            "stuck",
            "type_id",
            "distance",
            "id",
            "CASCADE"
        );
        $this->addForeignKey(
            "fk-stuck-age_group",
            "stuck",
            "age_group_id",
            "age_group",
            "id",
            "CASCADE"
        );
    }

    public function down()
    {
        echo $this->dropTable("{{%stuck}}");

        return false;
    }
}
