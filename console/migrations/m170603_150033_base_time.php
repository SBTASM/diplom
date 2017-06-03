<?php

use yii\db\Migration;

class m170603_150033_base_time extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%base_time}}", [
            'id' => $this->primaryKey(),
            'age_group_id' => $this->integer()->notNull(),
            'distance_id' => $this->integer()->notNull(),
            'base_time' => $this->string(),
        ], $tableOptions);
    }

    public function down()
    {
    }
}
