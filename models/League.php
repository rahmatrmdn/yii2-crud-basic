<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "leagues".
 *
 * @property int $id
 * @property string $name
 * @property string $division
 *
 * @property Team[] $teams
 */
class League extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leagues';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'division'], 'required'],
            [['division'], 'string'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'division' => 'Division',
        ];
    }

    /**
     * Gets query for [[Teams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeams()
    {
        return $this->hasMany(Team::className(), ['league_id' => 'id']);
    }
}
