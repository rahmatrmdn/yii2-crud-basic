<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teams".
 *
 * @property int $id
 * @property string $name
 * @property string $country
 * @property string $description
 * @property int $league_id
 *
 * @property League $league
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teams';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'country', 'description', 'league_id'], 'required'],
            [['description'], 'string'],
            [['league_id'], 'integer'],
            [['name', 'country'], 'string', 'max' => 50],
            [['league_id'], 'exist', 'skipOnError' => true, 'targetClass' => League::className(), 'targetAttribute' => ['league_id' => 'id']],
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
            'country' => 'Country',
            'description' => 'Description',
            'league_id' => 'League ID',
        ];
    }

    /**
     * Gets query for [[League]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeague()
    {
        return $this->hasOne(League::className(), ['id' => 'league_id']);
    }
}
