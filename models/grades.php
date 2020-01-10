<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grades".
 *
 * @property int $id
 * @property string $name
 * @property int $semester
 * @property int $year
 * @property int $disc_id
 * @property int $group_id
 * @property string $journal
 * @property int $created_at
 * @property int $updated_at
 */
class grades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['semester', 'year', 'group_id', 'created_at', 'updated_at','created_by'], 'integer'],
            [['journal'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'semester' => Yii::t('app', 'Semester'),
            'year' => Yii::t('app', 'Year'),
            'disc_id' => Yii::t('app', 'Disc ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'journal' => Yii::t('app', 'Journal'),
        ];
    }
}
