<?php

use yii\db\Migration;

class m170317_131415_age_group_race extends Migration
{

    protected  $init_data = [
        ['group' => '100-119'],
        ['group' => '120-159'],
        ['group' => '160-199'],
        ['group' => '200-239'],
        ['group' => '240-279'],
        ['group' => '280-319'],
        ['group' => '360-399'],
    ];

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%age_group_race}}", [
            'id' => $this->primaryKey(),
            'group' => $this->string(255)->notNull(),
        ], $tableOptions);

        $this->initData();
    }

    public function down()
    {
        echo "m170512_134827_age_group_race cannot be reverted.\n";

        return $this->dropTable("{{%age_group_race}}");
    }

    protected function initData(){
        foreach ($this->init_data as $row){
            $this->insert("{{%age_group_race}}", $row);
        }
    }
}
